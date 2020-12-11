<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

@include 'functions.php';



try{
    $pdo = new PDO('mysql:host=localhost;dbname=test;','root','root',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
    die('Bazaga ulana omadik.Xatolik: ' . $e->getMessage());
}

$query = 'SELECT * FROM users';

$result = $pdo->query($query);

$row = $result->fetch(PDO::FETCH_ASSOC);

debug($row);

$row = $result->fetchAll(PDO::FETCH_ASSOC);

debug($row);





try{
    $query = "INSERT INTO `users` (name,phone,avatar_url,email,password) VALUES ('KJasdasd','+9989179100900','test.jpg','pochta@mail.ru','mypassword')";

    $t = $pdo->exec($query);

    echo '<div>ID: <b>'.$pdo->lastInsertId().'</b></div>';

    $query = "UPDATE users SET name='Jayson123123123' WHERE id=23";

    $t = $pdo->exec($query);


    $query = "DELETE FROM users WHERE id=24";

    $t = $pdo->exec($query);


}catch(PDOException $e){
    echo "<span style='color:red;'>".$e->getMessage()."</span>" . "\n\n <b>Line:</b>" .$e->getLine();
}
debug(isset($t) ? $t : []);


try{
    $query = "UPDATE users SET name=:myname WHERE id=:myid";
    $query = $pdo->prepare($query);
    $query->execute(['myid'=>37,'myname'=>'Jayson123123123']);


    

}catch(PDOException $e){

    echo "<span style='color:red;'>".$e->getMessage()."</span>" . "\n\n <b>Line:</b>" .$e->getLine();
}

hr();
try{
    $pdo->beginTransaction();

    /* Вставка множества записей по принципу "все или ничего" */
    $sql = 'INSERT INTO fruits
        (name, colour, calories)
        VALUES (?, ?, ?)';
    
    $sth  = $pdo->prepare($sql);

    $fruits = [
            [
                'name'=>'shaftoli',
                'colour'=>'qizil',
                'calories'=>300
            ],
            [
                'name'=>'olma',
                'colour'=>'yashil',
                'calories'=>400

            ],
            [
                'name'=>'bexi',
                'colour'=>'sariq',
                'calories'=>'500'
            ]
    ];
    
    foreach ($fruits as $fruit) {
        $fruit = (object) $fruit;
        $sth->execute([
            $fruit->name, 
            $fruit->colour,
            $fruit->calories,
        ]);
    }
    
    $pdo->commit();
}catch(PDOException $e){

    /* Распознаем ошибку и откатываем изменения */

    echo "<span style='color:red;'>".$e->getMessage()."</span>" . "\n\n <b>Line:</b>" .$e->getLine();

    $pdo->rollBack();


}

//ngrok http -host-header=rewrite test.loc:80



?>