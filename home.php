<?php 
# menampilkan halaman default setelah berhasil login pada website admin
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?>
<h1>TeachNGo Admin Website</h1>
<img src="assets/images/Logo1.png" alt="Logo">
