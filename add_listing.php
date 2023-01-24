<?php
include("DBCONNECT.php");

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

$getcategorysql = "SELECT * FROM product_categories";
$getcategory = mysqli_query($connectionString,$getcategorysql);

$getcategorysql1 = "SELECT * FROM product_categories";
$getcategory1 = mysqli_query($connectionString,$getcategorysql1);


if(isset($_POST['list'])){
  extract($_POST);

  $pname = $_POST['pname'];
  $pdesc = $_POST['pdesc'];
  $pcat = $_POST['category'];
  $exc_pref = $_POST['excpref'];
  $curr_date = date("Y-m-d");

  if($exc_pref == 0){

    $monetary_val = $_POST['mon_val'];
    unset($_POST['mon_val']);

    $add_listing_0_sql = "INSERT INTO products(`P_NAME`, `P_DESC`, `P_CATEGORY`, `P_EXC_TYPE`, `P_MONETARY_VAL`, `P_VIEWS`, `P_CREATE_DATE`, `P_BY_U_ID`) VALUES('$pname','$pdesc','$pcat','0','$monetary_val','0','$curr_date','$u_id')";
    $add_listing_0 = mysqli_query($connectionString,$add_listing_0_sql);

    $listing_id = mysqli_insert_id($connectionString);

  }
  else if($exc_pref == 1){

    $add_listing_1_sql = "INSERT INTO products(`P_NAME`, `P_DESC`, `P_CATEGORY`, `P_EXC_TYPE`, `P_MONETARY_VAL`, `P_VIEWS`, `P_CREATE_DATE`, `P_BY_U_ID`) VALUES('$pname','$pdesc','$pcat','1','0','0','$curr_date','$u_id')";
    $add_listing_1 = mysqli_query($connectionString,$add_listing_1_sql);

    $listing_id = mysqli_insert_id($connectionString);

    for ($x = 0; $x < count($_POST['pref_cat']); $x++) 
    {
       $curr_pref = $_POST["pref_cat"][$x];
       $add_pref_cat_sql = "INSERT INTO `product_exchange_prefs`(`PE_P_ID`,`PE_PC_ID`) VALUES('$listing_id','$curr_pref')";
       $add_pref_cat = mysqli_query($connectionString,$add_pref_cat_sql);
    } 

    unset($_POST['pref_cat']);

  }

  for ($y = 0; $y < count($_FILES['images']['name']); $y++) 
        {

          $fileName = $_FILES['images']['name'][$y];
          $fileTempLocation = $_FILES['images']['tmp_name'][$y];
          $fileSize = $_FILES['images']['size'][$y];
          $fileError = $_FILES['images']['error'][$y];
          $filetype = $_FILES['images']['type'][$y];

          $filetypeget = explode('.',$fileName);
          $fileEXT = strtolower(end($filetypeget));

          $File_Name = uniqid('',true).".".'webp';

          $FileGOTO_img = 'assets/product_images/'.$File_Name;  

          move_uploaded_file($_FILES['images']['tmp_name'][$y],$FileGOTO_img);

          $add_product_images_sql = "INSERT INTO product_images(`PI_P_ID`, `PI_IMG_URL`) VALUES('$listing_id','$FileGOTO_img')";
          $add_product_images = mysqli_query($connectionString,$add_product_images_sql);

        }

  ?>


    <script>
        document.getElementById('complete_toast').classList.add('show');
    </script>

    <div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
        <div class="toast-container position-absolute p-3 top-0 end-0" id="toastPlacement">

            <div class="toast" id="complete_toast">
                <div class="toast-header">
                    <img src="assets/img/check.svg" width="16" height="16" class="rounded me-2" alt="...">
                    <strong class="me-auto">Listing Added Successfully</strong>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <a href="listing_details.php?id=<?php echo $listing_id?>">Preview Listing</a>

                </div>
            </div>


        </div>
    </div>

<?php

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Product Listing | BarterMate</title>
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
  .gallery > img{
    width: 33%;
    height: auto;
  }

  .form-label{
    color: black;
  }

   textarea,
input[type="text"],
input[type="password"],
input[type="datetime"],
input[type="datetime-local"],
input[type="date"],
input[type="month"],
input[type="time"],
input[type="week"],
input[type="number"],
input[type="email"],
input[type="url"],
input[type="search"],
input[type="tel"],
input[type="color"],
.uneditable-input,
.form-select,
.form-control
 {   
  border-color:#E5ECF5;
  outline: 0 none;
  background-color: whitesmoke;
  border-radius: 0px !important;
}

  textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus,
.form-select:focus,
.form-control:focus
 {   
  border-color:black;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 3px rgba(126, 239, 104, 0.6);
  outline: 0 none;
  background-color: #f3f3f3;
}
#list_submit{ border-radius: 0; }



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
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Add Product Listing</h2>
          <ol>
            <li><a href="product_listings.php">Manage Listings</a></li>
            <li>Add Listing</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->




    <section class="inner-page">

      <div class="container">

          <form method="post" action="" enctype="multipart/form-data" class="row g-3">

        <h5>Images of Your Product <br><span class="text-muted">
        
        <li>Multiple Images </li>
        <li>16:9 Aspect Ratio</li>
        <li>Show The Product Clearly</li>
        
        </span></h5>
        <hr>
        <div class="col-md-8 mx-auto mb-4">
          <input class="form-control rounded mx-0" name="images[]" type="file" id="gallery-photo-add" multiple required="">
        </div>

        <div class="gallery row mb-5">
          
        </div>


        

        
        <h5>Product Information</h5>
        <hr>

			  <div class="col-md-6">
			    <label for="Product_Name" class="form-label">Product Name</label>
          <figcaption class="figure-caption">Model Name / Brand Name / Other Identifier</figcaption>
			    <input type="text" name="pname" class="form-control rounded mx-0" id="Product_Name" required="">
			  </div>
			  <div class="col-md-6">
			    <label for="Product_Desc" class="form-label">Product Description</label>
            <figcaption class="figure-caption">Describe the Appearence, Condition, Usage & Other Factors</figcaption>
          <textarea name="pdesc" class="form-control rounded mx-0" cols="30" rows="3" id="Product_Desc" required=""></textarea>
			  </div>
			  <div class="col-12 mb-4">
			    <label for="Product_Cat" class="form-label">Product Category</label>
			    <select class="form-select rounded mx-0" name="category" id="Product_Cat" aria-label="Default select example" required="">
            <?php
              while($cgry = mysqli_fetch_assoc($getcategory)){
            ?>
              <option value="<?php echo $cgry['PC_ID']?>"><?php echo $cgry['PC_NAME']?></option>
            <?php
            }
            ?>  
          </select>
			  </div>
        

        <h5>Exchange Information</h5>
        <hr>
			  <div class="col-12">
			    <label for="inputAddress2" class="form-label">Exchange Preference</label>
            <div class="form-check">
              <input class="form-check-input" onclick="hidemon()" type="radio" value="1" name="excpref" id="flexRadioDefault2" required="">
              <label class="form-check-label" for="flexRadioDefault2">
                Product Preference
              </label>
         </div>
			  </div>
			  <div class="col-md-6" id="monetary_val" style="display: none;">
			    <label for="inputmoney" class="form-label">Monetary Value (PKR)</label>
			    <input name="mon_val" type="number" class="form-control rounded mx-0" id="inputmoney" value="0" >
          <figcaption class="figure-caption">Maximum Value In PKR</figcaption>
			  </div>
          <div class="col-md-6" id="pref_val" style="display: none;">
          <label for="inputmoney" class="form-label">Select Preferred Categories For Exchange</label>
            <?php
            while($cat_row = mysqli_fetch_assoc($getcategory1)){
            ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="pref_cat[]" value="<?php echo $cat_row['PC_ID']?>" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                <?php echo $cat_row['PC_NAME']?>
              </label>
            </div>
            <?php
            }
            ?>
        </div>
        <br>
			  <div class="mt-3">
			    <button name="list" id="list_submit" type="submit" class="btn btn-success col-6">Complete Listing</button>
          </form>


          <a href="home.php"><button type="button" class="btn btn-secondary col-4">Cancel Listing</button></a>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>

    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="col-3 figure-img img-fluid rounded">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});


    function monetary(){
      document.getElementById('monetary_val').style.display = 'block';
      document.getElementById('pref_val').style.display = 'none';
    }

    function hidemon(){
      document.getElementById('monetary_val').style.display = 'none';
      document.getElementById('pref_val').style.display = 'block';
    }
    
  </script>

</body>

</html>