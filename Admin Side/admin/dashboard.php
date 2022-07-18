<?php
require_once("include/session.php");
?>
<!DOCTYPE html><html>
<head>
<meta charset="utf-8" />
<title><?php include 'include/title.php'; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="online travel and room Booking" name="description" /><meta content="Login Union" name="shahid husen" /><meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="assets/images/favicon.ico">
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="fixed-left">
<div id="wrapper">
<style type="text/css">
	.page-header-title {
    background-color: #f2f2f2;
    margin: -20px -5px 23px -5px;
    padding: 10px 15px 100px 20px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
}
</style>

 <?php include "include/header_top.php"; ?>
 
 
	<?php include "include/header_side.php"; ?>

<div class="content-page">

   <div class="content">
     <div class="">
	   <div class="page-header-title">
	      <h4 class="page-title"></h4>
	   </div>
     </div>

 <div class="page-content-wrapper ">
 
 <div class="container">
 
 <div class="row">
 <div class="col-sm-6 col-lg-3 zoomIn  animated">
	       <div class="panel text-center">
		   
		   <div class="panel-heading">
		     <h4 class="panel-title text-muted font-light">Total User</h4>
		   </div>

		   <div class="panel-body p-t-10"><h2 class="m-t-0 m-b-15"><i class="mdi mdi-account-circle text-danger m-r-10"></i><b><span class='count_user'>0</span></b></h2><p class="text-muted m-b-0 m-t-20"> Total Users </p>
		  </div>


		   
	       </div>
       </div>


       <div class="col-sm-6 col-lg-3 zoomIn  animated">
	       <div class="panel text-center">
		   
		   <div class="panel-heading">
		     <h4 class="panel-title text-muted font-light">Total Items</h4>
		   </div>

		   <div class="panel-body p-t-10"><h2 class="m-t-0 m-b-15"><i class="mdi mdi-account-circle text-danger m-r-10"></i><b><span class='count_item'>0</span></b></h2><p class="text-muted m-b-0 m-t-20"> Total Menu Items </p>
		  </div>


		   
	       </div>
       </div>


       <div class="col-sm-6 col-lg-3 zoomIn  animated">
	       <div class="panel text-center">
		   
		   <div class="panel-heading">
		     <h4 class="panel-title text-muted font-light">Total Order</h4>
		   </div>

		   <div class="panel-body p-t-10"><h2 class="m-t-0 m-b-15"><i class="mdi mdi-account-circle text-danger m-r-10"></i><b><span class='count_order'>0</span></b></h2><p class="text-muted m-b-0 m-t-20"> Total Menu Orders </p>
		  </div>


		   
	       </div>
       </div>


<a href="new_order.php">
       <div class="col-sm-6 col-lg-3 zoomIn  animated">
	       <div class="panel text-center">
		   
		   <div class="panel-heading">
		     <h4 class="panel-title text-muted font-light">Total New Order</h4>
		   </div>

		   <div class="panel-body p-t-10"><h2 class="m-t-0 m-b-15"><i class="mdi mdi-account-circle text-danger m-r-10"></i><b><span class='count_new_order'>0</span></b></h2><p class="text-muted m-b-0 m-t-20"> Total New Menu Orders </p>
		  </div>


		   
	       </div>
       </div>
</a>

</div>
	
	 </div>
	 
	 </div>
	 
	 </div>
	 
	 
	
	 
	 </div>
</div> 

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/notify.js"></script> 	

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.min.js"></script> 

<script src="assets/js/detect.js"></script> <script src="assets/js/fastclick.js"></script> <script src="assets/js/jquery.slimscroll.js"></script> <script src="assets/js/jquery.blockUI.js"></script> <script src="assets/js/waves.js"></script> <script src="assets/js/wow.min.js"></script> <script src="assets/js/jquery.nicescroll.js"></script> <script src="assets/js/jquery.scrollTo.min.js"></script> 



 <script src="assets/plugins/raphael/raphael-min.js"></script> 
 <script src="assets/js/app.js"></script>

<?php include "include/footer.php"; ?>

	 
</body>

</html>