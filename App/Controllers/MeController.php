<?php
namespace Core\Controllers;

use App\Database\Model\Me;

class MeController extends Controller {

    public function me(){
        $meDb = new Me;
        return $meDb;
    }

    public function post($array){
        $meDb = new Me;

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



        if($meDb->update($array)){
            sr('t','my informations has been updated');
            header('LOCATION: index.php?url=admin/me');
        } else {
            sr('f','Operation faild !! ');
            header('LOCATION: index.php?url=admin/me');
        }


        }





        public function sayHello(){

            $meDb = new Me;


        sr('t','show message from say hello');
            view('Admin/index',['me'=>$meDb]);
        }

        public function show()
        {
            $meDb = new Me;
            view('Admin/index',['me'=>$meDb,"adminPage"=>"me.php"]);
        }

}
