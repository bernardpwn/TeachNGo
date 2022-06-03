<?php
# API yang berfungsi untuk melakukan penambahan data user pada database / sign up berdasarkan detail hasil input yang diterima dari android app.
header('Content-type:application/json;charset=utf-8');
require "DataBase.php";
$db = new DataBase();
$response = array();
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['phone'])
&& isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("User", $_POST['name'], $_POST['email'],  $_POST['phone'], $_POST['password'], $_POST['dob'],$_POST['gender'])) {
            $response["status"] = 1;
            $response["message"] = "Sign Up Success";
            echo json_encode($response);
        } else {
            $response["status"] = 0;
            $response["message"] = "Sign Up Failed";
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