<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
@include 'functions.php';

// Оператор try-catch-finally  Класс Exception  Класс Error



$servername = "localhost";
$username = "username";
$password = "password";


try{
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
}
catch(Exception $e){
    file_put_contents('errors.log',"____ Error message: ".$e->getMessage()."\n\nError code: ".$e->getCode()."\n\nErro file: ".$e->getFile()." line {$e->getLine()} ______ \n\n",FILE_APPEND);
}



try{

    $email = 'asdsasdsasdasdasd asdas das as das das asda ad@mail.ruasdasd';
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception ('Email notogri kiritildi',500);
    }
        echo 'Email qabul qilindi';

        echo '123';
   
}catch(Exception $e){
    debug($e);
    file_put_contents('errors.log',"____ Error message: ".$e->getMessage()."\n\nError code: ".$e->getCode()."\n\nErro file: ".$e->getFile()." line {$e->getLine()} ______ \n\n",FILE_APPEND);
}finally{
    echo 'BIzga farqi yoq!';
}



class User{
    private $t;
}

$user = new User();
// try{
//     $user->t;
// }catch(Exception $e){

// }

echo 'salom';



class FileException extends Exception{

}

class NameException extends Exception{
    private $error;

    public function __construct($message,$code){
        parent::__construct($message,$code);
        $this->error = "{$this->message} $this->code $this->file $this->line";
    }
     public function echo(){
            echo "<p style='background:red'>{$this->error}</p>";
     } 
     public function errorLog(){
         file_put_contents('errors.log',$this->error,FILE_APPEND);
     }      
     public function sendTelegramBot(){
            file_get_contents('https://api.telegram.org/bot1225269899:AAF2d7jDIoCYJ8xmQVu6bNurwjV1HNd6plo/sendMessage?text='.$this->error."&chat_id=924057406");
     }
}

try{

    $name = '';
    $file = 'a.txt';

    if(!$name) throw new NameException('Nom kiriting !',404);
    if(!file_exists($file)) throw new FileException('Bunaqa file bizda yoq!',404);


}catch(Exception $e){
    if($e instanceof NameException){
        $e->errorLog();
        // $e->sendTelegramBot();
        $e->echo();
    }
    echo $e instanceof FileException;
}


class MyErrorClass extends Error{




    public function sendTelegramBot(){
        file_get_contents('https://api.telegram.org/bot1225269899:AAF2d7jDIoCYJ8xmQVu6bNurwjV1HNd6plo/sendMessage?text='.$this->message."&chat_id=924057406");
 }
}

try{
    // echo 2 % 0;
    // intdiv(10,0);
    // $str = 'asdasd';
    // $str[] = 'asdasd';
    // intdiv(PHP_INT_MIN,-1);
    if( true ) throw new MyErrorClass('Qanaqadir error',500);
    // throw new NameException('Nom kiriting !',404);

}catch(MyErrorClass $e){
    debug($e);
    $e->sendTelegramBot();
    echo $e;
};




?>