<?php

//display flagged policy inofrmation
function displaypolicy($policy_number){
      //connect to our database
      $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

      //check to see if connection was successful
      if (!$conn) {
          die('Connection failed: ' . mysqli_connect_error());
      }
  
      //get the policies from the database
      $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies WHERE PolicyNumber = '$policy_number'";
      
      //run our query and get the results
      $result = mysqli_query($conn, $sql);
  
      //check to see if we got any results
      if (mysqli_num_rows($result) > 0) {
         
          // Start table markup   
          echo "<table class='main-table'>";
      
          // Table headers
          echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Make</th><th>Type of Vehicle</th><th>Number Of Units</th><th>policy type</th><th>Price Per Unit</th><th>Percentage of Permium</th><th>coverage per unit</th><th>Total Premium Paid</th><th>Total Coverage</th><th>Status</th><th>Comment</th></tr>";
      
          // Loop through each row in the result and output data in table rows
          while ($row = mysqli_fetch_assoc($result)) {

             // set variable id equal to policy number and retrieve policy details
             $id = $row['PolicyNumber'];
             $sql2 = "SELECT * FROM policy_details WHERE ID = '$id'";    
             $result2 = mysqli_query($conn, $sql2);
             if (mysqli_num_rows($result2) > 0) {

             while($row2 = mysqli_fetch_assoc($result2)){

              echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>" . $row2["Manufacturer"]. "</td><td>". $row2["Vehicle_Type"] ."</td><td>". $row2["Number_Of_Units"]."</td><td>". $row2["Policy_Type"] . "</td><td>". $row2["Price_Per_Unit"] . "</td><td>". $row2["Percentage_Of_Permium"] . "</td><td>" . $row2["Coverage_Per_Unit"]  . "</td><td>" . $row["TotalAmount"] .  "</td><td>" . $row2["Coverage"] ."</td><td>" . $row["Status"]. "</td><td>"  .$row2["Comments"]."</td></tr>" ;
             }
            }
        }
      
          // End table markup
          echo "</table>";
      } else {
          // Output message if there are no rows in the result
          echo "No policies found.";
      }
      
      // Close database connection
      mysqli_close($conn);
}

//display all policies as underwriter 

function displaypolicies(){
      //connect to our database
      $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

      //check to see if connection was successful
      if (!$conn) {
          die('Connection failed: ' . mysqli_connect_error());
      }
  
      //get the policies from the database
      $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies";
      
      //run our query and get the results
      $result = mysqli_query($conn, $sql);
  
      //check to see if we got any results
      if (mysqli_num_rows($result) > 0) {
         
          // Start table markup   
          echo "<table class='main-table'>";
      
          // Table headers
          echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Type of Vehicle</th><th>Number Of Units</th><th>policy type</th><th>Price Per Unit</th><th>Percentage of Permium</th><th>Total Amount</th><th>Status</th></tr>";
      
          // Loop through each row in the result and output data in table rows
          while ($row = mysqli_fetch_assoc($result)) {

             // set variable id equal to policy number and retrieve policy details
             $id = $row['PolicyNumber'];
             $sql2 = "SELECT * FROM policy_details WHERE ID = '$id'";    
             $result2 = mysqli_query($conn, $sql2);
             if (mysqli_num_rows($result2) > 0) {

             while($row2 = mysqli_fetch_assoc($result2)){

              echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>". $row2["Vehicle_Type"] . "</td><td>". $row2["Number_Of_Units"]."</td><td>". $row2["Policy_Type"] . "</td><td>". $row2["Price_Per_Unit"] . "</td><td>". $row2["Percentage_Of_Permium"] . "</td><td>" . $row["TotalAmount"] . "</td><td>" . $row["Status"] . 
             "</td></tr>" ;
             }
            }
        }
      
          // End table markup
          echo "</table>";
      } else {
          // Output message if there are no rows in the result
          echo "No policies found.";
      }
      
      // Close database connection
      mysqli_close($conn);
}

