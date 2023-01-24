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


$getsentofferssql = "SELECT * FROM product_swaps
                        INNER JOIN products ON product_swaps.PS_P_FOR = products.P_ID
                        INNER JOIN product_swap_status ON product_swaps.PS_STATUS = product_swap_status.SS_ID
                        WHERE product_swaps.PS_BY = '$u_id'";
$getsentoffers = mysqli_query($connectionString,$getsentofferssql);
$sent_offers_count = mysqli_num_rows($getsentoffers);

$getrecofferssql = "SELECT * FROM product_swaps 
                    INNER JOIN products ON product_swaps.PS_P_FOR = products.P_ID
                    INNER JOIN product_swap_status ON product_swaps.PS_STATUS = product_swap_status.SS_ID  
                    INNER JOIN users ON product_swaps.PS_BY = users.U_ID
                    WHERE products.P_BY_U_ID = '$u_id'";
$getrecoffers = mysqli_query($connectionString,$getrecofferssql);
$rec_offers_count = mysqli_num_rows($getrecoffers);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Offers | BarterMate</title>
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

<style>

    #tab-nav > .nav-link:hover{
        color: #0b6623 !important;
    }
</style>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Offers</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Offers</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->


    <section class="inner-page">
        <div class="container">
            <nav id="tab-nav">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-sent-tab" data-bs-toggle="tab" data-bs-target="#nav-sent" type="button" role="tab" aria-controls="nav-sent" aria-selected="true">Sent Offers (<?php echo $sent_offers_count?>)</button>
                    <button class="nav-link" id="nav-recieve-tab" data-bs-toggle="tab" data-bs-target="#nav-recieve" type="button" role="tab" aria-controls="nav-recieve" aria-selected="false">Recieved Offers (<?php echo $rec_offers_count?>)</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-sent" role="tabpanel" aria-labelledby="nav-sent-tab">
                    <div class="mt-4" id="sent-offers">
                        <h5 class="text-center">Sent Offers (<?php echo $sent_offers_count?>)</h5>

                        <br>

                        <table class="table">
                            <thead class="table-dark">
                            <tr>
                                <th scope="col">For</th>
                                <th scope="col">Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php
                        while($ss_info = mysqli_fetch_assoc($getsentoffers)){
                        ?>
                            <div class="modal fade" id="del_<?php echo $ss_info['PS_ID']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Withdraw Offer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div style="text-align: center;">

                                                <h6>Do You Want To Withdraw This Offer?</h6>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-danger">Yes, Withdraw</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="s_<?php echo $ss_info['PS_ID']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Offer Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col" style="text-align: center;">
                                                    <span class="badge bg-<?php echo $ss_info['SS_COLOR']?>" title="Offer Status"><?php echo $ss_info['SS_NAME']?></span>
                                                </div>

                                                <div class="col" style="text-align: center;">
                                                    <span class="badge bg-secondary" title="Offer Send Date"><?php echo $ss_info['PS_DATE']?></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <ul class="list-group list-group-flush">
                                                        <?php
                                                        $swap_id = $ss_info['PS_ID'];
                                                        $getswapofferssql = "SELECT * FROM product_swap_offers 
                                            INNER JOIN products ON products.P_ID = product_swap_offers.SO_P_ID
                                            WHERE SO_PS_ID = '$swap_id'";
                                                        $getswapoffers = mysqli_query($connectionString,$getswapofferssql);

                                                        while($so_row = mysqli_fetch_assoc($getswapoffers)){
                                                            ?>

                                                            <li class="list-group-item"><a href="listing_details.php?id=<?php echo $so_row['P_ID']?>" target="_blank"><?php echo $so_row['P_NAME']?></a></li>

                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>

                                                <div class="col-1 text-center" style="align-self: center;">
                                                    <i style="font-size: x-large;" class='bx bx-refresh'></i>
                                                </div>

                                                <div class="col">
                                                    <ul class="list-group list-group-flush">
                                                        <?php
                                                        $swap_for = $ss_info['PS_P_FOR'];
                                                        $getofferforsql = "SELECT * FROM products WHERE P_ID = '$swap_for'";
                                                        $getofferfor = mysqli_query($connectionString,$getofferforsql);

                                                        while($so_row = mysqli_fetch_assoc($getofferfor)){
                                                            ?>

                                                            <li class="list-group-item"><a href="listing_details.php?id=<?php echo $so_row['P_ID']?>" target="_blank"><?php echo $so_row['P_NAME']?></a></li>

                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger">Withdraw Offer</button>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <tr>
                                <td class="text-truncate"><?php echo $ss_info['P_NAME']?></td>
                                <td><span class="badge bg-<?php echo $ss_info['SS_COLOR']?>"><?php echo $ss_info['SS_NAME']?></span></td>
                                <td style="text-align: center;"><a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#s_<?php echo $ss_info['PS_ID']?>" class="text-primary">Details</a> | <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#del_<?php echo $ss_info['PS_ID']?>" class="text-danger">Withdraw</a></td>
                            </tr>


                        <?php
                        }
                        ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-recieve" role="tabpanel" aria-labelledby="nav-recieve-tab">
                    <div class="mt-4" id="recieved-offers">
                        <h5 class="text-center">Recieved Offers (<?php echo $rec_offers_count?>)</h5>

                        <br>


                        <table class="table">
                            <thead class="table-dark">
                            <tr>
                                <th scope="col">For</th>
                                <th scope="col">Sent By</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while($rs_info = mysqli_fetch_assoc($getrecoffers)){
                                ?>

                                <tr>
                                    <td class="text-truncate"><?php echo $rs_info['P_NAME']?></td>
                                    <td><?php echo $rs_info['U_NAME']?></td>
                                    <td style="text-align: center;"><a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#r_<?php echo $rs_info['PS_ID']?>" class="text-primary">Details</a></td>
                                </tr>

                                <div class="modal fade" id="r_<?php echo $rs_info['PS_ID']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Offer Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <div class="col" style="text-align: center;">

                                                    </div>

                                                    <div class="col" style="text-align: center;">
                                                        <span class="badge bg-secondary" title="Offer Send Date"><?php echo $rs_info['PS_DATE']?></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <ul class="list-group list-group-flush">
                                                            <?php
                                                            $rec_id = $rs_info['PS_ID'];
                                                            $getrecofferdetsql = "SELECT * FROM product_swap_offers 
                                                                INNER JOIN products ON products.P_ID = product_swap_offers.SO_P_ID
                                                                WHERE SO_PS_ID = '$rec_id'";
                                                            $getrecofferdet = mysqli_query($connectionString,$getrecofferdetsql);

                                                            while($ro_row = mysqli_fetch_assoc($getrecofferdet)){
                                                                ?>

                                                                <li class="list-group-item"><a href="listing_details.php?id=<?php echo $ro_row['P_ID']?>" target="_blank"><?php echo $ro_row['P_NAME']?></a></li>

                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>

                                                    <div class="col-1 text-center" style="align-self: center;">
                                                        <i style="font-size: x-large;" class='bx bx-refresh'></i>
                                                    </div>

                                                    <div class="col">
                                                        <ul class="list-group list-group-flush">
                                                            <?php
                                                            $swap_rec = $rs_info['PS_P_FOR'];
                                                            $getofferforsql = "SELECT * FROM products WHERE P_ID = '$swap_rec'";
                                                            $getofferfor = mysqli_query($connectionString,$getofferforsql);

                                                            while($ro_row = mysqli_fetch_assoc($getofferfor)){
                                                                ?>

                                                                <li class="list-group-item"><a href="listing_details.php?id=<?php echo $ro_row['P_ID']?>" target="_blank"><?php echo $ro_row['P_NAME']?></a></li>

                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                    </svg> Reject Offer</button>
                                                <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg> Accept Offer</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
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

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>