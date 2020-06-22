<?php
require_once '_handler/configurationSaver.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <?php require_once '_include/head.inc.php'; ?>

        <?php if (isset($_GET['check']))  { ?>
            <script type="text/javascript">history.pushState(null, "", "setup.php?path=/setup/configuration");</script>
        <?php } ?>

    </head>

    <body class="bg-light">

        <!-- // CONTENT // -->
        <div class="container">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" height="50" width="50" src="<?php echo $setup['logoPath']; ?>" alt="Logo">
                <h2>Basic configuration</h2>
                <p class="lead">Please configure the panel settings below to continue with setup.</p>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 order-md-1">

                    <?php
                    if ($error) {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">".$form['status']."</div>";
                    }
                    ?>


                    <form class="needs-validation" novalidate method="post" action="setup.php?path=/setup/configuration&check" onsubmit="formLoad('savenext', 'Save & Next', 5000)">
                        <div class="row">
                            <div class="col-auto"><h4 class="mb-9">Panel settings</h4></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="panel_domainSSL">Protocol</label>
                                <select class="form-control" id="panel_domainSSL" name="panel_domainSSL" required>
                                    <option value="false">http://</option>
                                    <option value="true">https://</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label for="panel_domainName">Domain name</label>
                                <input type="text" class="form-control" id="panel_domainName" name="panel_domainName" placeholder="example.com" value="<?php echo $form['panel_domainName']; ?>" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="panel_domainPath">Panel path</label>
                                <input type="text" id="panel_domainPath" name="panel_domainPath" class="form-control" value="<?php echo $form['panel_domainPath']; ?>" placeholder="/" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">&nbsp;</div>
                        </div>

                        <div class="row">
                            <div class="col-auto"><h4 class="mb-9">Locale settings</h4></div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="panel_localeTimezone">Timezone</label>
                                <select name="panel_localeTimezone" id="panel_localeTimezone" class="form-control" required>

                                    <option value="" disabled>Africa</option>
                                    <option value="Africa/Abidjan">&nbsp;&nbsp;&nbsp;Africa/Abidjan</option>
                                    <option value="Africa/Addis_Ababa">&nbsp;&nbsp;&nbsp;Africa/Addis_Ababa</option>
                                    <option value="Africa/Asmara">&nbsp;&nbsp;&nbsp;Africa/Asmara</option>
                                    <option value="Africa/Bangui">&nbsp;&nbsp;&nbsp;Africa/Bangui</option>
                                    <option value="Africa/Bissau">&nbsp;&nbsp;&nbsp;Africa/Bissau</option>
                                    <option value="Africa/Brazzaville">&nbsp;&nbsp;&nbsp;Africa/Brazzaville</option>
                                    <option value="Africa/Cairo">&nbsp;&nbsp;&nbsp;Africa/Cairo</option>
                                    <option value="Africa/Ceuta">&nbsp;&nbsp;&nbsp;Africa/Ceuta</option>
                                    <option value="Africa/Dakar">&nbsp;&nbsp;&nbsp;Africa/Dakar</option>
                                    <option value="Africa/Djibouti">&nbsp;&nbsp;&nbsp;Africa/Djibouti</option>
                                    <option value="Africa/El_Aaiun">&nbsp;&nbsp;&nbsp;Africa/El_Aaiun</option>
                                    <option value="Africa/Gaborone">&nbsp;&nbsp;&nbsp;Africa/Gaborone</option>
                                    <option value="Africa/Johannesburg">&nbsp;&nbsp;&nbsp;Africa/Johannesburg</option>

                                    <option value="" disabled>America</option>
                                    <option value="America/Adak">&nbsp;&nbsp;&nbsp;America/Adak</option>
                                    <option value="America/Anguilla">&nbsp;&nbsp;&nbsp;America/Anguilla</option>
                                    <option value="America/Cambridge_Bay">&nbsp;&nbsp;&nbsp;America/Cambridge_Bay</option>
                                    <option value="America/Chicago">&nbsp;&nbsp;&nbsp;America/Chicago</option>
                                    <option value="America/Costa_Rica">&nbsp;&nbsp;&nbsp;America/Costa_Rica</option>
                                    <option value="America/Denver">&nbsp;&nbsp;&nbsp;America/Denver</option>
                                    <option value="America/Detroit">&nbsp;&nbsp;&nbsp;America/Detroit</option>
                                    <option value="America/El_Salvador">&nbsp;&nbsp;&nbsp;America/El_Salvador</option>
                                    <option value="America/Guatemala">&nbsp;&nbsp;&nbsp;America/Guatemala</option>
                                    <option value="America/Guyana">&nbsp;&nbsp;&nbsp;America/Guyana</option>
                                    <option value="America/Inuvik">&nbsp;&nbsp;&nbsp;America/Inuvik</option>
                                    <option value="America/Jamaica">&nbsp;&nbsp;&nbsp;America/Jamaica</option>
                                    <option value="America/Lima">&nbsp;&nbsp;&nbsp;America/Lima</option>
                                    <option value="America/Los_Angeles">&nbsp;&nbsp;&nbsp;America/Los_Angeles</option>
                                    <option value="America/Merida">&nbsp;&nbsp;&nbsp;America/Merida</option>
                                    <option value="America/Mexico_City">&nbsp;&nbsp;&nbsp;America/Mexico_City</option>
                                    <option value="America/New_York">&nbsp;&nbsp;&nbsp;America/New_York</option>
                                    <option value="America/North_Dakota/Center">&nbsp;&nbsp;&nbsp;America/North_Dakota/Center</option>
                                    <option value="America/Panama">&nbsp;&nbsp;&nbsp;America/Panama</option>
                                    <option value="America/Puerto_Rico">&nbsp;&nbsp;&nbsp;America/Puerto_Rico</option>
                                    <option value="America/Sao_Paulo">&nbsp;&nbsp;&nbsp;America/Sao_Paulo</option>
                                    <option value="America/Toronto">&nbsp;&nbsp;&nbsp;America/Toronto</option>
                                    <option value="America/Vancouver">&nbsp;&nbsp;&nbsp;America/Vancouver</option>
                                    <option value="America/Winnipeg">&nbsp;&nbsp;&nbsp;America/Winnipeg</option>

                                    <option value="" disabled>Antarctica</option>
                                    <option value="Antarctica/Casey">&nbsp;&nbsp;&nbsp;Antarctica/Casey</option>
                                    <option value="Antarctica/Davis">&nbsp;&nbsp;&nbsp;Antarctica/Davis</option>
                                    <option value="Antarctica/DumontDUrville">&nbsp;&nbsp;&nbsp;Antarctica/DumontDUrville</option>
                                    <option value="Antarctica/Macquarie">&nbsp;&nbsp;&nbsp;Antarctica/Macquarie</option>
                                    <option value="Antarctica/Mawson">&nbsp;&nbsp;&nbsp;Antarctica/Mawson</option>
                                    <option value="Antarctica/McMurdo">&nbsp;&nbsp;&nbsp;Antarctica/McMurdo</option>
                                    <option value="Antarctica/Palmer">&nbsp;&nbsp;&nbsp;Antarctica/Palmer</option>
                                    <option value="Antarctica/Rothera">&nbsp;&nbsp;&nbsp;Antarctica/Rothera</option>
                                    <option value="Antarctica/Syowa">&nbsp;&nbsp;&nbsp;Antarctica/Syowa</option>
                                    <option value="Antarctica/Troll">&nbsp;&nbsp;&nbsp;Antarctica/Troll</option>
                                    <option value="Antarctica/Vostok">&nbsp;&nbsp;&nbsp;Antarctica/Vostok</option>

                                    <option value="" disabled>Arctic</option>
                                    <option value="Arctic/Longyearbyen">&nbsp;&nbsp;&nbsp;Arctic/Longyearbyen</option>

                                    <option value="" disabled>Asia</option>
                                    <option value="Asia/Aden">&nbsp;&nbsp;&nbsp;Asia/Aden</option>
                                    <option value="Asia/Aqtau">&nbsp;&nbsp;&nbsp;Asia/Aqtau</option>
                                    <option value="Asia/Baghdad">&nbsp;&nbsp;&nbsp;Asia/Baghdad</option>
                                    <option value="Asia/Baku">&nbsp;&nbsp;&nbsp;Asia/Baku</option>
                                    <option value="Asia/Bangkok">&nbsp;&nbsp;&nbsp;Asia/Bangkok</option>
                                    <option value="Asia/Barnaul">&nbsp;&nbsp;&nbsp;Asia/Barnaul</option>
                                    <option value="Asia/Bishkek">&nbsp;&nbsp;&nbsp;Asia/Bishkek</option>
                                    <option value="Asia/Brunei">&nbsp;&nbsp;&nbsp;Asia/Brunei</option>
                                    <option value="Asia/Chita">&nbsp;&nbsp;&nbsp;Asia/Chita</option>
                                    <option value="Asia/Dhaka">&nbsp;&nbsp;&nbsp;Asia/Dhaka</option>
                                    <option value="Asia/Dubai">&nbsp;&nbsp;&nbsp;Asia/Dubai</option>
                                    <option value="Asia/Famagusta">&nbsp;&nbsp;&nbsp;Asia/Famagusta</option>
                                    <option value="Asia/Hong_Kong">&nbsp;&nbsp;&nbsp;Asia/Hong_Kong</option>
                                    <option value="Asia/Jakarta">&nbsp;&nbsp;&nbsp;Asia/Jakarta</option>
                                    <option value="Asia/Jerusalem">&nbsp;&nbsp;&nbsp;Asia/Jerusalem</option>
                                    <option value="Asia/Karachi">&nbsp;&nbsp;&nbsp;Asia/Karachi</option>
                                    <option value="Asia/Kathmandu">&nbsp;&nbsp;&nbsp;Asia/Kathmandu</option>
                                    <option value="Asia/Kuala_Lumpur">&nbsp;&nbsp;&nbsp;Asia/Kuala_Lumpur</option>
                                    <option value="Asia/Macau">&nbsp;&nbsp;&nbsp;Asia/Macau</option>
                                    <option value="Asia/Muscat">&nbsp;&nbsp;&nbsp;Asia/Muscat</option>
                                    <option value="Asia/Novokuznetsk">&nbsp;&nbsp;&nbsp;Asia/Novokuznetsk</option>
                                    <option value="Asia/Omsk">&nbsp;&nbsp;&nbsp;Asia/Omsk</option>
                                    <option value="Asia/Pyongyang">&nbsp;&nbsp;&nbsp;Asia/Pyongyang</option>
                                    <option value="Asia/Qatar">&nbsp;&nbsp;&nbsp;Asia/Qatar</option>
                                    <option value="Asia/Riyadh">&nbsp;&nbsp;&nbsp;Asia/Riyadh</option>
                                    <option value="Asia/Seoul">&nbsp;&nbsp;&nbsp;Asia/Seoul</option>
                                    <option value="Asia/Shanghai">&nbsp;&nbsp;&nbsp;Asia/Shanghai</option>
                                    <option value="Asia/Singapore">&nbsp;&nbsp;&nbsp;Asia/Singapore</option>
                                    <option value="Asia/Taipei">&nbsp;&nbsp;&nbsp;Asia/Taipei</option>
                                    <option value="Asia/Tokyo">&nbsp;&nbsp;&nbsp;Asia/Tokyo</option>
                                    <option value="Asia/Ust-Nera">&nbsp;&nbsp;&nbsp;Asia/Ust-Nera</option>
                                    <option value="Asia/Yangon">&nbsp;&nbsp;&nbsp;Asia/Yangon</option>
                                    <option value="Asia/Yekaterinburg">&nbsp;&nbsp;&nbsp;Asia/Yekaterinburg</option>
                                    <option value="Asia/Yerevan">&nbsp;&nbsp;&nbsp;Asia/Yerevan</option>

                                    <option value="" disabled>Atlantic</option>
                                    <option value="Atlantic/Azores">&nbsp;&nbsp;&nbsp;Atlantic/Azores</option>
                                    <option value="Atlantic/Bermuda">&nbsp;&nbsp;&nbsp;Atlantic/Bermuda</option>
                                    <option value="Atlantic/Canary">&nbsp;&nbsp;&nbsp;Atlantic/Canary</option>
                                    <option value="Atlantic/Cape_Verde">&nbsp;&nbsp;&nbsp;Atlantic/Cape_Verde</option>
                                    <option value="Atlantic/Faroe">&nbsp;&nbsp;&nbsp;Atlantic/Faroe</option>
                                    <option value="Atlantic/Madeira">&nbsp;&nbsp;&nbsp;Atlantic/Madeira</option>
                                    <option value="Atlantic/Reykjavik">&nbsp;&nbsp;&nbsp;Atlantic/Reykjavik</option>
                                    <option value="Atlantic/South_Georgia">&nbsp;&nbsp;&nbsp;Atlantic/South_Georgia</option>
                                    <option value="Atlantic/St_Helena">&nbsp;&nbsp;&nbsp;Atlantic/St_Helena</option>
                                    <option value="Atlantic/Stanley">&nbsp;&nbsp;&nbsp;Atlantic/Stanley</option>

                                    <option value="" disabled>Australia</option>
                                    <option value="Australia/Adelaide">&nbsp;&nbsp;&nbsp;Australia/Adelaide</option>
                                    <option value="Australia/Brisbane">&nbsp;&nbsp;&nbsp;Australia/Brisbane</option>
                                    <option value="Australia/Broken_Hill">&nbsp;&nbsp;&nbsp;Australia/Broken_Hill</option>
                                    <option value="Australia/Currie">&nbsp;&nbsp;&nbsp;Australia/Currie</option>
                                    <option value="Australia/Darwin">&nbsp;&nbsp;&nbsp;Australia/Darwin</option>
                                    <option value="Australia/Eucla">&nbsp;&nbsp;&nbsp;Australia/Eucla</option>
                                    <option value="Australia/Hobart">&nbsp;&nbsp;&nbsp;Australia/Hobart</option>
                                    <option value="Australia/Lindeman">&nbsp;&nbsp;&nbsp;Australia/Lindeman</option>
                                    <option value="Australia/Lord_Howe">&nbsp;&nbsp;&nbsp;Australia/Lord_Howe</option>
                                    <option value="Australia/Melbourne">&nbsp;&nbsp;&nbsp;Australia/Melbourne</option>
                                    <option value="Australia/Perth">&nbsp;&nbsp;&nbsp;Australia/Perth</option>
                                    <option value="Australia/Sydney">&nbsp;&nbsp;&nbsp;Australia/Sydney</option>

                                    <option value="" disabled>Europe</option>
                                    <option value="Europe/Amsterdam">&nbsp;&nbsp;&nbsp;Europe/Amsterdam</option>
                                    <option value="Europe/Andorra">&nbsp;&nbsp;&nbsp;Europe/Andorra</option>
                                    <option value="Europe/Astrakhan">&nbsp;&nbsp;&nbsp;Europe/Astrakhan</option>
                                    <option value="Europe/Athens">&nbsp;&nbsp;&nbsp;Europe/Athens</option>
                                    <option value="Europe/Belgrade">&nbsp;&nbsp;&nbsp;Europe/Belgrade</option>
                                    <option value="Europe/Berlin" selected>&nbsp;&nbsp;&nbsp;Europe/Berlin</option>
                                    <option value="Europe/Bratislava">&nbsp;&nbsp;&nbsp;Europe/Bratislava</option>
                                    <option value="Europe/Brussels">&nbsp;&nbsp;&nbsp;Europe/Brussels</option>
                                    <option value="Europe/Bucharest">&nbsp;&nbsp;&nbsp;Europe/Bucharest</option>
                                    <option value="Europe/Budapest">&nbsp;&nbsp;&nbsp;Europe/Budapest</option>
                                    <option value="Europe/Busingen">&nbsp;&nbsp;&nbsp;Europe/Busingen</option>
                                    <option value="Europe/Chisinau">&nbsp;&nbsp;&nbsp;Europe/Chisinau</option>
                                    <option value="Europe/Copenhagen">&nbsp;&nbsp;&nbsp;Europe/Copenhagen</option>
                                    <option value="Europe/Dublin">&nbsp;&nbsp;&nbsp;Europe/Dublin</option>
                                    <option value="Europe/Gibraltar">&nbsp;&nbsp;&nbsp;Europe/Gibraltar</option>
                                    <option value="Europe/Guernsey">&nbsp;&nbsp;&nbsp;Europe/Guernsey</option>
                                    <option value="Europe/Helsinki">&nbsp;&nbsp;&nbsp;Europe/Helsinki</option>
                                    <option value="Europe/Isle_of_Man">&nbsp;&nbsp;&nbsp;Europe/Isle_of_Man</option>
                                    <option value="Europe/Istanbul">&nbsp;&nbsp;&nbsp;Europe/Istanbul</option>
                                    <option value="Europe/Jersey">&nbsp;&nbsp;&nbsp;Europe/Jersey</option>
                                    <option value="Europe/Kaliningrad">&nbsp;&nbsp;&nbsp;Europe/Kaliningrad</option>
                                    <option value="Europe/Kiev">&nbsp;&nbsp;&nbsp;Europe/Kiev</option>
                                    <option value="Europe/Kirov">&nbsp;&nbsp;&nbsp;Europe/Kirov</option>
                                    <option value="Europe/Lisbon">&nbsp;&nbsp;&nbsp;Europe/Lisbon</option>
                                    <option value="Europe/Ljubljana">&nbsp;&nbsp;&nbsp;Europe/Ljubljana</option>
                                    <option value="Europe/London">&nbsp;&nbsp;&nbsp;Europe/London</option>
                                    <option value="Europe/Luxembourg">&nbsp;&nbsp;&nbsp;Europe/Luxembourg</option>
                                    <option value="Europe/Madrid">&nbsp;&nbsp;&nbsp;Europe/Madrid</option>
                                    <option value="Europe/Malta">&nbsp;&nbsp;&nbsp;Europe/Malta</option>
                                    <option value="Europe/Mariehamn">&nbsp;&nbsp;&nbsp;Europe/Mariehamn</option>
                                    <option value="Europe/Minsk">&nbsp;&nbsp;&nbsp;Europe/Minsk</option>
                                    <option value="Europe/Monaco">&nbsp;&nbsp;&nbsp;Europe/Monaco</option>
                                    <option value="Europe/Moscow">&nbsp;&nbsp;&nbsp;Europe/Moscow</option>
                                    <option value="Europe/Oslo">&nbsp;&nbsp;&nbsp;Europe/Oslo</option>
                                    <option value="Europe/Paris">&nbsp;&nbsp;&nbsp;Europe/Paris</option>
                                    <option value="Europe/Podgorica">&nbsp;&nbsp;&nbsp;Europe/Podgorica</option>
                                    <option value="Europe/Prague">&nbsp;&nbsp;&nbsp;Europe/Prague</option>
                                    <option value="Europe/Riga">&nbsp;&nbsp;&nbsp;Europe/Riga</option>
                                    <option value="Europe/Rome">&nbsp;&nbsp;&nbsp;Europe/Rome</option>
                                    <option value="Europe/Samara">&nbsp;&nbsp;&nbsp;Europe/Samara</option>
                                    <option value="Europe/San_Marino">&nbsp;&nbsp;&nbsp;Europe/San_Marino</option>
                                    <option value="Europe/Sarajevo">&nbsp;&nbsp;&nbsp;Europe/Sarajevo</option>
                                    <option value="Europe/Saratov">&nbsp;&nbsp;&nbsp;Europe/Saratov</option>
                                    <option value="Europe/Simferopol">&nbsp;&nbsp;&nbsp;Europe/Simferopol</option>
                                    <option value="Europe/Skopje">&nbsp;&nbsp;&nbsp;Europe/Skopje</option>
                                    <option value="Europe/Sofia">&nbsp;&nbsp;&nbsp;Europe/Sofia</option>
                                    <option value="Europe/Stockholm">&nbsp;&nbsp;&nbsp;Europe/Stockholm</option>
                                    <option value="Europe/Tallinn">&nbsp;&nbsp;&nbsp;Europe/Tallinn</option>
                                    <option value="Europe/Tirane">&nbsp;&nbsp;&nbsp;Europe/Tirane</option>
                                    <option value="Europe/Ulyanovsk">&nbsp;&nbsp;&nbsp;Europe/Ulyanovsk</option>
                                    <option value="Europe/Uzhgorod">&nbsp;&nbsp;&nbsp;Europe/Uzhgorod</option>
                                    <option value="Europe/Vaduz">&nbsp;&nbsp;&nbsp;Europe/Vaduz</option>
                                    <option value="Europe/Vatican">&nbsp;&nbsp;&nbsp;Europe/Vatican</option>
                                    <option value="Europe/Vienna">&nbsp;&nbsp;&nbsp;Europe/Vienna</option>
                                    <option value="Europe/Vilnius">&nbsp;&nbsp;&nbsp;Europe/Vilnius</option>
                                    <option value="Europe/Volgograd">&nbsp;&nbsp;&nbsp;Europe/Volgograd</option>
                                    <option value="Europe/Warsaw">&nbsp;&nbsp;&nbsp;Europe/Warsaw</option>
                                    <option value="Europe/Zagreb">&nbsp;&nbsp;&nbsp;Europe/Zagreb</option>
                                    <option value="Europe/Zaporozhye">&nbsp;&nbsp;&nbsp;Europe/Zaporozhye</option>
                                    <option value="Europe/Zurich">&nbsp;&nbsp;&nbsp;Europe/Zurich</option>

                                    <option value="" disabled>India</option>
                                    <option value="Indian/Antananarivo">&nbsp;&nbsp;&nbsp;Indian/Antananarivo</option>
                                    <option value="Indian/Chagos">&nbsp;&nbsp;&nbsp;Indian/Chagos</option>
                                    <option value="Indian/Christmas">&nbsp;&nbsp;&nbsp;Indian/Christmas</option>
                                    <option value="Indian/Cocos">&nbsp;&nbsp;&nbsp;Indian/Cocos</option>
                                    <option value="Indian/Comoro">&nbsp;&nbsp;&nbsp;Indian/Comoro</option>
                                    <option value="Indian/Kerguelen">&nbsp;&nbsp;&nbsp;Indian/Kerguelen</option>
                                    <option value="Indian/Mahe">&nbsp;&nbsp;&nbsp;Indian/Mahe</option>
                                    <option value="Indian/Maldives">&nbsp;&nbsp;&nbsp;Indian/Maldives</option>
                                    <option value="Indian/Mauritius">&nbsp;&nbsp;&nbsp;Indian/Mauritius</option>
                                    <option value="Indian/Mayotte">&nbsp;&nbsp;&nbsp;Indian/Mayotte</option>
                                    <option value="Indian/Reunion">&nbsp;&nbsp;&nbsp;Indian/Reunion</option>

                                    <option value="" disabled>Pacific</option>
                                    <option value="Pacific/Apia">&nbsp;&nbsp;&nbsp;Pacific/Apia</option>
                                    <option value="Pacific/Auckland">&nbsp;&nbsp;&nbsp;Pacific/Auckland</option>
                                    <option value="Pacific/Bougainville">&nbsp;&nbsp;&nbsp;Pacific/Bougainville</option>
                                    <option value="Pacific/Chatham">&nbsp;&nbsp;&nbsp;Pacific/Chatham</option>
                                    <option value="Pacific/Chuuk">&nbsp;&nbsp;&nbsp;Pacific/Chuuk</option>
                                    <option value="Pacific/Easter">&nbsp;&nbsp;&nbsp;Pacific/Easter</option>
                                    <option value="Pacific/Efate">&nbsp;&nbsp;&nbsp;Pacific/Efate</option>
                                    <option value="Pacific/Enderbury">&nbsp;&nbsp;&nbsp;Pacific/Enderbury</option>
                                    <option value="Pacific/Fakaofo">&nbsp;&nbsp;&nbsp;Pacific/Fakaofo</option>
                                    <option value="Pacific/Fiji">&nbsp;&nbsp;&nbsp;Pacific/Fiji</option>
                                    <option value="Pacific/Funafuti">&nbsp;&nbsp;&nbsp;Pacific/Funafuti</option>
                                    <option value="Pacific/Galapagos">&nbsp;&nbsp;&nbsp;Pacific/Galapagos</option>
                                    <option value="Pacific/Gambier">&nbsp;&nbsp;&nbsp;Pacific/Gambier</option>
                                    <option value="Pacific/Guadalcanal">&nbsp;&nbsp;&nbsp;Pacific/Guadalcanal</option>
                                    <option value="Pacific/Guam">&nbsp;&nbsp;&nbsp;Pacific/Guam</option>
                                    <option value="Pacific/Honolulu">&nbsp;&nbsp;&nbsp;Pacific/Honolulu</option>
                                    <option value="Pacific/Kiritimati">&nbsp;&nbsp;&nbsp;Pacific/Kiritimati</option>
                                    <option value="Pacific/Kosrae">&nbsp;&nbsp;&nbsp;Pacific/Kosrae</option>
                                    <option value="Pacific/Kwajalein">&nbsp;&nbsp;&nbsp;Pacific/Kwajalein</option>
                                    <option value="Pacific/Majuro">&nbsp;&nbsp;&nbsp;Pacific/Majuro</option>
                                    <option value="Pacific/Marquesas">&nbsp;&nbsp;&nbsp;Pacific/Marquesas</option>
                                    <option value="Pacific/Midway">&nbsp;&nbsp;&nbsp;Pacific/Midway</option>
                                    <option value="Pacific/Nauru">&nbsp;&nbsp;&nbsp;Pacific/Nauru</option>
                                    <option value="Pacific/Niue">&nbsp;&nbsp;&nbsp;Pacific/Niue</option>
                                    <option value="Pacific/Norfolk">&nbsp;&nbsp;&nbsp;Pacific/Norfolk</option>
                                    <option value="Pacific/Noumea">&nbsp;&nbsp;&nbsp;Pacific/Noumea</option>
                                    <option value="Pacific/Pago_Pago">&nbsp;&nbsp;&nbsp;Pacific/Pago_Pago</option>
                                    <option value="Pacific/Palau">&nbsp;&nbsp;&nbsp;Pacific/Palau</option>
                                    <option value="Pacific/Pitcairn">&nbsp;&nbsp;&nbsp;Pacific/Pitcairn</option>
                                    <option value="Pacific/Pohnpei">&nbsp;&nbsp;&nbsp;Pacific/Pohnpei</option>
                                    <option value="Pacific/Port_Moresby">&nbsp;&nbsp;&nbsp;Pacific/Port_Moresby</option>
                                    <option value="Pacific/Rarotonga">&nbsp;&nbsp;&nbsp;Pacific/Rarotonga</option>
                                    <option value="Pacific/Saipan">&nbsp;&nbsp;&nbsp;Pacific/Saipan</option>
                                    <option value="Pacific/Tahiti">&nbsp;&nbsp;&nbsp;Pacific/Tahiti</option>
                                    <option value="Pacific/Tarawa">&nbsp;&nbsp;&nbsp;Pacific/Tarawa</option>
                                    <option value="Pacific/Tongatapu">&nbsp;&nbsp;&nbsp;Pacific/Tongatapu</option>
                                    <option value="Pacific/Wake">&nbsp;&nbsp;&nbsp;Pacific/Wake</option>
                                    <option value="Pacific/Wallis">&nbsp;&nbsp;&nbsp;Pacific/Wallis</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="panel_localeLanguage">Language</label>
                                <input type="text" name="panel_localeLanguage" id="panel_localeLanguage" placeholder="en_US, de_DE, es_ES" class="form-control" value="<?php echo $form['panel_localeLanguage']; ?>" required />
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-md-12">
                                <label for="panel_localeDateformat">Dateformat</label>
                                <select name="panel_localeDateformat" id="panel_localeDateformat" class="form-control" required>
                                    <option value="d.m.Y" selected>DD.MM.YYYY</option>
                                    <option value="m.d.Y">MM.DD.YYYY</option>
                                    <option value="Y.m.d">YYYY.MM.DD</option>
                                    <option value="Y.d.m">YYYY.DD.MM</option>
                                    <option value="d-m-Y">DD-MM-YYYY</option>
                                    <option value="m-d-Y">MM-DD-YYYY</option>
                                    <option value="Y-m-d">YYYY-MM-DD</option>
                                    <option value="Y-d-m">YYYY-DD-MM</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-auto"><h4 class="mb-9">Mail settings</h4></div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <label for="mail_smtp_host">SMTP-Host</label>
                                <input type="text" name="mail_smtp_host" id="mail_smtp_host" placeholder="mx.example.com" value="<?php echo $form['mail_smtp_host']; ?>" class="form-control" required />
                            </div>
                            <div class="col-md-3">
                                <label for="mail_smtp_auth">SMTP-Auth</label>
                                <select name="mail_smtp_auth" id="mail_smtp_auth" class="form-control" required>
                                    <option value="true">On</option>
                                    <option value="false">Off</option>
                                </select>
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-md-6">
                                <label for="mail_smtp_user">SMTP-User</label>
                                <input type="text" name="mail_smtp_user" id="mail_smtp_user" class="form-control" value="<?php echo $form['mail_smtp_user']; ?>" placeholder="mail@example.com" required />
                            </div>
                            <div class="col-md-6">
                                <label for="mail_smtp_pass">SMTP-Password</label>
                                <input type="password" name="mail_smtp_pass" id="mail_smtp_pass" class="form-control" value="" placeholder="" required />
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-md-3">
                                <label for="mail_smtp_encryption">SMTP-Encryption</label>
                                <select name="mail_smtp_encryption" id="mail_smtp_encryption" class="form-control">
                                    <option value="tls" selected>TLS</option>
                                    <option value="ssl">SSL</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="mail_smtp_sender">SMTP-Sender</label>
                                <input type="email" name="mail_smtp_sender" id="mail_smtp_sender" class="form-control" value="<?php echo $form['mail_smtp_sender']; ?>" placeholder="mail@example.com" required />
                            </div>
                            <div class="col-md-3">
                                <label for="mail_smtp_port">SMTP-Port</label>
                                <input type="number" name="mail_smtp_port" id="mail_smtp_port" class="form-control" value="<?php echo $form['mail_smtp_port']; ?>" placeholder="587 / 465" required />
                            </div>

                        </div>

                        <hr class="mb-4">
                        <div class="row py-1">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right" id="savenext" name="savenext">Save & Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- // FOOTER // -->
            <?php require_once '_include/footer.inc.php'; ?>

        </div>

        <!-- // SCRIPTS // -->
        <?php require_once '_include/scripts.inc.php'; ?>

        <script type="text/javascript">
            document.getElementById("panel_localeTimezone").value = "<?php echo $form['panel_localeTimezone']; ?>";
            document.getElementById("panel_localeDateformat").value = "<?php echo $form['panel_localeDateformat']; ?>";
            document.getElementById("panel_domainSSL").value = "<?php echo $form['panel_domainSSL']; ?>";
            document.getElementById("mail_smtp_auth").value = "<?php echo $form['mail_smtp_auth']; ?>";
            document.getElementById("mail_smtp_encryption").value = "<?php echo $form['mail_smtp_encryption']; ?>";
        </script>
        <script src="_assets/setup/js/modal.js"></script>


    </body>
</html>
