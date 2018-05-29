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

    public function post($array){


        if(!empty($_POST['image'])){
            $array['image'] = $_POST['image'];
        }

        extract($_POST);

            $array = [
                    'name'          => $name,
                    'surname'       => $surname,
                    'birthday'      => $birthday,
                    'address'       => $address,
                    'phone1'        => $phone1,
                    'phone2'        => $phone2,
                    'email'         => $email,
                    'job'           => $job,
                    'description'   => $description,
                    'about_me'      => $about
            ];

            add_session($array);



        if($this->DB->update($array)){
            sr('t','my informations has been updated');
            header('LOCATION: index.php?url=admin/me');
        } else {
            sr('f','Operation faild !! ');
            header('LOCATION: index.php?url=admin/me');
        }


        }





        public function sayHello(){

            sr('t','show message from say hello');
            view('Admin/index',['me'=>$this->me]);
        }

    /**
     * @return Me
     */
    public function show()
    {
        return view('Admin/index',['me'=>$this->me,'adminrPage'=>"me.php"]);
    }

}
