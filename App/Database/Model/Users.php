<?php
namespace App\Database\Model;

use Core\Database\Model;
use Core\Factory;

class Users extends Model
{
    protected $table = "users";

    public $dtb;

    public $visitor;

    public function __construct()
    {
        $this->dtb = Factory::getdb();
    }

    public function visitor()
    {
        $this->visitor = visitors();
        $this->visitor['image'] = randomUserIcon();
        return $this;
    }
}