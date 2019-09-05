<?php


namespace EasySwoole\Apollo;


use EasySwoole\Spl\SplBean;

class Server extends SplBean
{
    protected $server;
    protected $appId;
    protected $cluster = 'defaultCluster';

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server): void
    {
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param mixed $appId
     */
    public function setAppId($appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getCluster(): string
    {
        return $this->cluster;
    }

    /**
     * @param string $cluster
     */
    public function setCluster(string $cluster): void
    {
        $this->cluster = $cluster;
    }

    function __toString()
    {
        return implode("/",[
                $this->server,
                'configs',
                $this->appId,
                $this->cluster
            ]).'/';
    }
}