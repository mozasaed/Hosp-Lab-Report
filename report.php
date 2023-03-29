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
        <div class="row p-3">
        <h4> Hospital Report</h4>
        </div>
        <div class="row mb-2">
     
          <div class="col-6">
        
          <select id="list_hosps" class="form-control">
                <option>Choose here</option>
            <?php
            if (!empty($hosp)) {
                foreach ($hosp as $d) { ?>
                        <option value=<?=$d["hospId"] ?>><?= $d["name"]; ?></option>
            <?php
                }
            }
            ?>
        </select>
            </div>
            <div class="col-3">
            <button class="btn btn-primary" onclick="viewReport()">View Report</button>
            </div>
        </div>
      </div>
    </div>
    <section class="content ">
      <div class="container-fluid">
     <div class="card" id="reportContent">

          </div>
        </div>
      </div>

    </section>
  </div>
<?php
include('footer.php')
?>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
var hosp ;

  $('select').on('change', function() {
  hosp = this.value;
});
  setTimeout(() => {
  const box = document.getElementById('msg');
  box.style.display = 'none';
}, 3000);


function viewReport(){
$.ajax({
    type: 'GET',
    url: "report_content.php",
    data: "hospId=" + hosp ,
    cache: false,
    success: function(data) {
          $("#reportContent").html(data);

    }
            });
}

</script>

</body>
</html>