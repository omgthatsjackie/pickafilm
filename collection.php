<?php 
    session_start();

    define("VG_ACCESS", true);
    require_once "core/settings/server_settings.php";
    require_once "core/models/db_connect.php";
    require_once "core/models/functions.php";

    if(isset($_SESSION['user'])) {
        require_once "core/scripts/compareVer.php";
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Pickafilm - это веб-приложение, на котором вы можете найти фильмы и сериалы и сохранить их в свою коллекцию.">
    <link rel="shortcut icon" href="assets/static/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/static/favicon-16x16.png" type="image/png">
    <link rel="icon" href="assets/static/favicon-32x32.png" type="image/png">
    <link rel="icon" href="assets/static/favicon-192x192.png" type="image/png">
    <link rel="icon" href="assets/static/favicon-512x512.png" type="image/png">
    <link rel="apple-touch-icon" href="assets/static/apple-touch-icon.png" type="image/png">
    <link rel="manifest" href="assets/static/site.webmanifest">
    <title>Коллекция / Pickafilm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="assets/styles/collection.css">
    <link rel="stylesheet" href="assets/views/navbar_omgthatsjackie/navbar.css">


</head>
  <body>

    <div class="section-outer">
      <div class="container">
        <?php if(!isset($_SESSION['user']))require_once "assets/views/navbar_omgthatsjackie/navbar-unlogged.php";
        else require_once "assets/views/navbar_omgthatsjackie/navbar.php"
        ?>
        <div class="content">

          <h1 class="title">Ваша коллекция</h1>
          <div class="search">
            <input class="search-input" type="text" placeholder="Введите название">
          </div>
            <?php
                if(!isset($_SESSION['user'])){
                    echo "<div class=\"shown\">Зарегистрируйтесь или войдите, чтобы получить возможность пользоваться коллекцией.</div>";
                    
                } else {
                  if ($_SESSION['user']['likes'] == 0) echo "<div class=\"shown\">Здесь пока пусто...</div>";

                }
            ?>

          <div class="cards">
              <?php require_once "core/scripts/echoCollection.php"; ?>
          </div>
        </div>
      </div>
    
      <div class="theme-toggler">
        <svg width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3.91471 26.0582L6.742 23.2662L8.91684 25.4139L6.08955 28.2058L3.91471 26.0582ZM15.4414 32V27.4899H18.5586V32H15.4414ZM4.63966 13.745V16.8233H0V13.745H4.63966ZM21.6759 7.3736C23.0775 8.18494 24.2011 9.28263 25.0469 10.6667C25.8927 12.0507 26.3156 13.5779 26.3156 15.2483C26.3156 17.7778 25.4094 19.9374 23.597 21.7271C21.7846 23.5168 19.5977 24.4116 17.0362 24.4116C14.4748 24.4116 12.2878 23.5168 10.4755 21.7271C8.66311 19.9374 7.75693 17.7778 7.75693 15.2483C7.75693 13.5779 8.16773 12.0507 8.98934 10.6667C9.81095 9.28263 10.9467 8.18494 12.3966 7.3736V0H21.6759V7.3736ZM29.3603 13.745H34V16.8233H29.3603V13.745ZM25.0832 25.4139L27.258 23.3378L30.0853 26.0582L27.9104 28.2058L25.0832 25.4139Z" fill="#807F7F"/>
        </svg>
      </div>
    </div>

    <script src="assets/scripts/collection.js"></script>
  </body>
</html>
