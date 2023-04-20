
<?php 
require('top.php');
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/banner.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="homepage\index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Thank You</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail"> vaccine_appointment ID</th>
                                                <th class="product-name"><span class="nobr"> Book Date </span></th>
                                                <th class="product-price"><span class="nobr"> Vaccine Name </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Child Name </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Parent Name </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Vaccine Status </span></th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $uid=$_SESSION['USER_ID'];
                                            $res=mysqli_query($con,"select `vaccine_appointment`.*,vaccine_status.name as vaccine_status_str from `vaccine_appointment`,vaccine_status where `vaccine_appointment`.user_id='$uid' and vaccine_status.id=`vaccine_appointment`.vaccine_status");
                                            while($row=mysqli_fetch_assoc($res)){
                                                $vaccine_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select vaccine_status.name from vaccine_status, `vaccine_appointment` where `vaccine_appointment`.id='".$row['id']."' and `vaccine_appointment`.vaccine_status=vaccine_status.id"));
                                                ?>
                                            <tr>
                                               <td class="product-add-to-cart"><a href="#"> <?php echo $row['id']?></a></td>
                                                <td class="product-name"><?php echo $row['Appoint_date']?></td>
                                                <td class="product-name"><?php echo $row['Vaccine_name']?><br/></td>
                                                <td class="product-name"> <?php echo $row['child_name']?><br/></td>
                                                <td class="product-name"><?php echo $row['Parent_name']?></td>
                                               <td class="product-name"><?php echo $vaccine_status_arr['name']?></td>
                                            </tr>
                                        <?php } ?>
                                           </tbody>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
<?php require('footer.php')?>        
