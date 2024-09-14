<?php
session_start();
if (isset($_SESSION['typeUser']))
  header('location:../index.php');

  $err = ""; 

  if (isset($_POST['login'])) {
  
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    //$pass = md5($pass);
    require '../config.php';
    $sql = "SELECT * FROM `users` WHERE email = '$email' and pass='$pass';";
    $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
    if ($row = mysqli_fetch_array($result)) {
      session_start();
      $_SESSION['idUser'] = $row[0];
      $_SESSION['image'] = $row[1];
      $_SESSION['nomUser'] = $row[2];
      $_SESSION['emailUser'] = $row[3];
      $_SESSION['passUser'] = $row[4];
      $_SESSION['typeUser'] = $row[5];

      $date = date("d/m/y h:i:s");
  
      // save log
      $myfile=fopen("log.txt","a");
      fwrite($myfile,"\n".$date. "#" .$_SESSION['typeUser']. "#" .$_SESSION['emailUser']. "#" . "🟢 Login");
      fclose($myfile);
  
      header('location:../index.php');
    } else {
      $err = "<center class='fw-bolder' style='color:red'>Email or password incorect</center>";
    }
    mysqli_close($cn);
  }
  
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>LOGIN</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
               <h2 class="fw-bold text-center">LOGIN</h2>
              </div>
              <h6 class="font-weight-bold">
              <?php  if(isset($err)) echo $err; ?>
              </h6>
              <form class="pt-2" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg"  name="email" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg"  name="pass" placeholder="Password">
                </div>
                <div class="form-group text-center">
                  <input type="submit" name="login" value="Login" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                </div>
              
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

  <!-- endinject -->


<!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>
</html>
