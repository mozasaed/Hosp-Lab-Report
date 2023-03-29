<?php
session_start();

require_once "DB.php";
$db = new DBHelper();


if ( isset( $_POST['submit'] ) ) {

    $userData = array(
        'userName'=> $_POST['uname'],
        'email'=> $_POST['email'],
        'role'=> $_POST['role'],
        'status'=> 1,
        'password'=> $db->PwdHash(12345),
      
        
    );

     $insert_user = $db->insert("hlr_users",$userData);
     
     if($insert_user){
      header("location:users.php?msg=success"); 
     }else{
      header("location:users.php?msg=error"); 
      echo "error";
     }
    
}
?>