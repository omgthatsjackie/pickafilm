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
        <link rel="icon" href="assets/static/favicon-192x192.png" type="image/png">
        <link rel="icon" href="assets/static/favicon-512x512.png" type="image/png">
        <link rel="apple-touch-icon" href="assets/static/apple-touch-icon.png" type="image/png">
        <link rel="manifest" href="assets/static/site.webmanifest">
        <title>Описание / Pickafilm</title>
        <link rel="stylesheet" href="assets/styles/filmPage.css" />
        <link rel="stylesheet" href="assets/views/navbar_hlebushek/assets/styles/test.css">
    </head>
	<body>
		<div class="wrapper">
			<!-- -- navbar -- -->
            <?php  require_once "assets/views/navbar_hlebushek/navbar.php";?>
			
			<!-- content -->
			<main class="main">
				<div class="main__content container">
					<!-- column-1 -->
					<div class="main__column1 column1">
						
						<!-- -- img -- -->
						<picture class="column1__img">
<!--							<source srcset="./assets/images/joker.webp" type="image/webp">-->
							<img src="<?php echo $image?>">
						</picture>
					
						<!-- -- button -- -->
						<?php if(isset($_SESSION['user'])) require_once "assets/views/likeBtn.php";?>
					
						<!-- circle thing -->
						<div class="column1__circle-bar circle-bar">
							<svg class="circle-bar__svg">
								<circle class="circle-bar__bg" cx="50%" cy="50%" r="40%"></circle>
								<circle class="circle-bar__border" cx="50%" cy="50%" r="40%"></circle>
							</svg>
							<!-- ==== [ALEX] ==== -->
							<!-- в data-rate нажо записывать рейтинг -->
							<p class="circle-bar__text" data-rate="<?php echo $data['vote_average']?>">0</p>
						</div>
						
					</div>	
					<!-- column-2 -->
					<!-- ==== [ALEX] ==== -->
					<!-- тут данные сам найдешь короче -->
					<div class="main__column2 column2">
						<h1 class="column2__title">
                          <?php
                            if($type=="movie")echo $data['title'];
                            if($type=="tv") echo $data['name'];
                          ?>
                        </h1>
						<div class="column2__inf inf">
							<!-- ==== [ALEX] ==== -->
							<!-- label возрастного рейтинга -->
							<!-- в зависимости от рейтинга надо менять класс -->
							<!-- red - 18+ -->
							<!-- orange - 16+ -->
							<!-- green - дети короче(я не помню возраст) -->
							<span class="inf__label red"><?php echo $age;?></span>
							<p class="inf__date">
                              <?php
                              if($type=="movie") $year = preg_split("/[-]+/",$data['release_date']);
                              if($type=="tv") $year = preg_split("/[-]+/",$data['first_air_date']);
                              echo $year[0];
                              ?>
                            </p>
							<p class="inf__tags">
                              <?php
                                  $genres_count = count($data['genres']);
                                  $genres = "";
                                  for ($i = 0; $i<$genres_count; $i++){
                                      if ($i!=$genres_count-1){
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
                                if ($type=="movie"){
                                echo $data['runtime'];
                                $last_char = $data['runtime']%10;
                                $prelast_char = round(($data['runtime']%100)/10);
                                if($last_char==1) {echo " минута";}
                                elseif(($last_char==2 || $last_char==3 ||$last_char==4) AND $prelast_char!=1) {echo " минуты";}
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
					</div>	</div>
			</main>
			
		</div>

		<!-- scripts -->
		<script src="assets/scripts/filmPage.js"></script>
		<script src="assets/views/navbar_hlebushek/assets/scripts/test.js"></script>
        <script src="assets/libs/JQuery/jquery.js"></script>
        <script src="assets/scripts/like.js"></script>
	</body>
</html>
