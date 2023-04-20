<?php 
require('top.inc.php');
$categories='';
$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $categories=$row['categories'];    
    }
    else{
        header('location:index.php');
        die();
    }
    
}

if(isset($_POST['submit'])){
    $categories=get_safe_value($con,$_POST['categories']);

    $res=mysqli_query($con,"select * from categories where categories='$categories'");
    $check=mysqli_num_rows($res);

    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id=$getData['id']){

            }else{
                $msg="Categories already exists";
            }
        }else{
        $msg="Categories already exists";
            }
    }
    
    if($msg==''){
            if(isset($_GET['id']) && $_GET['id']!=''){
                mysqli_query($con,"update categories set categories='$categories' where id='$id'");
                }
            else{
                mysqli_query($con,"insert into categories(categories,status) value('$categories','1')");
        
                }
        header('location:categories.php');
        die();
    }
    
}
    
?>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>Categories Form</strong></div>
                <form method="POST">               
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="categories" class="form-control-label">Categories</label>
                        <input type="text" name="categories" placeholder="Enter Categories name" class="form-control" value="<?php echo $categories?>"  required></div>
                        </div>
                        <button name="submit" class="btn btn-primary btn-lg btn-block">
                        <span name="submit">Submit</span>
                        </button>
                        <div><?php echo $msg ?></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('footer.inc.php'); ?>