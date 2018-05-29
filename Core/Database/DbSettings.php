<?php
namespace Core\Database;


class DbSettings
{

    public $username;
    public $password;
    public $server;
    public $db_name;
    public $is_set = false;

    public function __construct()
    {
        if($this->is_set === false ) {
            return $this->set("localhost","root","","me");
        }

    }

    public function set($server,$username,$password,$db_name) {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
        $this->is_set = true;
        return $this;
    }

}