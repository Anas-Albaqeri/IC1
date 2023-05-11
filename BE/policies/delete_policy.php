<?php
        include '../../functions/functions.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $policy_number = $_POST['policy_number'];
            
                $result =  delete_policy($policy_number);
                if ($result == true ){
                    echo "<script>alert('Policy deleted successfully!')</script>";
                }
                else{
                    echo "<script>alert('Policy deletion failed!')</script>";
                }
            
        }
    header("Location: deniedpolicies.php");

?> 