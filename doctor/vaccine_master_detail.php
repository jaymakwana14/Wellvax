<?php 
require('top.inc.php');
require('functions.inc.php');
$vaccine_appointment_id=get_safe_value($con,$_GET['id']);
if (isset($_POST['update_vaccine_status'])) {
  $update_vaccine_status=$_POST['update_vaccine_status'];
  mysqli_query($con,"update `vaccine_appointment` set vaccine_status='$update_vaccine_status' where id='$vaccine_appointment_id'");
}
?>
<html>
<head>
</head>
<body>
<div class="content pb-0">
  <div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h4 class="box-title">vaccine Details</h4>
             </div>
            <div class="card-boy--">
              <div class="table-states order-table ov-h">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="product-thumbnail"> Vaccine Name </th>
                      <th class="product-thumbnail"> Parent Name </th>
                      <th class="product-name"> Child Name </th>
                      <th class="product-price"> Age </th>
                      <th class="product-price"> Mobile </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                   
                   $res=mysqli_query($con,"select `vaccine_appointment`.*,vaccine_status.name as vaccine_status_str from `vaccine_appointment`,vaccine_status where vaccine_status.id=`vaccine_appointment`.vaccine_status and vaccine_appointment.id=$vaccine_appointment_id");
                    $total_price=0;

                    while($row=mysqli_fetch_assoc($res)){
                      $Birth_hospital=$row['Birth_hospital'];
                      $Last_vaccine=$row['Last_vaccine'];
                      $Appoint_date=$row['Appoint_date'];
                      ?>
                    <tr>
                      <td class="product-add-to-cart"><?php echo $row['Vaccine_name']?></td>
                      <td class="product-name"><?php echo $row['Parent_name']?></td>
                      <td class="product-name"><?php echo $row['child_name']?></td>
                      <td class="product-name"><?php echo $row['Age']?></td>
                      <td class="product-name"><?php echo $row['mobile']?></td>
                    </tr>
                    <?php } ?>
                   </tbody>
                  </table>
                  <div id="address_details">
                    <strong>Birth_hospital : </strong>
                    <?php echo $Birth_hospital?><br/><br/>
                    <strong>vaccine Status : </strong>
                    <?php 
                    $vaccine_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select vaccine_status.name from vaccine_status, `vaccine_appointment` where `vaccine_appointment`.id='$vaccine_appointment_id' and `vaccine_appointment`.vaccine_status=vaccine_status.id"));
                    echo $vaccine_status_arr['name'];
                    ?>

                    <div>
                      <form method="post">
                        <select class="form-control" name="update_vaccine_status">
                    <option>Select Status</option>
                    <?php
                    $res=mysqli_query($con,"select * from vaccine_status ");
                    while($row=mysqli_fetch_assoc($res)){
                      if($row['id']==$categories_id){
                        echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                      }else{
                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                      } 
                    }
                    ?>
                  </select>
                  <br/>
                      <input type="submit" class="btn btn-primary btn-block" name="form-control"/>
                      </form>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
<?php require('footer.inc.php')?>
