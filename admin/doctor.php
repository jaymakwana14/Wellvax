<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$D_id=get_safe_value($con,$_GET['D_id']);
		$delete_sql="delete from doctortable where D_id='$D_id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from doctortable order by D_id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">doctors </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>D_id</th>
							   <th>firstname</th>
							   <th>lastName</th>
							   <th>mobile</th>
							   <th>email</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['D_id']?></td>
							   <td><?php echo $row['firstName']?></td>
							   <td><?php echo $row['lastName']?></td>
							   <td><?php echo $row['mobile']?></td>
							   <td><?php echo $row['email']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-delete'><a href='?type=delete&D_id=".$row['D_id']."'>Delete</a></span>";
								?>
							   </td>
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
<?php
require('footer.inc.php');
?>