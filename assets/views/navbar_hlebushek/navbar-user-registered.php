<div class="navbar-user">
  <div class="navbar-user__avatar">
    <img src="<?php echo $_SESSION['user']['avatar']; ?>" alt="avatar image" />
  </div>
  <div class="navbar-user__menu-wrapper">
    <div class="navbar-user__menu">
      <svg class="navbar-user__triangle" width="31" height="27" viewBox="0 0 31 27" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="31" height="27">
          <rect width="31" height="27" fill="#C4C4C4" />
        </mask>
        <g mask="url(#mask0)">
          <path
            d="M1.25868 23.9396L-4.24142 32.4396C-5.24142 34.2729 -6.04142 38.2396 -1.24142 39.4396H31.2587C36.4587 38.6396 35.7587 34.4396 34.7587 32.4396L30 23.9396L19 6.31456C15.5 0.814524 15.5 0.314697 12 6.31456L1.25868 23.9396Z"
            fill="#F5F5F5"
            stroke="#E3E3E3"
            stroke-width="2"
          />
          <rect x="-5" y="25" width="42" height="18" fill="#F5F5F5" />
        </g>
      </svg>
      <div class="navbar-user__link-list">
        <a href="main" class="navbar-user__link navbar-user__menu-link">Фильмы</a>
        <a href="main" class="navbar-user__link navbar-user__menu-link">Сериалы</a>
        <a href="collection" class="navbar-user__link navbar-user__menu-link">Ваша коллекция</a>
        <a href="profile" class="navbar-user__link">Ваш профиль</a>
        <a href="logout" class="navbar-user__link">Выйти из профиля</a>
      </div>
    </div>
  </div>
</div>