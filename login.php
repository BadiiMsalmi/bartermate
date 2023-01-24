<?php

include('DBCONNECT.php');
error_reporting(0);

if($_SESSION['u_id'] != null){
  header('location:home.php');
}

if(isset($_POST['login'])){
	extract($_POST);

  $email = $_POST['email'];
  $pass = $_POST['pass'];


$email =  mysqli_real_escape_string($connectionString,$email);
$pass = mysqli_real_escape_string($connectionString,$pass);
 
$query = "SELECT * FROM users WHERE U_EMAIL = '$email' AND U_PASS = '$pass'";
$result = mysqli_query($connectionString,$query);

$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);  

$u_id = $row['U_ID'];

  
  
  if($count == 1){
    if($row['U_VER'] != 0){
        $user_data = 'nver';
    }
    else{
    session_start();
    $_SESSION['u_id'] = $u_id;
    header('location:home.php');
    }
  }
  else{
    $user_data = 'icre';
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | BarterMate</title>
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
    input{
      border-radius: 0px !important;
    }

    #form{
      max-width: 50rem;
      margin: 0 auto;
      text-align: center;
    }
  </style>
</head>

<body >

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">BarterMate</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

   
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Login</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Login</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


<?php

if($user_data == 'icre'){

?>

   <div class="alert alert-danger alert-dismissible fade show" role="alert" style="" id="icre">
   	<center>
	  <strong>Login Error!</strong> Incorrect Email and/or Password
	</center>
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>

   
<?php
}
else if($user_data == 'nver'){
?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert" style="" id="nver">
    <center>
    <em>Email Not Verified!</em><a href="#"><strong> Click Here</strong></a> to Resend Verification Email
  </center>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

<?php
}
?>

    <section class="inner-page">
      <div class="container">
           <form action="" method="post" id="form">

            <h3>Login To Your Account</h3>
            <br>
                  <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required="">
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating">
                    <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" required="">
                    <label for="floatingPassword">Password</label>
                  </div>
                  <br>
                  <span class="row m-1 align-middle">
                  	<input type="submit" name="login" class="btn btn-secondary col-6 align-middle p-2" value="Login">
                    <a href="forgot_password.php" class="text-danger col-6 align-middle p-2" style="vertical-align: middle;"><center>Forgot Password?</center></a>
                   </span>
                   <br>
               <center>
                <a href="register.php">Don't Have an Account? Register Instead</a>   
                </center>
            </form> 

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