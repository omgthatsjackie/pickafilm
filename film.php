<?php
  session_start();
  define("VG_ACCESS", true);
  $film_id = $_GET['id'];
  $type = $_GET['type'];
  $userid = @$_SESSION['user']['id'];

  require_once "core/settings/server_settings.php";
  require_once "core/models/db_connect.php";
  require_once "core/models/functions.php";
  require_once "core/models/tmdbGet.php";

  if (isset($_SESSION['user'])) require_once "core/scripts/compareVer.php";
  $isLiked = false;
  $searchThisInCollection = mysqli_query($db, "SELECT * FROM `likes` WHERE `userid`='$userid' AND `type`='$type' AND `contentid`='$film_id'");
  if (mysqli_num_rows($searchThisInCollection)>0) $isLiked = true;
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
    <link rel="apple-touch-icon" href="assets/static/apple-touch-icon.png" type="image/png">
    <link rel="manifest" href="assets/static/site.webmanifest">
    <title>Описание / Pickafilm</title>
    <link rel="stylesheet" href="assets/styles/filmPage.css" />
    <link rel="stylesheet" href="assets/views/navbar_hlebushek/assets/styles/test.css">
  </head>
  <body>
    <div class="wrapper">
      <?php require_once "assets/views/navbar_hlebushek/navbar.php"; ?>
      <main class="main">
        <div class="main__content container">
          <div class="main__column1 column1">
            <picture class="column1__img">
              <img src="<?php echo $image ?>" alt="Poster">
            </picture>
            <?php if (isset($_SESSION['user'])) require_once "assets/views/likeBtn.php";?>
            <div class="column1__circle-bar circle-bar">
              <svg class="circle-bar__svg">
                <circle class="circle-bar__bg" cx="50%" cy="50%" r="40%"></circle>
                <circle class="circle-bar__border" cx="50%" cy="50%" r="40%"></circle>
              </svg>
              <p class="circle-bar__text" data-rate="<?php echo $data['vote_average']?>">0</p>
            </div>
          </div>
          <div class="main__column2 column2">
            <h1 class="column2__title">
              <?php
                if ($type=="movie") echo $data['title'];
                if ($type=="tv") echo $data['name'];
              ?>
            </h1>
            <div class="column2__inf inf">
              <span class="inf__label red"><?php echo $age;?></span>
              <p class="inf__date">
                <?php
                  if ($type=="movie") $year = preg_split("/[-]+/",$data['release_date']);
                  if ($type=="tv") $year = preg_split("/[-]+/",$data['first_air_date']);
                  echo $year[0];
                ?>
              </p>
              <p class="inf__tags">
                <?php
                  $genres_count = count($data['genres']);
                  $genres = "";
                  for ($i = 0; $i<$genres_count; $i++) {
                    if ($i!=$genres_count-1) {
                      $genres.= ($data['genres'][$i]['name'].", ");
                    } else {
                      $genres.=$data['genres'][$i]['name'];
                      $genres.=".";
                    }
                  }
                  echo ucwords($genres);
                ?>
              </p>
              <p class="inf__time">
                <?php
                  if ($type=="movie") {
                    echo $data['runtime'];
                    $last_char = $data['runtime']%10;
                    $prelast_char = round(($data['runtime']%100)/10);
                    if ($last_char==1) {echo " минута";}
                    elseif (($last_char==2 || $last_char==3 ||$last_char==4) AND $prelast_char!=1) {echo " минуты";}
                    else echo " минут";
                  }
                ?>
              </p>
            </div>
            <div class="column2__description description">
              <h2 class="description__title">Описание:</h2>
              <p class="description__text">
                <?php
                  echo $data['overview'];
                ?>
              </p>
            </div>
          </div>	
        </div>
      </main>
      
      <div class="theme-toggler">
        <svg width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3.91471 26.0582L6.742 23.2662L8.91684 25.4139L6.08955 28.2058L3.91471 26.0582ZM15.4414 32V27.4899H18.5586V32H15.4414ZM4.63966 13.745V16.8233H0V13.745H4.63966ZM21.6759 7.3736C23.0775 8.18494 24.2011 9.28263 25.0469 10.6667C25.8927 12.0507 26.3156 13.5779 26.3156 15.2483C26.3156 17.7778 25.4094 19.9374 23.597 21.7271C21.7846 23.5168 19.5977 24.4116 17.0362 24.4116C14.4748 24.4116 12.2878 23.5168 10.4755 21.7271C8.66311 19.9374 7.75693 17.7778 7.75693 15.2483C7.75693 13.5779 8.16773 12.0507 8.98934 10.6667C9.81095 9.28263 10.9467 8.18494 12.3966 7.3736V0H21.6759V7.3736ZM29.3603 13.745H34V16.8233H29.3603V13.745ZM25.0832 25.4139L27.258 23.3378L30.0853 26.0582L27.9104 28.2058L25.0832 25.4139Z" fill="#807F7F"/>
        </svg>
      </div>
    </div>

    <script src="assets/scripts/filmPage.js"></script>
    <script src="assets/views/navbar_hlebushek/assets/scripts/test.js"></script>
    <script src="assets/libs/JQuery/jquery.js"></script>
    <script src="assets/scripts/like.js"></script>
  </body>
</html>
