<?php
        include '../../functions/functions.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $status = $_POST['approve_deny'];
            $policy_number = $_POST['policy_number'];
            
            if ($status == "Approve"){
                $result =  approve($policy_number);
                if ($result == true ){
                    echo "<script>alert('Policy approved successfully!')</script>";
                }
                else{
                    echo "<script>alert('Policy approval failed!')</script>";
                }
            }
            else{
              $result = deny($policy_number);
                if ($result == true){
                    echo "<script>alert('Policy denied successfully!')</script>";
                    header("Location: ../../policies/pendingpolicies.php");
                }
                else{
                    echo "<script>alert('Policy denial failed!')</script>";
                    header("Location: ../../policies/pendingpolicies.php");

                }
            }
            }
    header("Location: pendingpolicies.php");


?> 