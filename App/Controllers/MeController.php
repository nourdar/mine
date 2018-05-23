<?php
namespace App\Controllers;

use App\Database\Model\Me;

class MeController extends Controller {

    public function me(){
        $meDb = new Me;
        return $meDb;
    }

    public function update($array){
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



        $meDb->update($array);
    return true;
        }

        public function sayHello(){
        echo "hello";
        }

}
