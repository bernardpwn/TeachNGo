<?php
# php process untuk melakukan pembaharuan status verifikasi, yang dilanjutkan mengubah role user yang melakukan request verifikasi menjadi teacher, selanjutnya menambahkan kelas baru
# berdasarkan detail dari kelas yang telah disetujui untuk diverifikasi. Ada juga untuk process reject verifikasi pada verification request yang dianggap tidak memenuhi syarat yang dibutuhkan
session_start();
require '../functions.php';
$pdo = koneksiDb();

// INSERT/ADD
if($_GET['action'] == "edit"){
        $sql = "UPDATE Verification
                SET Verif_status = 'Verified'
                WHERE Verif_Id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['Verif_Id']
        ]);

        $sql = "UPDATE User
                SET User_Role = 'Teacher'
                WHERE User_Id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['User_Id']
        ]);
        
        $sql = "INSERT INTO Class (Subject_Id, User_Id, Admin_Id, Class_Creation)
                VALUES (?, ?, ?, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['Subject_Id'], $_POST['User_Id'], $_SESSION['username']
        ]);
    header('Location: ../main.php?page=verif');
}elseif($_GET['action'] == "delete"){
    $sql = "UPDATE Verification
                SET Verif_status = 'Rejected'
                WHERE Verif_Id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['Verif_Id']
        ]);

    header('Location: ../main.php?page=verif');
}