<?php 
    session_start();
    function errorMsg(){
        
        if (isset($_SESSION['error_msg'])) {
            $output = "<div class=\"alert alert-danger text-center alert-dismissible animate__animated animate__fadeInDown fade show\" role=\"alert\" id=\"msg\">
            <strong>";

            $output .= htmlentities($_SESSION['error_msg']);
            $output .= "</strong> 
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\" ></button>
                    </div>";
            $_SESSION['error_msg'] = null;   
            return $output;
        }
    }

    function successMsg(){
        if (isset($_SESSION['success_msg'])) {
            $output = "<div class=\"alert alert-success text-center alert-dismissible animate__animated animate__fadeInDown fade show\" role=\"alert\" id=\"msg\">
            <strong>";
    
            $output .= htmlentities($_SESSION['success_msg']);
            $output .= "</strong> 
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>";
            $_SESSION['success_msg'] = null;   
            return $output;

        }
    }

   


  