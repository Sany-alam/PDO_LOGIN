<?php 
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/Session.php';
Session::init();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register PDO</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- FONTAwesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<!--for logout -->
<?php 
  if (isset($_GET['action']) && $_GET['action'] == "logout"){
    Session::destroy();
  }
?>

<body>
    <div class="container">
       <nav class="navbar navbar-default">
         <div class="container-fluid">
           <div class="navbar-header">
           <a class="navbar-brand" href="index.php"> Login Register System & PDO </a>
           </div>
           <div class="navs">
            <ul class="navbar navbar-default">     
<?php
  $id = Session::get("id");
  $userlogin = Session::get("login");

  if( $userlogin == true ) {
?>
              <li class="nav-item"><a class="nav-link pr-5" href="profile.php">Profile</a></li>
              <li class="nav-item"><a class="nav-link pr-5" href="?action=logout">Logout</a></li>
  <?php  } else { ?>
              <li class="nav-item"><a class="nav-link pr-5" href="login.php">Login</a></li>
              <li class="nav-item"><a class="nav-link pr-5" href="register.php">Register</a></li>
  <?php } ?> 

            </ul>
          </div>

         </div>
       </nav>  
       