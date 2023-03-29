<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Health Lab Report</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="dist/img/smz_logo.png" rel="icon">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">


</head>
<style>
  body{
    background-image: url('dist/img/bg1.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
  }
</style>

<body class="hold-transition login-page" >
<div class="login-box">

<?php
if (isset($_GET['location'])) {
  $last_page =  htmlspecialchars($_GET['location']);
}


?>
  <div class="card p-3">
    <div class="card-body login-card-body">
    <div class="login-logo">
  <a href=""><img src="dist/img/smz_logo.png" class=" col-md-6" alt=""></a>
  </div>
      <h6 class="login-box-msg"><b>Health Lab Report</b></h6>
      <div id="msg">
      <?php
      if (isset($_GET['msg'])) {
        if ($_GET['msg'] == "not_found") { ?>
            <div class="p-2 alert-danger">
                <span>Invalid User Credentials</span>
            </div>
        <?php
        }
        if ($_GET['msg'] == "error") { ?>
            <div class="p-2 mb-2 alert-danger">
                <span>Incorrect Username or Password!</span>
            </div>
        <?php
        }
      }
        ?>
</div>
      <form method="POST"  action="action_login.php">
      <input class="form-control" name="last_page" type="hidden" value="<?= $last_page ?>">

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row pb-lg-3">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                <small>Remember Me</small>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button style="width: 100%;" name="doLogin" class="btn btn-primary">Login</button>
          </div>
          <!-- /.col -->
        </div>
        </form>


</div>
</div>
</div>
<script>
      setTimeout(() => {
  const box = document.getElementById('msg');
  box.style.display = 'none';
}, 3000);
</script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
