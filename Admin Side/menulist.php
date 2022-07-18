<?php
require_once("config.php");

$mtype=$_GET['mtype'];
 $sql = "SELECT * FROM menumast  where mtype='$mtype'";
 

$result = mysqli_query($con,$sql);
$data=array();
while($row=mysqli_fetch_assoc($result)){
$data[]=$row;
 
}
 
header('Content-Type:Application/json');
echo json_encode($data);

mysqli_close($con);
?>
