<?php
session_start();

require_once "DB.php";
$db = new DBHelper();


if ( isset( $_POST['submit'] ) ) {

    $statusData = array(
        'statusName'=> $_POST['statusName'],
        'status'=> 1,    
       
    );

     $insert_status = $db->insert("hlr_report_status",$statusData);
     
     if($insert_status){
      header("location:configs.php?msg=success"); 
     }else{
      header("location:configs.php?msg=error"); 
  
     }
    
}
?>