<?php 
    require "assets/includes/sessions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comrade Music</title>
    <link rel="stylesheet" href="assets/css/bootstrap5.min.css">
    <link rel="stylesheet" href="assets/lib/fontawsome/css/all.css">

    <link rel="shortcut icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/css/animate.css">
</head>
<body>
    <section>
        <?php include_once "assets/includes/nav.php"; ?>
    </section>

    <section>
        <div class="container my-4">
            <div class="card mx-auto shadow" style="max-width: 600px;">
                <?php echo successMsg(); echo errorMsg(); ?>
                <h5 class="card-header py-3">Sign In</h5>
                <form action="assets/config/login_config.php" method="post" class="card-body row">
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label>Password</label>
                        <div class="d-flex">
                            <!-- <input type="password" name="pass" id="input1" pattern="[a-zA-Z0-9]{8}" title="uppercase, lowercase and number" class="form-control" required> -->
                            <input type="password" name="pass" id="input1" class="form-control" required>

                            <button type="button" id="btn1" class="btn fa fa-eye" onclick="showPass('btn1','input1')"></button>
                            <small id="notice"></small>
                        </div>
                    </div>
                    


                    <div class="col-12 mb-5 mt-3 text-center">
                        <button type="submit" name="login" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <?php include_once "assets/includes/footer.php";  ?>
</body>
</html>