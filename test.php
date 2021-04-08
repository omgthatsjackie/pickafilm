<?php
  define("VG_ACCESS", true);

  require_once "core/settings/server_settings.php";
  require_once "core/models/db_connect.php";

  $getAvatars = mysqli_query($db, "SELECT * FROM `avatars`");

  if (!$getAvatars){
    $img = "assets/images/no_picture.png";
    return 1;
  }

  $avatars = array();
  while ($row = mysqli_fetch_assoc($getAvatars))
  {
    array_push($avatars, $row['source']);
  }

  $i = count($avatars)-1;
  if ($i<0) $i = 0;
  $i = rand(0, $i);
  $img = $avatars[$i];
  mysqli_close($db);