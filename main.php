<?php
# Halaman utama tampilan website admin yang seluruh isinya dibuat pada file master.php secara terpisah
require 'master.php';
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
