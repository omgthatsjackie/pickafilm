<?php
  session_start();
  define("VG_ACCESS", true);
  require_once "../settings/server_settings.php";
  require_once "../models/db_connect.php";

  $userid = $_SESSION['user']['id'];

  $deleteuser = mysqli_query($db, "DELETE FROM `users` WHERE `id`='$userid'");
  $deletecollection = mysqli_query($db, "DELETE FROM `likes` WHERE `userid`='$userid'");

  unset($_SESSION['user']);
  header('location: ../../form');
  return 1;