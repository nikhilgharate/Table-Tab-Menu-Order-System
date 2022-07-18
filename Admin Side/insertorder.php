<?php
require_once("config.php");

if(!empty($_GET['mdate']) && !empty($_GET['mobno'])){

$mdate=$_GET['mdate'];
$mobno=$_GET['mobno'];
$mname=$_GET['mname'];
$qty=$_GET['qty'];
$rate=$_GET['rate'];
$amount=$_GET['amount'];


$result=mysqli_query($con,"INSERT INTO `orderdetail` (`oid`, `mdate`, `mobno`, `mname`, `qty`, `rate`, `amount`, `cf`) VALUES ('', '$mdate', '$mobno', '$mname', '$qty', '$rate', '$amount', 'N');");

     if($result)
     
     {
      echo '{"query_result":"SUCCESS"}';
     }
     else{
       echo '{"query_result":"FAILURE"}';
     } 
}
?>