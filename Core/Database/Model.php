<?php
namespace Core\Database;

use Nette\Database\Connection;
use Nette\Database\Context;
use Nette;

class Model
{
    public $db;

    public function __construct () {
        $con = new Connection("mysql:host=localhost;dbname=me", "root", "");
        return $this->db = $con;

    }
}