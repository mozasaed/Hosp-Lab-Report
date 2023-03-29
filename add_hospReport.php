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

    $id = $_GET['id'];
    $hosp = $db->getRows("hlr_hospitals");
    $equipts = $db->getRows("hlr_equipments");
    $stts = $db->getRows("hlr_report_status");
    
?>
<form action="action_addHospReport.php" method="post">
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-1"><b style="color:cornflowerblue;" ><?= $db->getData("hlr_hospitals","name","hospId",$id); ?>&nbsp;</b>Hospital Variable Criteria</h4>
            <input type="hidden" value=<?=$id?> name="hospId">
          </div>
        </div>

      </div>
    </div>

    <section class="content ">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
          <div class="row p-1">
        <?php
          if (!empty($equipts)) {
              foreach ($equipts as $e) { ?>
                   <input type="hidden" value=<?=$e['equipmentId']?> name="equipmentId[]">
                  <div class="col-4 mt-3">
                    <label><?= $e['name'] ?></label>
                    
                    <select class="form-control" name="statusId[]">
                              <option>Choose here</option>
                            <?php
                            if (!empty($stts)) {
                                foreach ($stts as $s) { ?>
                                    <option value=<?=$s["statusId"] ?>><?= $s["statusName"]; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                  </div>
                 
          <?php
              }
          }else{
            echo "empty";
          }
          ?>
           </div>
           <div class="row mt-3">
            <div class="col-6"></div>
            <div class="col-6" >
              <button  style="float:right;" name="submit" class="col-3 m-1 p-2 btn btn-primary">Save</button>
              <button  style="float:right;" class="col-3 m-1 p-2 btn btn-danger">Go Back</button>
            </div>
           </div>
        </div>
        </div>
        </div>
    </section>
</div>

  </div>
  </form>
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