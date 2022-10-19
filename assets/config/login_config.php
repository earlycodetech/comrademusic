<?php
    require "db_con.php";
    require "../includes/sessions.php";

    date_default_timezone_set("Africa/Lagos");

    if(!isset($_POST['login'])){
        header("Location: ../../signin");
    }else{
        $email = $_POST['email'];
        $password = $_POST['pass'];


        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($connectDb);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s",$email);
        $execute = mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) < 1) {
            $_SESSION['error_msg'] = "This email does not exist!";
            header("Location: ../../signup");
        }else{
            $row = mysqli_fetch_assoc($result);
            $returnedPassword = $row['passwords'];

            if (!password_verify($password,$returnedPassword)) {
                $_SESSION['error_msg'] = "Incorrect password!";
                header("Location: ../../signin");
            }else{

                $_SESSION['user'] = $row['id'];
                $_SESSION['fullName'] = $row['uname'];
                header("Location: ../../comrade/dashboard");
            }
        }
    }