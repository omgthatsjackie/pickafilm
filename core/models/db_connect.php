<?php
  if (!defined('VG_ACCESS')) {
    echo "<link rel=\"stylesheet\" href=\"../../assets/styles/access_denied.css\">";
    die('ACCESS DENIED');
  }
  $db = mysqli_connect(db_host, db_user, db_pass, db_name);
  if (!$db) die(mysqli_connect_error($db));
?>