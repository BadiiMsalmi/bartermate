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


$p_id = $_GET['id'];

$checkpreviewsql = "SELECT P_ID FROM products WHERE P_ID = '$p_id' AND P_BY_U_ID = '$u_id'";
$checkpreview = mysqli_query($connectionString,$checkpreviewsql);

if(mysqli_num_rows($checkpreview) > 0){
    $action_btns = "disabled";
}
else{
    $action_btns = " ";
}

$getallproductinfosql = "SELECT * FROM products
INNER JOIN product_categories ON products.P_CATEGORY = product_categories.PC_ID
INNER JOIN users ON products.P_BY_U_ID = users.U_ID
WHERE products.P_ID = '$p_id'";
$getallproductinfo = mysqli_query($connectionString,$getallproductinfosql);

$product_info_array = mysqli_fetch_array($getallproductinfo);

if($product_info_array['P_BY_U_ID'] == $u_id){
  $_SESSION['views'] = 0;
}

else if($product_info_array['P_BY_U_ID'] != $u_id){
  $_SESSION['views'] = 0;
  if(isset($_SESSION['views'])){
  $addviewsql = "UPDATE products SET P_VIEWS = P_VIEWS + 1 WHERE P_ID = '$p_id'";
  $addview = mysqli_query($connectionString,$addviewsql);
  unset($_SESSION['views']);
}

}

$p_category = $product_info_array['P_CATEGORY'];
$p_name = $product_info_array['P_NAME'];

//--//

$getproductssql = "SELECT * FROM products 
INNER JOIN product_categories ON products.P_CATEGORY = product_categories.PC_ID 
INNER JOIN users ON products.P_BY_U_ID = users.U_ID
WHERE products.P_ID <> '$p_id'
ORDER BY P_VIEWS ASC,P_CREATE_DATE DESC; ";
$getproducts = mysqli_query($connectionString,$getproductssql);

$curr_date = date("Y-m-d");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Listing Details | BarterMate</title>
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
  <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BarterMate - v4.3.0
  * Template URL: https://bootstrapmade.com/BarterMate-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
#owl-demo .item{
  color: black;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  text-align: center;
}

.card-body:hover{
  opacity: 80%;
}

#swap_product_box{
    border:1px dotted gray;
    cursor: pointer;
}

#swap_product_box:hover{
    border:2px solid gray;
}

.disableClick{
    pointer-events: none;
}


