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
    $eqs = $db->getRows("hlr_equipments");
    
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-1 text-dark">Equipments List</h4>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModalLong">Add New Equipment</button>
            <!-- Modal -->
              <div class="modal fade" role="dialog"  id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content p-3">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">New Equipment</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="action_addEquip.php" method="POST" enctype="multipart/form-data">
                      <div class="container">
                        <div class="row ">
                          <div class="col-12">
                            <label>Name</label>
                            <input class="form-control" placeholder="Name of Equipment" name="name" required>
                          </div>
         
                        </div>
                        <div class="row mt-2">
                          <div class="col-12">
                            <label>Description</label>
                            <textarea name="description" class="form-control" placeholder="Short description"></textarea>
                          </div>
         
                        </div>

                        <div class="row mt-2">
                          <div class="col-12">
                            <label>From Agreed Date</label>
                            <input class="form-control" type="date" name="from" required>
                          </div>
         
                        </div>

                        <div class="row mt-2">
                          <div class="col-12">
                            <label>Deadline</label>
                            <input class="form-control" type="date"  name="deadline" required>
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
                <h6>You have successfully added Document<span class="fa fa-check-circle float-right ml-4"></span></h6>
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
                    <th>Description</th>
                    <th>Timeline</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <?php
                            if (!empty($eqs)) {
                                foreach ($eqs as $u) { ?>

                                    <td><?= $i++; ?></td>
                                    <td><?= $u["name"]; ?></td>
                                    <td><?= $u["description"]; ?></td>
                                    <td><?= $u["timeline"]; ?></td>
                                    <td><?php if (($u["status"]) == 1) {
                                            echo "Active";
                                        } else {
                                            echo "Blocked";
                                        } ?>
                                    </td>
                                    <td style="display: flex;">
                                    <button class="btn btn-outline-danger" data-toggle="modal" title="View Document"><span class="fa fa-trash"></span></button>
                                    <button class="btn btn-outline-success" data-toggle="modal" title="Edit User"><span class="fa fa-edit"></span></button>
                                    <button class="btn btn-outline-warning" data-toggle="modal" title="Change Status"><span class="fa fa-lock"></span></button>

                                    </td>
                              </tr>
                        <?php
                                }
                            }else{
                              echo '<td colspan="8"><center>no equipment found</center></td>';
                            }
                ?>
                  </tbody>
         
                </table>
              </div>
              <!-- /.card-body -->
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