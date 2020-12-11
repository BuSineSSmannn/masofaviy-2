<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

@include 'functions.php';


$host = 'localhost';
$user = 'jayson';
$password = '123';
$db_name = 'test';


$mysqli = new MySqli($host,$user,$password,$db_name);


if(isset($_POST['submit'])){

    $name = $mysqli->real_escape_string($_POST['name']);
    echo $name;
    if($mysqli->query('SELECT * FROM users WHERE name="'.$name.'"')->num_rows){
        echo 'BUnday user bazada bor!';
    }else{
       $mysqli->query('INSERT users (name,password) VALUES ("' .$name.'","'.$_POST['password'].'")');
       echo 'User muvoffaqiyatli qoshildi!';
    }

    die('<br><a href="http://codelife1.lc/6-oy/10">Qaytadan to\'dirish</a>');
}


if(isset($_POST['submit_update'])){

    if($mysqli->query('SELECT * FROM users WHERE id=16')->num_rows){
        $mysqli->query('UPDATE users SET password =  '. $_POST['password'] . ' WHERE id=16');
        echo 'User muvoffaqiyatli yangilandi!';

    }else{
        echo 'BUnday user topilmadi !';
    }

    die('<br><a href="http://codelife1.lc/6-oy/10">Qaytadan o\'zgartirish</a>');
}
//connect db from php





if (mysqli_connect_error()) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Соединение установлено... ' . $mysqli->host_info . "<br>";


// $mysqli->query('INSERT users (name,password,phone,email) VALUES ("Jayson2","mypassword","+998917910090","telegram.org@mail.ru")');


$data = $mysqli->query("SELECT * FROM users WHERE id!=6  ORDER BY id DESC LIMIT 0,2 ");

$cout_of_users = $data->num_rows;
echo "Users tablesida {$cout_of_users}ta user bor!";

while($row = $data->fetch_assoc()){
    echo "<br>".$row['id']."- ".$row['name'];
}

$data->free();



?>

<hr>
<form action="http://codelife1.lc/6-oy/10" method="post">
        ISM: <input name="name" type="text" required><br>
        PAROL: <input name="password" type="password" required><br>
        <input type="submit" name="submit" value="Qo'shish">
</form>

<hr>
<form action="http://codelife1.lc/6-oy/10" method="post">
        PAROL: <input name="password" type="password" required><br>
        <input type="submit" name="submit_update" value="O'zgartirish">
</form>

<hr>

<?php 

$all_users = $mysqli->query('SELECT * FROM users');

?>
<table border="1">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Password</th>
    </tr>
    <?php while($user = $all_users->fetch_assoc()):?>
            <tr>
                <td>
                    <b><?=$user['id']?></b>
                </td>
                <td>
                    <?=$user['name']?>
                </td>
                <td>
                    <?=$user['password']?>
                </td>

            </tr>
    <?php endwhile; $all_users->free()?>

</table>

<hr>


<?php

$all_users = $mysqli->query('SELECT * FROM users');

// $row = $all_users->fetch_array(MYSQLI_NUM);
// $row = $all_users->fetch_array(MYSQLI_ASSOC);
$row = $all_users->fetch_array(MYSQLI_BOTH);

debug($row);
die;

?>
<table border="1">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Password</th>
    </tr>


    <?php while($user = $all_users->fetch_assoc()):?>
            <tr>
                <td>
                    <b><?=$user['id']?></b>
                </td>
                <td>
                    <?=$user['name']?>
                </td>
                <td>
                    <?=$user['password']?>
                </td>

            </tr>
    <?php endwhile; $all_users->free()?>

</table>