<?php
//start the session
    session_start();
    //check to see if the user is logged in, if not redirect to login page
    if (!isset($_SESSION['username'])) {
        header('Location:../Index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>


  <title>IC1 -  Underwriter Home Page</title>

  <!-- Vendor CSS Files -->
  <link href="../assets/css-2/css-3/css/css4-a.css" rel="stylesheet">
  <link href="../assets/css-2/ic1-icons/ic1-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <img src ="../assets/img/United Insurance.png" alt="United Insurance Logo" width="100" height="100" class="d-inline-block align-text-top"> 
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>IC1<span>.</span> Underwriter </h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
         <li><a href="../BE/policies/addpolicy.php">Add New Policies</a></li>
          <li><a href="../BE/policies/allpolicies_U.php">Current Policies</a></li>
          <li><a href="../Be/policies/pendingpolicies_U.php">Pending Policies</a></li>
          <li><a href="../Be/policies/Deniedpolicies.php">Denied / Canceled</a></li>
          <li><a href="../Be/policies/flagged.php">Flagged Policies</a></li>

          <li><a href= "../index.php"> Logout</a></li>

        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>UNITED Insurance </h2>
          <p>Because your safety matters...</p>
          
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="../assets/img/united insurance building.jpg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

  
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>ARP-Systems:IC1 </span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a>Anas Albaqeri & Robil Sabek</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

 <!-- Vendor JS Files -->
 <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  

 <!-- Template Main JS File -->
 <script src="../assets/js/main.js"></script>
 
</body>

</html>