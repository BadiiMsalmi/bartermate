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

$curr_date = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Explore | BarterMate</title>
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
  .bi-list-nested::before{
    float: right;
  }

  .bi{
    font-size: 1.5rem;
  }

  .bi-list-nested: hover, .bi-search: hover{
    color: #f3f3f3;
  }

  @media screen and (max-width: 1365px) {
      #product-box{
          justify-content: center;
      }
  }

  @media screen and (min-width: 1364px) {
      #product-box{
          justify-content: flex-start;
      }
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
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Explore</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Explore</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="container-fluid inner-page">

      <div class="row">

        <div class="col-lg-3 col-md-0">

      <div class="side-filter m-2 bg-light" style="border-radius: 1rem; padding: 1rem;">

        <h4><strong>Filter By</strong></h4>
          <label for="category" class="form-label">Product Category</label>
          <select onchange="catFilter(this.value)" name="category" id="cat_select" class="form-select rounded mx-0">
              <option class="product_filter" value="" selected>All</option>
            <?php
            $getcategorysql = "SELECT * FROM product_categories";
            $getcategory = mysqli_query($connectionString,$getcategorysql);

            while($cgry = mysqli_fetch_assoc($getcategory)){
            ?>
              <option class="product_filter" value="<?php echo $cgry['PC_ID']?>"><?php echo $cgry['PC_NAME']?></option>
            <?php
            }
            ?>  
          </select>
          <br>
      </div>

      </div>

          <?php
          $getallproductssql = "SELECT * FROM products 
            INNER JOIN product_categories ON products.P_CATEGORY = product_categories.PC_ID
            ORDER BY products.P_VIEWS DESC";
          $getallproducts = mysqli_query($connectionString,$getallproductssql);

          $result_count = mysqli_num_rows($getallproducts);
          ?>

      <div class="col justify-content-center">

        <div class="row m-1 mt-3" id="panel">

            <input onkeyup="searchTyping(this.value)" style="border-radius: 1rem;" type="search"  class="form-control col rounded mx-0" placeholder="Search Here (Start Typing...)" aria-label="search" aria-describedby="basic-addon1" id="search-text" required>


      </div>

          <hr>

          <div class="row">
          <p class="col">Search Term: <span id="search-term"><span class="badge bg-secondary">null</span></p>
          <p class="col">Category: <span id="categorty-filter" class="badge bg-secondary">All</span></p>
          </div>

          <hr>
        <div class="row d-flex mt-3 p-2"  id="product-box">


            <div id="spinner" class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>


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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>

      prevSearchterm = '';
      category = 0;
      exchange = 2;
      sort = 'rel';

      function searchTyping(search_term='') {
            prevSearchterm = search_term;
            var str = '<span class="badge bg-secondary">'+ search_term +'</span>';
            document.getElementById('search-term').innerHTML = str;
            listProducts(search_term,category,exchange);
      }

      function listProducts(s = '',cat=0,exec=2,sort='rel'){

      var request_products = new XMLHttpRequest();

      request_products.onreadystatechange = function () {
              if (this.status == 200 && this.readyState == 4) {
                  document.getElementById('product-box').innerHTML = this.responseText;
              }
          }

      request_products.open('GET', 'filter_products.php?s='+s+'&cat='+cat+'&exec='+exec, true);
      request_products.send();
      }

      function catFilter(value){
            var selCat = document.getElementById('cat_select');
            document.getElementById('categorty-filter').innerHTML = selCat.options[selCat.selectedIndex].text;
            category = value;
            listProducts(prevSearchterm,category,exchange);
      }

      function execFilter(value){
          var selExec = document.getElementById('swap_select');
          document.getElementById('exchange-filter').innerHTML = selExec.options[selExec.selectedIndex].text;
          exchange = value;
          listProducts(prevSearchterm,category,exchange);
      }

          function saveProduct(p_id) {
              var saveproduct = new XMLHttpRequest();

              saveproduct.onreadystatechange = function () {
                  if (this.status == 200 && this.readyState == 4) {
                     listProducts(prevSearchterm,category,exchange);
                  }
              }

              saveproduct.open('GET', 'save_listing.php?id='+p_id, true);
              saveproduct.send();
          }

      function unsaveProduct(p_id) {
          var saveproduct = new XMLHttpRequest();

          saveproduct.onreadystatechange = function () {
              if (this.status == 200 && this.readyState == 4) {
                  listProducts(prevSearchterm,category,exchange);
              }
          }

          saveproduct.open('GET', 'unsave_listing.php?id='+p_id, true);
          saveproduct.send();
      }


          window.onload = function (){
                listProducts();
          }

          $(function (){
              $('.toast').toast();
          });

  </script>
  
</body>

</html>