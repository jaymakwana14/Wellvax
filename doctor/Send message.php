<?php
require('top.inc.php');
require('functions.inc.php');

$message='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from messages where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$message=$row['message'];
		
	}else{
		header('location:contact_us.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$message=get_safe_value($con,$_POST['message']);
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$update_sql="update message set id='id',message='$message', where id='$id'";
			}else{
				$update_sql="update product set id='id',message='$message',where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into messages(message) values('$message')");
		}
		header('location:contact_us.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Send Message</strong></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
					          <div class="form-group">
									<label for="categories" class=" form-control-label">Send message</label>
									<textarea name="message" placeholder="type message" class="form-control" required><?php echo $message?></textarea>
								</div>
								<button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>
