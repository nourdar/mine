<?php

namespace App\Controllers;

use \Core\Controllers\Controller;

class NewsLetterController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = model("NewsLetter");
    }

    public function addEmailNewsLetter()
    {
        extract($_POST);
        $array = [
            "email"      => $email,
            "created_at" => time(),
            "ip"         => $_SERVER['REMOTE_ADDR']
        ];
        $this->model->insert($array);
        return true;
    }


}