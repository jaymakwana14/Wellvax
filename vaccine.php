<?php
require('top.php');
/*if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}*/


if (isset($_POST['submit'])) {
    $child_name=get_safe_value($con,$_POST['child_name']);
    $Parent_name=get_safe_value($con,$_POST['Parent_name']);
    $Age=get_safe_value($con,$_POST['Age']);
    $Birth_hospital=get_safe_value($con,$_POST['Birth_hospital']);
    $Vaccine_name=get_safe_value($con,$_POST['Vaccine_name']);
    $Email=get_safe_value($con,$_POST['Email']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $Birth_date=get_safe_value($con,$_POST['Birth_date']);
    $Last_vaccine=get_safe_value($con,$_POST['Last_vaccine']);
    $Appoint_date=get_safe_value($con,$_POST['Appoint_date']);
    $Appoint_time=get_safe_value($con,$_POST['Appoint_time']);
    $user_id=$_SESSION['USER_ID'];
    $vaccine_status='1';
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into `vaccine_appointment`(user_id,child_name,Parent_name,Age,Birth_hospital,Vaccine_name,Email,vaccine_status,added_on,mobile,Birth_date,Last_vaccine,Appoint_date,Appoint_time) values('$user_id','$child_name','$Parent_name','$Age','$Birth_hospital','$Vaccine_name','$Email','$vaccine_status','$added_on','$mobile','$Birth_date','$Last_vaccine','$Appoint_date','$Appoint_time')");
    $vaccine_appointment_id=mysqli_insert_id($con);
    $_SESSION['status'] = "Appointment booked !";
    $_SESSION['status_icon'] = "success";
    $_SESSION['txt'] = "Your Appointment has been Submited";
    $_SESSION['status_msg'] = "Okay";
}else{
    ?>
    
    <?php
}
?>
    <!-- Start Bradcaump area -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/banner.jpg) no-repeat scroll center center / cover ;">
     <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="homepage\index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">vaccine_appointment</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <?php
                                    $accordion_class='accordion__title';
                                        if(!isset($_SESSION['USER_LOGIN'])){ 
                                        $accordion_class='accordion__hide';
                                        ?>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form id="login-form" method="post">
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                               <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
                                                            <span class="field_error" id="login_email_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                 <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
                                                                  <span class="field_error" id="login_password_error"></span>
                                                            </div>
                                                            <p class="require">* Required fields</p>
                                                            <div class="dark-btn">
                                                                <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                                            </div>
                                                             <div class="form-output login_msg">
                                                                 <p class="form-messege field_error"></p>
                                                             </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                                <input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
                                                                <span class="field_error" id="name_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                               <input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
                                                               <span class="field_error" id="email_error"></span>
                                                            </div>
                                                             <div class="single-input">
                                                               <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
                                                                 <span class="field_error" id="mobile_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
                                                                <span class="field_error" id="password_error"></span>
                                                            </div>
                                                            <div class="dark-btn">
                                                                <button type="button" class="fv-btn" onclick="user_register()">Register</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <div class="<?php echo $accordion_class?>">
                                        Vaccine Appointment
                                    </div>
                                    <form method="post">
                                    <?php
      if(isset($_SESSION['status']))
      {
        ?>
          <script>
          swal({
          title: "<?php echo $_SESSION['status'];   ?>",
          text: "<?php echo$_SESSION['txt']?>",
          icon: "<?php echo $_SESSION['status_icon'];   ?>",
          button: "<?php echo $_SESSION['status_msg'];   ?>",
        });
          </script>

        <?php
        }
        unset($_SESSION['status']);
    ?>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                        <p><span>Child Name </span>
                                                            <input type="text" name="child_name" placeholder="Child Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                        <p><span>Parents Name</span>
                                                            <input type="text" name="Parent_name" placeholder="Parents Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <!--input type="number" name="Age" placeholder="Age" required-->
                                                            <span>Age</span>
                                                            <select name="Age">
                                                                <?php
                                                                    for ($i=1; $i<=20; $i++)
                                                                    {
                                                                        ?>
                                                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                        <p><span>Enter Birth Hospital Name</span>
                                                            <input type="text" name="Birth_hospital" placeholder="Enter Birth Hospital Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <!--input type="text" name="Vaccine_name" placeholder="Enter Vaccine Name" required-->
                                                            <p><span>Select Vaccine </span>
                                                         <select id="Select Vaccine" name="Vaccine_name">
                                                <option>BCG, Hep B1, OPV</option>
                                                <option>DTwP /DTaP1, Hib-1, IPV-1, Hep B2, PCV 1,Rota-1</option>
                                                <option>DTwP /DTaP2, Hib-2, IPV-2, Hep B3, PCV 2, Rota-2</option>
                                                <option>DTwP /DTaP3, Hib-3, IPV-3, Hep B4, PCV 3, Rota-3*</option>
                                                <option>Influenza-1</option>
                                                <option>Influenza -2</option>
                                                <option>Typhoid Conjugate Vaccine</option>
                                                <option>MMR 1 (Mumps, measles, Rubella)</option>
                                                <option>Hepatitis A- 1</option>
                                                <option>PCV Booster</option>
                                                <option>MMR 2, Varicella</option>
                                                <option>DTwP /DTaP, Hib, IPV</option>
                                                <option>Hepatitis A- 2**, Varicella 2</option>
                                                <option>DTwP /DTaP, IPV, MMR 3</option>
                                                <option>HPV (2 doses)</option>
                                                <option>Tdap/ Td</option>
                                                <option>Annual Influenza Vaccine</option>
                                                       </select>
                                                  </p>
                                                        </div>
                                                    </div><div class="col-md-12">
                                                        <div class="single-input">
                                                        <p><span>Enter Your Email ID </span>
                                                            <input type="email" name="Email" placeholder="Enter Your Email ID" required>
                                                        </div>
                                                    </div><div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="tel" name="mobile" placeholder="Enter Your Mobile Number" pattern="^\d{10}$" required>
                                                        </div>
                                                    </div><div class="col-md-12">
                                                        <div class="single-input">
                                                            <!--input type="text" name="Last_vaccine" placeholder="Enter Last Vaccine name" required-->
                                                            <p><span>Last Vaccine </span>
                                                         <select id="Last Vaccine" name="Last_vaccine">
                                                <option>BCG, Hep B1, OPV</option>
                                                <option>DTwP /DTaP1, Hib-1, IPV-1, Hep B2, PCV 1,Rota-1</option>
                                                <option>DTwP /DTaP2, Hib-2, IPV-2, Hep B3, PCV 2, Rota-2</option>
                                                <option>DTwP /DTaP3, Hib-3, IPV-3, Hep B4, PCV 3, Rota-3*</option>
                                                <option>Influenza-1</option>
                                                <option>Influenza -2</option>
                                                <option>Typhoid Conjugate Vaccine</option>
                                                <option>MMR 1 (Mumps, measles, Rubella)</option>
                                                <option>Hepatitis A- 1</option>
                                                <option>PCV Booster</option>
                                                <option>MMR 2, Varicella</option>
                                                <option>DTwP /DTaP, Hib, IPV</option>
                                                <option>Hepatitis A- 2**, Varicella 2</option>
                                                <option>DTwP /DTaP, IPV, MMR 3</option>
                                                <option>HPV (2 doses)</option>
                                                <option>Tdap/ Td</option>
                                                <option>Annual Influenza Vaccine</option>
                                                       </select>
                                                  </p>
                                                        </div>
                                                     </div><div class="col-md-12">
                                                        <div class="single-input">
                                                        <div class="contact-title">
                                                             <span><h6>Enter Birthdate</h6><span>
                                                            </div>
                                                            <input type="date" name="Birth_date" placeholder="Enter Birth date" required>
                                                        </div>
                                                    </div><div class="col-md-12">
                                                        <div class="single-input">
                                                        <div class="contact-title">
                                                             <span><h6>select Appoitment date</h6><span>
                                                            </div>
                                                            <input type="date" name="Appoint_date" placeholder="Select Appoint date" required>
                                                        </div>
                                                    </div><div class="col-md-12">
                                                        <div class="single-input">
                                                        <div class="contact-title">
                                                             <span><h6>select Appoitment time</h6><span>
                                                            </div>
                                                            <input type="time" name="Appoint_time" placeholder="Select Appoint time" required>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <input class="btn btn-success" style="padding: 10px;font-weight: 900;font-size: 20px" type="submit" name="submit"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
<?php
require('footer.php');
?>