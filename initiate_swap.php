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


if($_GET['sp'] != null){
    $sp_id = $_GET['sp'];
}
else{
    header('location:home.php');
}

$checkoffersentsql = "SELECT * FROM product_swaps WHERE PS_P_FOR = '$sp_id' AND PS_BY = '$u_id'";
$checkoffersent = mysqli_query($connectionString,$checkoffersentsql);

$getproductdetailssql = "SELECT * FROM products WHERE P_ID = '$sp_id' AND P_EXC_TYPE <> 0 AND P_BY_U_ID <> '$u_id'";
$getproductdetails = mysqli_query($connectionString,$getproductdetailssql);
$productdetailsarr = mysqli_fetch_array($getproductdetails);

$p_name_offer = $productdetailsarr['P_NAME'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Swap Initiation | BarterMate</title>
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
    #myproducts-img:hover{
        opacity: 80%;
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
                <h2>Swap Initiation</h2>
                <ol>
                    <li><a href="listing_details.php?id=<?php echo $sp_id?>">Listing Details</a></li>
                    <li>Swap Initiation</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <?php
            if($productdetailsarr !== null AND mysqli_num_rows($checkoffersent) === 0){
            ?>

            <div class="row d-flex">
                <div class="col-lg-5 p-0" style="" id="offer_for">
                    <h6 class="text-center">You Get</h6>
                    <a class="m-1" style="text-align: center;" href="listing_details.php?id=<?php echo $sp_id?>">
                    <div id="card-for" style="border-radius: 1rem;" class="p-3 m-2">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $getallimagessql = "SELECT * FROM product_images WHERE PI_P_ID = '$sp_id'";
                                $getallimages = mysqli_query($connectionString,$getallimagessql);

                                $first_active = 'active';

                                while($image_row = mysqli_fetch_assoc($getallimages)){
                                    ?>

                                    <div class="carousel-item <?php echo $first_active?>">
                                    <figure class="figure">
                                        <img id="myproducts-img" style="height:20rem; object-fit:scale-down; aspect-ratio: 16/9; background-color: black;" src="<?php echo $image_row['PI_IMG_URL'] ?>" class="figure-img img-fluid rounded" alt="...">
                                    </figure>
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

                        <figcaption class="figure-caption"><?php echo $productdetailsarr['P_NAME']?></figcaption>

                    </div>
                    </a>
                </div>

                <div class="col-lg text-center" style="align-self: center;">
                    <i style="font-size: xxx-large;" class='bx bx-refresh'></i>
                </div>

                <div style="" class="col-lg-5" >
                    <h6 class="text-center">You Offer (Max 3 Products)</h6>
                    <div class="row p-2" id="my_offer" style="justify-content: center;">

                    </div>
                </div>

                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success mt-4 p-3" type="submit" style="margin: 0 auto;" id="swap_confirm_btn" disabled>Confirm Trade Offer</button>
                <!-- Confirmation Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Trade Offer Summary</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col">
                                        <h6 class="m-1 text-center">Item You Will Recieve</h6>
                                        <a class="m-1" style="text-align: center;" href="listing_details.php?id=<?php echo $sp_id?>">
                                            <div id="card-for" style="border-radius: 1rem;" class="p-3 m-2">
                                                <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php
                                                        $getallimagessql = "SELECT * FROM product_images WHERE PI_P_ID = '$sp_id'";
                                                        $getallimages = mysqli_query($connectionString,$getallimagessql);

                                                        $first_active = 'active';

                                                        while($image_row = mysqli_fetch_assoc($getallimages)){
                                                            ?>

                                                            <div class="carousel-item <?php echo $first_active?>">
                                                                <figure class="figure">
                                                                    <img id="myproducts-img" style="height:15rem; object-fit:cover; aspect-ratio: auto;" src="<?php echo $image_row['PI_IMG_URL'] ?>" class="figure-img img-fluid rounded" alt="...">
                                                                </figure>
                                                            </div>


                                                            <?php
                                                            $first_active = ' ';
                                                        }
                                                        ?>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>

                                                </div>

                                                <figcaption class="figure-caption"><?php echo $productdetailsarr['P_NAME']?></figcaption>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h6 class="m-1 mb-3 text-center">Item/s You Trade</h6>
                                        <div class="row m-2" id="my_offer_modal" style="justify-content: center;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form id="send_offer_trade" method="post" action="">
                                    <button type="submit" class="btn btn-primary">Send Trade Offer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <?php
            }
            else if($productdetailsarr == null){
                echo "<center><h4>Product Not Eligible For Swap</h4> <br>
                        <h6><a href='explore.php'>Go To Explore Page..</a></h6></center>
                    ";
            }

            else if(mysqli_num_rows($checkoffersent) == 1){
                echo "<center><h4>Swap Offer Already Sent!</h4> <br>
                        <h6><a href='offers.php'>View Sent Offers</a></h6></center>
                    ";
            }

            ?>



            <hr>

            <h4>Click A Product For Swap</h4>
            <h6>My <b>Active</b> Products</h6>

            <br>

            <div class="row" id="products_grid">
                <?php
                $myproductssql = "SELECT * FROM products WHERE P_BY_U_ID = '$u_id' AND P_STATUS = '1'";
                $myproducts = mysqli_query($connectionString,$myproductssql);

                if(mysqli_num_rows($myproducts) == 0){
                    echo "<h4>No Active Listings Found!</h4> <br>
                        <h6><a href='add_listing.php'>Add New Listing</a></h6>
                    ";
                }

                while($p_row = mysqli_fetch_assoc($myproducts)){
                    $mp_id = $p_row['P_ID'];
                    ?>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-5">
                        <a style="cursor: pointer;" onclick="addToTrade(<?php echo $mp_id?>,<?php echo $sp_id?>)">
                        <?php

                        $getallimagessql = "SELECT * FROM product_images WHERE PI_P_ID = '$mp_id' LIMIT 0,1";
                        $getallimages = mysqli_query($connectionString,$getallimagessql);

                        while($image_row = mysqli_fetch_assoc($getallimages)){
                            ?>
                            <figure class="figure">
                                <img id="myproducts-img" style="height:15rem; object-fit:scale-down; aspect-ratio: 4/3; background-color: black;" src="<?php echo $image_row['PI_IMG_URL'] ?>" class="figure-img img-fluid rounded" alt="...">
                                <figcaption class="figure-caption"><?php echo $p_row['P_NAME']?></figcaption>
                            </figure>
                            <?php
                        }
                        ?>
                        </a>
                    </div>

                    <?php
                }
                ?>
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

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script>
    recieveOffer = <?php echo $sp_id?>;
    const myProducts = [];

    function addToTrade(my) {

        if(!myProducts.includes(my) && myProducts.length <= 2){
            myProducts.push(my);

            var getswapP = new XMLHttpRequest();
            getswapP.onload = function() {
                if (this.status == 200) {

                    document.getElementById('my_offer').innerHTML += this.responseText;
                    document.getElementById('my_offer_modal').innerHTML += this.responseText;
                    document.getElementById('swap_confirm_btn').disabled = false;

                }
            }

            getswapP.open('GET','add_to_trade.php?p='+my,true);
            getswapP.send();

        }


    }

    document.getElementById('send_offer_trade').onsubmit = function (e){
        e.preventDefault();

        var pfor = <?php echo $sp_id?>;
        var urlStr = 'send_trade_offer.php?pf='+pfor+'&';

        for (var x=0;x<myProducts.length;x++){
            if(x<myProducts.length-1){
                urlStr += 'p'+x+'='+myProducts[x]+'&';
            }
            else{
                urlStr += 'p'+x+'='+myProducts[x];
            }
        }

        var sendTrade = new XMLHttpRequest();
        sendTrade.onload = function() {
            if (this.status == 200) {

                myProducts.splice(0, myProducts.length);

                document.getElementById('my_offer').innerHTML = " ";
                document.getElementById('my_offer_modal').innerHTML = " ";
                document.getElementById('swap_confirm_btn').disabled = true;

                window.location.href = "offers.php";

            }
        }

        sendTrade.open('GET',urlStr,true);
        sendTrade.send();


    }



</script>

</body>

</html>