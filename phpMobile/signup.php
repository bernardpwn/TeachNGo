<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['phone'])
&& isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("User", $_POST['name'], $_POST['email'],  $_POST['phone'], $_POST['password'], $_POST['dob'],$_POST['gender'])) {
            echo "Sign Up Success";
        } else echo "Sign up Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
