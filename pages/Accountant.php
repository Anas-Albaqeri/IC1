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
  

  <title>IC1 - Accountant Home Page</title>
 
  

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
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>IC1<span>.</span> Accountant</h1>
      </a>
      <!-- functions navigation bar -->
      <nav id="navbar" class="navbar">
        <ul>
          <!-- Payments -->
          <li class="dropdown"><a href="#"><span> Payments</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span> Income</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li class="dropdown"><a href="#"><span> Investments</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                        <li><a href="#">generate investemet income report</a></li>
                        <li><a href="#">update flaged investment income reports</a></li>
                      </ul>
                
                    <li class="dropdown"><a href="#"><span> Premiums</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                        <li><a href="#">Underwriter Premium Report</a></li>
                        <li><a href="#">Unvalidated Premiums</a></li>
                        <li><a href="#">Manage Invoice Returns</a></li>
                      </ul>

                    <li class="dropdown"><a href="#"><span> Services</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                        <li><a href="#">Generate Company's Service Income Report</a></li>
                        <li><a href="#">Update Company's Service Income</a></li>
                      </ul>
                 </ul>
           </ul>
          </li>
           <!-- Budget -->
           <li class="dropdown"><a href="#"><span>Balance</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
               <li><a href="#">View Budget</a></li>
               <li><a href="#">Generate Budget Update Proposal</a></li>
               <li><a href="#">Update Budget</a></li>
            </ul>
             
          </li>
          <!-- Accounts -->
          <li class="dropdown"><a href="#"><span>Accounts</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
               <li><a href="../BE/Accounts/EmployeesAccounts.php">Employees Accounts</a></li>
               <li><a href="#">Company Accounts</a></li>
            </ul>
          </li>

          <!-- logout -->
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