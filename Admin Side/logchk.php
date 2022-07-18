<?php
require_once("config.php");


if(!empty($_GET['tno']) && !empty($_GET['tpass'])){
    
    
$tno=$_GET['tno'];
$tpass=$_GET['tpass'];    
    
$result=mysqli_query($con,"select * from usermast where tno='$tno' and tpass='$tpass'");

     if(mysqli_num_rows($result)>0){
      echo '{"query_result":"SUCCESS"}';
     }else{
       echo '{"query_result":"FAILURE"}';
     } 
}
?>