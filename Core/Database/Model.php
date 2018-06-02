<?php
namespace Core\Database;

use \Nette\Database\Connection;

class Model
{
    private $select = [];
    private $table = [];
    private $where = [];
    public $db;


    public function __construct($dbConnection = null)
    {
        return $this->db = $dbConnection;
    }

    public static function connect($server, $dtbname, $user, $password)
    {
        $dsn = "mysql:host=".$server.";dbname=".$dtbname;
        $dtb = new Connection($dsn, $user, $password);
        return $dtb;
    }

    public function select()
    {
        $args = func_get_args();
        $this->select = $args;
        return $this;
    }
}