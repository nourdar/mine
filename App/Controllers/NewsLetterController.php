<?php

namespace App\Controllers;

use \Core\Controllers\Controller;

class NewsLetterController extends Controller
{

    public function __construct()
    {
        $this->dtb = model("NewsLetter");
        $this->setPaginate(5);
    }

    public function index()
    {
        $start = 0;
        $limit = $this->paginate['LIMIT'];
        $result = $this->dtb->order('created_at', 'ASC')->paginate($start, $limit)->giveMeAll();
        $pagesCount = $this->dtb->rows;
        $vars  = [
            'results'       => $result,
            'pages'         => $pagesCount['ALL'],
            'currentPage'   => 1,
            'limit'         => $limit,
        ];
        return view("Admin.NewsLetter.show", $vars);
    }

    public function page($array)
    {
        extract($array);

        $limit = $this->paginate['LIMIT'];
        $start = $page ;
        $result = $this->dtb->order('created_at', 'ASC')->paginate($start, $limit)->giveMeAll();
        $pagesCount = $this->dtb->rows;

        $vars  = [
            'results'       => $result,
            'pages'         => $pagesCount['ALL'],
            'currentPage'   => $page,
            'limit'         => $limit
        ];
        return view("Admin.NewsLetter.show", $vars);
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
            $this->dtb->insert($array);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
