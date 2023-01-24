<?php
include('DBCONNECT.php');

session_start();
if($_SESSION['u_id'] == null){
    header('location:index.php');
}
else{
    $u_id = $_SESSION['u_id'];
}

$msg_from = $u_id;
$msg_to = $_GET['i'];

$getuserdetailssql = "SELECT * FROM users WHERE U_ID = '$u_id'";
$getuserdetails = mysqli_query($connectionString,$getuserdetailssql);

$userdetailsarr = mysqli_fetch_array($getuserdetails);

$user_name = $userdetailsarr['U_NAME'];
$user_ver_state = $userdetailsarr['U_VER'];
$user_img = $userdetailsarr['U_IMG_URL'];


$getrecieverinfosql = "SELECT U_NAME,U_IMG_URL FROM users WHERE U_ID = '$msg_to'";
$getrecieverinfo = mysqli_query($connectionString,$getrecieverinfosql);
$getrecieverinfo_arr = mysqli_fetch_array($getrecieverinfo);
$msg_to_name = $getrecieverinfo_arr['U_NAME'];
$msg_to_img = $getrecieverinfo_arr['U_IMG_URL'];

$checkinboxsql = "SELECT * FROM inbox WHERE (I_OF = '$u_id' AND I_U_ID = '$msg_to') OR (I_OF = '$msg_to' AND I_U_ID = '$u_id')";
$checkinbox = mysqli_query($connectionString,$checkinboxsql);

if(mysqli_num_rows($checkinbox) == 0){
    $createinboxsql = "INSERT INTO inbox(`I_OF`,`I_U_ID`) VALUES('$u_id','$msg_to')";
    $createinbox = mysqli_query($connectionString,$createinboxsql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Chat | BarterMate</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

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
                <h2>Chat</h2>
                <ol>
                    <li><a href="contacts.php">Contacts</a></li>
                    <li>Chat</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">

        <div id="msg_box" class="container" style="border:2px solid darkseagreen ;  padding:1.5rem; transform: translate(0px, 0%); margin: 0 auto; ">
            <div id="message-box">
                <div id="top-bar" style="border-bottom: 1px solid darkseagreen;" class="row mb-3">
                <span class="col mb-0 d-flex">
                    <img style="border-radius: 50%; width: 52px; height: 52px;" src="<?php echo $msg_to_img?>" alt="">
                    <h5 class="mx-2" id="u_name"><?php echo $msg_to_name?> <br>
                    <p style="font-size: 0.9rem;" class="text-muted mt-1"><i style="color: #0b6623;" class="bi bi-circle-fill"></i> Active Now</p>
                    </h5>

                </span>
                    <span class="col"><i class="bi bi-star" style="float: right; font-size: 1.75rem;"></i></span>
                </div>
                <div id="message-bar" class="row" style="overflow-y:scroll; height: 50vh; align-content: start;">
                    <!--suppress CssInvalidPropertyValue -->
                    <span style="text-align: center; height: -webkit-fill-available; align-items: center; justify-content: center; flex-direction: column;" class="text-muted d-flex">
                      <p id="error-msg"></p>
                      <img src="assets/img/no_messages.svg" class="mt-3" style="max-width: 20rem;" alt="">
                  </span>
                </div>
                <div id="message-type" style="border-top:1px solid darkseagreen;" class="row mt-3">
                    <div class="col mt-3">
                        <form class="d-flex" id="form-send-msg">
                            <input class="form-control me-2" id="msg_content" type="text" placeholder="Type Your Message" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><i class="bi bi-telegram"></i></button>
                        </form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    $(document).ready(function() {
        $(document).on('submit', '#form-send-msg', function() {
            send_msg();
            document.getElementById("msg_content").value = '';
            return false;
        });
    });

    function get_chat() {

        var to_id = <?php echo $msg_to?>;
        var from_id = <?php echo $u_id?>;

        var getconversation = new XMLHttpRequest();
        getconversation.onload = function() {
            if (this.status == 200) {

                if(this.responseText == "200"){
                    document.getElementById("error-msg").innerHTML = "No Previous Conversations Found!";
                }
                else{
                    var message_bar = document.getElementById("message-bar");
                    message_bar.innerHTML = this.responseText;
                }

                $('#message-bar').scrollTop($('#message-bar')[0].scrollHeight);

                setTimeout(get_chat, 5000);

            }
        }

        getconversation.open('GET','get_messages.php?to='+to_id+'&from='+from_id,true);
        getconversation.send();

    }

    //Only Perform AJAX Call when new Message is found in the conversation


    function send_msg() {

        var request_messages = new XMLHttpRequest();

        var msg_content = document.getElementById("msg_content").value;

        if (msg_content.toString().length <= 0) {
            console.log('Empty Msg Box');
        } else {

            var to_id = <?php echo $msg_to?>;
            var from_id = <?php echo $u_id?>;

            request_messages.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    //refresh chat box
                    get_chat();
                    $('#message-bar').scrollTop($('#message-bar')[0].scrollHeight);

                }
            }
            request_messages.open('POST', 'send_message.php?msg=' + msg_content + '&from=' + from_id + '&to=' + to_id, true);
            request_messages.send();
        }

    }


    window.onload = function () {
        get_chat();
        $('#message-bar').scrollTop($('#message-bar')[0].scrollHeight);
    }




</script>

</body>

</html>