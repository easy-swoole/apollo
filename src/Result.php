<?php


namespace EasySwoole\Apollo;


use EasySwoole\Spl\SplBean;

class Result extends SplBean
{
    protected $appId;
    protected $cluster;
    protected $namespaceName;
    protected $configurations;
    protected $releaseKey;
    protected $isModify = false;

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return mixed
     */
    public function getCluster()
    {
        return $this->cluster;
    }

    /**
     * @return mixed
     */
    public function getNamespaceName()
    {
        return $this->namespaceName;
    }

    /**
     * @return mixed
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }

    /**
     * @return mixed
     */
    public function getReleaseKey()
    {
        return $this->releaseKey;
    }

    /**
     * @return bool
     */
    public function isModify(): bool
    {
        return $this->isModify;
    }

}