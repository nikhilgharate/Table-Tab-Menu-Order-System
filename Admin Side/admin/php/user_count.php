<?php
session_start();
include("config.php");
$db = new dbObj();
$conn =  $db->getConnstring();

if(isset($_REQUEST['count_user'])){
 $sql="select count(*) as counter from usermast";
}elseif(isset($_REQUEST['count_item'])){
 $sql="select count(*) as counter from menumast";
}elseif(isset($_REQUEST['count_order'])){
 $sql="select count(*) as counter from ordermast";
}elseif(isset($_REQUEST['count_new_order'])){
 $sql="select count(*) as counter from ordermast where status=0";
}

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo $row['counter'];
?>