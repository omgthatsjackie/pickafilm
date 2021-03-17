<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pickafilm</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="assets/styles/main.css">

</head>
  <body>
    <div class="section-outer">
      <div class="container">
        <?php if(!isset($_SESSION['user'])){
            require_once "assets/views/navbar_omgthatsjackie/navbar-unlogged.php";
        } else {
          require_once "assets/views/navbar_omgthatsjackie/navbar.php";
        }
        ?>
        <div class="content">
          <div class="search">
            <input class="search-input" type="text" placeholder="Введите название фильма">
            <div class="filter-toggler">
              <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.4893 8.98821C24.5612 8.99082 23.6567 9.28129 22.8998 9.81979C22.1428 10.3583 21.5704 11.1185 21.261 11.9961H1.49937C1.10171 11.9961 0.720341 12.1545 0.439155 12.4366C0.157969 12.7186 0 13.1011 0 13.5C0 13.8989 0.157969 14.2814 0.439155 14.5634C0.720341 14.8455 1.10171 15.0039 1.49937 15.0039H21.261C21.5361 15.7843 22.0199 16.4737 22.6594 16.9968C23.299 17.5198 24.0696 17.8563 24.8871 17.9694C25.7045 18.0826 26.5372 17.968 27.2941 17.6382C28.0509 17.3084 28.7028 16.7762 29.1782 16.0997C29.6537 15.4232 29.9345 14.6286 29.9899 13.8027C30.0452 12.9769 29.8731 12.1517 29.4922 11.4175C29.1113 10.6832 28.5364 10.0682 27.8304 9.63975C27.1244 9.21129 26.3144 8.98588 25.4893 8.98821V8.98821ZM25.4893 15.0039C25.1927 15.0039 24.9028 14.9157 24.6563 14.7505C24.4097 14.5852 24.2175 14.3503 24.104 14.0755C23.9905 13.8007 23.9609 13.4983 24.0187 13.2066C24.0766 12.9149 24.2194 12.6469 24.429 12.4366C24.6387 12.2262 24.9059 12.083 25.1967 12.025C25.4876 11.9669 25.7891 11.9967 26.063 12.1105C26.337 12.2244 26.5712 12.4171 26.7359 12.6645C26.9007 12.9118 26.9886 13.2026 26.9886 13.5C26.9886 13.8989 26.8307 14.2814 26.5495 14.5634C26.2683 14.8455 25.8869 15.0039 25.4893 15.0039ZM1.49937 5.98035H3.26862C3.5838 6.85135 4.15869 7.6039 4.91518 8.13572C5.67166 8.66753 6.57305 8.95283 7.49684 8.95283C8.42063 8.95283 9.32202 8.66753 10.0785 8.13572C10.835 7.6039 11.4099 6.85135 11.7251 5.98035H28.488C28.8857 5.98035 29.267 5.8219 29.5482 5.53985C29.8294 5.25781 29.9874 4.87528 29.9874 4.47641C29.9874 4.07755 29.8294 3.69502 29.5482 3.41298C29.267 3.13093 28.8857 2.97248 28.488 2.97248H11.7251C11.4099 2.10148 10.835 1.34893 10.0785 0.817113C9.32202 0.285295 8.42063 0 7.49684 0C6.57305 0 5.67166 0.285295 4.91518 0.817113C4.15869 1.34893 3.5838 2.10148 3.26862 2.97248H1.49937C1.10171 2.97248 0.720341 3.13093 0.439155 3.41298C0.157969 3.69502 0 4.07755 0 4.47641C0 4.87528 0.157969 5.25781 0.439155 5.53985C0.720341 5.8219 1.10171 5.98035 1.49937 5.98035V5.98035ZM7.49684 2.97248C7.79339 2.97248 8.08328 3.06069 8.32985 3.22594C8.57642 3.3912 8.76859 3.62608 8.88208 3.90089C8.99556 4.17569 9.02525 4.47808 8.9674 4.76982C8.90955 5.06155 8.76675 5.32953 8.55706 5.53985C8.34737 5.75018 8.0802 5.89342 7.78935 5.95145C7.49851 6.00948 7.19703 5.97969 6.92306 5.86587C6.64909 5.75204 6.41492 5.55927 6.25016 5.31195C6.08541 5.06463 5.99747 4.77386 5.99747 4.47641C5.99747 4.07755 6.15544 3.69502 6.43663 3.41298C6.71781 3.13093 7.09918 2.97248 7.49684 2.97248V2.97248ZM28.488 21.0197H17.7225C17.4074 20.1486 16.8325 19.3961 16.076 18.8643C15.3195 18.3325 14.4181 18.0472 13.4943 18.0472C12.5705 18.0472 11.6691 18.3325 10.9127 18.8643C10.1562 19.3961 9.58127 20.1486 9.2661 21.0197H1.49937C1.10171 21.0197 0.720341 21.1781 0.439155 21.4601C0.157969 21.7422 0 22.1247 0 22.5236C0 22.9225 0.157969 23.305 0.439155 23.587C0.720341 23.8691 1.10171 24.0275 1.49937 24.0275H9.2661C9.58127 24.8985 10.1562 25.6511 10.9127 26.1829C11.6691 26.7147 12.5705 27 13.4943 27C14.4181 27 15.3195 26.7147 16.076 26.1829C16.8325 25.6511 17.4074 24.8985 17.7225 24.0275H28.488C28.8857 24.0275 29.267 23.8691 29.5482 23.587C29.8294 23.305 29.9874 22.9225 29.9874 22.5236C29.9874 22.1247 29.8294 21.7422 29.5482 21.4601C29.267 21.1781 28.8857 21.0197 28.488 21.0197ZM13.4943 24.0275C13.1978 24.0275 12.9079 23.9393 12.6613 23.7741C12.4147 23.6088 12.2226 23.3739 12.1091 23.0991C11.9956 22.8243 11.9659 22.5219 12.0238 22.2302C12.0816 21.9384 12.2244 21.6705 12.4341 21.4601C12.6438 21.2498 12.911 21.1066 13.2018 21.0486C13.4927 20.9905 13.7941 21.0203 14.0681 21.1341C14.3421 21.248 14.5762 21.4407 14.741 21.688C14.9057 21.9354 14.9937 22.2261 14.9937 22.5236C14.9937 22.9225 14.8357 23.305 14.5545 23.587C14.2733 23.8691 13.892 24.0275 13.4943 24.0275Z" fill="#7656D2"/>
              </svg>
            </div>
            <div class="filter">
                <div class="filter__list">
                  <div class="filter__group">
                    <p class="filter__title">Жанры</p>
                    <span class="filter__line"></span>
                    <div class="filter__checkboxes">
                      <div class="filter__checkboxes-column">
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="12">
                            <p class="checkbox-genres__title">Приключения</p>
                            <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                            </svg>
                          </div>	
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="16">
                        <p class="checkbox-genres__title">Мультфильм</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="35">
                        <p class="checkbox-genres__title">Комедия</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="14">
                        <p class="checkbox-genres__title">Фэнтези</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>	
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="80">
                        <p class="checkbox-genres__title">Криминал</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                      </div>
                      <div class="filter__checkboxes-column">
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="36">
                        <p class="checkbox-genres__title">История</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>	
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="37">
                        <p class="checkbox-genres__title">Вестерн</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="99">
                        <p class="checkbox-genres__title">Документальный</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="10751">
                        <p class="checkbox-genres__title">Семейный</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>	
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="27">
                        <p class="checkbox-genres__title">Ужасы</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                      </div>
                      <div class="filter__checkboxes-column">
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="9648">
                        <p class="checkbox-genres__title">Детектив</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>	
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="10402">
                        <p class="checkbox-genres__title">Музыка</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="10752">
                        <p class="checkbox-genres__title">Военный</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="878">
                        <p class="checkbox-genres__title">Фантастика</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>	
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="10749">
                        <p class="checkbox-genres__title">Мелодрама</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                      </div>
                      <div class="filter__checkboxes-column">
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="10770">
                        <p class="checkbox-genres__title">Телевизионный фильм</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>	
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="28">
                        <p class="checkbox-genres__title">Боевик</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="53">
                        <p class="checkbox-genres__title">Триллер</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                        <div class="filter__checkbox-wrapper">
                          <div class="filter__checkbox checkbox-genres" data-id="18">
                        <p class="checkbox-genres__title">Драма</p>
                        <svg class="checkbox-genres__check" xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2443 0.74811C13.6617 1.10982 13.7068 1.74138 13.3451 2.15873L6.2733 10.3185C5.89322 10.757 5.22087 10.781 4.8105 10.3706L0.707107 6.26724C0.316582 5.87672 0.316582 5.24355 0.707106 4.85303L0.94794 4.61219C1.33846 4.22167 1.97163 4.22167 2.36215 4.6122L4.68807 6.93811C5.09843 7.34848 5.77078 7.32449 6.15087 6.88593L11.5763 0.625807C11.938 0.208451 12.5696 0.16334 12.9869 0.525048L13.2443 0.74811Z" fill="white"/>
                        </svg>
                      </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="filter__group">
                    <p class="filter__title">Дата выпуска</p>
                    <span class="filter__line"></span>
                    <div class="filter__date-list date-list">
                      <a class="date-list__button" id="date_new">Сначала новые 🠕</a>
                      <a class="date-list__button" id="date_old">Сначала старые 🠗 </a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="cards"></div>
        </div>
      </div>
    
      <div class="theme-toggler">
        <svg width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3.91471 26.0582L6.742 23.2662L8.91684 25.4139L6.08955 28.2058L3.91471 26.0582ZM15.4414 32V27.4899H18.5586V32H15.4414ZM4.63966 13.745V16.8233H0V13.745H4.63966ZM21.6759 7.3736C23.0775 8.18494 24.2011 9.28263 25.0469 10.6667C25.8927 12.0507 26.3156 13.5779 26.3156 15.2483C26.3156 17.7778 25.4094 19.9374 23.597 21.7271C21.7846 23.5168 19.5977 24.4116 17.0362 24.4116C14.4748 24.4116 12.2878 23.5168 10.4755 21.7271C8.66311 19.9374 7.75693 17.7778 7.75693 15.2483C7.75693 13.5779 8.16773 12.0507 8.98934 10.6667C9.81095 9.28263 10.9467 8.18494 12.3966 7.3736V0H21.6759V7.3736ZM29.3603 13.745H34V16.8233H29.3603V13.745ZM25.0832 25.4139L27.258 23.3378L30.0853 26.0582L27.9104 28.2058L25.0832 25.4139Z" fill="#807F7F"/>
        </svg>
      </div>
    </div>

    <div class="filter__background"></div>

    <script src="assets/scripts/main.js"></script>
  </body>
</html>
