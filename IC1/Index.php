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
                    <label for= "un" >User name</label>
                    <br>
                    <input type = "text" name= "username" id = un class="textfield">
                    <br> 
                    <label for= "un" >Password</label>
                    <br>
                    <input type = "password" name = "password" id= pass class= "textfield" >
                    <br>
                    <a href= "Index.html">Forgot Password?</a>
                    <br>
                    <br>
                    <input type="button"  value="Login" class="mbutton" onclick = "login()">
                    <input type="button" value="Cancel" class="cancel" onclick="clearForm()">
                </form>

                    
            </div>

           

            <!-- now we create our javascript -->
            <script>
             function login() {
                var un = document.getElementById('un').value;
                var pass = document.getElementById('pass').value;

                if (un == '' || pass == '') {
                    alert('You must fill in the username and password!');
                } else {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'BE/login.php');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                alert(response.position)
                                if (response.success) {
                                if(response.position == 'GeneralManager'){
                                    window.location.href = "pages/GeneralManager.php";
                                }
                                if(response.position == 'FinancialManager'){
                                    window.location.href = "pages/FinancialManager.php";
                                }
                                if(response.position == 'Accountant'){
                                    window.location.href = "pages/Accountant.php";
                                }
                                if(response.position == 'PolicyManager'){
                                    window.location.href = "pages/PolicyManager.php";
                                }
                                if(response.position == 'Underwriter'){
                                    window.location.href = "pages/Underwriter.php";
                                }
                                if(response.position == 'ClaimsManager'){
                                    window.location.href = "pages/ClaimsManager.php";
                                }
                                }
                            } else{
                                alert("wrong username or password");
                            }
                        } else {
                            alert('Request failed.  Returned status of ' + xhr.status);
                        }
                    };
                    xhr.send('username=' + encodeURIComponent(un) + '&password=' + encodeURIComponent(pass));
                }
            }


                function clearForm() {
                document.getElementById('un').value = '';
                document.getElementById('pass').value = '';
                }


            </script>

        </body>
</html>