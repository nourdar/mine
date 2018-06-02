<?php
namespace App\Controllers;

use \Core\Controllers\Controller;
use \App\Database\Model\Me;
use  upload;

class MeController extends Controller {

    public $me;


    public function __construct()
    {
        $database = new Me();
        $this->me = $database;

    }

    public function sayHello()
    {
        rMsg('t', 'show message from say hello');
        view('Admin.index', ['me'=>$this->me]);
    }

    public function editPage()
    {
        rMsg('t', 'show message from say hello');

         return view('Admin.me',[
             'a' => "hello test variable sending",
             'me'=> $this->me
         ]);
    }

    public function show()
    {
        echo "hello from show method inside MeController";
    }

    public function showV($var = null)
    {
        pvd($var);
    }
    public function uploadMyImage()
    {
        $file = $_FILES['file'];
        $uploader = new upload($file);
        $uploader->process('Store/Images');
        if ($uploader->processed) {
            $array = ["image"=>$uploader->file_dst_name];
            $result = $this->me->update($array);
            if ($result) {
               echo $uploader->file_dst_name;
            } else {
                return false;
            }
        }
        }


}
