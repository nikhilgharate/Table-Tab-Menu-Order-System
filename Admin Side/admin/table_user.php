<?php
require_once("include/session.php");
?>
<!DOCTYPE html><html>

<head><meta charset="utf-8" />
<title><?php include 'include/title.php'; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="Admin Dashboard" name="description" /><meta content="logicunion tecnology" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="assets/images/favicon.ico">

<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="assets/dist/jquery.bootgrid.css" rel="stylesheet" />
<script src="assets/dist/jquery-1.11.1.min.js"></script>
<script src="assets/dist/bootstrap.min.js"></script>
<script src="assets/dist/jquery.bootgrid.min.js"></script>
</head>
<body class="fixed-left"><div id="wrapper">
<?php include "include/header_top.php"; ?>
  <?php include "include/header_side.php"; ?>
   <div class="content-page">
       <div class="content">
		<div class="page-header-title">
		</div>
		 <div class="page-content-wrapper ">
			<div class="container">
			 <div class="row">
			   <div class="col-md-12">
			     <div class="panel panel-primary zoomIn  animated">
				   <div class="panel-body">
				      
					  <button type="button" class="btn btn-xl btn-primary" id="command-add" data-row-id="0" style='margin-bottom:-10px;'>
			<span class="glyphicon glyphicon-plus"></span> Add Table</button>
	<div class="table-responsive">

		<table id="employee_grid" class="table table-bordered table-hover" width="60%" cellspacing="0" data-toggle="bootgrid">

			<thead>
				<tr>
					<th data-column-id="ID" data-type="numeric" data-identifier="true">ID</th>
					<th data-column-id="tno">Table  Number</th>
					<th data-column-id="tpass">Table Password</th>
				  


          <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>


				</tr>
			</thead>
		</table> 
					 
	</div>				  
			</div>
		</div>
	</div>

</div>
 
</div>

</div>
</div>

<!-- Model -->

<div id="add_model" class="modal fade">
    <div class="modal-dialog modal-lg zoomIn  animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Table</h4>
            </div>
            <div class="modal-body" >
                <form method="post" id="frm_add" name="registration">
				        <input type="hidden" value="add" name="action" id="action">


    <div class="row">
       <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label">Table Number:</label>
                    <input type="text" class="form-control" name="tname" required />
                  </div>
        </div>





          <div class="col-md-6">
            <div class="form-group">
             <label for="gst" class="control-label">Password :</label>
             <input type="text" class="form-control"  name="tpass" required />
           </div>
   
         </div>
</div>
				
          
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_add" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<div id="edit_model" class="modal fade">
    <div class="modal-dialog modal-lg zoomIn  animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Leaders</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit">
				<input type="hidden" value="edit" name="action" id="action">
				<input type="hidden" value="0" name="edit_ID" id="edit_ID">
		 <div id="user_edit">
			 Please Wait....
		 </div>
					 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<?php include "include/footer.php"; ?>
</div>
</div> 
<script src="assets/js/modernizr.min.js"></script> 
<script src="assets/js/notify.js"></script> 
<script src="assets/js/detect.js"></script> 
<script src="assets/js/fastclick.js"></script> 
<script src="assets/js/jquery.slimscroll.js"></script> 
<script src="assets/js/jquery.blockUI.js"></script> 
<script src="assets/js/waves.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/jquery.nicescroll.js"></script> 
<script src="assets/js/jquery.scrollTo.min.js"></script> 
<script src="assets/js/app.js"></script>
</body>
</html>
<script type="text/javascript">
$( document ).ready(function() {

    $("#frm_add").on('submit',(function(e) {
            
        e.preventDefault();
        $.ajax({
            url: "php/table/user.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {

            	var obj = $.parseJSON(data);
            	
              $.notify(obj.msg,obj.type);
            	

            if(obj.error==1){
              $('#add_model').modal('hide');
              $("#employee_grid").bootgrid('reload'); 
               $('#frm_add')[0].reset();

            }  
              

	          
            }           
       });
    }));


     $("#frm_edit").on('submit',(function(e) {
            
        e.preventDefault();
        $.ajax({
            url: "php/table/user.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {

              var obj = $.parseJSON(data);
              
              $.notify(obj.msg,obj.type);
              

            if(obj.error==1){
              $('#edit_model').modal('hide');
              $("#employee_grid").bootgrid('reload'); 
               $('#frm_edit')[0].reset();

            }  
              

            
            }           
       });
    }));


	var grid = $("#employee_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "php/table/user.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-info command-edit\" data-row-id=\"" + row.ID + "\"><span class=\"glyphicon glyphicon-edit\"></span> Edit</button> " + 
		                "<button type=\"button\" class=\"btn btn-xs btn-danger command-delete\" data-row-id=\"" + row.ID + "\"><span class=\"glyphicon glyphicon-trash\"></span> Delete</button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {
        //alert("You pressed edit on row: " + $(this).data("row-id"));
			var ele =$(this).parent();
			var g_id = $(this).parent().siblings(':first').html();
            var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
console.log(g_id);
                    console.log(g_name);

		//console.log(grid.data());//
		$('#edit_model').modal('show');
					if($(this).data("row-id") >0) {
							
                                // collect the data
                                $('#edit_ID').val(ele.siblings(':first').html()); // in case we're changing the key
                              
                                
                    var idd=$("#edit_ID").val();
					
					$("#user_edit").html("<br/><br/><center>please Wait....</center>");
					
  $("#user_edit").load("php/table/user_edit.php?id="+idd);       
								
					} else {
					 alert('No row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {
	
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
					//alert(conf);
                    if(conf){
                                $.post('php/table/user.php', { id: $(this).data("row-id"), action:'delete'}
                                    , function(){

                                    	var notify = $.notify(' Record is Deleted successfully  ', {
	allow_dismiss: false,
	showProgressbar: true
});
                                        // when ajax returns (callback), 
										$("#employee_grid").bootgrid('reload');
                                }); 
								//$(this).parent('tr').remove();
								//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                    }
    });
});

      
			
			$( "#command-add" ).click(function() {
			  $('#add_model').modal('show');
			});
			
			


});
</script>
