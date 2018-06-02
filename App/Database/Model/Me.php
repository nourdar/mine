<?php
namespace App\Database\Model;

use Core\Database\Model;
use Core\Factory;


class Me extends Model {


    private $table = "me";
    public $dtb;

    public function __construct()
    {
         $this->dtb = Factory::getdb();

    }

    public function getAll()
    {
        $info = $this->dtb->query("select * from ?name ", $this->table)->fetch();
        return $info[0];
    }

    public function name()
    {
        $info = $this->dtb->query("select name from ?name ", $this->table)->fetch();
        return $info[0];
    }

    public function username()
    {
        $info = $this->dtb->query("select surname from ?name ", $this->table)->fetch();
        $this->surname = $info[0];
        return $info[0];
    }

    public function birthday()
    {
        $info = $this->dtb->query("select birthday from ?name ", $this->table)->fetch();
        $this->birthday = $info[0];
        return $info[0];
    }

    public function address()
    {
        $info = $this->dtb->query("select address from ?name ", $this->table)->fetch();
        $this->address = $info[0];
        return $info[0];
    }

    public function phone1()
    {
        $info = $this->dtb->query("select phone1 from ?name ", $this->table)->fetch();
        $this->phone1 = $info[0];
        return $info[0];
    }

    public function phone2()
    {
        $info = $this->dtb->query("select phone2 from ?name ", $this->table)->fetch();
        $this->phone2 = $info[0];
        return $info[0];
    }

    public function email()
    {
        $info = $this->dtb->query("select email from ?name ", $this->table)->fetch();
        $this->email = $info[0];
        return $info[0];
    }

    public function job()
    {
        $info = $this->dtb->query("select job from ?name ", $this->table)->fetch();
        $this->job = $info[0];
        return $info[0];
    }

    public function image()
    {
        $info = $this->dtb->query("select image from ?name ", $this->table)->fetch();
        $this->image = $info[0];
        return $info[0];
    }

    public function description()
    {
        $info = $this->dtb->query("select description from ?name ", $this->table)->fetch();
        $this->description = $info[0];
        return $info[0];
    }

    public function about()
    {
        $info = $this->dtb->query("select about_me from ?name ", $this->table)->fetch();
        $this->about = $info[0];
        return $info[0];
    }

    public function update($array)
    {
       return $this->dtb->query("UPDATE ?name SET ", $this->table, $array,"WHERE id = 1 ");
    }

}
