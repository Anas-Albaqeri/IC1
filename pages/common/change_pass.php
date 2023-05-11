<html >
    <head>
        <link rel = "stylesheet" href = "../styles/styles.css">
        <link rel = "stylesheet" href = "../styles/icons .css"> 
        <link rel = "stylesheet" href = "../styles/myForm.css">
         <title>
            Change Password
          </title>

        </head>
        <body> 
            <div class="row" id="header">
    
            </div>
            <div class="title">
                  <span>Change Password</h1> 
                
            </div>
            <!-- the action added to the form is where we submit to the link to the server -->
            <!-- meaning the link to our php page -->
            <!-- for this session we goin to make the action taking us to just another page (fistapage) -->
            <div>
                <div class ="paragraph"> 
                    <!-- post : does not show the data sent with url while get does -->

                    <form  action = "../BE/signup.php" method = "POST" name = "change-pass-form">
                        <label for= "un" >Old Password</label>
                        <br>
                        <input type = "password" name= "oldPassword" class = "textfield">
                        <br> 
                        <label for= "un" >New Password</label>
                        <br>
                        <input type = "password" name = "newPassword" id= pass class = "textfield">
                        <br>
                        <label for= "un" >Confirm Password</label>
                        <br>
                        <input type = "password" name = "confirmPassword" id= pass class = "textField">
                        <br>
                        <br>
                        <input type ="checkbox" name = "cbcaptcha">
                        <label for ="cbcaptcha">I am human </label>
                        <br>
                        <br>
                        <input type = "button" value = "Change Password"  class = "mbutton" onclick="signUp()" >
                        <input type = "button" value = "Cancel"    onclick="clearForm()" >
                    </form>

                    <form action= "../Index.php">
                        <input type = "submit" value = "Go Back" class = "mbutton back" >
                    </form>
                   
                

                    

                </div>
            </div>

            <!-- now we create our javascript -->
            <script>

          

                function signUp(){
                    // we dont need to specify "var" javascript knows automatically
                   mform = document.querySelector("form[ name = 'change-pass-form']");
                   fn = mform.elements["firstname"].value;
                   ln = mform.elements["lastname"].value;
                   email = mform.elements["email"].value;
                   pass = mform.elements["password"].value;
                   confpass = mform.elements["confirmPassword"].value;
                   sex = mform.elements["sex"].value;
                   ageGroup = mform.elements["agegroup"].value;
                   captcha = mform.elements["cbcaptcha"].checked;
                   language = mform.elements["language"].value;
                   
                   console.log( "fn:" +fn );
                   console.log (" ln: "+ ln );
                   console.log (" email: "+email );
                   console.log ("  password: " + pass );
                   console.log (" confirmpassword: " +  confpass);
                   console.log (" sex: " + sex );
                   console.log (" age: " + ageGroup);
                   console.log (" captcha: "+ captcha );
                   console.log (" language: " + language);

                   if((fn == "") || (ln == "")){
                    alert("first name and last name cannot be empty values");
                   }
                   else if((!email.includes("@"))){
                    alert("You must enter a valid email address!");
                   }
                   else if(pass != confpass){
                    alert("Passwords must be equal!");
                   }
                   else if(pass ==""){
                    alert("Password cannot be empty!");
                   }
        
                   else{
                    mform.submit();
                   }

                }
                //note that getting element by id is not the best option when having multiple forms
                //instead we use another method, through names

                function clearForm(){
                    
                    mform = document.querySelector("form[ name = 'signup-form']");
                    mform.elements["firstname"].value ="";
                    mform.elements["lastname"].value ="";
                    mform.elements["email"].value = "";
                    mform.elements["password"].value ="";
                    mform.elements["confirmPassword"].value ="";
                    mform.elements["sex"].value = "m";
                    mform.elements["agegroup"].value = "above 18";
                    mform.elements["cbcaptcha"].checked = false;
                    mform.elements["language"].value = -1;
                   
                }

            </script>

        </body>
    </html>
   
