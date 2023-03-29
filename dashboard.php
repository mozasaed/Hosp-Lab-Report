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
<body>
    <?php
    include 'topnav.php';
    include 'sidenav.php';

    require_once "DB.php";
    $db = new DBHelper();

    $i = 1;
    $equipts = $db->getRows("hlr_equipments");
    $hosp = $db->getRows("hlr_hospitals");
    $rpt = $db->getRows("hlr_equiptReport,hlr_report_status,hlr_equipments,hlr_hospitals",
    array(
      "select"=>(" hlr_equiptReport.hospId,hlr_equipments.name,statusName"),
     "table_combination"=>array(
            "hlr_equiptReport.hospId" => "hlr_hospitals.hospId",
            "hlr_equiptReport.equipId" => "hlr_equipments.equipmentId",
            "hlr_equiptReport.statusId" => "hlr_report_status.statusId",
        )));
    
    
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
      <div class="card">
      
      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
          <tr>
          <td></td>
          <?php
            if (!empty($hosp)) {
                foreach ($hosp as $h) { ?>
                <th><?= $h["name"]?>&nbsp;&nbsp;<?= "(".$h["regNo"].")"?></th>
                <?php
                      }
                    }?>
        </tr>
          </thead>
        <tbody>
  
          <?php
            if (!empty($equipts)) {
                foreach ($equipts as $e) { ?>
              <tr>
                <th><?= $e["name"]?></th>
                <?php
                $status =$db->getDataArray("hlr_equiptReport","statusId",array("hospId"=>$h['hospId'],"equipId"=>$e["equipmentId"]));
                if(!empty($status)){?>
                  <td><?= $db->getData("hlr_report_status","statusName","statusId",$status); ?></td>
                  <?php
                }else{
                ?>
                <td>-</td><?php } ?>
                <td><?= $db->getData("hlr_report_status","statusName","statusId",$status); ?></td>
                <td><?= $db->getData("hlr_report_status","statusName","statusId",$status); ?></td>
                <td><?= $db->getData("hlr_report_status","statusName","statusId",$status); ?></td>
                </tr>   
        <?php
                }
            }
    
        ?>
 
        </tbody>
 
        </table>
      </div>
    </div>
      </div>
    </section>
  </div>
<?php
    include 'footer.php';
    ?>
</body>
</html>