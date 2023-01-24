<?php
include('DBCONNECT.php');

session_start();
if($_SESSION['u_id'] !== null){
  header('location:home.php');
}

else{
if(isset($_POST['register'])){
	extract($_POST);

	$num = random_int(1,10*100) * 3.141595;

	$name = $_POST['fname'];
	$email = $_POST['femail'];
	$pass = $_POST['fpass'];
	$phone = $_POST['fphone'];


	$checkemailsql = "SELECT * FROM users WHERE U_EMAIL = '$email'";
	$checkemail = mysqli_query($connectionString,$checkemailsql);

	if(mysqli_num_rows($checkemail) > 0){
		$user_info = 'eanu';
	}

	else{

	    $v_key = md5($num);

        $fileName = $_FILES['fdp']['name'];
        $fileTempLocation = $_FILES['fdp']['tmp_name'];
        $fileSize = $_FILES['fdp']['size'];
        $fileError = $_FILES['fdp']['error'];
        $filetype = $_FILES['fdp']['type'];

        $filetypeget = explode('.',$fileName);
        $fileEXT = strtolower(end($filetypeget));

        $File_Name = uniqid('',true).".".'webp';

        $FileGOTO_img = 'assets/dp_uploads/'.$File_Name;

        move_uploaded_file($_FILES['fdp']['tmp_name'],$FileGOTO_img);


	$registersql = "INSERT INTO users(`U_NAME`, `U_EMAIL`, `U_PASS`, `U_PHONE`,`U_IMG_URL`, `U_VER_CODE`) VALUES('$name','$email','$pass','$phone','$FileGOTO_img','$v_key')";
	$register = mysqli_query($connectionString,$registersql);

	$u_id = mysqli_insert_id($connectionString);


	if($register){
		//header("location:email_ver.php?id=$u_id");
        echo "DONE";
        echo $FileGOTO_img;
        header("Location:login.php");
	}


  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register | BarterMate</title>
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

<body>

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
          <h2>Register</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Register</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

      <?php
    if($user_info == 'eanu'){
    ?>

   <div class="alert alert-danger alert-dismissible fade show" role="alert">
   	<center>
	  <strong>Sign Up Error!</strong> Account with this email already exists
	</center>
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>

    <?php	
    }
    ?>

    <section class="inner-page">
      <div class="container">
         <form action="" enctype="multipart/form-data"  method="post" id="form">
          <h3>Register For A New Account</h3>
          <br>

                  <div class="form-floating mb-3">
                    <input name="fname" type="text" class="form-control" id="floatingInput" placeholder="name" required="">
                    <label for="floatingInput">Full Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="femail" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required="">
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="fpass" type="password" class="form-control" id="password"  placeholder="Password" required="">
                    <label for="floatingPassword">Password</label>
                    <input style="margin-left:650px;" type="checkbox" id="view-password" onclick="togglePassword()"> Show Password
                  </div>
                  <div class="form-floating">
                    <input name="fphone" type="phone" class="form-control" id="floatingPassword" placeholder="Phone" required="">
                    <label for="floatingPassword">Phone Number (+216)</label>
                  </div>


             <br>

                 <p style="font-size: 1.5rem;">Profile Image <span class="text-muted">(Optional)</span></p>
                 <div>
                     <input name="fdp" class="form-control form-control-lg" type="file">
                 </div>



                   <br>
                  <input type="submit" name="register" class="btn btn-primary col-12 align-middle p-2" value="Register">
                  <br><br>
                  <center><a href="login.php">Already Have and Account? Login Instead</a></center>
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

  <script>
  function togglePassword() {
    var password = document.getElementById("password");
    var viewPassword = document.getElementById("view-password");
    if (viewPassword.checked) {
      password.type = "text";
    } else {
      password.type = "password";
    }
  }
</script>

</body>

</html>

<?php
}
    ?>