//dispaly all policies with change status options as a manager
function displaypolicies_M(){
        //connect to our database
        $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

        //check to see if connection was successful
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }
    
        //get the policies from the databse
        $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies WHERE Status = 'Active'";
    
        //run our query and get the results
        $result = mysqli_query($conn, $sql);
    
        //check to see if we got any results
        if (mysqli_num_rows($result) > 0) {
    
            // Start table markup   
            echo "<table class = 'main-table'>";
        
            // Table headers
            echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Total Amount</th><th>Status</th> <th>Action</th></tr>";
        
            // Loop through each row in the result and output data in table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>" . $row["TotalAmount"] . "</td><td>" . $row["Status"] . 
                "</td><td><form action='change_status.php' method='POST'><select name='change_status' style=' margin: 10px;
                 padding: 5px;
                 border-radius: 3px;
                 background: #bebebe;
             '><option value='Cancel'>Cancel</option><option value='Flag'>Flag</option></select>
             <input type='hidden' name='policy_number' value='" . $row["PolicyNumber"] .
             "'/>
             <label for='comment'>comment:</label>
             <input type='text' name='comment' required class = 'ictextfield'>
             <input type='submit' value='Submit'/>
            
             </form></td></tr>";
            }
        
            // End table markup
            echo "</table>";
        } else {
            // Output message if there are no rows in the result
            echo "No Active policies found.";
        }
        
        // Close database connection
        mysqli_close($conn);
}

//display all pending policies as an underwriter
function displaypendingU(){
     //connect to our database
     $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

     //check to see if connection was successful
     if (!$conn) {
         die('Connection failed: ' . mysqli_connect_error());
     }
 
     //get the policies from the databse
     $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies WHERE Status = 'Pending'";
 
     //run our query and get the results
     $result = mysqli_query($conn, $sql);
 
     //check to see if we got any results
     if (mysqli_num_rows($result) > 0) {
 
         // Start table markup   
         echo "<table class = 'main-table'>";
     
         // Table headers
         echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Total Amount</th><th>Status</th></tr>";
     
         // Loop through each row in the result and output data in table rows
         while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>" . $row["TotalAmount"] . "</td><td>" . $row["Status"] . "</td></tr>";}

         // End table markup
         echo "</table>";
     } else {
         // Output message if there are no rows in the result
         echo "No policies found.";
     }
     
     // Close database connection
     mysqli_close($conn);

}

//display all policies as a manager
function dispalypending(){
    //connect to our database
    $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

    //check to see if connection was successful
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    //get the policies from the databse
    $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies WHERE Status = 'Pending'";

    //run our query and get the results
    $result = mysqli_query($conn, $sql);

    //check to see if we got any results
    if (mysqli_num_rows($result) > 0) {

        // Start table markup   
        echo "<table class = 'main-table'>";
    
        // Table headers
        echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Total Amount</th><th>Status</th><th>Action</th></tr>";
    
        // Loop through each row in the result and output data in table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>" . $row["TotalAmount"] . "</td><td>" . $row["Status"] .
             "</td><td><form action='approve_deny.php' method='POST'><select name='approve_deny' style=' margin: 10px;
             padding: 5px;
             border-radius: 3px;
             background: #bebebe;
         '><option value='Approve'>Approve</option><option value='Deny'>Deny</option></select><input type='hidden' name='policy_number' value='" . $row["PolicyNumber"] . "'/><input type='submit' value='Submit'/></form></td></tr>"; }
    
        // End table markup
        echo "</table>";
    } else {
        // Output message if there are no rows in the result
        echo "No policies found.";
    }
    
    // Close database connection
    mysqli_close($conn);



}

