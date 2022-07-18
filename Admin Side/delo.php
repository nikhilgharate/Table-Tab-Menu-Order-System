<?php
require_once("config.php");


$mname=$_GET['mname'];
$mobno=$_GET['mobno'];
$sql = "delete  from orderdetail where mname='$mname' and mobno='$mobno'";
 
$result = mysqli_query($con,$sql);
 
if($result)
     
     {
      echo '{"query_result":"SUCCESS"}';
     }
     else{
       echo '{"query_result":"FAILURE"}';
     }

mysqli_close($con);
?>

