<?php
session_start();
if (!isset($_SESSION['typeUser']))
  header('location:user/login.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <?php include './inc/head-links.php'; ?>

</head>

<body>

  <?php include './inc/navBar_sideBar.php'; ?>

  <!-- partial -->
     

      <div class="container text-center">
        <div class="jumbotron">
          <h1 class="mb-5">SYSTEME DE GESTION Park AUTO</h1>
          <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Dashboard
        </h3>
      </div>
      <div class="row">
        
        
        <div class="col-md-4 mb-4">
          <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
              <h4 class="font-weight-normal mb-3">ALL VEHICULES <br>
              <i class="mdi mdi-car mdi-24px float-right"></i>
            </h4>
            <?php
                require 'config.php';
                $sql = "SELECT COUNT(*) FROM `vehicules`";
                $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
                if ($row = mysqli_fetch_array($result)) {
                  echo $row[0];
                }
                ?>
                </div>
              </div>
            </div>
            
            <div class="col-md-4 mb-4">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">DELETED VEHICULES <br>
                  <i class="mdi mdi-car mdi-24px float-right"></i>
                </h4>
                <?php
                    $sql = "SELECT COUNT(*) FROM `deleted_vehicules`";
                    $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
                    if ($row = mysqli_fetch_array($result)) {
                      echo $row[0];
                    }
                    ?>
                </div>
              </div>
            </div>
            
            <div class="col-md-4 mb-4">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">ACTIVE MISSION<br>
                  <i class="mdi mdi-car mdi-24px float-right"></i>
                </h4>
                <?php
                $sql = "SELECT COUNT(*) FROM `reserved`";
                $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
                if ($row = mysqli_fetch_array($result)) {
                  echo $row[0];
                }
                ?>
                </div>
              </div>
            </div>
            
            <div class="col-md-4 mb-4">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">ALL MISSION<br>
                  <i class="mdi mdi-car mdi-24px float-right"></i>
                </h4>
                <?php
                $sql = "SELECT COUNT(*) FROM `reserved_record`";
                $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
                if ($row = mysqli_fetch_array($result)) {
                  echo $row[0];
                }
                ?>
                </div>
              </div>
            </div>

            <?php
        if ($_SESSION['typeUser'] == "Administrator") { ?>

<div class="col-md-4 mb-4">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">ALL Accounts<br>
                  <i class="mdi mdi-account mdi-24px float-right"></i>
                </h4>
                <?php
                  $sql = "SELECT COUNT(*) FROM `users`";
                  $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
                  if ($row = mysqli_fetch_array($result)) {
                    echo $row[0];
                  }
                  ?>
                </div>
              </div>
            </div>
         
<div class="col-md-4 mb-4">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">ALL DELETED Accounts<br>
                  <i class="mdi mdi-account-off mdi-24px float-right"></i>
                </h4>
                <?php
                  $sql = "SELECT COUNT(*) FROM `deleted_users`";
                  $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
                  if ($row = mysqli_fetch_array($result)) {
                    echo $row[0];
                  }
                  ?>
                  </div>
                </div>
              </div>

          <?php } ?>
        </div>
      </div>
    </div>
  
    
    
    
    <?php include './inc/footer.php'; ?>
    
    <?php include './inc/footer-scripts.php'; ?>
    
  </body>
  
  </html>