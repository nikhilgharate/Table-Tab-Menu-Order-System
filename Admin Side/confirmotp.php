<?php
require_once("config.php");


if(!empty($_GET['mobno']) && !empty($_GET['otp'])){
    
    
$mobno=$_GET['mobno'];
$otp=$_GET['otp'];    
    
$result=mysqli_query($con,"select * from ordermast where mobno='$mobno' and otp='$otp'");

     if(mysqli_num_rows($result)>0){
         
        
      echo '{"query_result":"SUCCESS"}';
     }else{
       echo '{"query_result":"FAILURE"}';
     } 
}
?>