<?php
namespace this\two;

include 'User3.php';

use \this\two\User3 as Nimadir;


class User{
    private $user3;
    public function __construct(){
        $this-> user3 = new Nimadir();
    }
    public function test2(){

        echo 'Echo test2 from ' . __CLASS__;
    }
    public function user3(){
        return $this->user3;
    }
}