<?php
//1. Koneksi db
require 'functions.php';
$pdo = koneksiDb();

//2. SQL
$sql = "SELECT * FROM User";

//3. Prepare & Execute
$hasil = $pdo->query($sql);



//4. Tampilan

?>
<h1 class="mt-3 h2">User List</h1>
<input type="text" id="myInput5" style="background-color:#EBEDEF;" class="form-control form-control-dark w-100" onkeyup="myFunction()" placeholder="Search Name.. " title="Type in a name">
<br>
<label >Role : </label>
<select id="myInput6" onchange="myFunction2()">
  <option value="-">-</option>
  <option value="Student">Student</option>
  <option value="Teacher">Teacher</option>
</select>
  

<div class="table-responsive mt-3">
    <table class="table" id="table">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Photo</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Role</th>
        </tr>
        <?php
        $i = 0;
        while($row = $hasil->fetch()):
        $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['User_Name']; ?></td>
            <td><?= $row['User_Email']; ?></td>
            <td><?= $row['User_Phone']; ?></td>
            <td><img src="<?= $row['User_Photo']; ?>" alt="id card" height=100 width=100 /></td>
            <td><?= $row['User_DOB']; ?></td>
            <td><?= $row['User_Gender']; ?></td>
            <td><?= $row['User_Role']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput5");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
  input = document.getElementById("myInput6");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
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