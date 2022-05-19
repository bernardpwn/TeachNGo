<?php
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$action = $_GET['action'];
if($_GET['action'] == "add"){
    $page_title = "Add New Admin";

    $Admin_Username = "";
    $Admin_Pass = "";
    $Admin_Id = "";

}elseif($_GET['action'] == "edit"){
    $page_title = "Edit Admin";

    require 'functions.php';
    $pdo = koneksiDb();

    $sql = "SELECT * FROM Admin WHERE Admin_Id = ?";
    $hasil = $pdo->prepare($sql);
    $hasil->execute([$_GET['Admin_Id']]);
    $row =$hasil->fetch();

    $Admin_Username = $row['Admin_Username'];
    $Admin_Pass = $row['Admin_Pass'];
    $Admin_Id = $row['Admin_Id'];

}
?>

<h1 class="h2 mt-3"><?= $page_title; ?></h1>
<form action="process/admin.php?action=<?= $action; ?>" method="post">
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="Admin_Username" value="<?= $Admin_Username; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Password</label>
        <input id="pass" type="password" name="Admin_Pass" value="" class="form-control" />
        <input type="checkbox"  onclick="FunctionVisibility()">Show Password
    </div>
    <input type="hidden" name="Admin_Id" value="<?= $Admin_Id ?>" />
    <button type="submit">Save</button>
</form>
<script>
    function FunctionVisibility() {
            
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
</script>