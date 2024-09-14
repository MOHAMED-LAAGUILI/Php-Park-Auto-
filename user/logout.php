<?php
session_start();
//write in log file
$myfile=fopen("log.txt","a");
fwrite($myfile,"\n".date("d/m/y h:i:s"). "#" . $_SESSION['typeUser']."#".$_SESSION['emailUser']. "#" . "🔴 Logout");
fclose($myfile);
session_unset();
session_destroy();
header("location:login.php");