<?php

include "db.php";

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch($method){

case 'GET':

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $data = [];

    while($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }

    echo json_encode($data);

break;


case 'POST':

    $data = json_decode(file_get_contents("php://input"),true);

    $name = $data['name'];
    $email = $data['email'];
    $mobile = $data['mobile'];

    $sql = "INSERT INTO users(name,email,mobile)
            VALUES('$name','$email','$mobile')";

    if($conn->query($sql)){
        echo json_encode(["message"=>"User Created"]);
    }

break;


case 'PUT':

    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $mobile = $data['mobile'];

    $sql = "UPDATE users
            SET name='$name',email='$email',mobile='$mobile'
            WHERE id='$id'";

    if($conn->query($sql)){
        echo json_encode(["message"=>"User Updated"]);
    }

break;


case 'DELETE':

    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data['id'];

    $sql = "DELETE FROM users WHERE id='$id'";

    if($conn->query($sql)){
        echo json_encode(["message"=>"User Deleted"]);
    }

break;

}

?>