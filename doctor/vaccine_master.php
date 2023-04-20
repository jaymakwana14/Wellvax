<?php 
require('top.inc.php');



$sql="select * from vaccine_appointment ";
$res=mysqli_query($con,$sql);
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
            <h4 class="box-title">vaccine_appointments</h4>
             </div>
            <div class="card-boy--">
              <div class="table-states order-table ov-h">
                <table class="table">
                  <thead>
                   <tr>
                    <th class="product-thumbnail">  vaccine_appointment ID </th>
                    <th class="product-name"><span class="nobr"> book Date </span></th>
                    <th class="product-price"><span class="nobr"> Vaccine_name </span></th>
                    <th class="product-stock-stauts"><span class="nobr"> Child_name </span></th>
                    <th class="product-stock-stauts"><span class="nobr"> parent_name </span></th>
                    <th class="product-stock-stauts"><span class="nobr"> Age </span></th>
                    <th class="product-stock-stauts"><span class="nobr"> mobile </span></th>
                    <th class="product-stock-stauts"><span class="nobr"> email </span></th>
                   </tr>
                  </thead>
                  <tbody>
                   <?php 
                   $res=mysqli_query($con,"select `vaccine_appointment`.*,vaccine_status.name as vaccine_status_str from `vaccine_appointment`,vaccine_status where vaccine_status.id=`vaccine_appointment`.vaccine_status");
                    while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                     <td class="product-add-to-cart"><a href="vaccine_master_detail.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></td>
                     <td class="product-name"><?php echo $row['added_on']?></td>
                     <td class="product-name"><?php echo $row['Vaccine_name']?></td>
                     <td class="product-name"> <?php echo $row['child_name']?></td>
                     <td class="product-name"> <?php echo $row['Parent_name']?></td>                          
                     <td class="product-name"><?php echo $row['Age']?></td>
                     <td class="product-name"><?php echo $row['mobile']?></td>
                     <td class="product-name"><?php echo $row['Email']?></td>
                    </tr>
                    <?php } ?>
                   </tbody>
                  </table>
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
