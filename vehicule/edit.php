<?php
session_start();
if (!isset($_SESSION['typeUser']))
    header('location:../user/login.php'); 
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
    $id = $_GET['id'];
    require '../config.php';
    $sql = "SELECT * FROM `vehicules` WHERE id_vehicule = $id;";
    $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
    if ($line = mysqli_fetch_array($result)) {
    ?>

        <div class="card">
            <div class="card-body">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-account-plus"></i>
                        </span>Edit Vehicule
                    </h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="image">Image</label> <br />
                        <img src="<?php echo $line[1] ?>" alt="" style=" width: 50px;">
                        <input type="file" name="image" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="brand">BRAND:</label>
                        <input type="text" class="form-control" name="brand" value="<?php echo $line['brand'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="model">MODEL:</label>
                        <input type="text" class="form-control" name="model" value="<?php echo $line['model'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="license">LICENSE PLATE:</label>
                        <input type="text" class="form-control" name="license" value="<?php echo $line['license_plate'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="color">COLOR:</label>
                        <input type="text" class="form-control" name="color" value="<?php echo $line['color'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="observation">OBSERVATION:</label>
                        <textarea class="form-control" name="observation"><?php echo $line['observation'] ?></textarea>
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>

    <?php
    }
    $img = $line[1];
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
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $license = $_POST['license'];
    $color = $_POST['color'];
    $observation = $_POST['observation'];
    
    if (basename($_FILES["image"]["name"])) {
        $target_dir = "./images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $img = $target_file;
    }
    require '../config.php';
    $sql = "UPDATE `vehicules` SET `image` = '$img', `brand` = '$brand', `model` = '$model', `license_plate` = '$license', `color` = '$color', `observation` = '$observation' WHERE `vehicules`.`id_vehicule` = $id;";
    mysqli_query($cn, $sql) or die(mysqli_error($cn));
    mysqli_close($cn);
    header('location:index.php');
}
?>