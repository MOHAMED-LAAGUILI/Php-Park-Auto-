<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "parcking";

$cn = mysqli_connect($host, $username,$password, $database) or die(mysqli_connect_error());