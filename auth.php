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
    <title>Регистрация/вход</title>
    <link rel="stylesheet" href="assets/styles/form.css">
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
									<input disabled type="submit" class="form__submit reg-submit purple-btn" name="reg_submit" value="Зарегистрироваться">
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
									<input disabled type="submit" class="form__submit login-submit purple-btn" name="log_submit" value="Войти">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="theme-toggler">
        <svg width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3.91471 26.0582L6.742 23.2662L8.91684 25.4139L6.08955 28.2058L3.91471 26.0582ZM15.4414 32V27.4899H18.5586V32H15.4414ZM4.63966 13.745V16.8233H0V13.745H4.63966ZM21.6759 7.3736C23.0775 8.18494 24.2011 9.28263 25.0469 10.6667C25.8927 12.0507 26.3156 13.5779 26.3156 15.2483C26.3156 17.7778 25.4094 19.9374 23.597 21.7271C21.7846 23.5168 19.5977 24.4116 17.0362 24.4116C14.4748 24.4116 12.2878 23.5168 10.4755 21.7271C8.66311 19.9374 7.75693 17.7778 7.75693 15.2483C7.75693 13.5779 8.16773 12.0507 8.98934 10.6667C9.81095 9.28263 10.9467 8.18494 12.3966 7.3736V0H21.6759V7.3736ZM29.3603 13.745H34V16.8233H29.3603V13.745ZM25.0832 25.4139L27.258 23.3378L30.0853 26.0582L27.9104 28.2058L25.0832 25.4139Z" fill="#807F7F"/>
        </svg>
      </div>
		</div>

		<!-- scripts -->
		<script src="assets/scripts/form.js"></script>
        <script src="assets/views/navbar_hlebushek/assets/scripts/test.js"></script>
	</body>
</html>
