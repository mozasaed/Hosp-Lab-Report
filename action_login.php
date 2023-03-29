<?php
// session_start();

require_once "DB.php";
$db = new DBHelper();

if (isset($_POST['doLogin'])) {

    $email = htmlentities($_POST['email']);
    $upass = htmlentities($_POST['password']);

    $last_page = htmlentities($_POST['last_page']);

    if ($db->doLogin($email, $upass)) {
      
        if(!empty($_SESSION['id_session'])){
            if(!empty($last_page)){

                $db->redirect($last_page);
            }else{
                header("location: dashboard.php");
            }
          
        }else{
            header("location:index.php?msg=error");
        }

      
       
    }else{
        header("location:index.php?msg=error");
    }
}else{
    header("location:index.php?msg=error");
}
 
