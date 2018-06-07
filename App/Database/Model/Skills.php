<?php
namespace App\Database\Model;

use Core\Database\Model;
use Core\Factory;

class Skills extends Model
{
    protected $table = "skills";

    public $dtb;

    public function __construct()
    {
        $this->dtb = Factory::getdb();
    }
}