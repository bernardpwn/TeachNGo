<?php 
# file configuration database dimana menyimpan alamat server, username, password serta nama database yang digunakan
$server = "34.101.231.16";
$user = "root";
$pass = "capstoneproject";
$database = "techngo";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>