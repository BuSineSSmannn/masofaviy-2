<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 1);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(1);


session_start();



// session_unset();
@include 'functions.php';


$login = 'admin';
$password = '827ccb0eea8a706c4c34a16891f84e7b';


// if($_SESSION['auth'])

if($_SESSION['auth']){
    if($_GET['logout']=='true'){
        unset($_SESSION['auth']);
        header('Location: login.php');
        die;
    }
    echo 'Auth done!';
    echo '<a href="login.php?logout=true">Chiqish</a>';
}

else if(isset($_POST['auth'])){
    $error = false;
    if(($_POST['login'] == $login && md5($_POST['password']) == $password) ){
        echo 'Auth done!';
        echo '<a href="login.php?logout=true">Chiqish</a>';
        $_SESSION['auth'] = true;
        
    }else{
        $error = true;
    }
}

// debug($_SESSION);
?>

<?php if($error){?>Login yoki parol notogri<?php } ?>
<?php if(!$_SESSION['auth']){ ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <form method="post" action="login.php">
        <p>Login: <input type="text" name="login"></p>
        <p>Password: <input type="password" name="password"></p>
        <p>Password: <input type="submit" name="auth" value="Kirish"></p>
    </form>
</body>
</html>



<?php } ?>