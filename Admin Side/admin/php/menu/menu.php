
<?php
	//include connection file 
	include_once("../config.php");
		
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$empCls = new Employee($connString);

	switch($action) {
	 case 'add':
		$empCls->insertEmployee($params);
	 break;
	 case 'edit':
		$empCls->updateEmployee($params);
	 break;
	 case 'delete':
		$empCls->deleteEmployee($params);
	 break;
	 default:
	 $empCls->getEmployees($params);
	 return;
	}
	
	class Employee {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
	$this->conn = $connString;
	}
	
	public function getEmployees($params) {
		
		$this->data = $this->getRecords($params);
		
		echo json_encode($this->data);
	}
	function insertEmployee($params) {
		extract($params);



if(empty($_FILES['photo']['name'])){
  //echo "emtpy";
  $sql="INSERT INTO `menumast` (`mid`, `mname`,`mtype`, `mdesc`, `mprice`, `mimage`) VALUES (NULL, '$name','$type','$description', '$mprice', '');";
  
}else{
	$tmp_name=$_FILES['photo']['tmp_name'];
	//echo $_SERVER['SERVER_NAME'];
    $randome=rand(100,9999);
    $file_name=$randome.$_FILES['photo']['name'];
	 $photo_path= "https://".$_SERVER['HTTP_HOST']."/tabletop/admin/uploads/".$file_name;
	if(move_uploaded_file($tmp_name, "../../uploads/".$file_name)){

	  $sql="INSERT INTO `menumast` (`mid`, `mname`,`mtype`, `mdesc`, `mprice`, `mimage`) VALUES (NULL, '$name','$type','$description', '$price', '$photo_path');";

	  //echo $sql;
	}else{
		die('{"msg":"saved successfully","type":"warning","error":"0"}');
	}
	
}



$result=mysqli_query($this->conn,$sql) or die('{"msg":"Data Not inserted","type":"warning","error":"0"}');
if($result){
	 echo '{"msg":"saved successfully","type":"success","error":"1"}';
}else{
	
	 echo  '{"msg":"Internal Server error - database","type":"warning","error":"0"}';

}


	}
	
	
	function getRecords($params) {
       $qtot = mysqli_query($this->conn,"SET NAMES utf8"); 

		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
		
		if (isset($params['current'])) { $page  = $params['current']; } 
		else { 
			$page=1;
			$params['current']=0; 
		};  
        $start_from = ($page-1) * $rp;
		
		$sql = $sqlRec = $sqlTot = $where = '';
		
		
		if( !empty($params['searchPhrase']) ) {   
			$where .=" WHERE ";
			$where .=" ( mid LIKE '".$params['searchPhrase']."%' "; 
			$where .=" OR mname LIKE '".$params['searchPhrase']."%'";   
			$where .=" OR mprice LIKE '".$params['searchPhrase']."%'";   
			$where .=" OR mtype LIKE '".$params['searchPhrase']."%'";   
			 
			$where .=" OR mdesc LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}else{

            $where .= "ORDER BY mid DESC";

		}
	   // getting total number records without any search
		$sql = "SELECT *,mid as ID FROM `menumast` ";
		$sqlTot .= $sql;
		$sqlRec .= $sql;
		
		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;
		
		
		$qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot employees data");
		$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");
		
		while( $row = mysqli_fetch_assoc($queryRecords) ) { 



			$data[] = $row;
		}
if(empty($data)){
  $data=array();
}
		$json_data = array(
			"current"            => intval($params['current']), 
			"rowCount"            => 10, 			
			"total"    => intval($qtot->num_rows),
			"rows"            => $data   // total data array
			);
		
		return $json_data;
	}



function updateEmployee($params) {
		
   mysqli_query($this->conn,"SET NAMES utf8");

   if(empty($_FILES['photo']['name'])){


   	$sql = "UPDATE `menumast` SET `mname` = '".$params["name"]."',
		`mprice` = '" . $params["price"]."',
		`mdesc` = '" . $params["description"]."',
		`mtype` = '" . $params["type"]."'
		 WHERE mid='".$params["edit_ID"]."'";

//echo $_FILES['photo']['name'];

   }else{


   $tmp_name=$_FILES['photo']['tmp_name'];
	//echo $_SERVER['SERVER_NAME'];
    $randome=rand(100,9999);
    $file_name=$randome.$_FILES['photo']['name'];
	 $photo_path= "https://".$_SERVER['HTTP_HOST']."/tabletop/admin/uploads/".$file_name;
	if(move_uploaded_file($tmp_name, "../../uploads/".$file_name)){
		
  	 $sql = "UPDATE `menumast` SET `mname` = '".$params["name"]."',
		`mprice` = '" . $params["price"]."',
		`mimage` = '" . $photo_path."',
		`mdesc` = '" . $params["description"]."',
		`mtype` = '" . $params["type"]."'
		 WHERE mid='".$params["edit_ID"]."'";


    }else{
    	

    	die('{"msg":"Not Uploaded Please Check information","type":"warning","error":"0"}');
    }
   }
		
   $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

 die('{"msg":"Updated successfully","type":"success","error":"1"}');


	
}
	
	function deleteEmployee($params) {

        

		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `menumast` WHERE mid='".$params["id"]."'";
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to delete employee data");
	}
}
?>
	