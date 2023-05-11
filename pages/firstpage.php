<?php
//start the session
    session_start();
    //check to see if the user is logged in, if not redirect to login page
    if (!isset($_SESSION['username'])) {
        header("Location: ../Index.php");
        exit;
    }
?>

<html >
    
    <head>
        <title>
            My first page
         </title>
         <link rel = "stylesheet" href = "../styles/styles.css">
         <link rel = "stylesheet" href = "../styles/myForm.css">
         <link rel = "stylesheet" href = "../styles/icons.css"> 

        </head>
        <body>  
        
            <div class="row" id="header">
                <div id="dropdown-menu">
                    <span><i class="ico burger-ico"></i>MENU</span>
                    <div class="dropdown-content">
                        <ul>
                            <a href="list_users.php">
                                <li><i class="ico ico-l users-ico"></i>Users</li>
                            </a>
                            <a href="firstpage.php">
                                <li><i class="ico ico-l user-ico"></i>Page 1</li>
                            </a>
                            <a href="page2.php">
                                <li><i class="ico ico-l wallet-ico"></i>Page 2</li>
                            </a>
                            <a href="common/change_pass.php">
                                <li><i class="ico ico-l gallery-ico"></i>Change Password</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div id="user-welcome">welcome
                <button  value = "log out"  class = "mbutton cancel logout" onclick= "logout()">Log Out</button>
                </div>
            </div>
            
            <div class="content">
                <h1 style="    border: 1px solid black;
                            text-align: center;
                            padding-top: 20px;
                        ">

                    Home Page- Manager
                </h1>
              
    
            </div>

            <script>
             function logout() {
                // Send an AJAX request to the logout.php script
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'BE/logout.php');
                xhr.onload = function () {
                if (xhr.status === 200) {
                    // Redirect to the login page
                    window.location.href = '../Index.php';
                } else {
                    alert('Request failed.  Returned status of ' + xhr.status);
                }
                };
                xhr.send();
                }
                

            </script>
        </body>
    </html>
   
