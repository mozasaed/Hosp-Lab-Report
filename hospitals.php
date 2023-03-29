<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HLR - Admin Dashboard</title>
    <link href="dist/img/smz_logo.png" rel="icon">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

</head>
<style>

</style>
<body>
    <?php
    include 'topnav.php';
    include 'sidenav.php';

    require_once "DB.php";
    $db = new DBHelper();

    $i = 1;
    $hosp = $db->getRows("hlr_hospitals");

?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-1 text-dark">Hospitals List</h4>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModalLong">Add New Hospital</button>
            <!-- Modal -->
              <div class="modal fade" role="dialog"  id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content p-3">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">New Hospital</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="action_addHosp.php" method="POST" enctype="multipart/form-data">
                      <div class="container">
                        <div class="row ">
                          <div class="col-12">
                            <label>Name</label>
                            <input class="form-control" placeholder="Name of the Hospital" name="name" required>
                          </div>
         
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </ol>
          </div>
      <div class="col-4 float-right" id="msg">   
           <?php

        if ($_GET['msg'] == "ok") { ?>
            <div class="p-2 alert-success">
                <h6>You have successfully added Hospital<span class="fa fa-check-circle float-right ml-4"></span></h6>
            </div>
        <?php
        }
        if ($_GET['msg'] == "error") { ?>
            <div class="p-2 mb-2 alert-danger">
                <h6>Sorry Something went wrong!<span class="fa fa-times-circle float-right ml-4"></span></h6>
            </div>
        <?php
        }

      ?>
      </div>
        </div>
      </div>
    </div>

    <section class="content ">
      <div class="container-fluid">

     <div class="card">
      
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>sn</th>
                    <th>Name</th>
                    <th>Reg No</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <?php
                            if (!empty($hosp)) {
                                foreach ($hosp as $u) { ?>

                                    <td><?= $i++; ?></td>
                                    <td><?= $u["name"]; ?></td>
                                    <td><?= $u["regNo"]; ?></td>
                                    <td><?php if (($u["status"]) == 1) {
                                            echo "Active";
                                        } else {
                                            echo "Blocked";
                                        } ?>
                                    </td>
                                    <td style="display: flex;">
                                    <?php
                                     
                                        $hospReport = $db->getRows("hlr_equiptReport", array("where" => array("hospId" => $u["hospId"])));
                                          if (empty($hospReport)) {
                                    
                                                ?>
                                                <a href="add_hospReport.php?id=<?=$u['hospId']?>" class="btn btn-outline-secondary" type="button"><span class="fa fa-plus"></span></a>
                                  <?php
                                              }else{?>
                                                <a href="add_hospReport.php?id=<?=$u['hospId']?>" class="btn btn-outline-secondary" type="button"><span class="fa fa-file"></span></a>
                                 <?php

                                              }
                                    ?>
                                 
                                    </td>
                              </tr>
                        <?php
                                }
                            }else{
                              echo '<td colspan="8"><center>no hospital found</center></td>';
                            }
                ?>
                  </tbody>
         
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      
      <!-- /.container-fluid -->
    </section>
  </div>
<?php
include('footer.php');

?>
<script>
  setTimeout(() => {
  const box = document.getElementById('msg');
  box.style.display = 'none';
}, 3000);
</script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>