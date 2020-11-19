<?php
session_start();

if($_SESSION['auth']){
    setcookie('mycookie','asd',strtotime(date('Y/m/d 24:00:00')));
setcookie('mycookie',null,-1);



// Будем передавать PDF
// header('Location: a.php');
// header('Content-Type: application/json');
// header("Access-Control-Allow-Origin: *");

// Он будет называться downloaded.pdf
// header('Content-Disposition: attachment; filename="downloaded.pdf"');

// // Исходный PDF-файл original.pdf
// readfile('sample.pdf');
$array = [];

for($i=1;$i<=12;$i++){
    $array[] = $i;
}


$array = json_encode($array);


echo $array;
// die;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

@include 'functions.php';

$_SESSION['asdasd'] = 'asda';
debug($_COOKIE);

debug($_SESSION);


//  Работа с cookie Работа с сессиями   Авторизация пользователей




}



?>

