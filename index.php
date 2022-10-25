<?php 
    require "assets/config/db_con.php";

    $sql = "SELECT * FROM users WHERE user_role = 'user'";
    $query = mysqli_query($connectDb,$sql);
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
    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="shortcut icon" href="assets/img/logo.png">
</head>
<body>
    <section>
        <?php include_once "assets/includes/nav.php"; ?>
    </section>
    <section>
        <div class="container mt-3">
            <div class="row">
                <?php while($row = mysqli_fetch_assoc($query)){  ?>
                <div class="col-md-2 mb-3">
                    <a href="songs?q=<?php echo $row['id']; ?>" class="card nav-link shadow">
                        <img src="assets/img/profpic/<?php echo (empty($row['prof_pic']))?"user.png":$row['prof_pic'].'?'.mt_rand();  ?>" alt="" class="card-img-top">
                        <p class="fs-5 text-center card-header fw-bold">
                            <?php echo $row['uname']; ?>
                        </p>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>


    <?php include_once "assets/includes/footer.php";  ?>
</body>
</html>