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
                    <div class="card p-5 fs-1 fw-bold text-center">
                        <p>Total Users </p>
                        <p>1</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


    <?php include_once "../assets/includes/dash-footer.php"; ?>
</body>

</html>