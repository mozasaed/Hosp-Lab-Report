<?php
session_start();
require_once "DB.php";
$db = new DBHelper();

if(empty($_SESSION['id_session'])){
  header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
}

if (isset($_GET['logout'])) {
  session_destroy();
  header("location:index.php");
  }

 ?>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><h4 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight:600">Health Lab Report</h4></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto ms-auto">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-2x fa-user-circle"></i>
              <span class="p-2"><?= $db->getData("hlr_users","userName","userId",$_SESSION['id_session']);?></span>
           </a>
            <ul class="dropdown-menu mr-1" aria-labelledby="navbarDropdown">
          
                <li><a class="dropdown-item" href="#!"><i class="p-2 fa fa-user"></i>Profile</a></li>
                <li><a class="dropdown-item" href="#!"><i class="p-2 fa fa-cog"></i>Settings</a></li>
                <hr>
                <li><a href='?logout=true' class="dropdown-item"><i class="p-2 fa fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </li>
    </ul>

  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

