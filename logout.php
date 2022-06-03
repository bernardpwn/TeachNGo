<?php 
# Berfungsi untuk melakukan destroy session yang aktif saat ini dan mengembalikan pada halaman index (fungsi log out)
session_start();
session_destroy();
 
header("Location: index.php");
 
?>

?>