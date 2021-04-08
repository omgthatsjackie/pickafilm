// -- modules --
// -- html items --
const deleteCard = document.querySelector(".stats__card.card-action")
const deletePopup = document.querySelector(".delete-popup")
const deletePopupBg = document.querySelector(".delete-popup__bg")
const deletePopupClose = document.querySelector(".delete-popup__close")
const deletePopupBlock = document.querySelector(".delete-popup__block")
const deletePopupNotify = document.querySelector(".delete-popup__notify")
const deletePopupBtn = document.querySelector(".delete-popup__button")
const deletePopupLoader = document.querySelector(".delete-popup__loader")
const deletePopupTransitionCircle = document.querySelector(".delete-popup__transition-circle")
const deletePopupSuccess = document.querySelector(".delete-popup__success")
const deletePopupError = document.querySelector(".delete-popup__error")

// -- other --
// == [ALEX] ==
// url куда ссылаться
const deleteUrl = "core/scripts/deleteUser"

// -- funcs --
const deletePopupAppearanceOn = () => {
  deletePopup.classList.add("active")
  deletePopupBlock.classList.add("active")
  document.body.classList.add("deletePopupActive")
}

const deletePopupAppearanceOff = () => {
  deletePopupError.style.clipPath = "circle(0 at 50% 50%)"
  deletePopupSuccess.style.clipPath = "circle(0at 50% 50%)"
  deletePopupTransitionCircle.style.width = "0"
  deletePopupTransitionCircle.style.height = "0"
  deletePopupNotify.classList.remove("delete-active")
  deletePopupLoader.classList.remove("active")
  deletePopup.classList.remove("active")
  deletePopupBlock.classList.remove("active")
  document.body.classList.remove("deletePopupActive")
}

const deletePopupFetchResAnimation = (type) => {
  const tlPromise = new Promise((res, rej) => {
    deletePopupTransitionCircle.style.width = "1000px"
    deletePopupTransitionCircle.style.height = "1000px"
    setTimeout(() => {
      res()
    }, 400)
  })
  if (type === "success") {
    tlPromise.then(() => {
      deletePopupSuccess.style.clipPath = "circle(500px at 50% 50%)"
    })
  } else {
    tlPromise
      .then(() => {
        deletePopupError.style.clipPath = "circle(500px at 50% 50%)"
        setTimeout(() => {}, 800)
      })
      .then(() => {
        deletePopupBg.classList.remove("blocked")
      })
  }
}

const themeToggler = document.querySelector(".theme-toggler");
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

const deleteFetch = async () => {
  deletePopupNotify.classList.add("delete-active")
  deletePopupLoader.classList.add("active")
  deletePopupBg.classList.add("blocked")
  // == [ALEX] ==
  // фетч
  return fetch(deleteUrl, {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      window.location.reload()
      console.log(data.ok)
      if (data.ok === true) {
        deletePopupFetchResAnimation("success")
      } else {
        window.location.reload()
        deletePopupFetchResAnimation("error")
        console.error("server error!")
      }
    })
    .catch(() => {
      window.location.reload()
      console.error("local error!")
      deletePopupFetchResAnimation("error")
    })
}

// -- events --
deleteCard.addEventListener("click", deletePopupAppearanceOn)
deletePopupBg.addEventListener("click", deletePopupAppearanceOff)
deletePopupClose.addEventListener("click", deletePopupAppearanceOff)
deletePopupBtn.addEventListener("click", deleteFetch)

//# sourceMappingURL=userPage.js.map
