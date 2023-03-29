<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZPC - Admin Dashboard</title>
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
    $users = $db->getRows("hlr_users");

    
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-1 text-dark">User Management</h4>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModalLong">Add User</button>
            <!-- Modal -->
              <div class="modal fade" role="dialog"  id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content p-3">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">User Registraion</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="action_addUser.php" method="POST">
                      <div class="container">
                        <div class="row">
                          <div class="col-6">
                            <label>Username</label>
                            <input class="form-control" placeholder="Username" name="uname">
                          </div>
                          <div class="col-6">
                          <label>Email</label>
                            <input class="form-control" placeholder="Email" name="email" type="email">
                          </div>
                        </div>
            
                        <div class="row mt-2">
                          <div class="col-6">
                            <label>Role</label>
                            <select class="form-control" name="role">
                              <option>Select here</option>
                              <option value="admin">Admin</option>
                              <option></option>
                            </select>
                          </div>
                          <div class="col-6">
         
                          </div>
                        </div>

                      </div>
                
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </ol>
          </div>
          <div class="col-4 float-right" id="msg">
      <?php
        if ($_GET['msg'] == "success") { ?>
            <div class="p-2 alert-success">
                <h6>User Added successfully<span class="fa fa-check-circle float-right ml-4"></span></h6>
            </div>
        <?php
        }
        if ($_GET['msg'] == "error") { ?>
            <div class="p-2 mb-2 alert-danger">
                <h6>Sorry Failed to add User<span class="fa fa-times-circle float-right ml-4"></span></h6>
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
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <?php
                            if (!empty($users)) {
                                foreach ($users as $u) { ?>

                                    <td><?= $i++; ?></td>
                                    <td><?= $u["userName"]; ?></td>
                                    <td><?= $u["email"]; ?></td>
                                    <td><?= $u["role"]; ?></td>
                                    <td><?php if (($u["status"]) == 1) {
                                            echo "Active";
                                        } else {
                                            echo "Blocked";
                                        } ?>
                                    </td>
                                    <td style="display: flex;">
                                    <button class="btn btn-outline-primary" data-toggle="modal" title="View User Details"><span class="fa fa-eye"></span></button>
                                    <button class="btn btn-outline-success" data-toggle="modal" title="Edit User"><span class="fa fa-edit"></span></button>
                                    <button class="btn btn-outline-warning" data-toggle="modal" title="Change Status"><span class="fa fa-lock"></span></button>

                                    </td>
                        </tr>
                        <?php
                                }
                            }else{
                              echo '<td colspan="8" style="color:orange; "><center>no user found</center></td>';
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
include('footer.php')
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