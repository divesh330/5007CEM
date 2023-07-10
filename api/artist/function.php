<?php
require '../config/db.php';
function error422($message){
    $data = [
        'status'=>422,
        'message '=> $message,

    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}
function storeArtist($artistInput){
    global $conn;
    $name  =mysqli_real_escape_string($conn,$artistInput['name']);
    $mobile  =mysqli_real_escape_string($conn,$artistInput['MobileNumber']);
    $email  =mysqli_real_escape_string($conn,$artistInput['Email']);
    $education  =mysqli_real_escape_string($conn,$artistInput['Education']);
    $award  =mysqli_real_escape_string($conn,$artistInput['Award']);
    $profilepic  =mysqli_real_escape_string($conn,$artistInput['Profilepic']);
    $creationdate  =mysqli_real_escape_string($conn,$artistInput['CreationDate']);



        $query = "INSERT INTO tblartist (Name,MobileNumber,Email,Education,Award,Profilepic,CreationDate) VALUES ('$name','$mobile','$email','$education','$award','$profilepic','$creationdate')";
        $result = mysqli_query($conn,$query);
        if($result){
            $data = [
                'status'=>201,
                'message '=>"Artist Added",

            ];
            header("HTTP/1.0 201 Artist Added");
            echo json_encode($data);
        }else{
            $data = [
                'status'=>500,
                'message '=>"Internal server error",

            ];
            header("HTTP/1.0 500 Internal server error");
            echo json_encode($data);
        }


}



function getArtistList(){
    global $conn;
    $query = "SELECT * FROM tblartist";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        if(mysqli_num_rows($query_run)>0){
            $res = mysqli_fetch_all($query_run,MYSQLI_ASSOC);
            $data = [
                'status'=>200,
                'message '=>"Product found",
                'data' => $res
            ];
            header("HTTP/1.0 200 product found");
            echo json_encode($data);

        }else{
            $data = [
                'status'=>404,
                'message '=>"No product found",

            ];
            header("HTTP/1.0 405 No product found");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status'=>405,
            'message '=>"Internal server error",

        ];
        header("HTTP/1.0 405 Method not allowed");
        echo json_encode($data);
    }
}
?><?php
