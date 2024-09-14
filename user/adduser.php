<?php
session_start();
if (!isset($_SESSION['typeUser'])) {
    header('location:login.php');
}

if (!$_SESSION['typeUser'] == "Administrator") {
    header('location:../index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADD USER</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />

</head>

<body>

    <?php include '../inc/navBar_sideBar.php'; ?>



    <div class="card">
        <div class="card-body">
        <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-plus"></i>
                </span>ADD USER
              </h3>
            </div>
            <form method="post" enctype="multipart/form-data" class="fw-bold">
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label for="pass1">Password</label>
                    <input type="password" class="form-control" name="pass1" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="pass2">Confirm Password</label>
                    <input type="password" class="form-control" name="pass2" placeholder="Confirme Password">
                </div>

                <div class="form-group">
                    <label for="usertype">USER TYPE</label>
                    <select class="form-control" name="usertype">
                        <option value="User" selected>User</option>
                        <option value="Administrator">Administrator</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-gradient-primary me-2" name="save">Save</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $usertype = $_POST['usertype'];

        //upload image
        $target_dir = "./images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        if ($target_file == "./images/") $target_file = "./images/default.jpeg";

        if ($pass1 == $pass2) {
            //$pass1=md5($pass1);
            require '../config.php';
            $sql = "INSERT INTO `users` (`image`,`nom`, `email`, `pass`, `typeUser`) VALUES ('$target_file','$name', '$email', '$pass1', '$usertype');";
            mysqli_query($cn, $sql) or die(mysqli_error($cn));
            mysqli_close($cn);
            echo 'user has been saved';
        } else {
            echo "comfirm your password";
        }
    }

    ?>


    <?php include '../inc/footer.php'; ?>

    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>

</body>

</html>