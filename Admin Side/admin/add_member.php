<?php
require_once("include/session.php");
include_once("php/config.php");
$db = new dbObj();
$conn =  $db->getConnstring();

?>


<!DOCTYPE html><html>
<head>
<meta charset="utf-8" />
<title><?php include 'include/title.php'; ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" /><meta content="Login Union" name="shahid husen" /><meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="assets/images/favicon.ico">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="assets/dist/jquery.bootgrid.css" rel="stylesheet" />
<script src="assets/js/jquery-2.1.1.min.js"></script>
<script src="assets/dist/jquery-1.11.1.min.js"></script>
<script src="assets/dist/bootstrap.min.js"></script>
<script src="assets/dist/jquery.bootgrid.min.js"></script>

<link href="assets/select2/select2.min.css" rel="stylesheet" />
<script src="assets/select2/select2.min.js"></script>

</head>

<body class="fixed-left">


  <div id="wrapper">

<?php include "include/header_top.php"; ?>
 
 
 
	<?php include "include/header_side.php"; ?>
		  
		 
 <div class="content-page">
 
	<div class="content">
		
		<div class="page-header-title"></div>
		<div class="page-content-wrapper ">
		<div class="container">
		<div class="row">
		<div class="col-sm-12">
		
		<div class="panel panel-primary zoomIn  animated">
		
		<div class="panel-body" style="margin:-10px 0;box-shadow: 0px 0px 10px #663366;">
	
		
<form id="addproduct"  method="post" action="" class="form-horizontal" role="form" >
		<div class="row">
		  <div class="col-sm-12 col-xs-12">
		    <div class="m-t-20">
			
<?php require_once("include/user_detail.php"); ?>		



           </div>
					   
<br/><br/>


<?php require_once("include/addproduct.php"); ?>

								
								
   <div class="table-responsive" id="mydiv" style="overflow:scroll;height:200px">
    <table border='1'  class="table">
      <thead>
      <tr>
	  
	     <th>select</th>
		
	      <th>नाव</th>
	      <th>रिश्ता</th>
		  <th>उमर</th>
		  <th>कारोबार</th>
          
         
		  <th>पडाई</th>
		  <th> कुल</th>

		  <th> स्थिति</th>
		  <th> लिंग </th>


	  </tr>
	  </thead>
	     <tbody id="list">


		   
	  </tbody>
	 </table>
   </div>

                              
								  
</div>


   
<center><button    type="submit" class="btn  btn-info btn-lg"> Save </button> </center> 





								
								
                              </form>
							  
							  


            <div id="msg"></div>
			
		
		</div>
		
	</div>
	


    </div>
	
	

   </div>

 </div>

</form>

<?php include "include/footer.php"; ?>

</div>
</div> 

        
		 
		<script src="assets/js/bootstrap.min.js"></script> 
		<script src="assets/js/notify.js"></script> 
		<script src="assets/js/modernizr.min.js"></script>
		<script src="assets/js/detect.js"></script> 
		<script src="assets/js/fastclick.js"></script> 
		<script src="assets/js/jquery.slimscroll.js"></script> 
		<script src="assets/js/jquery.blockUI.js"></script> 
		<script src="assets/js/waves.js"></script> 
		<script src="assets/js/wow.min.js"></script> 
		<script src="assets/js/jquery.nicescroll.js"></script> 
		<script src="assets/js/jquery.scrollTo.min.js"></script> 
		<script src="assets/js/app.js"></script> 
		<script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>
		
		<script type="text/javascript">$(document).ready(function(){$('form').parsley();});</script>

       <?php require_once("include/customjs.php"); ?>
</body>

</html>