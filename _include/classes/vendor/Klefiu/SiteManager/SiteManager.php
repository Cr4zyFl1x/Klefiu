<?php


namespace Klefiu\App;

class SiteManager
{

    private $siteDB;
    private $dynamicDB;

    public function __construct($siteDB = [], $dynamicDB = [])
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

    public function getRequestPath()
    {
        return $_GET['rq'];
    }

    public function getSlicedPath($path)
    {
        return explode("/", $path);
    }

    public function getSiteFile($requestPath = null)
    {
        if ($requestPath === null) {
            $rq = $this->resolvePath($this->r('path'))[0];
            if ($this->siteFileIsSet($rq)) {
                $rq = $this->resolvePath($this->r('path'))[0];
                return $this->siteDB[$rq];
            }
            return $this->siteDB[404];
        }
        $rq = $this->resolvePath($requestPath)[0];
        if ($this->siteFileIsSet($rq)) {
            $rq = $this->resolvePath($requestPath)[0];
            return $this->siteDB[$rq];
        }
        return $this->siteDB[404];
    }

    public function setSiteFile($requestPath, $siteFile)
    {
        $this->siteDB[$requestPath] = $siteFile;
        $this->dynamicDB[] = $requestPath;
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
        return array_merge($this->siteDB, $this->dynamicDB);
    }



    public function resolvePath($requestPath)
    {
        $propablyArray = $this->dynamicDB;
        for($i=0; isset($this->getSlicedPath($requestPath)[$i]); $i++) {
            $propablyArray = $this->arrayKeyResolver($i, $requestPath, $propablyArray);
        }

        if (empty($propablyArray) || !isset($propablyArray)) {
            return false;
        }
        return Func::sortArrayValueLengths($propablyArray);
    }


    private function arrayKeyResolver($depth, $requestPath, $propablyValues)
    {
        if (is_array($propablyValues)) {
            foreach ($propablyValues as $path) {
                if ($this->getSlicedPath($path)[$depth] == $this->getSlicedPath($requestPath)[$depth] || $this->getSlicedPath($path)[$depth] == '*') {
                    $propablyArray[] = $path;
                }
            }
            return $propablyArray;
        }
        return ['404'];
    }












}