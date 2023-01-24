<?php
include('DBCONNECT.php');
error_reporting(0);
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


$getproductssql = "SELECT * FROM products INNER JOIN product_categories ON products.P_CATEGORY = product_categories.PC_ID 
INNER JOIN users ON products.P_BY_U_ID = users.U_ID
WHERE products.P_STATUS = '1'
ORDER BY P_VIEWS DESC; 
";
$getproducts = mysqli_query($connectionString,$getproductssql);

$curr_date = date("Y-m-d");

$getalllistingssql = "SELECT * FROM products WHERE P_BY_U_ID = '$u_id'";
$getalllistings = mysqli_query($connectionString,$getalllistingssql);

$num_of_listings = mysqli_num_rows($getalllistings);

$getallsavedsql = "SELECT * FROM saved_products WHERE S_BY_U_ID = '$u_id'";
$getallsaved = mysqli_query($connectionString,$getallsavedsql);

$num_of_saved = mysqli_num_rows($getallsaved);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home | BarterMate</title>
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



</head>

<style>
#owl-demo .item{
  color: black;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  text-align: center;
}

.carousel-control-prev-icon, .carousel-control-next-icon{
  background-color: black;
}

.products {
  width: 100%;
  height: 100%;
}

#panel-cards > .card{
  margin: 0 auto !important;
}

@media screen and (max-width: 990px) {
  #panel-cards-mobile{
    display: block;
  }
}


</style>


<body class="animate_animated animate__slideInLeft">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
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
          <h2>Home</h2>
          <ol>
            <li>Welcome, <?php echo $user_name?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  
    <section class="inner-page">


<div class="position-fixed bottom-0 start-50 translate-middle-x p-3" style="z-index: 11">
  <div id="liveToast" class="toast hide bg-success text-light " role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body d-flex row">
      <div style="align : center;" >
     <i class="ri-check-double-line ri-xl col-1" style="align-self: center; vertical-align: -0.25rem;"></i> <span class="col">Listing Saved Successfully</span>
</div>
    </div>
  </div>
</div>

      <div class="container">

        <div class="row m-auto" id="panel-cards">

       <div class="card border-danger text-danger p-0 col-md-5 col-lg-2">
        <a href="contacts.php">
         <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              @
              <span class="visually-hidden">unread messages</span>
          </span>   
        <div class="card-header"><i class="ri-chat-3-line ri-md"></i></div>
        <div class="card-body text-dark">
          <p class="card-title">Chat Box</p>
        </div>
        </a>
      </div>    
      
      <div class="card border-success text-success p-0  col-md-5 col-lg-3">
        <a href="add_listing.php">  
        <div class="card-header"><i class="ri-add-line ri-md"></i></div>
        <div class="card-body text-dark">
          <p class="card-title">Add New Listing</p>
        </div>
        </a>
      </div>
      
    

      <div class="card border-info text-info mb-4 p-0  col-md-5 col-lg-3 ">
        <a href="product_listings.php"> 
         <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
              <?php echo $num_of_listings?>
              <span class="visually-hidden">unread messages</span>
          </span> 
        <div class="card-header"><i class="ri-list-check ri-md"></i></div>
        <div class="card-body text-dark">
          <p class="card-title">Manage Listings</p>
          
        </div>
        </a>
      </div>

      <div class="card border-warning text-warning mb-4 p-0  col-md-5 col-lg-2 ">
        <a href="saved_listings.php">
           <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
              <?php echo $num_of_saved?>
              <span class="visually-hidden">unread messages</span>
            </span>
        <div class="card-header"><i class="ri-save-3-fill ri-md"></i></i></div>
        <div class="card-body text-dark">
          <p class="card-title">Saved Listings</p>
        </div>
        </a>
      </div>

        </div>  

        <div class="row m-auto" id="panel-cards-mobile" style="display: none;">
          <button type="button" class="btn btn-outline-danger btn-lg col-md-5 col-lg-2">Danger</button>
        </div>


        

        <hr>

        <div class="browse">

        <a href="explore.php"><h3>Browse</h3></a>
        <h5>Most-Viewed Products</h5>




       <!-- Slider main container -->
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
              
              
              <div class="card border-<?php echo $color?> p-0" style="max-width: 19rem; align-self: center; margin: auto !important;">

                 <?php 
                  while ($img_row = mysqli_fetch_assoc($getallproductimages)) {
                  ?>

                 <img src="<?php echo $img_row['PI_IMG_URL']?>" class="card-img-top d-flex img-responsive img-fluid" style="object-fit:scale-down; background-color: black; aspect-ratio: 16 / 9;" alt="...">

                  <?php    
                  }
                  ?>


                
                <div class="card-body">

                  <h6 class="card-title row">
                    <a href="listing_details.php?id=<?php echo $p_id?>" class="col-10"><strong class="text-truncate"><?php echo $p_row['P_NAME']?></strong></a>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>



</body>

</html>