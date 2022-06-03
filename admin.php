<?php
# Halaman yang menampilkan seluruh data pada tabel admin yang bertujuan menampilkan akun admin siapa saja yang terdaftar pada database
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
//1. Koneksi db
require 'functions.php';
$pdo = koneksiDb();

//2. SQL
$sql = "SELECT * FROM Admin";

//3. Prepare & Execute
$hasil = $pdo->query($sql);

//4. Tampilan

?>

<h1 class="mt-3 h2">Admin List</h1>
<a href="main.php?page=admin-form&action=add" class="btn btn-primary">
<span data-feather="plus-circle"></span> Add New Admin</a>

<div class="table-responsive mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Admin ID</th>
            <th>Admin Username</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        while($row = $hasil->fetch()):
        $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['Admin_Id']; ?></td>
            <td><?= $row['Admin_Username']; ?></td>
            <td>
                <a href="main.php?page=admin-form&action=edit&Admin_Id=<?= $row['Admin_Id']; ?>" class="btn btn-warning btn-sm">
                    <span data-feather="edit"></span> Update </a>
                <a href="process/admin.php?action=delete&Admin_Id=<?= $row['Admin_Id']; ?>" class="btn btn-danger btn-sm">
                    <span data-feather="trash-2"></span> Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>