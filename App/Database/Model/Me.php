<?php
namespace App\Database\Model;

use App\Database\Database;



class Me Extends Database {

    private $table = "me";


    public function getAll(){
        $info = $this->db->query("select * from ?name ",$this->parm,$this->table)->fetch();
        return $this->all = $info;
    }

    public function name() {
        $info = $this->db->query("select name from ?name ",$this->table)->fetch();
        return $info[0];
    }

    public function surname() {
        $info = $this->db->query("select surname from ?name ",$this->table)->fetch();
        $this->surname = $info[0];
        return $info[0];
    }

    public function birthday() {
        $info = $this->db->query("select birthday from ?name ",$this->table)->fetch();
        $this->birthday = $info[0];
        return $info[0];
    }

    public function address() {
        $info = $this->db->query("select address from ?name ",$this->table)->fetch();
        $this->address = $info[0];
        return $info[0];
    }

    public function phone1() {
        $info = $this->db->query("select phone1 from ?name ",$this->table)->fetch();
        $this->phone1 = $info[0];
        return $info[0];
    }

    public function phone2() {
        $info = $this->db->query("select phone2 from ?name ",$this->table)->fetch();
        $this->phone2 = $info[0];
        return $info[0];
    }

    public function email() {
        $info = $this->db->query("select email from ?name ",$this->table)->fetch();
        $this->email = $info[0];
        return $info[0];
    }

    public function job() {
        $info = $this->db->query("select job from ?name ",$this->table)->fetch();
        $this->job = $info[0];
        return $info[0];
    }

    public function image() {
        $info = $this->db->query("select image from ?name ",$this->table)->fetch();
        $this->image = $info[0];
        return $info[0];
    }

    public function description() {
        $info = $this->db->query("select description from ?name ",$this->table)->fetch();
        $this->description = $info[0];
        return $info[0];
    }

    public function about() {
        $info = $this->db->query("select about_me from ?name ",$this->table)->fetch();
        $this->about = $info[0];
        return $info[0];
    }

    public function update($array){
       return $this->db->query("UPDATE ?name SET ",$this->table,$array,"WHERE id = 1 ");
    }

}