//add a new policy
function addpolicy($policyNumber, $holder, $policyEffectiveDate, $policyExpireDate, $totalAmount, $policy_ID, $Vehicle_Type, $Number_Of_Units, $Policy_Type, $Price_Per_Unit, $percentage, $Total_Perm, $Currency, $Coverage_Per_Unit, $Third_Party_Coverage, $Coverage, $Manufacturer){
     // Connect to the database
  $conn = mysqli_connect("localhost", "root", "root", "ic1");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare the SQL statement
  $sql = "INSERT INTO policies (ID, PolicyNumber, Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount) 
  VALUES ('$policy_ID','$policyNumber', '$holder', '$policyEffectiveDate', '$policyExpireDate', '$totalAmount')";

    // Execute the SQL statement
    $sql2 = "INSERT INTO policy_details (ID, Vehicle_Type, Number_Of_Units, Policy_Type, Price_Per_Unit, Percentage_Of_Permium, Total_Perm, Currency, Coverage_Per_Unit, Third_Party_Coverage, Coverage, Manufacturer)
    VALUES ('$policy_ID', '$Vehicle_Type', '$Number_Of_Units', '$Policy_Type', '$Price_Per_Unit', '$percentage', '$Total_Perm', '$Currency', '$Coverage_Per_Unit', '$Third_Party_Coverage', '$Coverage', '$Manufacturer')";

    // Execute the third  SQL statement income
    $sql3 = "INSERT INTO income (ID, Amount_recieved) VALUES ('$policy_ID', '$totalAmount')";
    // Execute the SQL statement

  if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)&& mysqli_query($conn, $sql3)) {
    $result = true;
  } else {
    $result = false;
  }

  // Close the database connection
  mysqli_close($conn);

  return $result;
}

//update a policy
function UpdatePolicy($policyNumber, $policyEffectiveDate, $policyExpireDate, $totalAmount, $Vehicle_Type, $Number_Of_Units, $Policy_Type, $Price_Per_Unit, $percentage, $Total_Perm, $Currency, $Coverage_Per_Unit, $Third_Party_Coverage, $Coverage, $Manufacturer, $Comments){
     // Connect to the database
     $conn = mysqli_connect("localhost", "root", "root", "ic1");

     // Check connection
     if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
     }
   
        // Prepare the SQL statement
       $sql = "UPDATE policies SET PolicyEffectiveDate = '$policyEffectiveDate', PolicyExpireDate = '$policyExpireDate', TotalAmount = '$totalAmount', Status = 'Pending' WHERE PolicyNumber = '$policyNumber'";

       // Execute the SQL statement
       $sql2 = "UPDATE policy_details SET Vehicle_Type = '$Vehicle_Type', Number_Of_Units = '$Number_Of_Units', Policy_Type = '$Policy_Type', Price_Per_Unit = '$Price_Per_Unit', Percentage_Of_Permium = '$percentage', Total_Perm = '$Total_Perm', Currency = '$Currency', Coverage_Per_Unit = '$Coverage_Per_Unit', Third_Party_Coverage = '$Third_Party_Coverage', Coverage = '$Coverage', Manufacturer = '$Manufacturer', Comments = '$Comments' WHERE ID = '$policyNumber'";

     // Execute the SQL statement
     if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
       $result = true;
       //alert user that policy has been updated
       echo "<script>alert('Policy has been updated!')</script>";
     } else {
        echo "<script>alert('Policy has not been updated!')</script>";
       $result = false;
     }
     
     // Close the database connection
     mysqli_close($conn);
   
     return $result;
}

//approve a policy
function approve($policy_number){
    $conn = mysqli_connect("localhost", "root", "root", "ic1");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // Prepare the SQL statement
    $sql = "UPDATE policies SET Status = 'Active' WHERE PolicyNumber = '$policy_number'";
  // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        $result = true;
    } else {
        $result = false;
    }
    // Close the database connection
    mysqli_close($conn);
    return $result;
}

