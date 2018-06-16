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
         return view('Admin.Me.me', ['me'=> $this->me]);
    }

    public function uploadMyImage()
    {
        header('Content-type: application/json');
        $file = $_FILES['file'];
        $uploader = new upload($file);
        $uploader->process('Store/Images');
        if ($uploader->processed) {
            $array = ["image"=>$uploader->file_dst_name];
            try {
                $this->me->update($array);
                $name = ['name' => $uploader->file_dst_name];
                echo json_encode($name);
            } catch (\PDOException $e) {
                return false ;
            }
        }
    }

    public function update()
    {
        extract($_POST);

        $facebookShow  = isset($facebookShow)? "checked" : null ;
        $twitterShow   = isset($twitterShow)? "checked" : null ;
        $githubShow    = isset($githubShow)? "checked" : null ;

        $array = [
           "name"           => $name,
           "surname"        => $surname,
           "user_group"     => $user_group,
           "address"        => $address,
           "birthday"       => $birthday,
           "email"          => $email,
           "phone1"         => $phone1,
           "phone2"         => $phone2,
           "job"            => $job,
           "description"    => $description,
           "about_me"       => $about,
           "facebook"       => $facebook,
           "is_f_show"      => $facebookShow,
           "twitter"        => $twitter,
           "is_t_show"      => $twitterShow,
           "github"         => $github,
           "is_g_show"      => $githubShow
       ];

        try {
            $this->me->updateMe($array);
            rMsg('t', 'My Informations has been Uploaded With Success');
            redirect('back');
        } catch (\PDOException $e) {
            rMsg('f', 'Ooops My Informations has not been Updated With Successful <br> '.$e->getMessage());
            redirect('back');
        }
    }
}
