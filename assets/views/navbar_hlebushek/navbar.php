<header class="navbar <?php if(!isset($_SESSION['user'])) echo 'nav-unreg' ?>">
	<div class="navbar__content container">
		<a href="main" class="navbar__logo-link">		
			<svg class="navbar__logo" width="200" height="28" viewBox="0 0 258 36" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					fill-rule="evenodd"
					clip-rule="evenodd"
					d="M0 35.5V0H15.3C17.0333 0 18.6333 0.35 20.1 1.05C21.5667 1.75 22.8333 2.7 23.9 3.9C24.9667 5.06667 25.7833 6.38333 26.35 7.85C26.95 9.31667 27.25 10.8 27.25 12.3C27.25 14.4 26.75 16.3833 25.75 18.25C24.7833 20.1167 23.4167 21.65 21.65 22.85C19.9167 24.0167 17.8833 24.6 15.55 24.6H9.75V35.5H0ZM9.75 16.1H14.9C15.5 16.1 16.05 15.8333 16.55 15.3C17.0833 14.7333 17.35 13.7333 17.35 12.3C17.35 10.8333 17.05 9.83333 16.45 9.3C15.85 8.76667 15.25 8.5 14.65 8.5H9.75V16.1ZM36.695 33.5V1.55H45.47V33.5H36.695ZM55.79 12.98C55.15 14.6333 54.83 16.3267 54.83 18.06C54.83 19.8733 55.1767 21.66 55.87 23.42C56.5633 25.1533 57.5367 26.7267 58.79 28.14C60.07 29.5267 61.5767 30.6467 63.31 31.5C65.07 32.3267 67.0033 32.74 69.11 32.74C70.7367 32.74 72.3767 32.4867 74.03 31.98C75.6833 31.4467 77.1633 30.6867 78.47 29.7C79.7767 28.7133 80.71 27.5267 81.27 26.14L74.91 22.34C74.59 23.1933 74.1233 23.8733 73.51 24.38C72.8967 24.8867 72.2167 25.26 71.47 25.5C70.7233 25.7133 69.99 25.82 69.27 25.82C67.91 25.82 66.7367 25.4733 65.75 24.78C64.79 24.06 64.0433 23.1267 63.51 21.98C63.0033 20.8333 62.75 19.6067 62.75 18.3C62.75 17.1 62.9767 15.94 63.43 14.82C63.8833 13.6733 64.5767 12.7267 65.51 11.98C66.47 11.2333 67.6967 10.86 69.19 10.86C69.91 10.86 70.6433 10.9667 71.39 11.18C72.1633 11.3667 72.87 11.7133 73.51 12.22C74.1767 12.7267 74.6833 13.4467 75.03 14.38L80.99 10.14C80.0033 8.27333 78.4967 6.78 76.47 5.66C74.4433 4.51333 72.07 3.94 69.35 3.94C67.0833 3.94 65.0433 4.35333 63.23 5.18C61.4433 5.98 59.9233 7.06 58.67 8.42C57.4167 9.78 56.4567 11.3 55.79 12.98ZM89.085 30.5V5.65H95.91V15.1L103.47 5.65H111.17L102.14 16.78L111.8 30.5H103.96L97.8 21.365L95.91 23.325V30.5H89.085ZM130.24 7.2H123.7L116.89 28.5H122.86L124.12 24.33H129.79L131.08 28.5H137.02L130.24 7.2ZM126.97 12.93L128.86 20.43H124.99L126.97 12.93ZM145.085 30.5V5.65H162.13V11.6H151.91V15.73H160.24V21.26H151.91V30.5H145.085ZM178.19 4.1H170.39V32.5H178.19V4.1ZM188.695 33.5V1.55H197.47V25.85H211.96V33.5H188.695ZM247.85 16.8V35.5H257.6V0H247L239.3 16.7L231.65 0H221V35.5H230.75V16.8L236.7 29.95H241.9L247.85 16.8Z"
					fill="black"
				/>
			</svg>
		</a>

		<nav class="navbar-menu">
			<ul class="navbar-menu__list">
				<li class="navbar-menu__item">
					<!-- нужно поставить класс active, если надо сделать сразу же активным 1 из элементов  -->
					<a href="main#films" class="navbar-menu__link active">Фильмы</a>
				</li>
				<li class="navbar-menu__item">
					<a href="main#series" class="navbar-menu__link">Сериалы</a>
				</li>
				<li class="navbar-menu__item">
					<a href="collection" class="navbar-menu__link">Ваша коллекция</a>
				</li>
				<span class="navbar-menu__line"></span>
			</ul>
		</nav>

		<!-- сюда navbar-user -->
        <?php
            if (!isset($_SESSION['user']))require_once "navbar-user-unregistered.php"; else require_once "navbar-user-registered.php";
        ?>
	</div>
</header>