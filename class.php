<?php
//1. Koneksi db
require 'functions.php';
$pdo = koneksiDb();

//2. SQL
$sql = "SELECT * FROM Class JOIN Subject ON Subject.Subject_Id=Class.Subject_Id JOIN User ON User.User_Id=Class.User_Id JOIN Admin ON Admin.Admin_Id=Class.Admin_Id";

//3. Prepare & Execute
$hasil = $pdo->query($sql);



//4. Tampilan

?>
<h1 class="mt-3 h2">Class List</h1>
<input type="text" id="myInput3" style="background-color:#EBEDEF;" class="form-control form-control-dark w-100" onkeyup="myFunction()" placeholder="Search Teacher Name.. " title="Type in a name">
<br>
<label >Status : </label>
<select id="myInput4" onchange="myFunction2()">
  <option value="-">-</option>
  <option value="Active">Active</option>
  <option value="Inactive">Inactive</option>
</select>
  

<div class="table-responsive mt-3">
    <table class="table" id="table">
        <tr>
            <th>No.</th>
            <th>Class ID</th>
            <th>Class Creation</th>
            <th>Teacher Name</th>
            <th>Admin Name</th>
            <th>Class Status</th>
        </tr>
        <?php
        $i = 0;
        while($row = $hasil->fetch()):
        $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['Class_Id']; ?></td>
            <td><?= $row['Class_Creation']; ?></td>
            <td><?= $row['User_Name']; ?></td>
            <td><?= $row['Admin_Username']; ?></td>
            <td><?= $row['Class_Status']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
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
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
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