<?php
  if ($_SESSION['user']['ver']!=version || !isset($_SESSION['user']['ver'])){
    unset($_SESSION['user']);
    header('location: form');
  }