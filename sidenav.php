<?php
  $page = basename($_SERVER['PHP_SELF']);

?>
<style>
  li{
    padding: 4px;
  }
</style>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="p-3">
      <img src="dist/img/smz_logo.png" alt="smz Logo" class="align-self-center col-8 mt-3">
  </a>
 
    <div class="sidebar">
 

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php
    if($page == "dashboard.php"){
      ?>
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
            
              </p>
            </a>
    
          </li>
          <?php
    }
    else{
      ?>
      <li class=" nav-item has-treeview menu-open">
        <a href="dashboard.php" class="nav-link ">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
        
          </p>
        </a>

      </li>
      <?php

    } 
    if($page == "users.php"){
    ?>

          <li class="nav-item has-treeview">
            <a href="users.php" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
            </p>
            </a>

          </li>
          <?php }else{
          ?>
            <li class="nav-item has-treeview">
            <a href="users.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
            </p>
            </a>

          </li>
          <?php
          } 
          if($page == "hospitals.php"){
          ?>
          <li class="nav-item has-treeview">
            <a href="hospitals.php" class="nav-link active">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Hospitals
          
              </p>
            </a>

          </li>
          <?php } else{
            ?>
            <li class="nav-item has-treeview">
            <a href="hospitals.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Hospitals
              </p>
            </a>

          </li>
          <?php } 
          if($page == "equipments.php"){
          ?>
          <li class="nav-item has-treeview">
            <a href="equipments.php" class="nav-link active">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Equipments
          
              </p>
            </a>

          </li>
          <?php } else{
            ?>
            <li class="nav-item has-treeview">
            <a href="equipments.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Equipments
              </p>
            </a>

          </li>
          <?php } 
          if($page == "configs.php"){
        ?>
      <li class="nav-item has-treeview">
            <a href="configs.php" class="nav-link active">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
              Configurations
              </p>
            </a>
          </li>
          <?php
          }else{
          ?>
          <li class="nav-item has-treeview">
            <a href="configs.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Configurations
          
              </p>
            </a>

          </li>
          <?php
          }
          
          if($page == "report.php"){
            ?>
          <li class="nav-item has-treeview">
                <a href="report.php" class="nav-link active">
                <i class="nav-icon fas fa-chart-bar"></i>
                  <p>
                  Report
                  </p>
                </a>
              </li>
              <?php
              }else{
              ?>
              <li class="nav-item has-treeview">
                <a href="report.php" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                  <p>
                    Report
              
                  </p>
                </a>
    
              </li>
              <?php
              }?>
         

        </ul>
      </nav>
    </div>
    
  </aside>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>