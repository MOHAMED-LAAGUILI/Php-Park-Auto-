<?php
session_start();

if (isset($_SESSION['typeUser'])) {
  header('location:../index.php');
  exit;
}

$err = ""; 

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  //$pass = md5($pass);
  require '../config.php';
  $sql = "SELECT * FROM `users` WHERE email = '$email' and pass='$pass';";
  $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['idUser'] = $row[0];
    $_SESSION['image'] = $row[1];
    $_SESSION['nomUser'] = $row[2];
    $_SESSION['emailUser'] = $row[3];
    $_SESSION['passUser'] = $row[4];
    $_SESSION['typeUser'] = $row[5];

    session_write_close(); // Write session data to storage

    $date = date("d/m/y h:i:s");
    // save log
    $myfile=fopen("log.txt","a");
    fwrite($myfile,"\n".$date. "#" .$_SESSION['typeUser']. "#" .$_SESSION['emailUser']. "#" . "🟢 Login");
    fclose($myfile);

    header('location:../index.php');
    exit;
  } else {
    $err = "<center class='fw-bolder' style='color:red'>Email or password incorrect</center>";
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
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../assets/images/logo.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="pass">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="login">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <?php echo $err; ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/misc.js"></script>
</body>

</html>