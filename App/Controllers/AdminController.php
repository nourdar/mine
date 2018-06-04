<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/4/18
 * Time: 5:18 PM
 */

namespace App\Controllers;


class AdminController
{
    private $admin;

    public function __construct()
    {
        $this->admin = model("Me");
    }

    public function index()
    {
        return view('Admin.index');
    }
}
