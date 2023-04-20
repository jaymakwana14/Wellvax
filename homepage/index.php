<?php
require('header.html');
session_start();
?>
<div class="header-inner text-white text-center">
            <div class="container grid">
                <div class="header-inner-left">
                    <h1>Welcome to WellVax<br> <span>LET'S GET VACCINATED</span></h1>
                    <p class="lead">Get Vaccinated Immediately To Avoid Viruses</p>
                    <p class="text text-md"> </p>
                    <!--div class="btn-group">
                        <?php
                        if (isset($_SESSION['email'])){
                        ?>
                        <a href="/wellvax/index.php" class="btn btn-light-blue">Shop</a>
                        <?php
                        }
                        else{
                        ?>
                        <a href="/wellvax/login.php" class="btn btn-light-blue">Sign In</a>
                        <?php
                        }
                        ?>
                    </div-->
                </div>
                <div class="header-inner-right">
                    <img src="images/aboutus_img.png">
                </div>
            </div>
        </div>
    </header>
    <!-- end of header -->

    <main>
        <!-- about section -->
        <section id="about" class="about py">
            <div class="about-inner">
                <div class="container grid">
                    <div class="about-left text-center">
                        <div class="section-head">
                            <h2>About Us</h2>
                            <div class="border-line"></div>
                        </div>


                        <p align="justify" id=" abstract " class="text text-lg ">Wellvax focuses on providing various functionalities to users,admin and docators as well.where as Users can communicate with the odctors directly through chat system.Users can book thier children's vaccin appointment online and
                            can find nearby vaccine center or hospital. Morever , user can explore factual and informative articles about after birth precautions and diet plan for children.Also on Wellvax user can buy baby products and other essentials.on
                            the other hand admin and doctor can keep track all of their work by admin pannel as well as user can keep check on thier child's vaccine status on user pannel.</p>
                    </div>
                    <div class="about-right flex ">
                        <div class="img ">
                            <img src="images/first_header.png ">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of about section -->

        <!-- banner one -->
        <section id="banner-one " class="banner-one text-center ">
            <div class="container text-white ">
                <blockquote class="lead "><i class="fas fa-quote-left "></i> Immunization has been a great public health success story. The lives of millions of children have been saved, millions have the chance of a longer healthier life, a greater chance to learn, to play, to
                    read and write, to move around freely without suffering. <i class="fas fa-quote-right "></i></blockquote>

            </div>
        </section>
        <!-- end of banner one -->

        <!-- services section -->
        <section id="services " class="services py ">
            <div class="container ">
                <div class="section-head text-center ">
                    <h2 class="lead ">Get The Names Of Nearby Children Hospital Or Vaccination Center</h2>
                    <p class="text text-lg ">A perfect process that makes your child's vaccination easier and faster</p>
                    <div class="line-art flex ">
                        <div></div>
                        <img src="images/4-dots.png ">
                        <div></div>
                    </div>
                </div>

            </div>
        </section>
        <!-- end of services section -->

        <!-- banner two section -->
        <section id="banner-two " class="banner-two text-center ">
            <div class="container grid ">
                <div class="banner-two-right ">
                    <p class="lead text-white ">
                        <B>Click here and you can easily find children hospital or vaccination centers nearby from your location</B>
                    </p>
                    <div class="btn-group ">

                        <a href="http://localhost/wellvax/map/index.html" class="btn btn-light-blue ">Click Here</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of banner two section -->



        <!-- doctors section -->
        <section id="doc-panel " class="doc-panel py ">
            <div class="container ">
                <div class="section-head ">
                    <h2>Enjoy Shoping baby Products Here</h2>
                </div>

                <div class="doc-panel-inner grid ">
                    <div class="doc-panel-item ">
                        <div class="img flex ">
                            <img src="images/doc-1.png " alt="doctor image ">
                            <div class="info text-center bg-blue text-white flex ">
                                <p class="lead ">Car Seat Stroller</p>
                                <p class="text-lg ">Price : 9,999/-</p>
                            </div>
                        </div>
                    </div>

                    <div class="doc-panel-item ">
                        <div class="img flex ">
                            <img src="images/doc-2.png " alt="doctor image ">
                            <div class="info text-center bg-blue text-white flex ">
                                <p class="lead ">Crib Toy</p>
                                <p class="text-lg ">Price : 700/-</p>
                            </div>
                        </div>
                    </div>

                    <div class="doc-panel-item ">
                        <div class="img flex ">
                            <img src="images/doc-3.png " alt="doctor image ">
                            <div class="info text-center bg-blue text-white flex ">
                                <p class="lead ">Baby Lotion</p>
                                <p class="text-lg ">Price : 110/-</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of doctors section -->





        <!-- contact section -->
        <section id="contact " class="contact py ">


            <form>
                <button type="submit " class="btn btn-white btn-submit " style="color:white;">
                            <i class = "fas fa-arrow-right "></i><a href="http://localhost/wellvax/index.php" style="color:white;"> Shop now</a>
                        </button>
            </form>
        </section>
        <!-- end of contact section -->
    </main>

    <!-- custom js -->
    <script src="js/script.js "></script>
</body>

<?php
include('footer.html');
?>
</html>