const themeToggler = document.querySelector(".theme-toggler");
const searchInput = document.querySelector(".search-input");
const navbarMenuLine = document.querySelector(".navbar-menu__line");
const menu = document.querySelector(".navbar-user__menu-wrapper");
const navbarMenuLinks = document.querySelectorAll(".navbar-menu__link");

const currentTheme = localStorage.getItem("theme");

if (currentTheme == "dark") {
  document.body.classList.add("dark-theme");
}

const themeHandler = () => {
  document.body.classList.toggle("dark-theme");

  let theme = "light";

  if (document.body.classList.contains("dark-theme")) {
    theme = "dark";
  }

  localStorage.setItem("theme", theme);
};

const linkHandler = event => {
  if (!event.target.classList.contains("active")) {
    document
      .querySelector(".navbar-menu__link.active")
      .classList.remove("active");
    event.target.classList.add("active");

    navbarMenuLineAnimation(event);

    // switch (event.target.textContent) {
    //   case "Фильмы":
    //     searchInput.placeholder = "Введите название фильма";
    //     renderPopular("movie", "title", "release_date");
    //     break;
    //   case "Сериалы":
    //     searchInput.placeholder = "Введите название сериала";
    //     renderPopular("tv", "name", "first_air_date");
    //     break;
    // }
  }
};

const navbarMenuLineAnimation = event => {
  const active = document.querySelector(".navbar-menu__link.active");
  const activeWidth = active.offsetWidth;
  const activeLeft = active.offsetLeft;

  if (event.type === "click") {
    navbarMenuLine.style.transition = ".3s";
  }

  navbarMenuLine.style.width = `${activeWidth}px`;
  navbarMenuLine.style.left = `${activeLeft}px`;
  navbarMenuLine.style.opacity = 1;
};

const bodyHandler = event => {
  if (event.target.closest(".navbar-user__avatar")) {
    menu.classList.toggle("active");
  } else {
    menu.classList.remove("active");
  }
};

navbarMenuLinks.forEach(link => {
  link.addEventListener("click", linkHandler);
});

document.body.addEventListener("click", bodyHandler);

window.addEventListener("resize", event => {
  navbarMenuLineAnimation(event);
});

document.addEventListener("DOMContentLoaded", event => {
  navbarMenuLineAnimation(event);
});

themeToggler.addEventListener("click", themeHandler);
