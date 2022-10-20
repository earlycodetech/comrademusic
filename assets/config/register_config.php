<?php
    require "db_con.php";
    require "../includes/sessions.php";

    date_default_timezone_set("Africa/Lagos");

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
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $role = "user";
        $date = date("Y-m-d h:i:s");
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
            // Prepare the SQL command
            $sql = "INSERT INTO users(firstname,lastname,email,uname,country,dob,phone,passwords,user_role,date_created) VALUES(?,?,?,?,?,?,?,?,?,?)";

            // Initialize Connection to DB
            $stmt = mysqli_stmt_init($connectDb);

            // Prepare Stmt with SQL
            mysqli_stmt_prepare($stmt,$sql);

            // Bind Parameters
            mysqli_stmt_bind_param($stmt,"ssssssssss",$firstName,$lastName,$email,$userName,$country,$dob,$phone,$hash,$role,$date);

           if (!mysqli_stmt_execute($stmt)) {
                $_SESSION['error_msg'] = "Opps! Something went wrong";
                header("Location: ../../signup");
           }else{
            $_SESSION['success_msg'] = "Account has been created, please login to continue!";
            header("Location: ../../signin");
           }



        }





    



    }