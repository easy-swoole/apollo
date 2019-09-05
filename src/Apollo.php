<?php


namespace EasySwoole\Apollo;


use EasySwoole\HttpClient\HttpClient;

class Apollo
{
    private $server;

    private $clientIp;
    private $clientDataCenter = 'defaultDataCenter';
    private $lastReleaseKey = null;

    function __construct(Server $server)
    {
        $this->server = $server;
    }

    function sync(string $namespace,float $timeout = 3.0):Result
    {
        $url = $this->server->__toString().$namespace.'?'.http_build_query(
                [
                    "ip"=>$this->clientIp,
                    'dataCenter'=>$this->clientDataCenter,
                    'releaseKey'=>$this->lastReleaseKey
                ]
            );
        $http = new HttpClient($url);
        $http->setTimeout($timeout);
        $ret = $http->get();
        $json = json_decode($ret->getBody(),true);
        if(is_array($json)){
            if($json['releaseKey'] !== $this->lastReleaseKey){
                $json['isModify'] = true;
                $this->lastReleaseKey = $json['releaseKey'];
            }
            return new Result($json);
        }else{
            return new Result(['releaseKey'=>$this->lastReleaseKey]);
        }
    }

    public function getLastReleaseKey():?string
    {
        return $this->lastReleaseKey;
    }

}