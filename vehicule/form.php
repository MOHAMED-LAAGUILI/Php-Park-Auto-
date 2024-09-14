<?php
session_start();
if (!isset($_SESSION['typeUser']))
    header('location:../user/login.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADD CAR</title>
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


    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-car"></i>
                    </span>ADD A CAR
                </h3>
            </div>
            <form method="post" enctype="multipart/form-data" class="fw-bold">
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="brand">BRAND</label>
                    <input type="text" class="form-control" name="brand" required>
                </div>

                <div class="form-group">
                    <label for="model">MODEL</label>
                    <input type="text" class="form-control" name="model" required>
                </div>

                <div class="form-group">
                    <label for="license">LICENSE PLATE</label>
                    <input type="text" class="form-control" name="license" required>
                </div>

                <div class="form-group">
                    <label for="color">COLOR</label>
                    <input type="text" class="form-control" name="color" required>
                </div>

                <div class="form-group">
                    <label for="observation">OBSERVATION</label>
                    <textarea class="form-control" name="observation" required></textarea>
                </div>

                <button type="submit" class="btn btn-gradient-primary me-2" name="save">Save</button>
            </form>
        </div>
    </div>


    <?php
    if (isset($_POST['save'])) {
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $license = $_POST['license'];
        $color = $_POST['color'];
        $observation = $_POST['observation'];
        $status = "Available";

         //upload image
         $target_dir = "./images/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
         if ($target_file == "./images/") $target_file = "./images/default.jpeg";

         
        require '../config.php';
        $sql = "INSERT INTO `vehicules` (`image`,`brand`, `model`, `license_plate`, `color`, `observation`,`status`) VALUES ('$target_file','$brand', '$model', '$license', '$color', '$observation','$status');";
        mysqli_query($cn, $sql) or die(mysqli_error($cn));
        mysqli_close($cn);
        echo 'Le véhicule a été enregistré avec succès.';
        echo '<a href="index.php" class="btn btn-primary">Home</a>';
    }
    ?>


    <?php include '../inc/footer.php'; ?>


    <!--NAV 1 side Bar Deppendencies-->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>



</body>

</html>