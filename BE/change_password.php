<?php
session_start();



$conn = mysqli_connect('localhost', 'root', 'root', 'ic1');

if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM credentials WHERE Username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $flag = $row['flag'];
  if ($flag == 0) {
    header("Location: change_password.php");
    exit;
  }
} else {
  header("Location: ../Index.php");
  exit;
}

if ($flag == 0) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = sha1($_POST['oldPassword']);
    $newPassword = sha1($_POST['newPassword']);
    $confirmPassword = sha1($_POST['confirmPassword']);

    if ($oldPassword != $row['Password']) {
      $message = 'Incorrect old password';
    } elseif ($newPassword != $confirmPassword) {
      $message = 'New password and confirm password do not match';
    } else {
      $updateSql = "UPDATE credentials SET Password = '$newPassword', flag = 1 WHERE Username = '$username'";
      if (mysqli_query($conn, $updateSql)) {
        header('Location: ../index.php');
        exit();
      } else {
        $message = 'Error updating password';
      }
    }
  }
} else {
  header('Location: ../index.php');
  exit();
}

mysqli_close($conn);
?>
<?php
//start the session of the user
session_start();
session_destroy();
session_start();
?>



<html >
    <head>
        <link rel = "stylesheet" href = "styles/styles.css">
        <link rel = "stylesheet" href = "styles/icons .css"> 
        <link rel = "stylesheet" href = "styles/myForm.css">
        <link rel = "stylesheet" href = "styles/video.css">
       
        <title>
            Login
        </title>

        </head>
        <body class = "login-style">


            
            
            <div class="title">
                  <span> IC1 - Login</h1> 
                
            </div>
            <!-- the action added to the form is where we submit to the link to the server -->
            <!-- meaning the link to our php page -->
            <!-- for this session we goin to make the action taking us to just another page (fistapage) -->
            <div class ="paragraph">
         
                <!-- post : does not show the data sent with url while get does -->
                <form  action = "BE/login.php" method = "POST" ID = "login-form">
                    <label for= "np" >New Password</label>
                    <br>
                    <input type = "password" name= "newpass" id = np class="textfield">
                    <br> 
                    <label for= "cp" >Confirm Password</label>
                    <br>
                    <input type = "password" name = "confpass" id= cp class= "textfield" >
                    <br>
                    <br>
                    <br>
                    <input type="submit"  value="Login" class="mbutton">
                    <input type="button" value="Cancel" class="cancel" onclick="clearForm()">
                </form>

                    
            </div>

           

            <!-- now we create our javascript -->
            <script>
            
                function clearForm() {
                document.getElementById('un').value = '';
                document.getElementById('pass').value = '';
                }


            </script>

        </body>
</html>