<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('location: form');
        return 1;
    }
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
	
		<!-- meta tags -->
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="robots" content="index, follow" />
		<meta name="google" content="notranslate" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="description" content="'Pickafilm' -  это веб-сайт, на котором вы можете найти фильмы и сериалы и сохранить их в свою коллекцию.">
	
		<!-- favicon -->
		<link rel="shortcut icon" href="./assets/static/favicon.ico" type="image/x-icon" />
		<link rel="icon" href="assets/static/favicon-16x16.png" type="image/png" />
		<link rel="icon" href="assets/static/favicon-32x32.png" type="image/png" />
		<link rel="icon" href="assets/static/favicon-192x192.png" type="image/png" />
		<link rel="icon" href="assets/static/favicon-512x512.png" type="image/png" />
		<link rel="apple-touch-icon" href="assets/static/apple-touch-icon.png" type="image/png">
		<link rel="manifest" href="assets/static/site.webmanifest" />
		
		<!-- title -->
		<title>Ваш профиль</title>
	
		<!-- styles -->
		<link rel="stylesheet" href="assets/styles/userPage.css" />
		<link rel="stylesheet" href="assets/views/navbar_hlebushek/assets/styles/test.css">
	</head>
	<body>
		<div class="wrapper">
			<!-- -- navbar -- -->
			<?php require_once "assets/views/navbar_hlebushek/navbar.php";?>
			
			<!-- content -->
			<main class="main">
				<div class="main__content container">
					<div class="user">
						<div class="user__avatar">
							<picture>
<!--								<source srcset="./assets/images/avatar.webp" type="image/webp" />-->
								<img src="./assets/images/no_picture.png" />
							</picture>
						</div>
						<!-- ==== [ALEX] ==== -->
						<!-- ник здесь -->
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
								<!-- ==== [ALEX] ==== -->
								<!-- кол-во лайков в спане -->
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
								<!-- ==== [ALEX] ==== -->
								<!-- дата в спане -->
								<p class="stats__title">
									Дата регистрации: <br />
									<span>23-10-2020</span>
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
		</div>

		<!-- scripts -->
		<script src="./assets/scripts/userPage.js"></script>
		<script src="./assets/views/navbar_hlebushek/assets/scripts/test.js"></script>
	</body>
</html>
