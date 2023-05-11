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
        <h1>IC1<span>.</span> Add Policy</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href= "../../pages/Underwriter.php"> Go Back</a></li>
        </ul>

      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
    <form method="POST" action="addpolicy.php" ID="login-form" style=
    "width: 50%;
    background: white;
    margin: 10px;
    padding: 19px;
    border-radius: 10px;
    display: block;
    font-weight: bold;
    margin-left: 25%;">
        <label for="policy_number ">Policy Number:</label>   
        <input type="text" name="policy_number" required class = "ictextfield">
        <br>
        <br>
        <label for="holder">Holder:</label>
        <input type="text" name="holder" required class = "ictextfield">
        <br>
        <br>
        <label for="effective_date">Policy Effective Date:</label>
        <input type="date" name="effective_date" required class = "ictextfield">
        <br>
        <br>
        <label for="expire_date">Policy Expire Date:</label>
        <input type="date" name="expire_date" required class = "ictextfield">
        <br>
        <br>
        <label for="Manufacturer">Manufacturer:</label>
        <select for="Manufacturer" name = "Manufacturer">
          <option value="BMW">BMW</option>
          <option value="Mercedes">Mercedes</option>
          <option value="Audi">Audi</option>
          <option value="Toyota">Toyota</option>
          <option value="Hyundai">Hyundai</option>
          <option value="Volkswagen">Volkswagen</option>
          <option value="Honda">Honda</option>
          <option value="Ford">Ford</option>
          <option value="Nissan">Nissan</option>
          <option value="Jeep">Jeep</option>
          <option value="Tesla">Tesla</option>
          <option value="Lexus">Lexus</option>
          <option value="Mazda">Mazda</option>
          <option value="Fiat">Fiat</option>
          <option value="Cadillac">Cadillac</option>
        </select>
        <br>
        <br>
        <label for="Vehicle">Vechicle Type:</label>
        <select for="Vehicle_Type" name= "Vehicle_Type">
          <option value="Sedan">Sedan</option>
          <option value="SUV">SUV</option>
          <option value="Motorcycle">Motorcycle</option>
          <option value="Pick-Up">Pick-Up</option>
          <option value="Tracktor">Tracktor</option>
        </select>
        <br>
        <br>
        <label for="Number_Of_Units">Number Of Units:</label>
        <input type="number" name="Number_Of_Units" min="0" step="0.01" required class = "ictextfield">
        <br>
        <br>
        <label for="Policy_Type">Policy_Type:</label>
        <select for="Policy_Type" name = "Policy_Type">
          <option value="auto liability coverage">auto liability coverage</option>
          <option value="collision coverage">collision coverage</option>
          <option value="comprehensive coverage">comprehensive coverage</option>
          <option value="uninsured and underinsured motorist coverage">uninsured and underinsured motorist coverage</option>
          <option value="personal injury protection">personal injury protection</option>
        </select>
        <br>
        <br>
        <label for="Price_Per_Unit">Price Per Units:</label>
        <input type="number" name="Price_Per_Unit" min="0" step="0.01" required class = "ictextfield">
        <br>
        <br>
        <label for="percentage">Percentae Of Permium:</label>
        <input type="number" name="percentage" min="0" step="0.01" required class = "ictextfield">
        <br>
        <br>
        <label for="Currency">Currency:</label>
        <input type="text" name="Currency" min="0" step="0.01"  class = "ictextfield">
        <br>
        <br>
        <label for="Coverage_Per_Unit">Coverage_Per_Unit:</label>
        <input type="number" name="Coverage_Per_Unit" min="0" step="0.01" required class = "ictextfield">
        <br>
        <br>
        <label for="Third_Party">Third Party Coverage :</label>
        <input type="number" name="Third_Party" min="0" step="0.01" required class = "ictextfield">
        <br>
        <br>
        <button type="submit" class= "mbutton">Add Policy</button>
      </form>

  <script>
      function getPolicyDetails(policyId) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("policyDetails").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "get_policy_details.php?id=" + policyId, true);
			xhttp.send();
		}
	</script>

    
    <?php
        include '../../functions/functions.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Get form data
          $policy_number = $_POST['policy_number'];
          $policy_ID  = $_POST['policy_number'];
          $holder = $_POST['holder'];
          $effective_date = $_POST['effective_date'];
          $expire_date = $_POST['expire_date'];
          $Vehicle_Type = $_POST['Vehicle_Type'];
          $Number_Of_Units = $_POST['Number_Of_Units'];
          $Policy_Type = $_POST['Policy_Type'];
          $Price_Per_Unit = $_POST['Price_Per_Unit'];
          $percentage = $_POST['percentage'];
          $total_amount = (($percentage * $Price_Per_Unit)/100) * $Number_Of_Units;
          $Total_Perm= $total_amount;
          $Currency = $_POST['Currency'];
          $Coverage_Per_Unit = $_POST['Coverage_Per_Unit'];
          $Third_Party = $_POST['Third_Party'];
          $Coverage = (($Coverage_Per_Unit *$Price_Per_Unit)/100)*$Number_Of_Units;
          $Manufacturer = $_POST['Manufacturer'];
          $Third_Party_Coverage = (($Third_Party * $Coverage)/(100*$Number_Of_Units)) * $Number_Of_Units;
          
          
          // Insert new policy into database
          $result = addpolicy($policy_number, $holder, $effective_date, $expire_date, $total_amount,$policy_ID, $Vehicle_Type, $Number_Of_Units, $Policy_Type, $Price_Per_Unit, $percentage, $Total_Perm, $Currency, $Coverage_Per_Unit, $Third_Party_Coverage, $Coverage, $Manufacturer);

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