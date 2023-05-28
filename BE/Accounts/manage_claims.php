<?php
        include '../../functions/functions.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $manage_claims = $_POST['manage_claims'];
            $policy_number = $_POST['claim_number'];
            $paid_amount = $_POST['claim_amount'];
            $comment = $_POST['comment'];
          
            if ($manage_claims == "Approve"){
                //alert the claim amount
                $result =  approveClaim($policy_number, $paid_amount);
                if ($result == true ){
                    echo "<script>alert('Policy Canceld successfully!')</script>";
                    header("Location: claims.php");

                }
                else{
                    echo "<script>alert('Policy cancelation failed!')</script>";
                    header("Location: claims.php");

                }
            }
            else{
            //alert user if claim is denied


              $result = DenyClaim($policy_number, $comment);
                if ($result == true){
                    echo "<script>alert('Policy Flagged successfully!')</script>";
                    header("Location: claims.php");
                    
                }
                else{
                    echo "<script>alert('Policy Flag failed!')</script>";
                    header("Location: claims.php");

                }
            }
            
        }
   


?> 