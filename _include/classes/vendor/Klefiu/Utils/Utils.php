<?php


namespace Klefiu\App;


use Klefiu\App;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Utils extends App
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = parent::sql()->getPDO();
    }

    public function getPanelSSL()
    {
        if ($this->getSetting('panel_domainSSL') == "true") {
            return "https://";
        } else {
            return "http://";
        }
    }

    public function getPanelURL()
    {
        $url = $this->getPanelSSL();
        $url .= $this->getPanelDomain();
        $url .= $this->getPanelPath();
        return $url;
    }

    public function getPanelDomain()
    {
        return $this->getSetting('panel_domainName');
    }

    public function getPanelPath()
    {
        return $this->getSetting('panel_domainPath');
    }

    public function getLanguageCode() {
        if (isset($_COOKIE['KLEFIU_lang'])) {
            if (parent::auth()->getUser()->getLanguageCode() !== null) {
                return parent::auth()->getUser()->getLanguageCode();
            }
            if (in_array($_COOKIE['KLEFIU_lang'], unserialize($this->getSetting('panel_localeAvailableLanguages')))) {
                return $_COOKIE['KLEFIU_lang'];
            }
        }
        return $this->getSetting('panel_localeLanguage');
    }

    public function getReturnURL()
    {
        return $this->getPanelSSL() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    public function convertTime($seconds, $mode = 'array')
    {
        if ($mode == 'array') {
            $td = array();
            $td['total'] = $seconds;
            $td['sec'] = $seconds % 60;
            $td['min'] = (($seconds - $td['sec']) / 60) % 60;
            $td['std'] = (((($seconds - $td['sec']) /60)-
                        $td['min']) / 60) % 24;
            $td['day'] = floor( ((((($seconds - $td['sec']) /60)-
                        $td['min']) / 60) / 24) );
            return $td;
        }
        else if ($mode == 'minutes') { return round($seconds / 60); }
        else if ($mode == 'hours') { return round($seconds / 60 / 60); }
        else if ($mode == 'days') { return round($seconds / 60 / 60 / 24); }
        else return 0;
    }

    public function phpMailerSMTP($recipients, $subject, $htmlBody = null, $textBody = null, $replyTo = null, $sendername = null, $attachments = null, $debug = 0)
    {
        try {
            $mailer = new PHPMailer(true);


            $mailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mailer->SMTPDebug = $debug;
            $mailer->isSMTP();
            $mailer->Mailer = 'smtp';
            if (!is_null($htmlBody)) $mailer->isHTML(true);

            $mailer->Host           = $this->getSetting('mail_smtp_host');
            $mailer->SMTPAuth       = ($this->getSetting('mail_smtp_auth') == "true");
            $mailer->Username       = $this->getSetting('mail_smtp_user');
            $mailer->Password       = $this->getSetting('mail_smtp_pass');
            $mailer->SMTPSecure     = $this->getSetting('mail_smtp_encryption');
            $mailer->Port           = $this->getSetting('mail_smtp_port');
            $mailer->CharSet        = 'utf-8';

            $mailer->Subject        = $subject;
            if (!is_null($htmlBody)) {
                $mailer->Body = $htmlBody;
                if (!is_null($textBody)) {
                    $mailer->AltBody = $textBody;
                }
            }
            if (is_null($htmlBody) && !is_null($textBody)) {
                $mailer->Body = $textBody;
            }
            if (is_null($htmlBody) && is_null($textBody)) return false;
            $mailer->From           = $this->getSetting('mail_smtp_sender');
            $mailer->FromName       = (is_null($sendername)) ? $this->getSetting('mail_sendername') : $sendername;
            if (!is_null($replyTo)) $mailer->addReplyTo($replyTo);
            if (is_array($recipients)) {
                foreach ($recipients as $mail) {
                    $mailer->addAddress($mail);
                }
            } else {
                $mailer->addAddress($recipients);
            }

            if (!is_null($attachments)) {
                if (is_array($attachments)) {
                    foreach ($attachments as $file) {
                        $mailer->addAttachment($file);
                    }
                } else {
                    $mailer->addAttachment($attachments);
                }
            }

            $mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getSetting($idNr, $result = 0)
    {
        if (is_integer($idNr)) {
            $statement = parent::sql()->getPDO()->prepare("SELECT settingVal FROM ". Config::read('db_prefix') . "settings WHERE settingNr = :settingNr");
            $statement->execute(['settingNr' => $idNr]);
            return $statement->fetch()[$result];
        }
        $statement = parent::sql()->getPDO()->prepare("SELECT settingVal FROM ". Config::read('db_prefix') . "settings WHERE settingID = :settingID");
        $statement->execute(['settingID' => $idNr]);
        return $statement->fetch()[$result];
    }

    public function getOperatingSystem()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = "Unknown OS Platform";
        $os_array = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );
        foreach ($os_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $os_platform = $value;
        return $os_platform;
    }

    public function getUserAgent()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser        = "Unknown Browser";
        $browser_array = array(
            '/msie/i'      => 'Internet Explorer',
            '/firefox/i'   => 'Firefox',
            '/safari/i'    => 'Safari',
            '/chrome/i'    => 'Chrome',
            '/edge/i'      => 'Edge',
            '/opera/i'     => 'Opera',
            '/netscape/i'  => 'Netscape',
            '/maxthon/i'   => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i'    => 'Handheld Browser'
        );
        foreach ($browser_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $browser = $value;
        return $browser;
    }

    public function getUserIP()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    public function getRandomString()
    {
        return sha1(md5(rand(1, 999999999999999)));
    }

    public function sortArrayValueLengths($array) {
        usort($array,function ($a,$b){
            return strlen($a)-strlen($b);
        });
        return $array;
    }


}