<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../../index.php');
    exit();
}

?>

<html lang="en">

<head>


  <title>IC1 -  Add Policy Page</title>

  <link href="../../styles/ic1form.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/css-2/css-3/css/css4-a.css" rel="stylesheet">

  
  <!-- Template Main CSS File -->
  <link href="../../assets/css/main.css" rel="stylesheet">
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
        <h1>IC1<span>.</span> Update Flagged Policy</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href= "AddClaim.php"> Go Back</a></li>
        </ul>

      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

   <div>
    <?php
    //include functions
    include '../../functions/functions.php';

    // Get the policy_number value from the URL parameters
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $file_claim = $_POST['file_claim'];
        $policy_number = $_POST['policy_number'];
    
    }
         // Use the policy_number value as needed
    displaypolicy($policy_number);
    
    ?>
   </div>  
   
  <div>
    <form method="POST" action="file_claim.php" ID="login-form" style=
    "width: 50%;
    background: white;
    margin: 10px;
    padding: 19px;
    border-radius: 10px;
    display: block;
    font-weight: bold;
    margin-left: 25%;">
        <label for="Claim_Type">Claim Type:</label>
            <select for="Claim Type" name= "claim_type">
          <option value="Burglary&Theft">Burglary and Theft</option>
          <option value="Water Damage">Water and Freezing Damage</option>
          <option value="Fire">Fire</option>
          <option value="Road">Road Acciedent</option>
          <option value="Wear And Tear">Wear and Tear</option>
            </select>
        <br>
        <br>
        <label for="Claim_Amount">Claim Amount:</label>
        <input type="number" name="Claim_Amount" min="0" step="0.01" required class = "ictextfield">
        <br>
        <br>
        <label for="Damage_Type">Claim Type:</label>
            <select for="Damage_Type" name= "Damage_Type">
          <option value="Full">Full Damage</option>
          <option value="Partial">Partial</option>
          <option value="Replacemet">Components Replacement</option>
            </select>
        <br>
        <br>
        <input type="hidden" name="policy_number" value="<?php echo $policy_number; ?>">
        <button type="submit" name="claim" class= "mbutton">Add Policy</button>
        
      </form>
    <div>
    

    
    <?php
    if (isset($_POST['claim'])) {
        // claim submitted submitted
        $claim_type = $_POST['claim_type'];
        $claim_amount = $_POST['Claim_Amount'];
        $damage_type = $_POST['Damage_Type'];
        $policy_number = $_POST['policy_number'];
      

        //insert into database
       $result = addclaim($policy_number,$claim_type, $claim_amount, $damage_type);

         if ($result) {
          echo "<script>alert('Claim Added Successfully')</script>";
          echo "<script>window.location.href='AddClaim.php'</script>";
        } else {
            echo "<script>alert('Claim Not Added')</script>";
            echo "<script>window.location.href='AddClaim.php'</script>";
            }

    
    }

    ?>

  

 
</body>

</html>
