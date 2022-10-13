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
                <h5 class="card-header py-3">Sign Up</h5>
                <form action="assets/config/register_config.php" method="post" class="card-body row">
                    <div class="col-md-6 mb-3">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>User Name</label>
                        <input type="text" name="uname" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Country</label>
                        <?php include_once "assets/includes/country-select.php"; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Date of Birth</label>
                        <input type="text" onfocus="this.type='date'" name="dob" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" class="form-control" required>
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
                    <div class="col-md-6 mb-3">
                        <label>Confirm Password</label>
                        <div class="d-flex">
                            <input type="password" name="conpass" id="input2" class="form-control" required>
                            <button type="button" id="btn2" class="btn fa fa-eye" onclick="showPass('btn2','input2')"></button>
                        </div>
                    </div>


                    <div class="col-12 mb-5 mt-3 text-center">
                        <button type="submit" name="register" class="btn btn-success">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <?php include_once "assets/includes/footer.php";  ?>
</body>
</html>