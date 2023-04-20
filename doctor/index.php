<?php

session_start();
include ('header.php');
include ('helper.php');

$doctortable = array();


if(isset($_SESSION['D_id'])){
    require ('mysqli_connect.php');
    $doctortable = get_doctortable_info($con, $_SESSION['D_id']);
}

?>

<section id="main-site">
    <div class="container py-5">
        <div class="row">
            <div class="col-4 offset-4 shadow py-4">
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <img class="img rounded-circle" style="width: 200px; height: 200px;" src="<?php echo isset($doctortable['profileImage']) ? $doctortable['profileImage'] : './assets/profile/beard.png'; ?>" alt="">
                        <h4 class="py-3">
                            <?php
                            if(isset($doctortable['firstName'])){
                                printf('%s %s', $doctortable['firstName'], $doctortable['lastName'] );
                            }
                            ?>
                        </h4>
                    </div>
                </div>

                <div class="user-info px-3">
                    <ul class="font-ubuntu navbar-nav">
                        <li class="nav-link"><b>First Name: </b><span><?php echo isset($doctortable['firstName']) ? $doctortable['firstName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Last Name: </b><span><?php echo isset($doctortable['lastName']) ? $doctortable['lastName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Email: </b><span><?php echo isset($doctortable['email']) ? $doctortable['email'] : ''; ?></span></li>
                        <li class="nav-link"><b>mobile: </b><span><?php echo isset($doctortable['mobile']) ? $doctortable['mobile'] : ''; ?></span></li>
                        <div class="submit-btn text-center my-5">
                            <button type="submit" class="btn btn-warning rounded-pill text-dark px-5"><a href="doctor.php">Continue</a></button>
                        </div>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>