//deny a policy
function deny($policy_number){
    $conn = mysqli_connect("localhost", "root", "root", "ic1");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // Prepare the SQL statement
    $sql = "UPDATE policies SET Status = 'Denied' WHERE PolicyNumber = '$policy_number'";
  // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        $result = true;
    } else {
        $result = false;
    }
    // Close the database connection
    mysqli_close($conn);
    return $result;
}

//display denied policies
function displaydenied(){
       //connect to our database
       $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

       //check to see if connection was successful
       if (!$conn) {
           die('Connection failed: ' . mysqli_connect_error());
       }
   
       //get the policies from the databse
       $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies WHERE Status = 'Denied' or Status = 'Expired' or status = 'Canceled'";
   
       //run our query and get the results
       $result = mysqli_query($conn, $sql);
   
       //check to see if we got any results
       if (mysqli_num_rows($result) > 0) {
   
           // Start table markup   
           echo "<table class = 'main-table'>";
       
           // Table headers
           echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Total Amount</th><th>Status</th><th>Action</th></tr>";
       
           // Loop through each row in the result and output data in table rows
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>" . $row["TotalAmount"] . "</td><td>" . $row["Status"] .
                "</td><td><form action='delete_policy.php' method='POST'></select><input type='hidden' name='policy_number' value='" . $row["PolicyNumber"] . "'/><input type='submit' value='Delete'/></form></td></tr>";  }
       
           // End table markup
           echo "</table>";
       } else {
           // Output message if there are no rows in the result
           echo "No policies found.";
       }
       
       // Close database connection
       mysqli_close($conn);
   
   
}

//delete a policy
function delete_policy($policy_number){

    $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');
 
  // Check connection
  if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // Prepare the SQL statement
    $sql = "DELETE from policies WHERE PolicyNumber = '$policy_number'";
  // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        $result = true;
    } else {
        $result = false;
    }
    // Close the database connection
    mysqli_close($conn);
    return $result;
}

//display accounts 
function displayEmployeesAccounts(){

    //connect to our database
    $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

    //check to see if connection was successful
    if (!$conn) {   
        die('Connection failed: ' . mysqli_connect_error());
    }

    //get the policies from the databse
    $sql = "SELECT Employee_ID, Fname, Lname, Salary, Advance FROM Employee_Account";

    //run our query and get the results
    $result = mysqli_query($conn, $sql);

    //check to see if we got any results
    if (mysqli_num_rows($result) > 0) {

        // Start table markup   
        echo "<table class = 'main-table'>";
    
        // Table headers
        echo "<tr><th>Employee_ID</th><th>FirstName</th><th>LastName</th><th>Salary</th><th>Advance</th></tr>";
    
        // Loop through each row in the result and output data in table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["Employee_ID"] . "</td><td>" . $row["Fname"] . "</td><td>" . $row["Lname"] . "</td><td>" . $row["Salary"] . "</td><td>" . $row["Advance"] ."</td></tr>";
        }
    
        // End table markup
        echo "</table>";
    } else {
        // Output message if there are no rows in the result
        echo "No Employees found.";
    }
    
    // Close database connection
    mysqli_close($conn);
}

//cnacnel a policy
function cancel($policy_number){
    $conn = mysqli_connect("localhost", "root", "root", "ic1");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    // Prepare the SQL statement
      $sql = "UPDATE policies SET Status = 'Canceled' WHERE PolicyNumber = '$policy_number'";
    // Execute the SQL statement
      if (mysqli_query($conn, $sql)) {
          $result = true;
      } else {
          $result = false;
      }
      // Close the database connection
      mysqli_close($conn);
      return $result;
}


//flag a policy
 function flag_polciy($policy_number, $comment){
    $conn = mysqli_connect("localhost", "root", "root", "ic1");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    // Prepare the SQL statement
      $sql1 = "UPDATE policies SET Status = 'Flagged' WHERE PolicyNumber = '$policy_number'";
      $sql2 = "UPDATE policy_details SET Comments = '$comment' WHERE ID = '$policy_number'";

    // Execute the SQL statement
      if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
          $result = true;
      } else {
          $result = false;
      }
      // Close the database connection
      mysqli_close($conn);
      return $result;

}