</style>
</head>

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
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 >Listing Details</h2>
          <ol>
            <li><a href="explore.php">Explore</a></li>
            <li>Listing Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">


        <?php 
        if($product_info_array == null){
        echo "<br><div style='text-align: center;'>
        <h3 class='text-muted'>Listing Not Found</h3>
        <h6 class='text-muted'>May Have Been Removed Or Does Not Exist!</h6>
        <br>
        </div>";
        }
        else{
        ?>

        <div class="row gy-4">

          <div class="col-lg-8">
            <span class="row">
              <h2 class="col-10" style="align-self: center;"><?php echo $product_info_array['P_NAME'] ?></h2>
                    <?php
                      $checksavedsql = "SELECT * FROM saved_products WHERE S_P_ID = '$p_id' AND S_BY_U_ID = '$u_id'";
                      $checksaved = mysqli_query($connectionString,$checksavedsql);

                    if(mysqli_num_rows($checksaved) == 0){
                    ?>
                     <a class="col" style="float: right; align-self: flex-end;" href="save_listing.php?id=<?php echo $p_id?>"><i class="ri-save-line ri-3x" style="align-self: center; float: right;" title="Save Listing"></i></a>
                    <?php
                    }
                    else{
                    ?>
                    <a class="col" href="unsave_listing.php?id=<?php echo $p_id?>"><i class="ri-save-fill ri-3x" style="align-self: center; float: right;" title="Un-Save Listing"></i></a>
                    <?php 
                    }
                    ?>
              </span>      

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-inner">
                <?php
                $getallimagessql = "SELECT * FROM product_images WHERE PI_P_ID = '$p_id'";
                $getallimages = mysqli_query($connectionString,$getallimagessql);

                $first_active = 'active';

                while($image_row = mysqli_fetch_assoc($getallimages)){
                ?>

                <div class="carousel-item <?php echo $first_active?>">
                  <img src="<?php echo $image_row['PI_IMG_URL'] ?>" class="d-block w-100" style="max-height:40rem; object-fit:scale-down; background-color: black; aspect-ratio: 16 / 9; background-color: black;" alt="">
                </div>

                <?php
                $first_active = ' ';
                }
                ?>
          </div>
           <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              
            </div>

            <br> 

            <div class="portfolio-description p-2" > 
              <p>
                <?php echo $product_info_array['P_DESC'] ?>
              </p>

               <div class="other-info">
               <?php 
               if($product_info_array['P_EXC_TYPE'] == 0){
               ?>

               <div style="text-align: center;">
               <h2><small>Price:</small> <strong>PKR <span class="text-success"><?php echo $product_info_array['P_MONETARY_VAL'] ?>/-</span></strong></h2>
               </div>

               <?php
               }
               else{
               ?>

               <h4>
                <strong>Exchange With</strong>
                <ul style="list-style: square;">
                <?php 
                $getprefsql = "SELECT * FROM product_exchange_prefs 
                INNER JOIN product_categories ON product_exchange_prefs.PE_PC_ID = product_categories.PC_ID
                WHERE PE_P_ID = '$p_id'";
                $getpref = mysqli_query($connectionString,$getprefsql);

                while ($pref_row = mysqli_fetch_assoc($getpref)) {
                ?>
                <li><?php echo $pref_row['PC_NAME']?></li>
               <?php
                }
                ?>
                </ul>
              </h4>
                <?php
               }
               ?>
              </div>
            </div>

          

          </div>

          <div class="col-lg-4 ml-3 ">   

            <div class="contact-box mt-3">
            
              <?php 
              if($product_info_array['P_EXC_TYPE'] == 0){
                $text_to = "Buy Request";
                $init = "buy";
              }
              else if($product_info_array['P_EXC_TYPE'] == 1){
                $text_to = "Swap Deal";
                  $init = "swap";
              }
              ?>

                <a class="btn btn-primary col-12 text-light <?php echo $action_btns?>" href="chat.php?i=<?php echo $product_info_array['P_BY_U_ID']?>"><i style="vertical-align: sub;" class="ri-chat-3-line ri-lg"></i>  Chat Now</a>
                <a class="btn btn-success col-12 mt-2 text-light <?php echo $action_btns?>" href="initiate_<?php echo $init?>.php?sp=<?php echo $product_info_array['P_ID']?>"> <i style="vertical-align: sub;" class="ri-exchange-funds-line ri-lg"></i>  Initiate <?php echo $text_to?></a>
              </div>


             <div class="portfolio-info p-4 mt-3 row">
              <h3>Other Information</h3>
              <ul>
                <li><strong>Category</strong>: <?php echo $product_info_array['PC_NAME']?></li>
                <li><strong>Owner</strong>: <a href="profile.php?id=<?php echo $product_info_array['P_BY_U_ID']?>"><?php echo $product_info_array['U_NAME']?></a></li>
                <li><strong>Date Posted</strong>: <?php echo date('d-m-Y',strtotime($product_info_array['P_CREATE_DATE'])) ?>
                </li>
                <li><strong>Swap Type</strong>: 
              <?php 
              if($product_info_array['P_EXC_TYPE'] == 0){
                
              ?>
              Money Preferred
              <?php
              }
              else if($product_info_array['P_EXC_TYPE'] == 1){
                
              ?>
              Product Swap Preferred
              <?php
              }
            ?>
                </li>
              </ul>
            </div>

            
           
          </div>

        </div>

        <?php
      }
        ?>

        <br>

<hr>
        <div class="row">

        <a href="explore.php"><h3>Browse</h3></a>
        <h5>Related Products</h5>

