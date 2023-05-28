

<html lang="en">

<head>


  <title>IC1 -  Manage Users</title>

  <link href="../styles/ic1form.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/css-2/css-3/css/css4-a.css" rel="stylesheet">

  
  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
  <link rel = "stylesheet" href = "../styles/table.css">



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
        <h1>IC1<span>.</span> Manage Users</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href= "../../pages/index.php"> Go Back</a></li>
        </ul>

      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
    <form method="POST" action="admin.php" ID="login-form" style=
    "width: 50%;
    background: white;
    margin: 10px;
    padding: 19px;
    border-radius: 10px;
    display: block;
    font-weight: bold;
    margin-left: 25%;">
        <label for="Fname ">First Name</label>   
        <input type="text" name="policy_number" required class = "ictextfield">
        <br>
        <br>
        <label for="holder">Last Name:</label>
        <input type="text" name="holder" required class = "ictextfield">
        <br>
        <br>
        <label for="Position">Position:</label>
        <select for="Position" name = "Position">
          <option value="Underwriter">Underwriter</option>
          <option value="PolicyManager">Policy Manager</option>
          <option value="FinancialManager">Financial Manager</option>
          <option value="Claim">Claim Manager</option>
          <option value="0">General Manager</option>
        <br>
        <br>
        <label for="password">Password:</label>
        <input type="text" name="password" required class = "ictextfield">
        <br>
        <label for="holder">Confirm Password</label>
        <input type="text" name="confpass" required class = "ictextfield">
        <br>
       
        <button type="submit" class= "mbutton">Add User</button>
      </form>



    
    <?php
        include '../../functions/functions.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Get form data
            $Fname = $_POST['Fname'];
            $Lname = $_POST['Lname'];
            $Position = $_POST['Position'];
            $password = $_POST['password'];
            $confpass = $_POST['confpass'];
            $hashedpassword = sha1($password);

            if($Position == 'Underwriter'){
              $Dept = 2;
              $Position = 1;
            }
            if($Position == 'PolicyManager'){
              $Dept = 2;
              $Position = 0;
            }
            if($Position == 'FinancialManager'){
              $Dept = 1;
              $Position = 0;
            }
            if($Position == 'Claim'){
              $Dept = 3;
              $Position = 0;
            }
            if($Position == 'General Manager'){
              $Dept = 0;
              $Position = 0;
            }

          // Insert new policy into database
            $result = addUser($Fname, $Lname,$Dept, $Position, $hashedpassword);
          if ($result) {
            // Redirect user to policies table to view new policy
            echo '<script>alert("Policy added successfully")</script>';
          } else {
            // Display error message
            echo "<script>alert('Error adding policy')</script>";
          }
        }
?>

  

 
</body>

</html>