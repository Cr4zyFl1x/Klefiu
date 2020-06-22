<?php


namespace Klefiu\App;

class SiteManager
{

    private $siteDB = [];

    public function __construct($siteDB = [])
    {
        $this->siteDB = $siteDB;
    }

    public function r($mode = null)
    {
        $request = $_GET['rq'];
        $ex = explode("/", $request);
        // Return Path
        if ($mode == 'path') {
            $exNo = 0;
            $returnPath = '';
            while ($ex[$exNo]) {
                $returnPath .= '/' . $ex[$exNo];
                $exNo++;

            }
            $returnPath = (empty($ex[0])) ? '/' : $returnPath;
            return $returnPath;
        }
        // Return Array
        else {
            $return = (empty($ex[0])) ? $ex[0] = '/' : $ex;
            return $ex;
        }
    }

    public function getSiteFile($requestPath = null)
    {
        if ($requestPath === null) {
            if ($this->siteFileIsSet($this->r('path'))) {
                return $this->siteDB[$this->r('path')];
            }
            return $this->siteDB[404];
        }
        if ($this->siteFileIsSet($requestPath)) {
            return $this->siteDB[$requestPath];
        }
        return $this->siteDB[404];
    }

    public function setSiteFile($requestPath, $siteFile)
    {
        $this->siteDB[$requestPath] = $siteFile;
    }

    public function siteFileIsSet($requestPath) {
        if (!array_key_exists($requestPath, $this->siteDB)) {
            return false;
        }
        return true;
    }

    public function unsetSiteFile($requestPath)
    {
        if (array_key_exists($requestPath, $this->siteDB)) {
            $this->siteDB[$requestPath] = null;
        }
    }

    public function setErrorFiles($errorCode, $siteFile)
    {
        if (!is_numeric($errorCode) || strlen($errorCode) !== 3 || empty($siteFile)) {
            exit('An error occoured while setting error code siteFile!');
        }
        $this->siteDB[$errorCode] = $siteFile;
    }

    public function getSiteDB()
    {
        return $this->siteDB;
    }





}