<br>
    <div class="products swiper-container">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper mt-4">
            <!-- Slides -->

            <?php
            while($p_row = mysqli_fetch_assoc($getproducts)){

            $p_id = $p_row['P_ID'];

            $getallproductimagessql = "SELECT PI_IMG_URL FROM product_images WHERE PI_P_ID = '$p_id' LIMIT 0,1";
            $getallproductimages = mysqli_query($connectionString,$getallproductimagessql);

            if($p_row['P_FEATURED'] == 0){
              $featured = 'hidden';
              $color = 'secondary'; 
            }
            else if($p_row['P_FEATURED'] == 1){
              $featured = '';
              $color = 'warning';
            }
        ?> 


            <div class="swiper-slide">
              
              
              <div class="card border-<?php echo $color?> p-0" style="max-width: 18rem; margin: auto !important; align-self: center;">

                 <?php 
                  while ($img_row = mysqli_fetch_assoc($getallproductimages)) {
                  ?>

                 <img src="<?php echo $img_row['PI_IMG_URL']?>" class="card-img-top d-flex img-responsive img-fluid" style="object-fit:scale-down; background-color: black; aspect-ratio: 16 / 9;" alt="...">

                  <?php    
                  }
                  ?>


                
                <div class="card-body">

                  <h6 class="card-title row">
                    <a href="listing_details.php?id=<?php echo $p_id?>" class="col-10"><strong ><?php echo $p_row['P_NAME']?></strong></a>
                     <?php 
                      if($p_row['P_EXC_TYPE'] == 0){
                      ?>
                      <i class='ri-coin-fill ri-lg col text-warning' title='Money Preferred'></i> 
                      <?php
                      }
                      else if($p_row['P_EXC_TYPE'] == 1){
                      ?>
                      <i class='ri-swap-line ri-lg col text-info' title='Physical Product Swap Preferred'></i>
                      <?php
                      }
                    ?>
                  </h6>

                    <div class="row mt-2">

                   

                <span class="col">
                  <?php
                    if($p_row['P_EXC_TYPE'] == '0'){
                  ?>
                  <strong><small>PKR <span class="text-success"><?php echo $p_row['P_MONETARY_VAL']?></span></small></strong>
                  <?php
                  }
                  else if($p_row['P_EXC_TYPE'] == '1'){
                    echo "<span style='font-size:small;'>Swap Available</span>";
                  }
                  ?>
                </span>

                 

                </div>

            <hr>

              <div class="row" style="align-items: flex-end;">

                    <span class="col-4">
                    <?php
                      $checksavedsql = "SELECT * FROM saved_products WHERE S_P_ID = '$p_id' AND S_BY_U_ID = '$u_id'";
                      $checksaved = mysqli_query($connectionString,$checksavedsql);

                    if(mysqli_num_rows($checksaved) == 0){
                    ?>
                     <a style="float: left; align-self: flex-end;" href="save_listing.php?id=<?php echo $p_id?>"><i class="ri-save-line ri-xl" style="align-self: center;" title="Save Listing"></i></a>
                    <?php
                    }
                    else{
                    ?>
                    <a style="float: left;" href="unsave_listing.php?id=<?php echo $p_id?>"><i class="ri-save-fill ri-xl" style="align-self: center;" title="Un-Save Listing"></i></a>
                    <?php 
                    }
                    ?>
                   </span>

                    <span class="text-muted col-8">
                      <span style=" align-self: center; float:right; font-size: small;">
                    <?php 

                    $months = date('m' ,strtotime($curr_date) - strtotime($p_row['P_CREATE_DATE']));
                    $days = date('d' ,strtotime($curr_date) - strtotime($p_row['P_CREATE_DATE']));

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

              

            </div>

        <?php
        }
        ?>    
          
          </div>
          <!-- If we need pagination -->
          

          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

          <!-- If we need scrollbar -->
          
      </div>

      </div>
    </section><!-- End Portfolio Details Section -->

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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/owlcarousel/owl.carousel.min.js"></script>


  <script>



 $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
  </script>

</body>

</html>