<?php
namespace Core\Database;

use \Nette\Database\Connection;

class Model
{
    private $select = [];
    protected $table;
    private $where = [];
    public $dtb;


    public function __construct($dbConnection = null)
    {
        return $this->dtb = $dbConnection;
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
        $args = implode(', ', $args);
        $this->select = $args;
        return $this;
    }

    public function where()
    {
        $args = func_get_args();
        $args = implode(', ', $args);
        $this->where = $args;
        return $this;
    }

    public function giveMe($coloumn)
    {
        return $this->select($coloumn)->get()->$coloumn;
    }

    public function giveMeAll()
    {
        return $this->select("*")->get();
    }

    public function get()
    {
        if (!empty($this->select) && !empty($this->from) && !empty($this->where)) {
            $query = "SELECT ".$this->select.' FROM '.$this->table.' WHERE '.$this->where;
            return $this->dtb->query($query)->fetch();
        }

        if (empty($this->where)) {
            $query = "SELECT ".$this->select.' FROM '.$this->table;
            return $this->dtb->query($query)->fetch();
        }
        return $this;
    }
}