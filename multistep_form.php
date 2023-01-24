<?php
include('DBCONNECT.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page | BarterMate</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="google-signin-client_id" content="800461333507-ibhtlaaat8brg0d3e7lrhlcra1aup736.apps.googleusercontent.com">

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

  <style>
     
#title-container {
    min-height: 460px;
    height: 100%;
    color: #fff;
    background-color: #DC3545;
    text-align: center;
    padding: 105px 28px 28px 28px;
    box-sizing: border-box;
    position: relative;
    box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
    -webkit-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
    -moz-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
}
 
#title-container h2 {
    font-size: 45px;
    font-weight: 800;
    color: #fff;
    padding: 0;
    margin-bottom: 0px;
}
 
#title-container h3 {
    font-size: 25px;
    font-weight: 600;
    color: #82000a;
    padding: 0;
}
 
#title-container p {
    font-size: 13px;
    padding: 0 25px;
    line-height: 20px;
}
 
.covid-image {
    width: 214px;
    margin-bottom: 15px;
}

 
#qbox-container {
    background: url(../img/corona.png);
    background-repeat: repeat;
    position: relative;
    padding: 62px;
    min-height: 630px;
    box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
    -webkit-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
    -moz-box-shadow: 10px 8px 21px 0px rgba(204, 204, 204, 0.75);
}
 
#steps-container {
    margin: auto;
    width: 500px;
    min-height: 420px;
    display: flex;
    vertical-align: middle;
    align-items: center;
}
 
.step {
    display: none;
}
 
.step h4 {
    margin: 0 0 26px 0;
    padding: 0;
    position: relative;
    font-weight: 500;
    font-size: 23px;
    font-size: 1.4375rem;
    line-height: 1.6;
}
 
button#prev-btn,
button#next-btn,
button#submit-btn {
    font-size: 17px;
    font-weight: bold;
    position: relative;
    width: 130px;
    height: 50px;
    background: #DC3545;
    margin: 0 auto;
    margin-top: 40px;
    overflow: hidden;
    z-index: 1;
    cursor: pointer;
    transition: color .3s;
    text-align: center;
    color: #fff;
    border: 0;
    -webkit-border-bottom-right-radius: 5px;
    -webkit-border-bottom-left-radius: 5px;
    -moz-border-radius-bottomright: 5px;
    -moz-border-radius-bottomleft: 5px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
}
 
button#prev-btn:after,
button#next-btn:after,
button#submit-btn:after {
    position: absolute;
    top: 90%;
    left: 0;
    width: 100%;
    height: 100%;
    background: #cc0616;
    content: "";
    z-index: -2;
    transition: transform .3s;
}
 
button#prev-btn:hover::after,
button#next-btn:hover::after,
button#submit-btn:hover::after {
    transform: translateY(-80%);
    transition: transform .3s;
}
 
.progress {
    border-radius: 0px !important;
}
 
.q__question {
    position: relative;
}
 
.q__question:not(:last-child) {
    margin-bottom: 10px;
}
 
.question__input {
    position: absolute;
    left: -9999px;
}
 
.question__label {
    position: relative;
    display: block;
    line-height: 40px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    background-color: #fff;
    padding: 5px 20px 5px 50px;
    cursor: pointer;
    transition: all 0.15s ease-in-out;
}
 
.question__label:hover {
    border-color: #DC3545;
}
 
.question__label:before,
.question__label:after {
    position: absolute;
    content: "";
}
 
.question__label:before {
    top: 12px;
    left: 10px;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background-color: #fff;
    box-shadow: inset 0 0 0 1px #ced4da;
    -webkit-transition: all 0.15s ease-in-out;
    -moz-transition: all 0.15s ease-in-out;
    -o-transition: all 0.15s ease-in-out;
    transition: all 0.15s ease-in-out;
}
 
.question__input:checked+.question__label:before {
    background-color: #DC3545;
    box-shadow: 0 0 0 0;
}
 
.question__input:checked+.question__label:after {
    top: 22px;
    left: 18px;
    width: 10px;
    height: 5px;
    border-left: 2px solid #fff;
    border-bottom: 2px solid #fff;
    transform: rotate(-45deg);
}
 
.form-check-input:checked,
.form-check-input:focus {
    background-color: #DC3545 !important;
    outline: none !important;
    border: none !important;
}
 
input:focus {
    outline: none;
}
 
