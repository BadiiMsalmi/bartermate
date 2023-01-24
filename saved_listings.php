<?php
include('DBCONNECT.php');
session_start();
if($_SESSION['u_id'] == null){
  header('location:index.php');
}
else{
  $u_id = $_SESSION['u_id'];
}

$getuserdetailssql = "SELECT * FROM users WHERE U_ID = '$u_id'";
$getuserdetails = mysqli_query($connectionString,$getuserdetailssql);

$userdetailsarr = mysqli_fetch_array($getuserdetails);

$user_name = $userdetailsarr['U_NAME'];
$user_ver_state = $userdetailsarr['U_VER'];
$user_img = $userdetailsarr['U_IMG_URL'];


$getalllistingssql = "SELECT * FROM saved_products
        INNER JOIN products ON saved_products.S_P_ID = products.P_ID
        INNER JOIN product_categories ON products.P_CATEGORY = product_categories.PC_ID
        WHERE saved_products.S_BY_U_ID = '$u_id'";
$getalllistings = mysqli_query($connectionString,$getalllistingssql);

$curr_date = date("Y-m-d");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Saved Listings | BarterMate</title>
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
</head>

<style>
  .ri-lg:before {
    
    float: right;
}
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">BarterMate</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

        <?php include_once('navbar.php') ?>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Saved Listings</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Saved Listings</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page" style="min-height: 20rem;">
      <div class="container">

        <center><h3>Saved Listings<span class='text-muted'> (<?php echo mysqli_num_rows($getalllistings)?>)</span></h3></center>


        <div class="col mt-5">
          <?php
          while ($saved_row = mysqli_fetch_assoc($getalllistings)) {

          if($saved_row == null){
                      echo "<center>
                  <h3 class='text-muted'>No Listings Found!</h3>
                  <br>
                  </center>";
          }

          else{
  
          $l_id = $saved_row['P_ID'];

          $existingproductimagessql = "SELECT * FROM product_images WHERE PI_P_ID = '$l_id'";
          $existingproductimages = mysqli_query($connectionString,$existingproductimagessql);

          $imagearr = mysqli_fetch_array($existingproductimages);
          $imageurl = $imagearr['PI_IMG_URL'];

           if($saved_row['P_FEATURED'] == 0){
              $featured = 'hidden';
              $color = 'secondary'; 
            }
            else if($saved_row['P_FEATURED'] == 1){
              $featured = '';
              $color = 'warning';
            }
       
          ?>

          <div class="card border-<?php echo $color?> p-0" style="max-width: 25rem; align-self: center; margin: auto !important;">

               
                 <img src="<?php echo $imageurl?>" class="card-img-top d-flex img-responsive img-fluid" style="object-fit:scale-down; background-color: black; aspect-ratio: 16 / 9;" alt="...">

                <div class="card-body">

                  <h6 class="card-title row">
                    <a href="listing_details.php?id=<?php echo $l_id?>" class="col-10"><strong ><?php echo $saved_row['P_NAME']?></strong></a>
                     <?php 
                      if($saved_row['P_EXC_TYPE'] == 0){
                      ?>
                      <i class='ri-coin-fill ri-lg col text-warning' title='Money Preferred'></i> 
                      <?php
                      }
                      else if($saved_row['P_EXC_TYPE'] == 1){
                      ?>
                      <i class='ri-swap-line ri-lg col text-info' title='Physical Product Swap Preferred'></i>
                      <?php
                      }
                    ?>
                  </h6>

                    <div class="row mt-2">

                   

                <span class="col">
                  <?php
                    if($saved_row['P_EXC_TYPE'] == '0'){
                  ?>
                  <strong><small>PKR <span class="text-success"><?php echo $saved_row['P_MONETARY_VAL']?></span></small></strong>
                  <?php
                  }
                  else if($saved_row['P_EXC_TYPE'] == '1'){
                    echo "<span style='font-size:small;'>Swap Available</span>";
                  }
                  ?>
                </span>

                 

                </div>

            <hr>

              <div class="row" style="align-items: flex-end;">

                    <span class="col-4">
                    <?php
                      $checksavedsql = "SELECT * FROM saved_products WHERE S_P_ID = '$l_id' AND S_BY_U_ID = '$u_id'";
                      $checksaved = mysqli_query($connectionString,$checksavedsql);

                    if(mysqli_num_rows($checksaved) == 0){
                    ?>
                     <a style="float: left; align-self: flex-end;" href="save_listing.php?id=<?php echo $p_id?>"><i class="ri-save-line ri-xl" style="align-self: center;" title="Save Listing"></i></a>
                    <?php
                    }
                    else{
                    ?>
                    <a style="float: left;" href="unsave_listing.php?id=<?php echo $l_id?>"><i class="ri-save-fill ri-xl" style="align-self: center;" title="Un-Save Listing"></i></a>
                    <?php 
                    }
                    ?>
                   </span>

                    <span class="text-muted col-8">
                      <span style=" align-self: center; float:right; font-size: small;">
                    <?php 

                    $months = date('m' ,strtotime($curr_date) - strtotime($saved_row['P_CREATE_DATE']));
                    $days = date('d' ,strtotime($curr_date) - strtotime($saved_row['P_CREATE_DATE']));

                    if($months >= 12){
                      echo "<strong>",floor($months/12) , "</strong> Year/s Old";
                    }
                    else if($months < 12){
                      echo  "<strong>",$months , "</strong> Month/s Old";
                    }
                    ?>
                    </span>
                    </span>

              </div>

                  
                </div>
                <span class="badge rounded-pill bg-warning text-dark col-12 m-0 p-1" style="border-radius: 0px !important;" <?php echo $featured?> >Featured</span>
              </div>

              

              <br>
          <?php
           }
           }
          ?>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

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

</body>

</html>