<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: login.php");
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Abc Clinic | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medica-load"></div>
        <img src="img/core-img/plus.png" alt="logo">
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 h-100">
                        <div class="main-menu h-100">
                            <nav class="navbar h-100 navbar-expand-lg">
                                <!-- Logo Area  -->
                                <a class="navbar-brand" href="index1.html"><img src="img/core-img/logo.jpg " height="80px" width="80px" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medicaMenu" aria-controls="medicaMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                                <div class="collapse navbar-collapse" id="medicaMenu">
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index1.html">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact.html">Contact</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="login.html">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="signup.html">Sign Up</a>
                                        </li>
                                    </ul>
                                    <!-- Search Form -->
                                    <div class="header-search-form ml-auto">
                                        <form action="#">
                                            <input type="search" class="form-control" placeholder="Input your keyword then press enter..." id="search" name="search">
                                            <input class="d-none" type="submit" value="submit">
                                        </form>
                                    </div>
                                    <!-- Search btn -->
                                    <div id="searchbtn">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Hero Area Start ***** -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide height-800 bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">We provide top <br>medical services</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide height-800 bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">We provide top <br>medical services</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide height-800 bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">We provide top <br>medical services</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Hero Area End ***** -->

    <!-- ***** Contact Info Area Start ***** -->
    <div class="medica-contact-info-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="contact-icon mr-30">
                            <img src="img/icons/alarm-clock.png" alt="">
                        </div>
                        <div class="contact-meta">
                            <p>Monday - Friday 08:00 - 21:00 <br> Saturday and Sunday - CLOSED</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="contact-icon mr-30">
                            <img src="img/icons/envelope.png" alt="">
                        </div>
                        <div class="contact-meta">
                            <p>0000 0000000 | 0000 0000000 <br> abc@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-contact-info d-flex align-items-center">
                        
                        <div class="contact-meta">
                            <p>Abc clinic, Abc road, Abc <br> Abc City</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Contact Info Area End ***** -->

    <!-- ***** About Us Area Start ***** -->
    <section class="medica-about-us-area">
        <!-- Card Area -->
        <div class="medica-card-area">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="medica-emergency-card wow fadeInUp" data-wow-delay="0.2s">
                            <h5>For Emergencies</h5>
                            <h3>+00000 0000000</h3>
                            <p>In any emergency, you can just make al call on our number. And we will be on your door to help you out with the patient at you house.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="medica-doctors-card wow fadeInUp" data-wow-delay="0.4s">
                            <h5>The Doctors</h5>
                            <p>Our All doctors are certified and experienced. They all are always ready to help their patients any time</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Contact -->
        <div class="medica-about-content section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="medica-about-text">
                            <h2>Welcome to <span>Abc</span> clinic</h2>
                            <p>We are available to solve all kind of health problems of you. Our all doctors are certified and experienced. We have doctors in the following specializations:</p>
                            <ul>
                                <li>Chlidren Specialist</li>
                                <li>Allergist</li>
                                <li>Audiologist</li>
                                <li>Dentist</li>
                                <li>Neurologist</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="medica-about-thumbnail">
                            <img src="img/bg-img/doctor.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->

    <!-- ***** Facilities Area Start ***** -->
    <section class="medica-services-area section_padding_100 bg-img gradient-background-overlay" style="background-image: url(img/bg-img/service.jpg);">

        <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area wow fadeInUp" data-wow-delay="0.6s">
                        <img src="img/icons/emergency-call.png" alt="">
                        <h5>Emergency Care</h5>
                        <p>We deals with emergency cases when it's really urgent situation.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="single-service-area">
                        <img src="img/icons/medicine.png" alt="">
                        <h5>Pharmacy</h5>
                        <p>We provide the facility of Pharmacyat our clinic.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Services Area End ***** -->
    
    <!-- ***** CTA Area Start ***** -->
    <section class="medica-call-to-action section_padding_50_0 gradient-background">
        <div class="container">
            <div class="row">
                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-cool-fact wow fadeIn" data-wow-delay="0.2s">
                        <div class="counter-area">
                            <h2><span class="counter">1004</span></h2>
                            <h6>Pacients since opening</h6>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-cool-fact wow fadeIn" data-wow-delay="0.6s">
                        <div class="counter-area">
                            <h2><span class="counter">20</span></h2>
                            <h6>Specialist Doctors </h6>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-cool-fact wow fadeIn" data-wow-delay="1s">
                        <div class="counter-area">
                            <h2><span class="counter">8</span></h2>
                            <h6>Years of Experience</h6>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- ***** CTA Area End ***** -->

   

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area">
        <!-- Main Footer Area -->
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="bottom-footer-content h-100 d-md-flex align-items-center justify-content-between">
                            <!-- Copywrite Text -->
                            <div class="copywrite-text">
                                <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.</a>
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>