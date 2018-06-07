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
            "email"      => $emailNewsLetter,
            "created_at" => time(),
            "ip"         => $_SERVER['REMOTE_ADDR']
        ];
        try {
            $this->model->insert($array);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
