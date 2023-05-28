<?php
header('Content-Type: application/json');

//start our session
session_start();
session_destroy();
session_start();




//get the username and password from the form
$un = $_POST['username'];
$pass = sha1($_POST['password']);

//connect to our database
$conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

//check to see if connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

//check to see if username and password match what is in the database
$sql = "SELECT * FROM credentials WHERE Username = '$un' AND Password = '$pass'";


//run our query and get the results
$result = mysqli_query($conn, $sql);


//check to see if we got any results
if (mysqli_num_rows($result) == 1) {
    //get the row from the result
    $row = mysqli_fetch_assoc($result);
    //check which department is user and which position is the user
    $department = $row['Dept'];
    //check if user is a maanager or employee
    $position = $row['PositionID'];
    //set the session variable with the username
    $_SESSION['username'] = $un;
    $_SESSION['user_id'] = $row['ID']; // set session variable with user ID

    //check which department the user is in
    if ($department == 0) {
        $response = array('success' => true, 'position' => 'GeneralManager' , 'message' => 'Login successful');
        echo json_encode($response);
        exit();
    }
    //financial department
    if ($department == 1) {
        if($position == 0){
            $response = array('success' => true, 'position' => 'FinancialManager', 'message' => 'Login successful');
            echo json_encode($response);
            exit();
        }
        if($position == 1){
            $response = array('success' => true, 'position' => 'Accountant', 'message' => 'Login successful');
            echo json_encode($response);
            exit();
        }
    }
    //policy department
    if ($department == 2) {
        if($position == 0){
            $response = array('success' => true, 'position' => 'PolicyManager', 'message' => 'Login successful');
            echo json_encode($response);
            exit();
        }
        if($position == 1){
            $response = array('success' => true, 'position' => 'Underwriter', 'message' => 'Login successful');
            echo json_encode($response);
            exit();
        }
    }
    //claims department
    if($department == 3){
        if($position == 0){
            $response = array('success' => true, 'position' => 'ClaimsManager', 'message' => 'Login successful');
            echo json_encode($response);
            exit();
        }
        
    }
} else {
    $response = array('success' => false, 'message' => 'Invalid username or password');
    echo json_encode($response);
    exit();
}

mysqli_close($conn);



?>
