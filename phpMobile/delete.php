<?php
# API yang ditujukan unttuk penghapusan akun pada database, tetapi sepertinya tidak akan digunakan untuk sementara.
header('Content-type:application/json;charset=utf-8');
require "DataBase.php";
$db = new DataBase();
$response = array();
if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->delete("User", $_POST['email'], $_POST['password'])) {
            $response["status"] = 1;
            $response["message"] = "Delete Success";
            echo json_encode($response);
        } else {
            $response["status"] = 0;
            $response["message"] = "Username or Password Wrong";
            echo json_encode($response);
        }
    } else {
        $response["status"] = -1;
        $response["message"] = "Error: Database connection";
        echo json_encode($response);
    }
} else {
    $response["status"] = -2;
    $response["message"] = "All fields are required";
    echo json_encode($response);
}
?>
