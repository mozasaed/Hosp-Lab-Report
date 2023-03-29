<?php
session_start();

require_once "DB.php";
$db = new DBHelper();


if ( isset( $_POST['submit'] ) ) {

    $equipData = array(
        'name'=> $_POST['name'],
        'description'=> $_POST['description'],
        'fromDate'=> $_POST['from'],
        'toDate'=> $_POST['deadline'],
        'status'=> 1,    
        'timeline' => ""
    );

     $insert_equip = $db->insert("hlr_equipments",$equipData);
     
     if($insert_equip){
      header("location:equipments.php?msg=success"); 
     }else{
      header("location:equipments.php?msg=error"); 
      echo "error";
     }
    
}
?>