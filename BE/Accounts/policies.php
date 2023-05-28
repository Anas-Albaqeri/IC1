<?php
//start session
session_start();
//check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../Index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>


  <title>IC1 - All claims</title>

  <!-- Vendor CSS Files -->
  <link href="../../assets/css-2/css-3/css/css4-a.css" rel="stylesheet">

  
  <!-- Template Main CSS File -->
  <link href= "../../assets/css/main.css" rel="stylesheet">
  <link rel = "stylesheet" href = "../../styles/table.css">



</head>

<body style= "background: #008374; margin-bottom: 50px;">

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <img src ="../../assets/img/United Insurance.png" alt="United Insurance Logo" width="100" height="100" class="d-inline-block align-text-top"> 
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>IC1<span>.</span> Current Policies</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href= "../../pages/financialmanager.php"> Go Back</a></li>
        </ul>

      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <?php
      include '../../functions/functions.php';
      displaypolicies();
    ?>

  </section>
 

 
</body>

</html>
