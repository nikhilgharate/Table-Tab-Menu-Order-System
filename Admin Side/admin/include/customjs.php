<script language="javascript" type="text/javascript">
$("#sname").focus();

$("#addproduct").on('submit',(function(e) {


        
        $('#msg').html("");
        var div_data =
"<div > Please Wait...<img width='50' src='img/spinner.gif' /></div>";
//$(div_data).appendTo("#msg");
        
         $('#btn').html(div_data);  
        
        e.preventDefault();
        $.ajax({
            url: "php/user_add.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                $('#btn').html("<button type='submit' class='btn btn-sm btn-info'> SAVE  </button>"); 

                $("#msg").html(data);
                
                //location='new_order.php';
              
         },
            error: function() 
            {
                 $("#msg").html("Internal Server Error 2005");
            }           
       });
    }));

$("#addproduct2").on('submit',(function(e) {   
    


        $('#msg').html("");
        var div_data =
"<div > Please Wait...<img width='50' src='img/spinner.gif' /></div>";
//$(div_data).appendTo("#msg");
        $('#btn').html(div_data);
        e.preventDefault();
        $.ajax({
            url: "php/user_edit.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                $('#btn').html("<button type='submit' class='btn btn-sm btn-info'> SAVE  </button>"); 

                $("#msg").html(data);
                
                //location='new_order.php';
              
         },
            error: function() 
            {
                 $("#msg").html("Internal Server Error 2005");
            }           
       });
    }));



$("#addtolist").click(function(){
 
if($('#name').val() == ''){
      alert('Enter Name');
      $("#name").focus();
      return false;
       
   }

if($('#rishta').val() == ''){
      alert('Enter Relation');
      $("#rishta").focus();
      return false;
       
   }

   if($('#umar').val() == ''){
      alert('Enter Age');
      $("#umar").focus();
      return false;
       
   }



   if($('#padai').val() == ''){
      alert('Enter Education');
      $("#padai").focus();
      return false;
       
   }

  
   

  



            var name= $("#name").val();
            var rishta= $("#rishta").val();
            var umar = $("#umar").val();
            var karobar = $("#karobar").val();
           
            var padai = $("#padai").val();

            var gender = $("#gender").val();

             var status = $("#status").val();
            var kul = $("#kul").val();
            
            
          $.ajax({
                type:'POST',
                url:'php/item_list.php',
                data:{name :name,rishta:rishta,umar:umar,karobar:karobar,padai:padai,gender:gender,status:status,kul:kul},
                success:function(data) {
                     $("#name").val("");
                     $("#rishta").val("");
                     $("#umar").val(""); 
                     $("#karobar").val("");
                     $("#padai").val("");
                     $("#kul").val(""); 
             $("#list").append(data);
             $("#name").focus();
          

        }
   }); 
});






$(".delete-row").click(function(){
         $("table tbody").find('input[name="record"]').each(function(){

                if($(this).is(":checked")){

           var name=$(this).parent().parent().find('.name').val();
           var rishta=$(this).parent().parent().find('.rishta').val();
           var umar=$(this).parent().parent().find('.umar').val();
           var karobar=$(this).parent().parent().find('.karobar').val();
           var padai=$(this).parent().parent().find('.padai').val();
           var kul=$(this).parent().parent().find('.kul').val();
           var gender=$(this).parent().parent().find('.gender').val();
           var status=$(this).parent().parent().find('.status').val();
           $("#rishta").val(rishta);
           $("#name").val(name);
           $("#umar").val(umar);
           $("#karobar").val(karobar);
           $("#padai").val(padai);
           $("#kul").val(kul);
           $("#gender").val(gender);
       
           $(this).parents("tr").remove();


                }

            });

        });

$(function () {
    $("#fileupload").change(function () {
        $("#dvPreview").html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        if (regex.test($(this).val().toLowerCase())) {
            if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                $("#dvPreview").show();
                $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
            }
            else {
                if (typeof (FileReader) != "undefined") {
                    $("#dvPreview").show();
                    $("#dvPreview").append("<img class='img img-thumbnail' />");
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#dvPreview img").attr("src", e.target.result);
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }
        } else {
            alert("Please upload a valid image file.");
        }
    });
});
</script>