<?php
# Halaman yang menampilkan seluruh data pada tabel subject yang bertujuan menampilkan keseluruhan subject yang terdaftar pada database
//1. Koneksi db
require 'functions.php';
$pdo = koneksiDb();

//2. SQL
$sql = "SELECT * FROM Subject";

//3. Prepare & Execute
$hasil = $pdo->query($sql);

//4. Tampilan

?>

<h1 class="mt-3 h2">Subject List</h1>
<a href="main.php?page=subject-form&action=add" class="btn btn-primary">
<span data-feather="plus-circle"></span> Add New Subject</a>

<div class="table-responsive mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Subject ID</th>
            <th>Subject Name</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        while($row = $hasil->fetch()):
        $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['Subject_Id']; ?></td>
            <td><?= $row['Subject_Name']; ?></td>
            <td>
                <a href="main.php?page=subject-form&action=edit&Subject_Id=<?= $row['Subject_Id']; ?>" class="btn btn-warning btn-sm">
                    <span data-feather="edit"></span> Update </a>
                <a href="process/subject.php?action=delete&Subject_Id=<?= $row['Subject_Id']; ?>" class="btn btn-danger btn-sm">
                    <span data-feather="trash-2"></span> Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>