//display flagged policies and have the options for edit or delete
function displayflagged(){
        //connect to our database
        $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

        //check to see if connection was successful
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        //get the policies from the databse
        $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies WHERE Status = 'Flagged'";
    
        //run our query and get the results
        $result = mysqli_query($conn, $sql);
    
        //check to see if we got any results
        if (mysqli_num_rows($result) > 0) {
    
            // Start table markup   
            echo "<table class = 'main-table'>";
        
            // Table headers
            echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Total Amount</th><th>Status</th> <th>Action</th></tr>";
        
            // Loop through each row in the result and output data in table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>" . $row["TotalAmount"] . "</td><td>" . $row["Status"] . 
                "</td><td><form action='edit_policy.php' method='POST'><select name='edit_policy' style=' margin: 10px;
                 padding: 5px;
                 border-radius: 3px;
                 background: #bebebe;
             '><option value='Delete'>Delete</option><option value='Edit'>Edit</option></select><input type='hidden' name='policy_number' value='" . $row["PolicyNumber"] . "'/><input type='submit' value='Submit'/></form></td></tr>" ;
            }
        
            // End table markup
            echo "</table>";
        } else {
            // Output message if there are no rows in the result
            echo "No policies found.";
        }
        
        // Close database connection
        mysqli_close($conn);
    
}

//function display flagged for policy manager
function displayflagged_M(){
      //connect to our database
      $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

      //check to see if connection was successful
      if (!$conn) {
          die('Connection failed: ' . mysqli_connect_error());
      }
      //get the policies from the databse
      $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies WHERE Status = 'Flagged'";
  
      //run our query and get the results
      $result = mysqli_query($conn, $sql);
  
      //check to see if we got any results
      if (mysqli_num_rows($result) > 0) {
  
          // Start table markup   
          echo "<table class = 'main-table'>";
      
          // Table headers
          echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Total Amount</th><th>Status</th></tr>";
      
          // Loop through each row in the result and output data in table rows
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>" . $row["TotalAmount"] . "</td><td>" . $row["Status"] . 
              "</td></tr>" ;
          }
      
          // End table markup
          echo "</table>";
      } else {
          // Output message if there are no rows in the result
          echo "No policies found.";
      }
      
      // Close database connection
      mysqli_close($conn);
}


//edit policy
function edit($policy_number){
    
}

//display active policies
function displayActivePolicies(){
        //connect to our database
        $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

        //check to see if connection was successful
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        //get the policies from the databse
        $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies WHERE Status = 'Active'";
    
        //run our query and get the results
        $result = mysqli_query($conn, $sql);
    
        //check to see if we got any results
        if (mysqli_num_rows($result) > 0) {
    
            // Start table markup   
            echo "<table class = 'main-table'>";
        
            // Table headers
            echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Total Amount</th><th>Status</th> <th>Action</th></tr>";
        
            // Loop through each row in the result and output data in table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>" . $row["TotalAmount"] . "</td><td>" . $row["Status"] . 
                "</td><td><form action='file_claim.php' method='POST'><select name='file_claim' style=' margin: 10px;
                 padding: 5px;
                 border-radius: 3px;
                 background: #bebebe;
             '><option value='file_claim'>File Claim</option></select><input type='hidden' name='policy_number' value='" . $row["PolicyNumber"] . "'/><input type='submit' value='Submit'/></form></td></tr>" ;
            }
        
            // End table markup
            echo "</table>";
        } else {
            // Output message if there are no rows in the result
            echo "No policies found.";
        }
        
        // Close database connection
        mysqli_close($conn);
    

}

//add claim

