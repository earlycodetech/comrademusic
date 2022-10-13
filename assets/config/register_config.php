<?php
    require "../includes/sessions.php";
    // If the user clicked our button
    if (!isset($_POST['register'])) {
       header("Location: ../../signup");
    }else{
        // Collect all data
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];
        $userName = $_POST['uname'];
        $country = $_POST['country'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $password = $_POST['pass'];
        $conPassword = $_POST['conpass'];

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        
        
        if (empty($firstName) || empty($lastName) || empty($email) || empty($userName) || empty($country) || empty($dob) || empty($phone) || empty($password) || empty($conPassword)) {
           $_SESSION['error_msg'] = "Fields cannot be empty!";
           header("Location: ../../signup");
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error_msg'] = "Invalid Email!";
            header("Location: ../../signup");
        }
        // elseif(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        //     $_SESSION['error_msg'] = "Password must contain one uppercase, one lowercase, one number and must be greater than 8 characters!";
        //     header("Location: ../../signup");
        // }
        elseif(strlen($password) < 8){
            $_SESSION['error_msg'] = "Passwords must be at least 8 characters!";
            header("Location: ../../signup");
        }
        elseif($password != $conPassword){
            $_SESSION['error_msg'] = "Passwords do not match!";
            header("Location: ../../signup");
        }else{

            $_SESSION['success_msg'] = "Account Created!";
            header("Location: ../../signup");

        }





    



    }