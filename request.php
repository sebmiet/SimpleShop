<?php
/**
 * Created by PhpStorm.
 * User: sebmiet
 * Date: 01.04.18
 * Time: 02:37
 */

class userRequest
{
    public $browser;
    public $ip;
    public $info;

    public function __construct()
    {
        $this->browser = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->info = md5($this->browser.$this->ip."fdi409wjk2");
    }

    public function getIp() {
        if ($this->ip == null)
            $this->ip = '127.0.0.1';
        return $this->ip;
    }

    public function getBrowser() {
        $agent = substr($this->browser, 0, 128);
        return $agent;
    }

    public function getInfo() {
        return $this->info;
    }
}
