<?php
session_start();

$i = 0;

require_once "DB.php";
$db = new DBHelper();

$equips = $_POST['equipmentId'];

if ( isset( $_POST['submit'] ) ) {
while ($i < count($equips) )
{
    $data = array(
        'hospId'=> $_POST['hospId'],
        'equipId'=> $equips[$i ],
        'statusId'=> $_POST['statusId'][$i],    
       
    );

     $insert = $db->insert("hlr_equiptReport",$data);

    $i++;
 
}
header("location:hospitals.php?msg=success"); 
}

?>