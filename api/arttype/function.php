<?php
require '../config/db.php';
function getartType(){
    global $conn;
    $query = "SELECT * FROM tblarttype";
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
