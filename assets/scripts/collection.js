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

// const linkHandler = (event) => {
//   if (!event.target.classList.contains("active")) {
//     document
//       .querySelector(".navbar-menu__link.active")
//       .classList.remove("active");
//     event.target.classList.add("active");

//     navbarMenuLineAnimation(event);
//   }
// };

const navbarMenuLineAnimation = (event) => {
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

const bodyHandler = (event) => {
  if (event.target.closest(".navbar-user__avatar")) {
    menu.classList.toggle("active");
  } else {
    menu.classList.remove("active");
  }
};

// navbarMenuLinks.forEach((link) => {
//   link.addEventListener("click", linkHandler);
// });

document.body.addEventListener("click", bodyHandler);

window.addEventListener("resize", (event) => {
  navbarMenuLineAnimation(event);
});

document.addEventListener("DOMContentLoaded", (event) => {
  document
    .querySelector(".navbar-menu__link.active")
    .classList.remove("active");
  document
    .querySelector(".navbar-menu__link[href='collection']")
    .classList.add("active");
  navbarMenuLineAnimation(event);
});

themeToggler.addEventListener("click", themeHandler);

(function(url) {
  // Create a new `Image` instance
  const image = new Image();

  image.onload = function() {
    // Inside here we already have the dimensions of the loaded image
    const style = [
      // Hacky way of forcing image's viewport using `font-size` and `line-height`
      'font-size: 1px;',

      // Hacky way of forcing a middle/center anchor point for the image
      'padding: ' + this.height * .5 + 'px ' + this.width * .5 + 'px;',

      // Set image dimensions
      'background-size: ' + this.width + 'px ' + this.height + 'px;',

      // Set image URL
      'background: url('+ url +') no-repeat;'
     ].join(' ');

     // notice the space after %c
     console.log('%c ', style);
  };

  // Actually loads the image
  image.src = url;
})('https://i.kym-cdn.com/photos/images/original/001/809/460/421.gif');