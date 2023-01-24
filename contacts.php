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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Inbox | BarterMate</title>
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

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Inbox</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Inbox</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">

        <div class="container-sm">
            <h3 style="text-align: center;">Choose a Conversation</h3>
            <hr>


            <div id="contact_box" style="padding:1rem;  border-radius: 2rem; margin: 0 auto; ">
                <?php
                $getallcontactssql  = "SELECT * FROM inbox 
                INNER JOIN users ON inbox.I_OF = users.U_ID OR inbox.I_U_ID = users.U_ID
                WHERE (I_OF = '$u_id' OR I_U_ID = '$u_id') AND users.U_ID <> '$u_id'";
                $getallcontacts = mysqli_query($connectionString,$getallcontactssql);

                if(mysqli_num_rows($getallcontacts) == 0){
                    echo '<div style="text-align: center;">
                <h4 class="text-muted">No Previous Conversations Found!</h4>
                  </div>';
                }

                while($c_row = mysqli_fetch_assoc($getallcontacts)){
                    ?>
                <a href="chat.php?i=<?php echo $c_row['U_ID']?>">
                <div id="contact-card"  class="row d-flex">
                    <span class="col mb-0 d-flex">
                    <img style="border-radius: 50%; width: 52px; height: 52px;" src="<?php echo $c_row['U_IMG_URL']?>" alt="">
                    <h5 class="mx-2 mt-1" id="u_name"><?php echo $c_row['U_NAME']?> <br>
                    <p style="font-size: 0.9rem;" class="text-muted mt-1"><span id="last_msg"></span></p>
                    </h5>
                </span>
                    <span class="col"></span>
                </div>
                </a>

                <?php
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function update_last_activity(){
        var updateactivity = new XMLHttpRequest();
        updateactivity.onload = function() {
            if (this.status == 200) {

            }
        }
        updateactivity.open('GET','update_last_activity.php?id='+<?php echo $u_id?>,true);
        updateactivity.send();
    }

    var length = 20;
    var myString = " ";

    var myTruncatedString = myString.substring(0,length) + "...";

    console.log(myTruncatedString);

    document.getElementById('last_msg').innerHTML = myTruncatedString;
</script>

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