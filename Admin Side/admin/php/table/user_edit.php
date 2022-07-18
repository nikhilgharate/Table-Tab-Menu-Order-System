<?php
    $id=$_GET['id'];
    require_once("../config.php");
    $db = new dbObj();
  $conn =  $db->getConnstring();
  mysqli_query($conn,"SET NAMES utf8");
  $sql="select *  from usermast where tid='$id'";
  $result = mysqli_query($conn,$sql);
  $rows =mysqli_fetch_array($result);
  
    //mysqli_close($conn);
   //print_r($rows);
?>



    <div class="row">
       <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Table Number:</label>
                    <input type="text" class="form-control" value="<?php echo $rows['tno']; ?>" name="tname" required />
                  </div>
        </div>

        



          <div class="col-md-6">
            <div class="form-group">
             <label for="gst" class="control-label">Password :</label>
             <input type="text" class="form-control" value="<?php echo $rows['tpass']; ?>"  name="tpass" required />
           </div>
   
         </div>
</div>





