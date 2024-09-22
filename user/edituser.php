<?php
session_start();
if (!isset($_SESSION['typeUser']))
    header('location:../user/login.php'); ?>

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>EDIT CAR</title>
    <!-- Required meta tags -->
    <!--Nav and side nav Deppendencies-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />

</head>

<body>

    <?php include '../inc/navBar_sideBar.php'; ?>


    <?php
    require '../config.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE id = $id;";
    $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
    if ($line = mysqli_fetch_array($result)) {
    ?>
        <div class="card">
            <div class="card-body">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-account-plus"></i>
                        </span>Edit User
                    </h3>
                </div>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="image">Image</label> <br />
                        <img src="<?php echo $line[1] ?>" alt="" style=" width: 50px;">
                        <input type="file" name="image" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nom">Full Name :</label>
                        <input type="text" class="form-control" name="nom" value="<?php echo $line[2] ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">EMAIL :</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $line[3] ?>">
                    </div>

                    <div class="form-group">
                        <label for="pass">PASSWORD :</label>
                        <input type="pass" class="form-control" name="pass" value="<?php echo $line[4] ?>">
                    </div>


                    <div class="form-group">
                        <label for="typeuser">USER TYPE</label>
                        <select class="form-control" name="typeuser">
                            <option value="<?php echo ($line[5] == 'User') ? 'User' : 'Administrator'; ?>">
                                <?php echo ($line[5] == 'User') ? 'User' : 'Administrator'; ?>
                            </option>

                            <option value="<?php echo ($line[5] == 'User') ? 'Administrator' : 'User'; ?>">
                                <?php echo ($line[5] == 'User') ? 'Administrator' : 'User'; ?>
                            </option>
                        </select>
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>

    <?php
        $img = $line[1];
    }
    mysqli_close($cn);
    ?>

    <?php include '../inc/footer.php'; ?>

    <!--NAV 1 side Bar Deppendencies-->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>

</body>
</html>


<?php

if (isset($_POST['edit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $typeUser = $_POST['typeuser'];

    if (basename($_FILES["image"]["name"])) {
        $target_dir = "./images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $img = $target_file;
    }

    require '../config.php';
    $sql = "UPDATE `users` SET `image` = '$img', `name` = '$nom', `email` = '$email', `pass` = '$pass', `typeUser` = '$typeUser' WHERE `id` = $id;";
    mysqli_query($cn, $sql) or die(mysqli_error($cn));
    mysqli_close($cn);

    header('location:allusers.php');
}
