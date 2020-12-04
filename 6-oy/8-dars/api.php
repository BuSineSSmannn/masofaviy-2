<?php


$uri = parse_url($_SERVER['REQUEST_URI']);

echo json_encode($_SERVER);

die;

if($_SERVER['REQUEST_METHOD'] == 'POST'){




    header('Content-type: Application/json');

    if($uri['query'] != 'key=123'){
        $array = [
            'error'=>'Key topilmadi:'.$uri['query'],
            'code'=>404
        ];
    }else{
        $array = [
            'name'=>'Jayson',
            'id'=>14,
            'age'=>21,
            'title'=>'title'
        ];
    }


    
    
    

}else{
    $array = [
        'error'=>'Method topilmadi:'.$_SERVER['REQUEST_METHOD'],
        'code'=>404
    ];
}

echo json_encode($array);

?>