<?php
session_start();
if(!isset($_SESSION['user']) || !isset($_POST['hr']))
{
  return 1;
}
define("VG_ACCESS", true);
require_once "../settings/server_settings.php";
require_once "../models/db_connect.php";

$userid = $_SESSION['user']['id'];

$data = preg_split("/[?]+/",$_POST['hr']);
$data = preg_split("/[&]+/",$data[1]);

$data = array(
  "id"=>preg_split("/[=]+/",$data[0])[1],
  "type"=>preg_split("/[=]+/", $data[1])[1]
);

$type = $data["type"]; $film_id = $data["id"];

$action = true;
$searchThisInCollection = mysqli_query($db, "SELECT * FROM `likes` WHERE `userid`='$userid' AND `type`='$type' AND `contentid`='$film_id'");
if (mysqli_num_rows($searchThisInCollection)>0) $action = false;

if ($action){
  $ins_collection = mysqli_query($db, "INSERT INTO `likes` (`type`, `userid`, `contentid`) VALUES ('$type', '$userid', '$film_id')");
  $_SESSION['user']['likes']++;
  $likes = $_SESSION['user']['likes'];
  $upd_likes = mysqli_query($db, "UPDATE `users` SET `likes`='$likes' WHERE `id`='$userid'");
} else {
  $del_collection = mysqli_query($db, "DELETE FROM `likes` WHERE `userid`='$userid' AND `type`='$type' AND `contentid`='$film_id'");

  $_SESSION['user']['likes']--;
  $likes = $_SESSION['user']['likes'];
  $upd_likes = mysqli_query($db, "UPDATE `users` SET `likes`='$likes' WHERE `id`='$userid'");
}

mysqli_close($db);
return 1;