<?php
session_start();

require_once "DB.php";
$db = new DBHelper();

if ( isset( $_POST['submit'] ) ) {

    $hospData = array(
        'name'=> $_POST['name'],
        'status'=> 1,  
        'regNo' => ""
    );

     $insert_hosp = $db->insert("hlr_hospitals",$hospData);
     
     if($insert_hosp){
        $reg = "DH-00".''.$insert_hosp;
        $regValues = array('regNo'=> $reg);

        $conditions=array('name'=>$_POST['name']);
        $update=$db->update('hlr_hospitals', $regValues, $conditions);

        if($update){
            header("location:hospitals.php?msg=success"); 
        }else{
            header("location:hospitals.php?msg=success"); 
        }


     }else{
      header("location:hospitals.php?msg=error"); 
     }
    
}
?>