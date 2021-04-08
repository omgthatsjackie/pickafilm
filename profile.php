<?php
  session_start();
  if (!isset($_SESSION['user'])){
    header('location: form');
    return 1;
  }
  define("VG_ACCESS", true);
  require_once "core/settings/server_settings.php";
  if (isset($_SESSION['user'])) require_once "core/scripts/compareVer.php";
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
    <title>Ваш профиль / Pickafilm</title>
    <link rel="stylesheet" href="assets/styles/userPage.css" />
    <link rel="stylesheet" href="assets/views/navbar_hlebushek/assets/styles/test.css">
  </head>
  <body>
    <div class="wrapper">
      <?php require_once "assets/views/navbar_hlebushek/navbar.php"; ?>
      <main class="main">
        <div class="main__content container">
          <div class="user">
            <div class="user__avatar">
              <picture>
                <img src="<?php echo $_SESSION['user']['avatar']; ?>" />
              </picture>
            </div>
            <h1 class="user__nickname">
              <?php
                echo $_SESSION['user']['username'];
              ?>
            </h1>
          </div>

          <div class="stats">
            <div class="cards-inf">
              <div class="stats__card">
                <svg class="stats__icon heart spriteIcon">
                  <use xlink:href="./assets/images/sprite.svg#heart" />
                </svg>
                <p class="stats__title">Лайкнуто:
                  <span>
                    <?php
                      echo $_SESSION['user']['likes'];
                    ?>
                  </span>
                </p>
              </div>
              <div class="stats__card">
                <svg class="stats__icon calendar spriteIcon">
                  <use xlink:href="./assets/images/sprite.svg#calendar" />
                </svg>
                <p class="stats__title">
                  Дата регистрации: <br />
                  <span>
                    <?php
                      echo $_SESSION['user']['date'];
                    ?>
                  </span>
                </p>
              </div>
            </div>
            <button class="stats__card bin card-action">
              <svg class="stats__icon spriteIcon">
                <use xlink:href="./assets/images/sprite.svg#bin" />
              </svg>
              <p class="stats__title">Удалить профиль</p>
            </button>
          </div>

          <div class="delete-popup">
            <div class="delete-popup__bg"></div>
            <div class="delete-popup__block">
              <div class="delete-popup__content">
                <div class="delete-popup__notify">
                  <p class="delete-popup__title">Вы точно хотите удалить свой профиль?</p>
                  <p class="delete-popup__subtitle">Если вы это сделаете ваша коллекция и профиль <span>безвозратно удалятся.</span></p>
                  <svg class="delete-popup__close spriteIcon">
                    <use xlink:href="./assets/images/sprite.svg#close" />
                  </svg>
                  <button class="delete-popup__button">Да, я точно хочу удалить свой профиль</button>
                </div>
                <div class="delete-popup__loader">
                  <svg class="delete-popup__loader-icon round">
                    <circle class="bg" cx="50%" cy="50%" r="40%"></circle>
                    <circle class="border" cx="50%" cy="50%" r="40%"></circle>
                  </svg>
                </div>
                <div class="delete-popup__transition">
                  <div class="delete-popup__transition-circle"></div>
                </div>
                <div class="delete-popup__success">
                  <div class="delete-popup__success-content">
                    <p>Ваша страница была успешно удалена</p>
                  </div>
                </div>
                <div class="delete-popup__error">
                  <div class="delete-popup__error-content">
                    <p>Ошибка при удалении: повторите попытку позже</p>
                  </div>
                </div>
              </div>
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

    <script src="assets/scripts/userPage.js"></script>
    <script src="assets/views/navbar_hlebushek/assets/scripts/test.js"></script>
  </body>
</html>