function addclaim($policy_number,$claim_type, $claim_amount, $damage_type){
        // Connect to the database
  $conn = mysqli_connect("localhost", "root", "root", "ic1");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare the SQL statement
  $sql = "INSERT INTO claims (ID, Claim_Amount, Claim_Type, Damage)
  VALUES ('$policy_number', '$claim_amount', '$claim_type', '$damage_type')";

  // Execute the SQL statement
  if (mysqli_query($conn, $sql)) {
    $result = true;
  } else {
    //did not work, alert the user
    $result = false;
  }

  // Close the database connection
  mysqli_close($conn);


  return $result;

}

//display claims
function displayClaims(){
//connect to our database
$conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

//check to see if connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

//get the claims from the database
$sql = "SELECT ID, Claim_Amount, Claim_Type, Damage, Status FROM claims";

//run our query and get the results
$result = mysqli_query($conn, $sql);

//check to see if we got any results
if (mysqli_num_rows($result) > 0) {

    // Start table markup   
    echo "<table class='main-table'>";

    // Table headers
    echo "<tr><th>ID</th><th>Claim Amount</th><th>Claim Type</th><th>Damage</th><th>Status</th></tr>";

    // Loop through each row in the result and output data in table rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Claim_Amount"] . "</td><td>" . $row["Claim_Type"] . "</td><td>" . $row["Damage"] . "</td><td>" . $row["Status"] . "</td></tr>";
    }

    // End table markup
    echo "</table>";
} else {
    // Output message if there are no rows in the result
    echo "No claims found.";
}

// Close database connection
mysqli_close($conn);

}

//display claims as claim manager
function displayclaims_M(){

    //connect to our database
    $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

    //check to see if connection was successful
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    //get the claims from the database
    $sql = "SELECT ID,Claim_Amount,Claim_Type, Damage, Status FROM claims WHERE Status = 'Pending'";

    //run our query and get the results
    $result = mysqli_query($conn, $sql);

    //check to see if we got any results
    if (mysqli_num_rows($result) > 0) {
        // Start table markup   
        echo "<table class = 'main-table'>";
    
        // Table headers
        echo "<tr><th>Claim ID</th><th>Claim Amount </th><th>Claim Type</th><th> Damage Type</th><th>Status</th><th>Action</th></tr>";
    
        // Loop through each row in the result and output data in table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Claim_Amount"] . "</td><td>" . $row["Claim_Type"] . "</td><td>" . $row["Damage"] . "</td><td>" . $row["Status"] . 
            "</td><td><form action='manage_claims.php' method='POST'><select name='manage_claims' style=' margin: 10px;
             padding: 5px;
             border-radius: 3px;
             background: #bebebe;
         '><option value='Approve'>Approve</option><option value='Deny'>Deny</option></select>
         <input type='hidden' name='claim_number' value='" . $row["ID"] ."'/>
         <input type='hidden' name='claim_amount' value='" . $row["Claim_Amount"] ."'/>
         <label for='comment'>comment:</label>
         <input type='text' name='comment' class = 'ictextfield'>
         <input type='submit' value='Submit'/>
         </form></td></tr>";
        }
       
        // End table markup
        echo "</table>";
    } else {
        // Output message if there are no rows in the result
        echo "No pending claims found.";
    }
    
    // Close database connection
    mysqli_close($conn);
}

//approve filed claims as claim manager
function approveClaim($policy_number, $claim_amount){
    $conn = mysqli_connect("localhost", "root", "root", "ic1");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    // Prepare the SQL statement
      $sql =  "SELECT * FROM policy_details WHERE ID = '$policy_number'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      //check to see if we got any results form our query

      $coverage = $row["Coverage"];

      $sql1 = "UPDATE claims SET Status = 'Approved' WHERE ID = '$policy_number'";
      $sql2 = "INSERT INTO settlements(ID, Amount_Paid, Original_Coverage) VALUES ('$policy_number', '$claim_amount', '$coverage')";
    // Execute the SQL statement
      if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
        //alert user that claim was approved
          echo "<script>alert('Claim Approved')</script>";
          $result = true;
      } else {
        //did not work, alert the user
            echo "<script>alert('Claim not Approved')</script>";
          $result = false;
      }
      // Close the database connection
      mysqli_close($conn);
      return $result;

}

