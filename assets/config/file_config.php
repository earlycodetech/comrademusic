<?php 
     require "db_con.php";
     require "../includes/sessions.php";

     if (isset($_POST['changeImg'])) {
        $id = $_SESSION['user'];
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        // Allowed Files;
        $allowed = array("jpg","jpeg","png","gif");

        // GET FILE EXTENSION
        $ext = explode(".",$fileName);
        $ext = end($ext);
        $ext = strtolower($ext);
       

        // Check if the file is allowed
        if (!in_array($ext,$allowed)) {
            $_SESSION['error_msg'] = "File type invalid, format: jpg,jpeg,png or gif!";
            header("Location: ../../comrade/dashboard");
        }
        // Check if the file is corrupted
        elseif($fileError != 0){
            $_SESSION['error_msg'] = "File corrupted!";
            header("Location: ../../comrade/dashboard");
        }
        // Set a minimum file size
        elseif($fileSize > 5000000){
            $_SESSION['error_msg'] = "File is too large max: 5mb!";
            header("Location: ../../comrade/dashboard");
        }else{
        //    echo $fileNewName = rand(100000,999999);
            // Generate a new file name
            $fileNewName = "profile".$id.'.'.$ext;

            //Location to save our file
            $location = "../img/profpic/";
            // Move the file
            if (!move_uploaded_file($fileTmpName,$location.$fileNewName)) {
                $_SESSION['error_msg'] = "Something went wrong!";
                header("Location: ../../comrade/dashboard");
            }else{
                $sql = "UPDATE users SET prof_pic = ? WHERE id = '$id'";

                // Initialize Connection to DB
                $stmt = mysqli_stmt_init($connectDb);
    
                // Prepare Stmt with SQL
                mysqli_stmt_prepare($stmt,$sql);
    
                // Bind Parameters
                mysqli_stmt_bind_param($stmt,"s",$fileNewName);
    
               if (!mysqli_stmt_execute($stmt)) {
                    $_SESSION['error_msg'] = "Opps! Something went wrong";
                    header("Location: ../../comrade/dashboard");
               }else{
                $_SESSION['success_msg'] = "Picture Added Successfully!";
                header("Location: ../../comrade/dashboard");
               }
            }
        }
     }
     elseif (isset($_POST['addSong'])) {
        $id = $_SESSION['user'];
        $title = $_POST['title'];
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        // Allowed Files;
        $allowed = array("mp3");

        // GET FILE EXTENSION
        $ext = explode(".",$fileName);
        $ext = end($ext);
        $ext = strtolower($ext);
       

        // Check if the file is allowed
        if (!in_array($ext,$allowed)) {
            $_SESSION['error_msg'] = "File type invalid, format: mp3!";
            header("Location: ../../comrade/music");
        }
        // Check if the file is corrupted
        elseif($fileError != 0){
            $_SESSION['error_msg'] = "File corrupted!";
            header("Location: ../../comrade/music");
        }
        // Set a minimum file size
        elseif($fileSize > 10000000){
            $_SESSION['error_msg'] = "File is too large max: 10mb!";
            header("Location: ../../comrade/music");
        }else{
        //    echo $fileNewName = rand(100000,999999);
            // Generate a new file name
            $fileNewName = time().'.'.$ext;

            //Location to save our file
            $location = "../songs/";
            // Move the file
            if (!move_uploaded_file($fileTmpName,$location.$fileNewName)) {
                $_SESSION['error_msg'] = "Something went wrong!";
                header("Location: ../../comrade/music");
            }else{
                $sql = "INSERT INTO songs(userid,title,song) VALUES(?,?,?)";

                // Initialize Connection to DB
                $stmt = mysqli_stmt_init($connectDb);
    
                // Prepare Stmt with SQL
                mysqli_stmt_prepare($stmt,$sql);
    
                // Bind Parameters
                mysqli_stmt_bind_param($stmt,"sss",$id,$title,$fileNewName);
    
               if (!mysqli_stmt_execute($stmt)) {
                    $_SESSION['error_msg'] = "Opps! Something went wrong";
                    header("Location: ../../comrade/music");
               }else{
                $_SESSION['success_msg'] = "Music Added Successfully!";
                header("Location: ../../comrade/music");
               }
            }
        }
     }