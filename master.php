<?php
# Halaman Utama yang dipanggil oleh file php main
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>TeachNGo</title>
  

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="main.php">TeachNGo</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="main.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="main.php?page=admin">
                  <span data-feather="user"></span>
                  Admin
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="main.php?page=subject">
                  <span data-feather="book"></span>
                  Subject
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="main.php?page=user">
                  <span data-feather="users"></span>
                  User
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="main.php?page=class">
                  <span data-feather="calendar"></span>
                  Class
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="main.php?page=verif">
                  <span data-feather="check-square"></span>
                  Verification
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php
          if(!isset($_GET['page'])){
            $page = "home";
          }else{
            $page = $_GET['page'];
          }
          require ''. $page . '.php';
          ?>
        </main>
      </div>
    </div>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>