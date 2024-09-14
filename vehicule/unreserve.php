<?php

$id = $_GET['id'];
$status = 'Available';
if (isset($_GET['id'])) {
  require '../config.php';
  $sql = "UPDATE `vehicules` SET `status` = '$status' WHERE `vehicules`.`id_vehicule` = $id;";
  mysqli_query($cn, $sql) or die(mysqli_error($cn));
  $sql = "INSERT INTO `reserved_record` (`id_vehicule`,`brand`, `model`, `license_plate`,`date_reservation`) 
  SELECT `vehicules`.`id_vehicule`, `vehicules`.`brand`, `vehicules`.`model`, `vehicules`.`license_plate`, `reserved`.`date_reservation` FROM `vehicules`, `reserved`
  WHERE `vehicules`.`id_vehicule` = `reserved`.`id_vehicule` AND`vehicules`.`id_vehicule` = $id;";
  mysqli_query($cn, $sql) or die(mysqli_error($cn));
  $sql = "DELETE FROM `reserved` WHERE id_vehicule=$id";
  mysqli_query($cn, $sql) or die(mysqli_error($cn));
  mysqli_close($cn);
  header('location:index.php');
}