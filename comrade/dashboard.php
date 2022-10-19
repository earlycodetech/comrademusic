<?php 
    require "../assets/config/db_con.php";
    require "../assets/includes/sessions.php";

    auth();
    $id = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($connectDb,$sql);

    $row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="900; url=../assets/config/logout">
    <title>Comrade Music</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/lib/fontawsome/css/all.css">
    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="shortcut icon" href="../assets/img/logo.png">
</head>

<body>
    <section>
        <nav class="navbar bg-dark">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand" href="#">
                    <img src="../assets/img/logo.png" alt="Bootstrap" width="50" height="54">
                </a>

                <a href="../assets/config/logout.php" class="nav-link text-white">Logout</a>
                <button class="btn text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    <?php echo $_SESSION['fullName']; ?>
                </button>

                <div class="offcanvas offcanvas-end text-bg-dark" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            I will not close if you click outside of me.
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <section>
        <div class="container">
            <div class="card mt-5 shadow p-3">
                <?php echo errorMsg(); echo successMsg(); ?>
                <div class="d-flex justify-content-end">
                    <img src="../assets/img/logo.png" alt="" height="100px" class="p-2 shadow">
                </div>
                    <form action="../assets/config/update_config.php" method="post" class="card-body row">
                        <div class="col-md-6 mb-3">
                            <label>First Name</label>
                            <input type="text" name="fname" value="<?php echo $row['firstname']; ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Last Name</label>
                            <input type="text" name="lname" value="<?php echo $row['lastname']; ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email"value="<?php echo $row['email']; ?>" class="form-control" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>User Name</label>
                            <input type="text" name="uname" value="<?php echo $row['uname']; ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Country</label>
                           <input type="text" class="form-control" value="<?php echo $row['country']; ?>" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Date of Birth</label>
                            <input type="text" onfocus="this.type='date'" value="<?php echo $row['dob']; ?>" name="dob"  class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" required>
                        </div>


                        <div class="col-12 mb-5 mt-3 text-center">
                            <button type="submit" name="update" class="btn btn-success">Update</button>
                        </div>
                    </form>
                
            </div>
        </div>
    </section>


    <?php include_once "../assets/includes/dash-footer.php"; ?>
</body>

</html>