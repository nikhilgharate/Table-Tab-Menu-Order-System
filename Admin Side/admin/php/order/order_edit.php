<?php
    $id=$_GET['id'];
    require_once("../config.php");
    $db = new dbObj();
  $conn =  $db->getConnstring();
  mysqli_query($conn,"SET NAMES utf8");
  $sql="select *  from ordermast where oid='$id'";
  $result = mysqli_query($conn,$sql);
  $rows =mysqli_fetch_array($result);
  
    //mysqli_close($conn);
   //print_r($rows);
?>



    <div class="row">

      <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Order No:</label>
                    <input type="text" class="form-control" value="<?php echo $rows['oid']; ?>" name="order_no" readonly />
                  </div>
        </div>

       <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Date:</label>
                    <input type="text" class="form-control" value="<?php echo $rows['odate']; ?>" name="odate" readonly />
                  </div>
        </div>
        
        <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Time:</label>
                    <input type="text" class="form-control" value="<?php echo $rows['otime']; ?>" name="otime" readonly />
                  </div>
        </div>

        <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Table No:</label>
                    <input type="text" class="form-control" value="<?php echo $rows['tabno']; ?>" name="tabno" readonly />
                  </div>
        </div>
        

        
         <div class="col-md-6">
          <div class="form-group">
                    <label for="email" class="control-label">Amount</label>
                    <input type="text" class="form-control" value="<?php echo $rows['amount']; ?>" name="email" readonly />
                  </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
                    <label for="email" class="control-label">OTP</label>
                    <input type="text" class="form-control" value="<?php echo $rows['otp']; ?>" name="otp" readonly />
                  </div>
          </div>

       <div class="col-md-6">
          <div class="form-group">
                    <label for="email" class="control-label">Status</label>


<select class="form-control" name="status">
  <option value="0" <?php if($rows['status']==0){echo "selected";} ?>>Pending </option>
  <option value="1" <?php if($rows['status']==1){echo "selected";} ?>>confirm </option>
</select>



                    
                  </div>
          </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Menu Item Name</th>
        <th>Qty</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
<?php

$sql="select * from orderdetail where oid='".$rows['oid']."'";

//echo $sql;

  $result = mysqli_query($conn,$sql);
  while($row =mysqli_fetch_array($result)){
?>

      <tr>
        <td><?php echo $row['mname']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td><?php echo $row['rate']; ?></td>
        <td><?php echo $row['amount']; ?></td>
      </tr>
   <?php
}
   ?>   
    </tbody>
  </table>

          
</div>





