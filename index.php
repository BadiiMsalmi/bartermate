<?php
session_start();
error_reporting(0);
if($_SESSION['u_id'] != null){
  header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BarterMate | The Eco-Friendly Item Exchange Platform</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  

  <!-- =======================================================
  * Template Name: BarterMate - v4.3.0
  * Template URL: https://bootstrapmade.com/BarterMate-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    #text-box{
      display: flex;
      flex-direction: column;
      height: 100%;
      justify-content: center;
      margin: 2rem;
      text-align: left;
}



  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">BarterMate</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link" href="login.php">Login/Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="container-fluid">

    <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/img/envp.svg" class="d-block mx-lg-auto img-fluid" alt="Agreement" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6 text-light">
        <h1 class="display-5 fw-bold lh-1 mb-3"><strong><span id="synonyms">Swap</span></strong> with <br><span>BarterMate</span></h1>
        <h6 class="lead text-success mt-3">
            <span style="text-decoration: line-through;" class="text-danger">Waste</span> Exchange
        </h6>
        <h6 class="lead mt-3">Why Waste Un-Wanted Items when You Can Swap Them For Things that You Actually Need.</h6>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
          <a href="#about" class="scrollto"><button type="button" class="btn btn-outline-success btn-lg px-4 me-md-2" style="border-radius: 0;">Read More</button></a>
        </div>
      </div>
    </div>
  </div>


    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

     <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about" data-aos="fade-up">
            <div class="container">

                <div class="section-title">
                    <h2>About</h2>
                    <p>Who we are</p>
                </div>

                <div class="row content" >
                    <div class="col-lg-6" style="line-height: 2rem;">
                        <p>
                            BarterMate Is The Next Generation Of Eco-Friendly Apps That Revolutionize The Way Bartering Is Done.
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i>Reducing Physical Waste</li>
                            <li><i class="ri-check-double-line"></i>Promoting Re-Using and Recycling</li>
                            <li><i class="ri-check-double-line"></i>Increasing Availability Of Products To Wide Range Of People</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-0 pt-lg-0s ">
                        

                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features" data-aos="fade-up">
            <div class="container">

                <ul class="nav nav-tabs row d-flex">
                    <li class="nav-item col-4" >
                        <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                            <i class="ri-recycle-fill"></i>
                            <h4 class="d-none d-lg-block">Eco-Friendly Practice</h4>
                        </a>
                    </li>
                    <li class="nav-item col-4" >
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                            <i class="ri-checkbox-multiple-blank-fill"></i>
                            <h4 class="d-none d-lg-block">Multiple Swap Functionality</h4>
                        </a>
                    </li>
                   
                    <li class="nav-item col-4" >
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                            <i class="ri-e-bike-2-line"></i>
                            <h4 class="d-none d-lg-block">Home Delivery</h4>
                        </a>
                    </li>
                </ul>

                <div class="tab-content" >
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Give Your Trash Some Use</h3>
                                <p>
                                    BarterMate gives you an opportunity to trade your old, un-used items with someone else for new ones. This way, those un-used goods can come of use to someone, instead of ending up in a landfill.
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Chat with traders through our platform</li>
                                    <li><i class="ri-check-double-line"></i> Pick a suitable time and place for the trade</li>
                                    <li><i class="ri-check-double-line"></i> Rendezvous at the decided place and exchange your un-used goods</li>
                                </ul>
                                <p class="fst-italic">
                                    Please keep in mind that in case of any one of the traders not arriving at the decided place on the time agreed upon, BarterMate will not be responsible. Our job is to provide you a platform to communicate. Anything beyond that is out of our authority.
                                </p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/img/undraw_takeout_boxes_ap54.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Swap Multiple Items For A Single One</h3>
                                <p>
                                    No one would be ready to give you the latest Macbook for an old android phone right? That is why BarterMate allows you to select multiple items to trade for a single one. Just discuss with the trader regarding the things they want in exchange for their
                                    products and the rest is up to us.
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Decide the various items you will give</li>
                                    <li><i class="ri-check-double-line"></i> Add them to your list of items on BarterMate</li>
                                    <li><i class="ri-check-double-line"></i> Select those various items and trade for a single item in return</li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/img/eastwood-moving-transportation-of-things.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Get Your Items At Your Doorstep</h3>
                                <p>
                                    BarterMate offers you deliver services so you do not have to as much as move from your seat.
                                </p>
                                <p class="fst-italic">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Effort-saving service</li>
                                    <li><i class="ri-check-double-line"></i> Items delivered in under a week</li>
                                    <li><i class="ri-check-double-line"></i> Reasonable delivery charges</li>
                                </ul>
                                <p class="fst-italic">
                                    Delivery charges will be more for free-package users than premium-package users.
                                </p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/img/8309.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Features Section -->

        <!-- ======= Cta Section =======
        <section id="cta" class="cta" data-aos="fade-up">
            <div class="container">

                <div class="row" >
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>Call To Action</h3>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="#">Call To Action</a>
                    </div>
                </div>

            </div>
        </section>
        End Cta Section -->

        <!-- ======= Portfolio Section ======= -->
        <!-- <section id="portfolio" class="portfolio" data-aos="fade-up">
            <div class="container">

                <div class="section-title" >
                    <h2>Store</h2>
                    <p>Browse Listed Items</p>
                </div>

                <ul id="portfolio-flters" class="d-flex justify-content-end" >
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>

                <div class="row portfolio-container" >

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </section> -->
        <!-- End Portfolio Section -->

        <!-- ======= Pricing Section ======= -->
        <!-- <section id="pricing" class="pricing" data-aos="fade-up">
            <div class="container">

                <div class="section-title" >
                    <h2>Pricing</h2>
                    <p>Our Paid Services</p>
                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="box" >
                            <h3>Free</h3>
                            <h4><sup>$</sup>0<span> / month</span></h4>
                            <ul>
                                <li>Swap Up to 3 Items</li>
                                <li>Delivery Services</li>
                                <li>Standard Customer Services</li>
                                <li class="na">Unlimited Trading</li>
                                <li class="na">Discounted Delivery Services</li>
                                <li class="na">Special Customer Services</li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-4 mt-md-0">
                        <div class="box featured"  >
                            <h3>Premium</h3>
                            <h4><sup>$</sup>19<span> / month</span></h4>
                            <ul>
                                <li>Swap up to 3 items</li>
                                <li>Discounted Delivery Services</li>
                                <li>Special Customer Service</li>
                                <li>Unlimited Trading</li>
                                <li></li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="200">
                            <h3>Developer</h3>
                            <h4><sup>$</sup>29<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="300">
                            <span class="advanced">Advanced</span>
                            <h3>Ultimate</h3>
                            <h4><sup>$</sup>49<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>
                   
                </div>

            </div>
        </section> -->
        <!-- End Pricing Section -->

     
        <!-- End F.A.Q Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team" data-aos="fade-up">
            <div class="container">

                <div class="section-title" >
                    <h2>Team</h2>
                    <p>Our Hardworking Team</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">
                                <img style="height:300px;" src="assets/img/team/badii.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="https://www.facebook.com/msalmi.badii/"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.linkedin.com/in/badii-msalmi/"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Badii Msalmi</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" >
                            <div class="member-img">
                                <img style="height:300px;" src="assets/img/team/mayssa.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="https://www.facebook.com/profile.php?id=100008832750564"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.linkedin.com/in/maissa-ben-fredj-a5b2951b9/"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Mayssa Ben Fredj</h4>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
        <!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact" data-aos="fade-up">
            <div class="container">

                <div class="section-title" >
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4" >
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>L' ISET de Radès, Av. de France, Radès</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>BarterMate@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+216 58 562 292</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>BarterMate</h3>
      <p>Solving the Problem of Physical Waste by Providing an Item Exchange Platform</p>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
          
    var text = ["<span class='text-success'>Swap</span>","<span class='text-primary'>Barter</span>","<span class='text-warning'>Trade</span>","<span class='text-danger'>Exchange</span>"];
    var counter = 0;
    var elem = document.getElementById("synonyms");
    var inst = setInterval(change, 800);

    function change() {
      elem.innerHTML = text[counter];
      counter++;
      if (counter >= text.length) {
        counter = 0;
        // clearInterval(inst); // uncomment this if you want to stop refreshing after one cycle
      }
    }

  </script>

</body>

</html>