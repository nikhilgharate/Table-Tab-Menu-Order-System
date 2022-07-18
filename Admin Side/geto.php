<?php
require_once("config.php");


$mobno=$_GET['mobno'];

$sql = "select * from orderdetail where mobno='$mobno' and cf='N'";
 
$res = mysqli_query($con,$sql);
 
while($check = mysqli_fetch_assoc($res))
{
    
    $flag[]=$check;
}
 
echo json_encode($flag);

mysqli_close($con);
?>

