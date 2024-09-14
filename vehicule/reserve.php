<?php

$id = $_GET['id'];
$status = 'Unavailable';
if (isset($_GET['id'])) {
  require '../config.php';
  $sql = "UPDATE `vehicules` SET `status` = '$status' WHERE `vehicules`.`id_vehicule` = $id;";
  mysqli_query($cn, $sql) or die(mysqli_error($cn));
  $sql = "INSERT INTO `reserved` (`id_vehicule`,`brand`, `model`, `license_plate`) SELECT `id_vehicule`, `brand`, `model`, `license_plate` FROM `vehicules` WHERE `vehicules`.`id_vehicule` = $id;";
  mysqli_query($cn, $sql) or die(mysqli_error($cn));
  mysqli_close($cn);
  header('location:index.php');
}