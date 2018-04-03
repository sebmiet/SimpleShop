<?php
/**
 * Created by PhpStorm.
 * User: sebmiet
 * Date: 01.04.18
 * Time: 02:45
 */

class user
{
    private $id;
    private $login;
    private $construct;

    public function __construct($anonymous = true)
    {
        if ($anonymous == true) {
            $this->id = 0;
            $this->login = '';
        }
        $this->construct = true;
    }
}