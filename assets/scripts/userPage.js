// -- modules --
// -- html elements --
const navbarMenuLine = document.querySelector(".navbar-menu__line")
const navbarMenuLinks = document.querySelectorAll(".navbar-menu__link")

// -- functions --
const navbarMenuLineAnimation = (e) => {
	// if (e === undefined) return
	const active = document.querySelector(".navbar-menu__link.active")
	if (active === null) return
	const activeWidth = active.offsetWidth
	const activeLeft = active.offsetLeft
	if (e !== null && e.type === "click" && /Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
		navbarMenuLine.style.transition = "all 0.3s ease 0s"
	}
	navbarMenuLine.style.width = `${activeWidth}px`
	navbarMenuLine.style.left = `${activeLeft}px`
	navbarMenuLine.style.opacity = 1
}

const navbarMenuHoverLineAnimation = (e) => {
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) return
	const { target, type } = e
	const targetWidth = target.offsetWidth
	const targetLeft = target.offsetLeft

	const active = document.querySelector(".navbar-menu__link.active")
	if (active === null) {
		if (type === "mouseover") {
			navbarMenuLine.style.width = `${targetWidth}px`
			navbarMenuLine.style.left = `${targetLeft}px`
			navbarMenuLine.style.background = "#a5a5a5"
			setTimeout(() => {
				navbarMenuLine.style.transition = "all 0.3s ease 0s"
				navbarMenuLine.style.opacity = 1
			}, 10)
		} else if (type === "mouseout") {
			navbarMenuLine.style.transition = "all 0s ease 0s"
			navbarMenuLine.style.opacity = 0
		}
	} else {
		const activeWidth = active.offsetWidth
		const activeLeft = active.offsetLeft
		navbarMenuLine.style.transition = "all 0.3s ease 0s"
		if (type === "mouseover") {
			navbarMenuLine.style.width = `${targetWidth}px`
			navbarMenuLine.style.left = `${targetLeft}px`
			navbarMenuLine.style.background = "#a5a5a5"
		} else if (type === "mouseout") {
			navbarMenuLine.style.width = `${activeWidth}px`
			navbarMenuLine.style.left = `${activeLeft}px`
			navbarMenuLine.style.background = "#7656d2"
		}
	}
}

// -- events --
window.addEventListener("load", navbarMenuLineAnimation)

navbarMenuLinks.forEach((link) => {
	link.addEventListener("mouseover", navbarMenuHoverLineAnimation)
	link.addEventListener("mouseout", navbarMenuHoverLineAnimation)
	link.addEventListener("click", (e) => {
		if (document.querySelector(".navbar-menu__link.active")) {
			document.querySelector(".navbar-menu__link.active").classList.remove("active")
		}
		e.target.classList.add("active")
		navbarMenuLine.style.background = "#7656d2"
		navbarMenuLineAnimation(e)
	})
})

window.addEventListener("resize", navbarMenuLineAnimation)


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
