<?php

class User{

    private $firstname;
    private $lastname;
    private $username;
    private $password;

    function __construct($firstname, $lastname, $username){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->password = $firstname.".".$lastname;
        
    }

    function ChangePass($oldPass,$newPass, $confPass){
        if(($oldPass == $this->password) && ($newpass == $confPass) &&($oldPass != $newPass)){
            return true;
        }
        else{
            return false;
        }
    } 

}

$user = new User("john", "Doe", "john.doe");
print_r($user);

?>