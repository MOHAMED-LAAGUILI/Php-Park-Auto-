<?php

$id = $_GET['id'];
if (isset($_GET['id'])) {
  require '../config.php';
  $sql = "INSERT INTO `deleted_users` (`id`, `nom`, `email`, `pass`, `typeUser`) SELECT `id`, `nom`, `email`, `pass`, `typeUser`FROM `users` WHERE id=$id";
  mysqli_query($cn, $sql) or die(mysqli_error($cn));
  $sql = "DELETE FROM `users` WHERE id=$id";
  mysqli_query($cn, $sql) or die(mysqli_error($cn));
  mysqli_close($cn);
  header('location:allusers.php');
}