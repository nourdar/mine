<?php
namespace App\Database\Model;

use Core\Database\Model;
use Core\Factory;

class Skills extends Model
{
    /**
     * @var string
     */
    protected $table = "skills";
    /**
     * @var \Nette\Database\Connection
     */
    public $dtb;

    /**
     * Skills constructor.
     */
    public function __construct()
    {
        $this->dtb = Factory::getdb();
    }
}