

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <?php
    include('DBCONNECT.php');

    session_start();
    if($_SESSION['u_id'] != 25){
        header('location:index.php');
    }
    else{
        $u_id = $_SESSION['u_id'];
    }

    $getuserdetailssql = "SELECT * FROM users";
    $getuserdetails = mysqli_query($connectionString,$getuserdetailssql);
    $userdetailsarr = mysqli_fetch_array($getuserdetails);

    $getproductsdetailssql = "SELECT * FROM products";
    $getuserdetails = mysqli_query($connectionString,$getuserdetailssql);
    $userdetailsarr = mysqli_fetch_array($getuserdetails)

    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <TH>Action</TH>
        </tr>
        <?php
        foreach ($getuserdetails as $user) {
            echo '<tr>';
            echo '<td>' . $user['U_ID'] . '</td>';
            echo '<td>' . $user['U_NAME'] . '</td>';
            echo '<td>' . $user['U_EMAIL'] . '</td>';
            echo '<td> <button type="button" class="btn btn-danger" href="deleteuser?id=<?php echo $u_id?>">DELETE</button></td>';
            echo '</tr>';
        }
        ?>
    </table>
    
</body>
</html>
