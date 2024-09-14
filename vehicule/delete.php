<?php

$id = $_GET['id'];
if (isset($_GET['id'])) {
  require '../config.php';
  $sql = "INSERT INTO `deleted_vehicules` (`id`, `brand`, `model`, `license_plate`, `color`, `observation`) SELECT `id_vehicule`, `brand`, `model`, `license_plate`, `color`, `observation` FROM `vehicules` WHERE id_vehicule=$id";
  mysqli_query($cn, $sql) or die(mysqli_error($cn));
  $sql = "DELETE FROM `vehicules` WHERE id_vehicule=$id";
  mysqli_query($cn, $sql) or die(mysqli_error($cn));
  mysqli_close($cn);
  header('location:index.php');
}