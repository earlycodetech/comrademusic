<?php
require "../assets/config/db_con.php";
require "../assets/includes/sessions.php";

auth();
$id = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$query = mysqli_query($connectDb, $sql);

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
                <?php echo errorMsg();
                echo successMsg(); ?>
                <div class="d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        New Song
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Song</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="modal-body" method="post" enctype="multipart/form-data" action="../assets/config/file_config.php">
                                    <input type="text" name="title" placeholder="Title" class="form-control mb-3" required>
                                    <input type="file" name="file" class="form-control mb-3" required>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="addSong" class="btn btn-primary">Add Song</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Title</th>
                                <th scope="col">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM songs WHERE userid = '$id'";
                                $query = mysqli_query($connectDb,$sql);
                               
                                while( $row = mysqli_fetch_assoc($query)){
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $row['date_created']; ?></th>
                                    <td><?php echo $row['title']; ?></td>
                                    <td>
                                        <a href="../assets/songs/<?php echo $row['song']; ?>" target="_blank" class="btn btn-success fa fa-play"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <?php include_once "../assets/includes/dash-footer.php"; ?>
</body>

</html>