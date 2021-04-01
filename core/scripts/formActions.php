<?php
  session_start();
  define("VG_ACCESS", True);
  require_once "../settings/server_settings.php";
  require_once "../models/db_connect.php";
  if(isset($_POST['log_submit'])){
    //Авторизация
    $login = $_POST['email_or_nickname'];
    $password = $_POST['password'];
    $search_login = mysqli_query($db, "SELECT * FROM `users` WHERE `username`='$login' OR `email`='$login'");
    if(!mysqli_num_rows($search_login)){
      $_SESSION['username_error'] = "Аккаунт не существует!";
      header('location: ../../form');
      return 1;
    } else {
      while($row = mysqli_fetch_assoc($search_login)){
        if($row['password']===$password){
          //Успешный вход
          $_SESSION['user']=array(
            "id"=>$row['id'],
            "username"=>$row['username'],
            "email"=>$row['email'],
            "password"=>$row['password'],
            "likes"=>$row['likes'],
            "date"=>$row['date'],
            "avatar"=>$row['avatar'],
            "ver"=>version
          );
          header('location: ../../form');
          return 1;
        }//if
      }//while
      //Неверный пароль
      $_SESSION['password_error'] = "Пароль не верен!";
      header('location: ../../form');
      return 1;
    }//if
  }
  if(isset($_POST['reg_submit'])){
    $username = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $search_email = mysqli_query($db, "SELECT * FROM `users` WHERE `email`='$email'");
    if (mysqli_num_rows($search_email)>0){
      $_SESSION['email_reg_error'] = "Аккаунт с таким email уже существует!";
      header('location: ../../form');
      return 1;
    } else {
      require_once "setRandAvatar.php";
      $insert = mysqli_query($db, "INSERT INTO `users` (`username`, `email`, `password`, `likes`, `avatar`) VALUES ('$username', '$email', '$password', '0', '$img')");
      $search_email = mysqli_query($db, "SELECT * FROM `users` WHERE `email`='$email' AND `username`='$username'");
      $row = mysqli_fetch_assoc($search_email);
      $_SESSION['user']=array(
        "id"=>$row['id'],
        "username"=>$row['username'],
        "email"=>$row['email'],
        "password"=>$row['password'],
        "likes"=>$row['likes'],
        "date"=>$row['date'],
        "avatar"=>$row['avatar'],
        "ver"=>version
      );
      header('location: ../../form');
      return 1;
    }
  }