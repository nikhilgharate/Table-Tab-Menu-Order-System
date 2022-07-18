<?php 
   
    error_reporting(0);
    session_start();
    require_once("config.php");
    $db = new dbObj();
	$conn =  $db->getConnstring();
if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
extract($_REQUEST);
    
	$sql="select * from user where (email='$username' and password='$password') OR (mobile='$username' and password='$password')";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1){
		while($rows=mysqli_fetch_array($result)){
		if($rows['status']==0){
			
		$_SESSION['ID']= $rows['ID'];
		$_SESSION['username']= $rows['user_name'];
		$_SESSION['email']= $rows['email'];
		$_SESSION['mobile']= $rows['mobile'];
		$_SESSION['type']= $rows['type'];
		
		
		echo  "<div class='alert alert-success'>Login successfully....</div>";

     //$sql="select * from stock where product_id=";

	

     echo "<script>location='dashboard.php'</script>";
 
	}else{
		echo  "<div class='alert alert-danger'>Your Acount Not Activated...</div>"; 
		  
		}
		
}

}else{
  echo "<div class='alert alert-danger'>Wrong username & Password...</div> ";
}
}else{echo " Blank Not Allowed ..";}


?>