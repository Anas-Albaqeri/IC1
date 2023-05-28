<?php
        include '../../functions/functions.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $change_status = $_POST['change_status'];
            $policy_number = $_POST['policy_number'];
            $comment = $_POST['comment'];
            
            if ($change_status == "Cancel"){
                $result =  cancel($policy_number);
                if ($result == true ){
                    echo "<script>alert('Policy Canceld successfully!')</script>";
                }
                else{
                    echo "<script>alert('Policy cancelation failed!')</script>";
                }
            }
            else{
              $result = flag_polciy($policy_number, $comment);
                if ($result == true){
                    echo "<script>alert('Policy Flagged successfully!')</script>";
                    header("Location: ../../policies/pendingpolicies.php");
                }
                else{
                    echo "<script>alert('Policy Flag failed!')</script>";
                    header("Location: ../../policies/pendingpolicies.php");

                }
            }
            }
    header("Location: allpolicies.php");


?> 