#input-container {
    display: inline-block;
    box-shadow: none !important;
    margin-top: 36px !important;
}
 
label.form-check-label.radio-lb {
    margin-right: 15px;
}
 
#q-box__buttons {
    text-align: center;
}
 
input[type="text"],
input[type="email"] {
    padding: 8px 14px;
}
 
input[type="text"]:focus,
input[type="email"]:focus,
input[type="phone"]:focus,
input[type="password"]:focus {
    border: 1px solid #DC3545;
    border-radius: 5px;
    outline: 0px !important;
    -webkit-appearance: none;
    box-shadow: none !important;
    -webkit-transition: all 0.15s ease-in-out;
    -moz-transition: all 0.15s ease-in-out;
    -o-transition: all 0.15s ease-in-out;
    transition: all 0.15s ease-in-out;
}


 
.form-check-input:checked[type=radio],
.form-check-input:checked[type=radio]:hover,
.form-check-input:checked[type=radio]:focus,
.form-check-input:checked[type=radio]:active {
    border: none !important;
    -webkit-outline: 0px !important;
    box-shadow: none !important;
}
 
.form-check-input:focus,
input[type="radio"]:hover {
    box-shadow: none;
    cursor: pointer !important;
}
 
#success {
    display: none;
}
 
#success h4 {
    color: #DC3545;
}
 
.back-link {
    font-weight: 700;
    color: #DC3545;
    text-decoration: none;
    font-size: 18px;
}
 
.back-link:hover {
    color: #82000a;
}

 
#preloader-wrapper {
    width: 100%;
    height: 100%;
    z-index: 1000;
    display: none;
    position: fixed;
    top: 0;
    left: 0;
}
 
#preloader {
    background-image: url('../img/preloader.png');
    width: 120px;
    height: 119px;
    border-top-color: #fff;
    border-radius: 100%;
    display: block;
    position: relative;
    top: 50%;
    left: 50%;
    margin: -75px 0 0 -75px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    z-index: 1001;
}
 
@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
 
@keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
 
#preloader-wrapper .preloader-section {
    width: 51%;
    height: 100%;
    position: fixed;
    top: 0;
    background: #F7F9FF;
    z-index: 1000;
}
 
#preloader-wrapper .preloader-section.section-left {
    left: 0
}
 
#preloader-wrapper .preloader-section.section-right {
    right: 0;
}
 
.loaded #preloader-wrapper .preloader-section.section-left {
    transform: translateX(-100%);
    transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
}
 
.loaded #preloader-wrapper .preloader-section.section-right {
    transform: translateX(100%);
    transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
}
 
.loaded #preloader {
    opacity: 0;
    transition: all 0.3s ease-out;
}
 
.loaded #preloader-wrapper {
    visibility: hidden;
    transform: translateY(-100%);
    transition: all 0.3s 1s ease-out;
}


@media (min-width: 990px) and (max-width: 1199px) {
    #title-container {
        padding: 80px 28px 28px 28px;
    }
    #steps-container {
        width: 85%;
    }
}
 
@media (max-width: 991px) {
    #title-container {
        padding: 30px;
        min-height: inherit;
    }
}
 
@media (max-width: 767px) {
    #qbox-container {
        padding: 30px;
    }
    #steps-container {
        width: 100%;
        min-height: 400px;
    }
    #title-container {
        padding-top: 50px;
    }
}
 
@media (max-width: 560px) {
    #qbox-container {
        padding: 40px;
    }
    #title-container {
        padding-top: 45px;
    }
}

  </style>


</head>

