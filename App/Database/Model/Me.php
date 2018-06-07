<?php
namespace App\Database\Model;

use Core\Database\Model;
use Core\Factory;

class Me extends Model
{


    protected $table = "me";
    public $dtb;

    public function __construct()
    {
         $this->dtb = Factory::getdb();
    }



    public function updateMe($array)
    {
        return $this->dtb->query("UPDATE ?name SET ", $this->table, $array, "WHERE id = 1 ");
    }

    public function insert($array)
    {
        $this->dtb->query("INSERT INTO ".$this->table." ? " , $array);
    }
}
