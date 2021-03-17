// -- html elements --
const navbarMenuLine = document.querySelector(".navbar-menu__line")
const navbarMenuLinks = document.querySelectorAll(".navbar-menu__link")
const navbarBurger = document.querySelector(".navbar-user__burger")
const navbarBurgerBg = document.querySelector(".burger-menu__bg")
const navbarBurgerList = document.querySelector(".burger-menu__list")
const navbarBurgerMenu = document.querySelector(".burger-menu")

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

navbarBurger.addEventListener("click", () => {
	document.body.classList.add("burger-menu-active")
	navbarBurgerMenu.classList.add("active")
})

navbarBurgerBg.addEventListener("click", () => {
	document.body.classList.remove("burger-menu-active")
	navbarBurgerMenu.classList.remove("active")
})

navbarBurgerList.addEventListener("click", (e) => {
	if (e.target.classList.contains("burger-menu__list")) {
		document.body.classList.remove("burger-menu-active")
		navbarBurgerMenu.classList.remove("active")
	}
})

//# sourceMappingURL=test.js.map
