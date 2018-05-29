<?php
namespace Core\Database;
use Nette\Database\Connection;
use Core\Database\DbSettings as DB;
class Model
{
    public $dtb;
    private $select = [];
    private $table = [];
    private $where = [];


    public function __construct ()
    {
       $dtb = new DB();
       $this->connect($dtb->server, $dtb->db_name, $dtb->username,$dtb->password);

    }

    private function connect($server,$dtbname,$user,$password)

    {
        $dsn = "mysql:host=".$server.";dbname=".$dtbname;
        $dtb = new Connection($dsn,$user,$password);
        $this->dtb = $dtb;
        return $this;
    }

    public function select(){
        $args = func_get_args();
        $this->select = $args;
        return $this;
    }
}