<?php
    $id=$_GET['id'];
    require_once("../config.php");
    $db = new dbObj();
  $conn =  $db->getConnstring();
  mysqli_query($conn,"SET NAMES utf8");
  $sql="select *  from menumast where mid='$id'";
  $result = mysqli_query($conn,$sql);
  $rows =mysqli_fetch_array($result);
  
    //mysqli_close($conn);
   //print_r($rows);
?>



    <div class="row">

      <div class="col-lg-12">
                   <div  id="dvPreview">
                    <img class="img img-thumbnail" src="<?php echo $rows['mimage']; ?>">
                   </div>
                </div>
             
        <div class="col-md-4">
                <div class="form-group">
                    <label for="dob" class="control-label">Photo:</label>
                    <input type="file" id="fileupload" class="form-control"  name="photo"  />
                  </div>
         </div>
       <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Name:</label>
                    <input type="text" class="form-control" value="<?php echo $rows['mname']; ?>" name="name" required />
                  </div>
        </div>

        <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Type:</label>
                    <select  class="form-control" name="type" required >
                      <option value="">..select..</option>

                      <option <?php if($rows['mtype']=="Breakfast"){echo "selected";} ?>>Breakfast</option>

                      <option <?php if($rows['mtype']=="VEG"){echo "selected";} ?>>VEG</option>
                      <option <?php if($rows['mtype']=="NON VEG"){echo "selected";} ?>>NON VEG</option>
                      <option <?php if($rows['mtype']=="Dessert"){echo "selected";} ?>>Dessert</option>
                      <option <?php if($rows['mtype']=="Starters"){echo "selected";} ?>>Starters</option>

                      <option <?php if($rows['mtype']=="Chinese"){echo "selected";} ?>>Chinese</option>
                      <option <?php if($rows['mtype']=="Pizza and Burgers"){echo "selected";} ?>>Pizza and Burgers</option>
                      
                  </select>
                  </div>
        </div>

        <div class="col-md-6">
                  <div class="form-group">
                    <label for="post" class="control-label">Price:</label>
                    <input type="text" class="form-control" value="<?php echo $rows['mprice']; ?>"  name="mprice"  />
                  </div>
         </div>


          <div class="col-md-6">
            <div class="form-group">
             <label for="gst" class="control-label">Description :</label>
             <input type="text" class="form-control" value="<?php echo $rows['mdesc']; ?>"  name="description" required />
           </div>
   
         </div>
</div>





