<?php 
    require "assets/config/db_con.php";
    if (!isset($_GET['q'])) {
        header("Location: index");
    }
    $id = $_GET['q'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($connectDb,$sql);
    $user = mysqli_fetch_assoc($query);
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
    <section class="mb-5">
        <div class="container mt-3 mb-5">
           
            <div class="card nav-link shadow w-25 mb-3">
                <img src="assets/img/profpic/<?php echo (empty($user['prof_pic']))?"user.png":$user['prof_pic'].'?'.mt_rand();  ?>" alt="" class="img-fluid">
                <p class="fs-5 text-center card-header fw-bold">
                   <?php echo $user['firstname'].' '.$user['lastname']; ?>
                </p>
            </div>
            <div class="table-responsive mb-5">
                <p class="fs-5">
                    Songs By <?php echo $user['uname']; ?>
                </p>
                <table class="table border-top">
                    <?php 
                        $sql = "SELECT * FROM songs WHERE userid = '$id' ORDER BY date_created DESC LIMIT 20";
                        $query = mysqli_query($connectDb,$sql);
                        $num = 0;
                        if (mysqli_num_rows($query) < 1) {
                            echo "<h4 class='text-center text-danger py-3'>No songs uploaded by this artist</h4>";
                        }else{
                        while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$num; ?></th>
                        <td><?php echo $row['title']; ?></td>
                        <td>
                            <a href="assets/songs/<?php echo $row['song']; ?>" target="_blank" class="fs-3 text-decoration-none fa fa-play-circle"></a>
                            <a href="assets/songs/<?php echo $row['song']; ?>" download="<?php echo $row['title']; ?>" class="fs-3 ms-3 fa fa-download"></a>
                        </td>
                    </tr>
                    <?php }} ?>
                </table>
            </div>
        </div>
    </section>


    <?php include_once "assets/includes/footer.php";  ?>
</body>
</html>