//deny filed claims as claim manager
function DenyClaim($policy_number, $comment){
    $conn = mysqli_connect("localhost", "root", "root", "ic1");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE claims SET Status = 'Denied', Comments = '$comment' WHERE ID = '$policy_number'";

    // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
      //alert user that claim was approved
        echo "<script>alert('Claim Denied')</script>";
        $result = true;
    } else {
      //did not work, alert the user
          echo "<script>alert('Claim not Denied')</script>";
        $result = false;
    }

    // Close the database connection
    mysqli_close($conn);
    return $result;
}

//display claims settlements as a finanical manager
function displayClaimSettlements(){
  //connect to our database
  $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

  //check to see if connection was successful
  if (!$conn) {
      die('Connection failed: ' . mysqli_connect_error());
  }

  //get the policies from the database
  $sql = "SELECT * FROM claims WHERE Status = 'Approved'";
  
  //run our query and get the results
  $result = mysqli_query($conn, $sql);

  //check to see if we got any results
  if (mysqli_num_rows($result) > 0) {
     
      // Start table markup   
      echo "<table class='main-table'>";
  
      // Table headers
      echo "<tr><th>ID</th><th>Claim Amount </th><th> Claim Type </th><th>Damage</th><th>Status</th><th>Comments</th><th>Original Coverage</th><th>Amount Piad</th></tr>";
  
      // Loop through each row in the result and output data in table rows
      while ($row = mysqli_fetch_assoc($result)) {

         // set variable id equal to policy number and retrieve policy details
         $ID = $row['ID'];
         $sql2 = "SELECT * FROM settlements WHERE ID = '$ID'";    
         $result2 = mysqli_query($conn, $sql2);
         if (mysqli_num_rows($result2) > 0) {

         while($row2 = mysqli_fetch_assoc($result2)){

          echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Claim_Amount"] . "</td><td>" . $row["Claim_Type"] . "</td><td>" . $row["Damage"] . "</td><td>". $row["Status"] . "</td><td>". $row["Comments"]."</td><td>". $row2["Original_Coverage"] . "</td><td>". $row2["Amount_Paid"] ;
         }
        }
    }
  
      // End table markup
      echo "</table>";
  } else {
      // Output message if there are no rows in the result
      echo "No policies found.";
  }
  
  // Close database connection
  mysqli_close($conn);    
}

//diplay permuiums as a financial manager
function displayPermuimus(){
  //connect to our database
  $conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

  //check to see if connection was successful
  if (!$conn) {
      die('Connection failed: ' . mysqli_connect_error());
  }

  //get the policies from the databse
  $sql = "SELECT PolicyNumber,Holder, PolicyEffectiveDate, PolicyExpireDate, TotalAmount, Status FROM policies WHERE Status = 'Active'";

  //run our query and get the results
  $result = mysqli_query($conn, $sql);

  //check to see if we got any results
  if (mysqli_num_rows($result) > 0) {

      // Start table markup   
      echo "<table class = 'main-table'>";
  
      // Table headers
      echo "<tr><th>Policy Number</th><th>Holder</th><th>Effective Date</th><th>Expire Date</th><th>Total Amount</th><th>Status</th></tr>";
  
      // Loop through each row in the result and output data in table rows
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row["PolicyNumber"] . "</td><td>" . $row["Holder"] . "</td><td>" . $row["PolicyEffectiveDate"] . "</td><td>" . $row["PolicyExpireDate"] . "</td><td>" . $row["TotalAmount"] . "</td><td>" . $row["Status"] . 
          "</td></tr>";
      }
  
      // End table markup
      echo "</table>";
  } else {
      // Output message if there are no rows in the result
      echo "No Active policies found.";
  }
  
  // Close database connection
  mysqli_close($conn);       

}

