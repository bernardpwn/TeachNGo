<?php
$action = $_GET['action'];
if($_GET['action'] == "edit"){
    $button = "Verify";
}elseif ($_GET['action'] == "delete"){
    $button = "Reject";
}
    $page_title = "Verification Detail";

    require 'functions.php';
    $pdo = koneksiDb();

    $sql = "SELECT * FROM Verification JOIN User ON Verification.User_Id=User.User_Id JOIN Subject ON Verification.Subject_Id=Subject.Subject_Id WHERE Verif_Id = ?";
    $hasil = $pdo->prepare($sql);
    $hasil->execute([$_GET['Verif_Id']]);
    $row =$hasil->fetch();

    $Verif_Id = $row['Verif_Id'];
    $Verif_Creation = $row['Verif_Creation'];
    $User_Name = $row['User_Name']; 
    $Subject_Name = $row['Subject_Name'];
    $Verif_Score = $row['Verif_Score'];
    $TeachExp = $row['TeachExp']; 
    $IdCard = $row['IdCard']; 
    $Verif_Status = $row['Verif_Status'];
    $User_Id = $row['User_Id']; 
    $Subject_Id = $row['Subject_Id'];

?>

<h1 class="h2 mt-3"><?= $page_title; ?></h1>
<form action="process/verif.php?action=<?= $action; ?>" method="post">
    <div class="form-group">
        <label>Verif Creation</label>
        <input type="text" name="Verif_Creation" value="<?= $Verif_Creation; ?>" class="form-control" readonly/>
        <label>User Name</label>
        <input type="text" name="User_Name" value="<?= $User_Name; ?>" class="form-control" readonly/>
        <label>Subject Name</label>
        <input type="text" name="Subject_Name" value="<?= $Subject_Name; ?>" class="form-control" readonly/>
        <label>Verif Score</label>
        <input type="text" name="Verif_Score" value="<?= $Verif_Score; ?>" class="form-control" readonly/>
        <label>Teach Exp</label>
        <input type="text" name="TeachExp" value="<?= $TeachExp; ?>" class="form-control" readonly/>
        <label>ID Card</label>
        <input type="text" name="IdCard" value="<?= $IdCard; ?>" class="form-control" readonly/>
        <label>Verif Status</label>
        <input type="text" name="Verif_Status" value="<?= $Verif_Status; ?>" class="form-control" readonly/>

    </div>
    <input type="hidden" name="Verif_Id" value="<?= $Verif_Id ?>" readonly/>
    <input type="hidden" name="User_Id" value="<?= $User_Id ?>" readonly/>
    <input type="hidden" name="Subject_Id" value="<?= $Subject_Id ?>" readonly/>
    <input type="submit"value="<?= $button; ?>">
</form>
