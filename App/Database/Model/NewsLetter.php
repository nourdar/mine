<?php
namespace App\Database\Model;

use Core\Database\Model;
use Core\Factory;

class NewsLetter extends Model
{


    protected $table = "news_letter";
    public $dtb;

    public function __construct()
    {
        $this->dtb = Factory::getdb();
    }


    public function insert($array)
    {
        $this->dtb->query("INSERT INTO ".$this->table." ? " , $array);
    }
}
