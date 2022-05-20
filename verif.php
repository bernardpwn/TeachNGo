<?php
//1. Koneksi db
require 'functions.php';
$pdo = koneksiDb();

//2. SQL
$sql = "SELECT * FROM Verification JOIN User ON Verification.User_Id=User.User_Id JOIN Subject ON Verification.Subject_Id=Subject.Subject_Id";

//3. Prepare & Execute
$hasil = $pdo->query($sql);



//4. Tampilan

?>
<h1 class="mt-3 h2">Verification List</h1>
<input type="text" id="myInput" style="background-color:#EBEDEF;" class="form-control form-control-dark w-100" onkeyup="myFunction()" placeholder="Search Username.. " title="Type in a name">
<br>
<label >Status : </label>
<select id="myInput2" onchange="myFunction2()">
  <option value="-">-</option>
  <option value="Waiting">Waiting</option>
  <option value="Rejected">Rejected</option>
  <option value="Verified">Verified</option>
</select>
  

<div class="table-responsive mt-3">
    <table class="table" id="table">
        <tr>
            <th>No.</th>
            <th>Verif ID</th>
            <th>Verif Creation</th>
            <th>User Name</th>
            <th>Subject Name</th>
            <th>Verif Score</th>
            <th>Teach Exp</th>
            <th>ID Card</th>
            <th>Verif Status</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        while($row = $hasil->fetch()):
        $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['Verif_Id']; ?></td>
            <td><?= $row['Verif_Creation']; ?></td>
            <td><?= $row['User_Name']; ?></td>
            <td><?= $row['Subject_Name']; ?></td>
            <td><?= $row['Verif_Score']; ?></td>
            <td><?= $row['TeachExp']; ?></td>
            <td><img src="<?= $row['IdCard']; ?>" alt="id card" height=100 width=100 /></td>
            <td><?= $row['Verif_Status']; ?></td>
            <td>
                <a href="main.php?page=verif-form&action=edit&Verif_Id=<?= $row['Verif_Id']; ?>" class="btn btn-warning btn-sm">
                    <span data-feather="edit"></span> Verify </a>
                <a href="main.php?page=verif-form&action=delete&Verif_Id=<?= $row['Verif_Id']; ?>" class="btn btn-danger btn-sm">
                    <span data-feather="trash-2"></span> Reject </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[8];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>