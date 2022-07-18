<?php
    $id=$_GET['id'];
    require_once("../config.php");
    $db = new dbObj();
  $conn =  $db->getConnstring();
  mysqli_query($conn,"SET NAMES utf8");
  $sql="select *  from user where ID='$id'";
  $result = mysqli_query($conn,$sql);
  $rows =mysqli_fetch_array($result);
  
    //mysqli_close($conn);
   //print_r($rows);
?>



    <div class="row">
       <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Name:</label>
                    <input type="text" class="form-control" value="<?php echo $rows['user_name']; ?>" name="user_name" required />
                  </div>
        </div>

        

        <div class="col-md-6">
                  <div class="form-group">
                    <label for="mobile" class="control-label">Mobile Number:</label>
                    <input type="number" class="form-control"  value="<?php echo $rows['mobile']; ?>" name="mobile"/>
                  </div>
       </div>
        
         <div class="col-md-6">
          <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" value="<?php echo $rows['email']; ?>" name="email" required />
                  </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
             <label for="gst" class="control-label">Password :</label>
             <input type="text" class="form-control" value="<?php echo $rows['password']; ?>"  name="password" required />
           </div>
   
         </div>
</div>





