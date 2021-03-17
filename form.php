<?php
    session_start();
    if (isset($_SESSION['user'])){
        header('location: main');
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
		<link rel="icon" href="./assets/static/favicon-16x16.png" type="image/png" />
		<link rel="icon" href="./assets/static/favicon-32x32.png" type="image/png" />
		<link rel="icon" href="./assets/static/favicon-192x192.png" type="image/png" />
		<link rel="icon" href="./assets/static/favicon-512x512.png" type="image/png" />
		<link rel="apple-touch-icon" href="./assets/static/apple-touch-icon.png" type="image/png">
		<link rel="manifest" href="./assets/static/site.webmanifest" />
		
		<!-- title -->
		<title>форма</title>
	
		<!-- styles -->
		<link rel="stylesheet" href="assets/styles/form.css" />
        <link rel="stylesheet" href="assets/views/navbar_hlebushek/assets/styles/test.css">
	</head>
	<body>
		<div class="wrapper">
            <?php require_once "assets/views/navbar_hlebushek/navbar.php";?>
			<div class="main">
				<div class="container">
					<div class="auth">
						<div class="auth__wrapper">
					
							<!-- tabs -->
							<div class="auth__tabs tabs-auth">
								<div class="tabs-auth__tab tabs-auth__login">
									<p class="tabs-auth__text">Вход</p>
								</div>
								<div class="tabs-auth__tab tabs-auth__reg active">
									<p class="tabs-auth__text">Регистрация</p>
								</div>
							</div>
					
							<div class="auth__forms">
								<!-- reg form -->
								<!-- ==== [ALEX] ==== -->
								<!-- action здесь -->
								<form action="core/scripts/formActions" class="auth__form reg-form" method="POST">

					
									<!-- fields -->
									<div class="form__field form__nickname">
										<input type="text" autocomplete="username" name="nickname" class="form__input" placeholder="Никнейм">
										<p class="form__error"></p>
									</div>
					
									<div class="form__field form__email">
										<input type="email" autocomplete="email" name="email" class="form__input" placeholder="Почта">
										<p class="form__error">
                                          <?php
                                            if(isset($_SESSION['email_reg_error'])){
                                                echo $_SESSION['email_reg_error'];
                                                unset($_SESSION['email_reg_error']);
                                            }
                                          ?>
                                        </p>
									</div>
					
									<div class="form__field form__password password">
										<input type="password" name="password" autocomplete="current-password" class="form__input" placeholder="Придумайте пароль">
										<p class="form__error">
                                        </p>
										<svg class="icon form__eye">
											<use xlink:href="./assets/images/sprite.svg#eye"/>
										</svg>
									</div>
					
					
									<!-- checker -->
									<div class="form__password-checker password-checker">
										<div class="password-checker__line">
											<span class="password-checker__active"></span>
											<span class="password-checker__mask"></span>
										</div>
										<p class="password-checker__text"></p>
									</div>
					
					
									<!-- password_2 field -->
									<div class="form__field form__password-verify">
										<input type="password" class="form__input" autocomplete="current-password" placeholder="Повторите пароль">
										<p class="form__error"></p>
									</div>
					
					
									<!-- submit btn -->
									<input type="submit" class="form__submit reg-submit purple-btn" name="reg_submit" value="Зарегистрироваться">
								</form>
					
								<!-- login form -->
								<!-- ==== [ALEX] ==== -->
								<!-- action здесь -->
								<form action="core/scripts/formActions" method="POST" class="auth__form login-form">
					
									<!-- login nickname or email -->
									<div class="form__field form__nickname-email">
										<input type="text" name="email_or_nickname" autocomplete="email" value="" class="form__input" placeholder="Почта или Никнейм">
										<p class="form__error">
                                          <?php
                                            if(isset($_SESSION['username_error'])){
                                                echo $_SESSION['username_error'];
                                                unset($_SESSION['username_error']);
                                            }
                                          ?>
                                        </p>
									</div>
					
									<!-- login password -->
									<div class="form__field form__password password">
										<input type="password" name="password" autocomplete="current-password" value="" class="form__input" placeholder="Пароль">
										<p class="form__error">
                                          <?php
                                          if(isset($_SESSION['password_error'])){
                                            echo $_SESSION['password_error'];
                                            unset($_SESSION['password_error']);
                                          }
                                          ?>
                                        </p>
										<svg class="icon form__eye">
											<use xlink:href="assets/images/sprite.svg#eye"/>
										</svg>
									</div>
					
									<!-- login submit btn -->
									<input type="submit" class="form__submit login-submit purple-btn" name="log_submit" value="Войти">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- scripts -->
		<script src="assets/scripts/form.js"></script>
        <script src="assets/views/navbar_hlebushek/assets/scripts/test.js"></script>
	</body>
</html>
