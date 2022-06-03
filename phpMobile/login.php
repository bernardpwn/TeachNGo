<?php
# API yang berguna untuk menerima email serta password dari mobile app yang kemudian jika sesuai pada database, maka mengembalikan respons 1 yang berarti login succes, dan sebagainya.
header('Content-type:application/json;charset=utf-8');
require "DataBase.php";
$db = new DataBase();
$response = array();
if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->logIn("User", $_POST['email'], $_POST['password'])) {
            $response["status"] = 1;
            $response["message"] = "Login Success";
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
