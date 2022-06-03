<?php
# php process untuk melakukan action seperti menambahkan admin, memperbaharui data admin ataupun menghapus akun admin pada database yang dimiliki
require '../functions.php';
$pdo = koneksiDb();

// INSERT/ADD
if($_GET['action'] == "add"){
    $sql = "INSERT INTO Admin (Admin_Username, Admin_Pass)
            VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['Admin_Username'], md5($_POST['Admin_Pass'])]);
    header('Location: ../main.php?page=admin');
}elseif($_GET['action'] == "edit"){
    if ($_POST['Admin_Pass'] != ''){
        $sql = "UPDATE Admin
                SET Admin_Username = ?,
                Admin_Pass = ?
                WHERE Admin_Id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['Admin_Username'],
            md5($_POST['Admin_Pass']),
            $_POST['Admin_Id']
        ]);
    } else {
        $sql = "UPDATE Admin
                SET Admin_Username = ?
                WHERE Admin_Id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['Admin_Username'],
            $_POST['Admin_Id']
        ]);
    }
    
    

    header('Location: ../main.php?page=admin');
}elseif($_GET['action'] == "delete"){
    $sql = "DELETE FROM Admin
            WHERE Admin_Id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['Admin_Id']]);
    header('Location: ../main.php?page=admin');
}