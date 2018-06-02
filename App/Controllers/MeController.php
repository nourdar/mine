<?php
namespace App\Controllers;

use Core\Controllers\Controller;

use App\Database\Model\Me;

class MeController extends Controller {

    public $me;


    public function __construct()
    {
        $database = new Me();
        $this->me = $database;
    }

    public function sayHello()
    {
        sr('t', 'show message from say hello');
        view('Admin/index', ['me'=>$this->me]);
    }

    public function show()
    {
        echo "hello from show method inside MeController";
    }

    public function showV($var = null)
    {
        pvd($var);
    }

}