<body>

  
  <!-- ======= Header ======= -->
 
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
   

    <section class="inner-page">
      
        <div class="container-fluid d-flex align-items-center">
            <div id="preloader-wrapper">
               <div id="preloader"></div>
               <div class="preloader-section section-left"></div>
               <div class="preloader-section section-right"></div>
            </div>
          <div class="row g-0 justify-content-center" style="margin: 0 auto; width: 75rem;">
            <!-- TITLE -->
            <div class="col-lg-4 offset-lg mx-0 px-0">
               <div id="title-container">
                
                  <h2>Account Registration</h2>
                  <hr>
                  <h3></h3>
                  
                  <p>
                    <!-- <div class="g-signin2"  data-height="50" data-longtitle="true"data-onsuccess="onSignIn" style="width: auto;"></div> -->
                  </p>
                  
               </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-8 mx-0 px-0">
               <div class="progress">
                  <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-animated bg-success" role="progressbar" style="width: 0%"></div>
               </div>
               <div id="qbox-container">
                  <form class="needs-validation" action="" id="form-wrapper" method="post" name="form-wrapper" novalidate="">
                     <div id="steps-container">
                        <div class="step" style="min-width:100%;">
                           <h4>Personal Information</h4>
                              
                                  <div class="form-floating mb-3">
                                    <input name="fname" onkeydown="validate_input(this)" type="text" class="form-control" id="floatingInput" placeholder="name" required="">
                                    <label for="floatingInput">First Name</label>
                                    <div class="valid-feedback">
                                        Looks good!
                                      </div>
                                      <div class="invalid-feedback">
                                        Invalid Name Format!
                                      </div>
                                  </div>
                              
                                   <div class="form-floating mb-3">
                                    <input name="lname" type="text" onchange="validate_input(this,'text')" class="form-control" id="floatingInput" placeholder="name">
                                    <label for="floatingInput">Last Name</label>
                                    <div class="valid-feedback">
                                        Looks good!
                                      </div>
                                      <div class="invalid-feedback">
                                        Invalid Name Format!
                                      </div>
                                  </div>

                                  <div class="form-floating">
                                    <input name="fphone" type="phone" onchange="validate_input(this,'phone')" class="form-control" id="floatingPassword" placeholder="Phone" required="">
                                    <label for="floatingPassword">Phone Number (+92)</label>
                                    <div class="valid-feedback">
                                        Looks good!
                                      </div>
                                      <div class="invalid-feedback">
                                        Wrong Phone Number Format
                                      </div>
                                  </div>
                              
                          
                        </div>
                        <div class="step" style="min-width:100%;">
                           <h4>Credential Information</h4>
                          
                                  <div class="form-floating mb-3">
                                    <input name="email" onchange="validate_input(this,'email')" type="email" class="form-control" id="floatingInput" placeholder="email" required="">
                                    <label for="floatingInput">Enter Your Email Address</label>
                                      <div class="valid-feedback">
                                        Looks good!
                                      </div>
                                      <div class="invalid-feedback">
                                        Wrong Email Format
                                      </div>
                                  </div>
                              
                                   <div class="form-floating mb-3">
                                    <input name="remail" onchange="validate_input(this,'rEmail')" type="email" class="form-control" id="floatingInput" placeholder="remail" required="">
                                    <label for="floatingInput">Re-enter Your Email Address</label>
                                    <div class="valid-feedback">
                                        Looks good!
                                      </div>
                                    <div class="invalid-feedback">
                                        Re-Entered Email Does Not Match
                                    </div>
                                  </div>

                                  <hr>

                                  <div class="form-floating mb-3">
                                    <input name="pass" type="password" onchange="validate_input(this,'pass')" class="form-control" id="floatingPassword" placeholder="Password" required="">
                                    <label for="floatingPassword">Password</label>
                                    <div class="valid-feedback">
                                        Looks good!
                                      </div>
                                    <div class="invalid-feedback">
                                        Weak Password! Must Be Atleast 8 Characters
                                    </div>
                                  </div>

                                  <div class="form-floating mb-3">
                                    <input name="rpass" type="password" onchange="validate_input(this,'rpass')" class="form-control" id="floatingPassword" placeholder="rPassword" required="">
                                    <label for="floatingPassword">Re-Enter Password</label>
                                    <div class="valid-feedback">
                                        Looks good!
                                      </div>
                                    <div class="invalid-feedback">
                                        Re-Entered Password Does Not Match
                                    </div>
                                  </div>
                                  

                        </div>
                        <div class="step" style="min-width: 100%;">
                           <h4>Profile Picture (Optional)</h4>

            

                          <div class="col-md-8 mx-auto mb-4">
                              <input onchange="readURL(this);" class="form-control rounded mx-0" name="image" type="file" id="gallery-photo-add" >
                          </div>

                          <center>
                          <img src="assets/img/user_default.svg" style="max-width: 20rem;" alt="" class="gallery">
                        </center>

                        </div>
                        
                        <div class="step">
                           <div class="mt-1">
                              <div class="closing-text">
                                 <h4>That's about it! Your Account Will Be Created Shortly</h4>
                                 <p>Upon Clicking the Submit Button, A Verification Email will be sent to your provided Email from where you can Verify Your Email & Access Your Account.</p>
                                 <p>Click on the submit button to continue.</p>
                              </div>
                           </div>
                        </div>
                        <div id="success">
                           <div class="mt-5">
                              <h4><span class="text-success">Success!</span> A Verification Email Has Been Sent.</h4>
                              <br>
                              <center>
                              <img src="assets/img/email_sent.svg" style="max-width: 20rem;" alt="">
                               
                              <!-- ➜ -->
                              <br><br>
                              <a class="back-link" href="login.php">Proceed To The Login Page ➜ </a>
                              </center>
                           </div>
                        </div>
                     </div>
                     <div id="q-box__buttons">
                        <button id="prev-btn" type="button">Previous</button> 
                        <button id="next-btn" type="button">Next</button> 
                        <button id="submit-btn" type="submit">Submit</button>
                     </div>
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

  <script>
