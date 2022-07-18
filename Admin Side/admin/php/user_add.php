<?php
require_once("config.php");
$db = new dbObj();
$conn =  $db->getConnstring();


 $result= mysqli_query($conn,"SET NAMES utf8");   


$params=$_REQUEST;
extract($params);

$result=mysqli_query($conn,"select max(ref_id) as maxval from member_master");
$r=mysqli_fetch_assoc($result);
$max_ref_id=$r['maxval']+1;

 $file_name=rand(1111111,9999999).$_FILES['img']['name'];
  $file_tmp=$_FILES['img']['tmp_name'];

$result=mysqli_query($conn,"INSERT INTO `member_master` (`ID`, `name`, `photo`, `gaon`, `taluka`, `jilha`, `email`, `phone`, `vatan`, `ref_id`) VALUES (NULL, '$sname', '$file_name', '$gaon', '$taluka', '$jilha', '$email', '$phone', '$vatan', '$max_ref_id');");

if($result){
 move_uploaded_file($file_tmp,"../uploads/".$file_name);
 
 
 
if(!empty($_REQUEST['tname'])){
 for($i=0;$i<count($_REQUEST['tname']) ; $i++){ 
     $RESSS=mysqli_query($conn,"INSERT INTO `member_transaction` (`ID`, `ref_id`, `name`, `rishta`, `umar`, `karobar`, `padai`, `kul`, `status`, `gender`) VALUES (NULL, '$max_ref_id', '".$_REQUEST['tname'][$i]."', '".$_REQUEST['trishta'][$i]."', '".$_REQUEST['tumar'][$i]."', '".$_REQUEST['tkarobar'][$i]."', '".$_REQUEST['tpadai'][$i]."', '".$_REQUEST['tkul'][$i]."', '".$_REQUEST['tstatus'][$i]."', '".$_REQUEST['tgender'][$i]."');");
  }
}   
 echo "<script>alert('Entry Successfully Saved')</script>";
 echo "<script>location='add_member.php'</script>";
}else{

 echo "<div class='alert alert-danger'> not insert please check information properly </div>";


}


  

?>