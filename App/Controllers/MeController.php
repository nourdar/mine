<?php
namespace App\Controllers;

use \Core\Controllers\Controller;

use  upload;

class MeController extends Controller {

    public $me;

    public function __construct()
    {
        $this->me = model("Me");
    }

    public function layout()
    {
        return view('layout');
    }

    public function editPage()
    {
         return view('Admin.me', ['me'=> $this->me]);
    }

    public function uploadMyImage()
    {
        header('Content-type: application/json');
        $file = $_FILES['file'];
        $uploader = new upload($file);
        $uploader->process('Store/Images');
        if ($uploader->processed) {
            $array = ["image"=>$uploader->file_dst_name];
            $result = $this->me->update($array);
            if ($result) {
                $name = ['name' => $uploader->file_dst_name];
                echo json_encode($name);
            } else {
                return false;
            }
        }
    }

    public function update()
    {
        extract($_POST);

       $array = [
           "name"           => $name,
           "surname"        => $surname,
           "address"        => $address,
           "birthday"       => $birthday,
           "email"          => $email,
           "phone1"         => $phone1,
           "phone2"         => $phone2,
           "job"            => $job,
           "description"    => $description,
           "about_me"       => $about
       ];

       $result = $this->me->update($array);
        if ($result) {
            rMsg('t','My Informations has been Uploaded With Success');

        } else {
            rMsg('f','oops there is something wrong operation has not been finished with succees');
        }
        redirect('back');
    }


}
