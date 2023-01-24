<?php
include('DBCONNECT.php');
session_start();
if($_SESSION['u_id'] == null){
    header('location:index.php');
}
else{
    $u_id = $_SESSION['u_id'];
}

if($_GET['id'] == $_SESSION['u_id']){
    $view = 'user';
}
else{
    $view = 'visit';
}

$getuserdetailssql = "SELECT * FROM users WHERE U_ID = '$u_id'";
$getuserdetails = mysqli_query($connectionString,$getuserdetailssql);

$userdetailsarr = mysqli_fetch_array($getuserdetails);

$user_name = $userdetailsarr['U_NAME'];
$user_ver_state = $userdetailsarr['U_VER'];
$user_img = $userdetailsarr['U_IMG_URL'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile | BarterMate</title>
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
    #edit{
        cursor: pointer;
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
                <h2>Profile</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Profile</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container-fluid">

            <div class="card mb-3 border-0" style="">
                <div class="row g-0">
                    <div class="col-md-4 d-flex" style="justify-content: center; align-items: center;">
                        <img src="<?php echo $user_img?>" style="max-width: 20rem;" class="img-thumbnail rounded-circle mb-5" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="col-lg col-md col-sm-12 d-flex flex-column" style="justify-content: center;">
                                <div class="row mb-3">
                                    <div class="col"><h4>Basic Information</h4></div>

                                </div>

                                <div class="row">
                                    <label for="staticText" class="col col-form-label">Full Name</label>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext editBtn" value="<?php echo $user_name?>">
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="staticEmail" class="col col-form-label">Email</label>
                                    <div class="col">
                                        <input  type="text" readonly class="form-control-plaintext text-muted" value="<?php echo $userdetailsarr['U_EMAIL']?>">
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <div class="row">
                                    <label for="staticPass" class="col col-form-label">Password</label>
                                    <div class="col">
                                        <input type="password" readonly class="form-control-plaintext editBtn" value="<?php echo $userdetailsarr['U_PASS']?>">
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="staticPhone" class="col col-form-label">Phone</label>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext editBtn" value="<?php echo $userdetailsarr['U_PHONE']?>">
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="staticDate" class="col col-form-label">Registration Date</label>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext text-muted" value="<?php echo $userdetailsarr['U_A_CREATE_DATE']?>" disabled>
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>

                                <div class="row">
                                    <label for="staticMT" class="col col-form-label">Member Type</label>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext text-muted editBtn" value="Standard" disabled>
                                    </div>
                                    <div class="col-1">
                                        <a href="store.php"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button" style="border-radius: 0;" id="removeRO" class="btn btn-outline-secondary col-12">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                        </svg>
                                        Edit Information
                                    </button>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="d-flex" style="justify-content: center; align-items: center;">
                                                            <img src="<?php echo $user_img?>" style="max-width: 10rem;" class="card-img img-thumbnail rounded-circle mb-5" alt="...">
                                                            <div class="card-img-overlay">

                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="row">
                                                            <label for="staticText" class="col col-form-label">Full Name</label>
                                                            <div class="col">
                                                                <input type="text" class="form-control" value="<?php echo $user_name?>">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="static_oldPass" class="col col-form-label">Old Password</label>
                                                            <div class="col">
                                                                <input type="password" class="form-control" value="<?php echo $userdetailsarr['U_PASS']?>">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="static_newPass" class="col col-form-label">New Password</label>
                                                            <div class="col">
                                                                <input type="password" class="form-control" value="">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="static_newPassre" class="col col-form-label">Re-Enter New Password</label>
                                                            <div class="col">
                                                                <input type="password" class="form-control" value="">
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <label for="staticMT" class="col col-form-label">Member Type</label>
                                                            <div class="col">

                                                                <input type="text" readonly class="form-control text-muted col" value="Standard" disabled>
                                                                <button type="button" class="btn btn-secondary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                                    </svg>
                                                                </button>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script>

</script>

</body>

</html>
