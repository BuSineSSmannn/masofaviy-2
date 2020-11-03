<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "<body style='background-color:grey;color:white'>";

echo "<br>";

class Form{
    function open($action,$method,$position=''){
        echo "$position <form   action='{$action}' method='{$method}' > ";
    }
    function inputs($x,$y,$z,$h,$r=''){
        echo "{$x}" . "<input type='{$y}' value='{$r}' placeholder='{$z}'>" . "<{$h}>";
    }
    function checkbox($x,$y,$h){
        echo "<input id='{$y}' type='{$x}'>"."<label for='{$y}'>Recoment me!</label>". "<{$h}>";
    }
    function textarea($c,$a,$n){
        echo "<textarea cols='{$c}' rows='{$a}'>{$n}</textarea>";
    }

    function close(){
        echo "</form>";
    }

}

$form = new Form();
$form->open('index.php','POST','<center>');
echo "<h1><center>Sign in</center></h1>";
$form->inputs('Login:','text','abc123','br');
echo "<br>";
$form->inputs('Password:','password','a-z,0-9','br');
echo "<br>";
$form->inputs('Email:','email','abc123@example.com','br');
echo "<br>";
$form->checkbox('checkbox','labelga','br');
$form->inputs('','submit','','br','SEND');
$form->close();


echo '<hr>';

$form->open('http://ismoil-turdaliyev.uz','POST','<center>');
echo "<h1><center>Sign up</center></h1>";
$form->inputs('Name:','text','abc123','br');
echo "<br>";
$form->inputs('Surname:','text','abc123','br');
echo "<br>";
$form->inputs('Password:','password','a-z,0-9','br');
echo "<br>";
$form->inputs('Repassword:','password','a-z,0-9','br');
echo "<br>";
$form->inputs('Email:','email','abc123@example.com','br');
echo "<br>";
$form->checkbox('checkbox','labelg','br');
$form->inputs('','submit','','br','SEND');

$form->close();


echo '<hr>';


$form->open('http://ismoil-turdaliyev.uz','POST','<center>');
echo "<h1><center>SEND FEEDBACK</center></h1>";
$form->inputs('Username:','text','abc123','br');
echo "<br>";


$form->inputs('Email:','email','abc123@example.com','br');
echo "<br>";

$form->textarea('30','2','');
echo '<br>';
$form->inputs('','submit','','br','Go');
$form->close();
echo $form;







// $login = $form->inputs('Login:','text','abc123','br');
// $file = fopen('index.html','a+');
// fwrite($file,$login);

?>