let step = document.getElementsByClassName('step');
let prevBtn = document.getElementById('prev-btn');
let nextBtn = document.getElementById('next-btn');
let submitBtn = document.getElementById('submit-btn');
let form = document.getElementsByTagName('form')[0];
let preloader = document.getElementById('preloader-wrapper');
let bodyElement = document.querySelector('body');
let succcessDiv = document.getElementById('success');

form.onsubmit = () => {
    return false
}
let current_step = 0;
let stepCount = 3
step[current_step].classList.add('d-block');
if (current_step == 0) {
    prevBtn.classList.add('d-none');
    submitBtn.classList.add('d-none');
    nextBtn.classList.add('d-inline-block');
}

const progress = (value) => {
    document.getElementsByClassName('progress-bar')[0].style.width = `${value}%`;
}

nextBtn.addEventListener('click', () => {
    current_step++;
    let previous_step = current_step - 1;
    if ((current_step > 0) && (current_step <= stepCount)) {
        prevBtn.classList.remove('d-none');
        prevBtn.classList.add('d-inline-block');
        step[current_step].classList.remove('d-none');
        step[current_step].classList.add('d-block');
        step[previous_step].classList.remove('d-block');
        step[previous_step].classList.add('d-none');
        if (current_step == stepCount) {
            submitBtn.classList.remove('d-none');
            submitBtn.classList.add('d-inline-block');
            nextBtn.classList.remove('d-inline-block');
            nextBtn.classList.add('d-none');
        }
    } else {
        if (current_step > stepCount) {
            form.onsubmit = () => {
                return true
            }
        }
    }
    progress((100 / stepCount) * current_step);
});
 
 
prevBtn.addEventListener('click', () => {
    if (current_step > 0) {
        current_step--;
        let previous_step = current_step + 1;
        prevBtn.classList.add('d-none');
        prevBtn.classList.add('d-inline-block');
        step[current_step].classList.remove('d-none');
        step[current_step].classList.add('d-block')
        step[previous_step].classList.remove('d-block');
        step[previous_step].classList.add('d-none');
        if (current_step < stepCount) {
            submitBtn.classList.remove('d-inline-block');
            submitBtn.classList.add('d-none');
            nextBtn.classList.remove('d-none');
            nextBtn.classList.add('d-inline-block');
            prevBtn.classList.remove('d-none');
            prevBtn.classList.add('d-inline-block');
        }
    }
 
    if (current_step == 0) {
        prevBtn.classList.remove('d-inline-block');
        prevBtn.classList.add('d-none');
    }
    progress((100 / stepCount) * current_step);
});
 
 
submitBtn.addEventListener('click', () => {
    preloader.classList.add('d-block');
 
    const timer = ms => new Promise(res => setTimeout(res, ms));
 
    timer(3000)
        .then(() => {
            bodyElement.classList.add('loaded');
        }).then(() => {
            step[stepCount].classList.remove('d-block');
            step[stepCount].classList.add('d-none');
            prevBtn.classList.remove('d-inline-block');
            prevBtn.classList.add('d-none');
            submitBtn.classList.remove('d-inline-block');
            submitBtn.classList.add('d-none');
            succcessDiv.classList.remove('d-none');
            succcessDiv.classList.add('d-block');
        })
 
});
  </script>




<script src="https://apis.google.com/js/platform.js" async defer></script>  

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

    function validate_input(text_input,type){

        
        
    }

     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.gallery')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
    
</body>

</html>