<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allows-Method:POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization,X-Request-With');

include('function.php');
$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == 'GET'){
    $artType = getartType();
    echo $artType;
}else{
    $data = [
        'status'=>405,
        'message '=>$requestMethod . "Method not allowed",

    ];
    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($data);
}