<?php
$action = $_GET['action'];
if($_GET['action'] == "add"){
    $page_title = "Add New Subject";

    $Subject_Name = "";
    $Subject_Id = "";

}elseif($_GET['action'] == "edit"){
    $page_title = "Edit Subject";

    require 'functions.php';
    $pdo = koneksiDb();

    $sql = "SELECT * FROM Subject WHERE Subject_Id = ?";
    $hasil = $pdo->prepare($sql);
    $hasil->execute([$_GET['Subject_Id']]);
    $row =$hasil->fetch();

    $Subject_Name = $row['Subject_Name'];
    $Subject_Id = $row['Subject_Id'];

}
?>

<h1 class="h2 mt-3"><?= $page_title; ?></h1>
<form action="process/subject.php?action=<?= $action; ?>" method="post">
    <div class="form-group">
        <label>Subject Name</label>
        <input type="text" name="Subject_Name" value="<?= $Subject_Name; ?>" class="form-control" />
    </div>
    <input type="hidden" name="Subject_Id" value="<?= $Subject_Id ?>" />
    <button type="submit">Save</button>
</form>
