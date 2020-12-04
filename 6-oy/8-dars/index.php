<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

@include 'functions.php';




$datas = [
    'key123'=>'123'
];

$ch = curl_init();



// curl_setopt_array($ch,[
//     CURLOPT_URL=>'http://codelife1.lc/8/api',
//     CURLOPT_RETURNTRANSFER=>true
// ]);
curl_setopt($ch, CURLOPT_URL, 'http://codelife1.lc/8/api');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,'text=asd&chat_id=924057406');
curl_setopt($ch,CURLOPT_HEADER,false);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
curl_setopt($ch,CURLOPT_COOKIE,'jayson=123;test=123');
curl_setopt($ch,CURLOPT_CERTINFO,false);
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
    "cache-control: no-cache",
    "chat_id: 924057406",
    "content-type: application/x-www-form-urlencoded",
    "text: asd"
  ));


// curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'POST');

$result = json_decode(curl_exec($ch),true);


debug($result,true);
curl_close($ch);





function bot($method,$data = [],$token = '915045338:AAEP05WYxyDgLEeIiCFkZK4hbdMW2xdJsdM'){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'https://api.telegram.org/bot'.$token.'/'.$method);
    curl_setopt($ch,CURLOPT_POSTFIELDS,'text=asd&chat_id=924057406');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    echo curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

    $res = curl_exec($ch);
    return json_decode($res);
}  


debug(
    bot('sendMEssage')
);



 debug($result,true);


if(isset($result['error'])){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$result['error'].'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

die;
}


?>

<div class="container">

    <div class="row">
    
        <div class="col-md-3"><?=$result['name']?></div>
        <div class="col-md-3"><?=$result['id']?></div>
        <div class="col-md-3"><?=$result['title']?></div>
        <div class="col-md-3"><?=$result['age'] ?: 'NOPE'?></div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>