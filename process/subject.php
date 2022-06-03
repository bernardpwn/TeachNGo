<?php
# php process untuk melakukan action seperti menambahkan subject pelajaran baru, memperbaharui / edit data subject, ataupun menghapus subject pada database yang dimiliki

require '../functions.php';
$pdo = koneksiDb();

// INSERT/ADD
if($_GET['action'] == "add"){
    $sql = "INSERT INTO Subject (Subject_Name)
            VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['Subject_Name']]);
    header('Location: ../main.php?page=subject');
}elseif($_GET['action'] == "edit"){
    $sql = "UPDATE Subject
            SET Subject_Name = ?
            WHERE Subject_Id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['Subject_Name'],
        $_POST['Subject_Id']
    ]);

    header('Location: ../main.php?page=subject');
}elseif($_GET['action'] == "delete"){
    $sql = "DELETE FROM Subject
            WHERE Subject_Id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['Subject_Id']]);
    header('Location: ../main.php?page=subject');
}