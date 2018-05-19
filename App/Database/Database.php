<?php
namespace App\Database;

use Nette\Database\Connection;

class Database
{
    public $db;

    public function __construct () {
        return $db = new Connection("mysql:host=localhost;dbname=it", "root", "");
    }
}