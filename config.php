<?php 

$server = "10.26.192.3";
$user = "root";
$pass = "capstoneproject";
$database = "techngo";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>