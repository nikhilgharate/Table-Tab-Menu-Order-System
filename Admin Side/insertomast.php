<?php
require_once("config.php");
date_default_timezone_set('Asia/Kolkata');
if(!empty($_GET['tabno']) && !empty($_GET['amount']) && !empty($_GET['ccno'])){

$tabno=$_GET['tabno'];
$mobno=$_GET['mobno'];
$ccno=$_GET['ccno'];
$amount=$_GET['amount'];


$odate=date('Y-m-d');
$otime=date('h:i A');
//$otp=rand(1111,9999);
$otp=1234;
//$gst=$amount*10/100;
//$amount=$amount+$gst;


$sql="INSERT INTO `ordermast` (`oid`, `odate`, `otime`, `tabno`, `mobno`, `amount`, `ccno`, `otp`, `status`) VALUES (NULL, '$odate', '$otime', '$tabno', '$mobno', '$amount', '$ccno', '$otp', '0');";


//sms($mobno,"Your otp is ".$otp);
 
 $result=mysqli_query($con,$sql);

 if($result)
     {
         
        $result= mysqli_query($con,"select MAX(oid) as max_oid from `ordermast`");
        $rows=mysqli_fetch_assoc($result);
        $max_id = $rows['max_oid'];
        
        $res=mysqli_query($con,"update orderdetail set cf='y' where mobno='$mobno'");
        
        $res1=mysqli_query($con,"update orderdetail set oid='$max_id' where oid=0");

  
         
      echo '{"query_result":"SUCCESS"}';
     }
     else
     {
       echo '{"query_result":"FAILURE"}';
     } 
}
?>