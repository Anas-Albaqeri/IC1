<?php
        include '../../functions/functions.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $edit_policy = $_POST['edit_policy'];
            $policy_number = $_POST['policy_number'];
            
            if($edit_policy =="Delete"){
              $result = delete_policy($policy_number);
                if ($result == true){
                    echo "<script>alert('Policy Flagged successfully!')</script>";
                    header("Location: ../../policies/falgged.php");
                }
                else{
                    echo "<script>alert('Policy Flag failed!')</script>";
                    header("Location: ../../policies/flagged.php");

                }
            }
            else{
                }
                            }
                    header("Location: flagged.php");


                ?> 