<?php

include('DBCONNECT.php');

$u_id = $_GET['id'];
$from = $_SERVER['HTTP_REFERER'];

session_start();
if($_SESSION['u_id'] != 25){
  header('location:index.php');
}
else{
  $u_id = $_SESSION['u_id'];

  $unsavelistingsql ="DELETE FROM users WHERE U_ID = $u_id";
  $unsavelisting = mysqli_query($connectionString,$unsavelistingsql);

    if($unsavelisting){
        if(strpos($from, 'explore.php')){
            echo "Listing Un-Saved";
        }
        else{
            header('location:'.$from);
        }
    }

}

?>