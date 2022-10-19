<?php 
     require "db_con.php";
     require "../includes/sessions.php";

     if(!isset($_POST['update'])){
        header("Location: logout");
    }else{
        var_dump($_POST);
        // Collect all data
        $id = $_SESSION['user'];
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $userName = $_POST['uname'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];

        $sql = "UPDATE users SET firstname = ?,lastname = ?, uname = ?,  dob = ? , phone = ? WHERE id = '$id'";

            // Initialize Connection to DB
            $stmt = mysqli_stmt_init($connectDb);

            // Prepare Stmt with SQL
            mysqli_stmt_prepare($stmt,$sql);

            // Bind Parameters
            mysqli_stmt_bind_param($stmt,"sssss",$firstName,$lastName,$userName,$dob,$phone);

           if (!mysqli_stmt_execute($stmt)) {
                $_SESSION['error_msg'] = "Opps! Something went wrong";
                header("Location: ../../comrade/dashboard");
           }else{
            $_SESSION['success_msg'] = "Updated Successfully!";
            $_SESSION['fullName'] = $userName;
            header("Location: ../../comrade/dashboard");
           }
    }