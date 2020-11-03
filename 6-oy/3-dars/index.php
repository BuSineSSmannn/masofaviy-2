<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include 'functions.php';
include 'User.php';
include 'User2.php';
@include 'adssadsad.txt';

debug(error_get_last());

// function __autoload($class){
//     // require_once 'classes/'.$class.'.php';
// }

// echo get_include_path();


set_include_path(get_include_path().PATH_SEPARATOR.'classes');
spl_autoload_extensions('_class.php');
spl_autoload_register();


 $game = new Game();
 $test = new Test();





use this\one\User as User;
use this\two\User as User2;

$user = new User();
$user2 = new User2();

 $user->test();
br();
$user2->test2();

debug($user2);

$game = new Game();
br();
$test = new Test();

hr();

//E_ERROR 
echo E_USER_WARNING ;


if(true){
    $test = 'salom';
}else {
    $test = 'hayr';
}

$test = true ? 'salom' : 'hayr'; // if(true) $test = 'salom' else $test = 'hayr'

$test = true ? 'salom' : ($x == $y) ? 'qalesiz' : 'hayr'; // if(true) $test = 'salom' elseif($x == $y) $test = 'qalesiz' else $test = 'hayr'

$salom = $salom ? $salom : "yo'q";

$phone = $_POST['phone'];

$phone = $phone ? $phone : '-';


$myvar = false;


$myvar = $myvar ?? 'test'; //agar falseda o'tmasligini xoxlasangiz ?? o'rniga ?:


$myvar = null;

$myvar ??='test'; // "  $myvar = $myvar ?? 'test'  " ning alternativi faqat 7.4 PHP uchun




debug($myvar);





?>