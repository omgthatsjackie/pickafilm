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
