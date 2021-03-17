const searchInput = document.querySelector('.search-input')
const cards = document.querySelector('.cards')
const themeToggler = document.querySelector('.theme-toggler')
const navbarMenuLine = document.querySelector('.navbar-menu__line')
const navbarMenuLinks = document.querySelectorAll('.navbar-menu__link')
const menu = document.querySelector('.navbar-user__menu-wrapper')
const avatar = document.querySelector('.navbar-user__avatar')
const allCheckboxGenres = document.querySelectorAll('.checkbox-genres')
const dateNew = document.querySelector('#date_new')
const dateOld = document.querySelector('#date_old')
const filterToggler = document.querySelector('.filter-toggler')
const filterElement = document.querySelector('.filter')

const API_KEY = '705bee7729bfb3fdafc73440076a83fb'

const filter = {
  genres: [],
  date: {
    new: false,
    old: false
  }
}

const currentTheme = localStorage.getItem('theme')

if (currentTheme == 'dark') {
  document.body.classList.add('dark-theme')
}

const themeHandler = () => {
  document.body.classList.toggle('dark-theme')

  let theme = 'light'

  if (document.body.classList.contains('dark-theme')) {
    theme = 'dark'
  }

  localStorage.setItem('theme', theme)
}

allCheckboxGenres.forEach(checkbox => {
  const checkboxText = checkbox.querySelector('.checkbox-genres__title')

  filter.genres.push({
    name: checkboxText.textContent,
    id: +checkboxText.closest('.checkbox-genres').dataset.id,
    check: false
  })

  checkbox.addEventListener('click', () => {
    checkbox.classList.toggle('active')

    const idx = filter.genres.findIndex(
      genre => genre.name === checkboxText.textContent
    )

    if (checkbox.classList.contains('active')) {
      filter.genres[idx].check = true
    } else {
      filter.genres[idx].check = false
    }
  })
})

dateNew.addEventListener('click', () => {
  dateNew.classList.toggle('active')
  dateOld.classList.remove('active')
  filter.date.new = true
  filter.date.old = false
})

dateOld.addEventListener('click', () => {
  dateOld.classList.toggle('active')
  dateNew.classList.remove('active')
  filter.date.old = true
  filter.date.new = false
})

const getCertifications = async (type, id) => {
  if (type === 'movie') {
    const response = await fetch(
      `https://api.themoviedb.org/3/${type}/${id}/release_dates?api_key=${API_KEY}`,
      {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        }
      }
    )

    const certifications = await response.json()

    const cert = certifications.results.find(cert => cert.iso_3166_1 === 'RU')

    return cert?.release_dates[0].certification || '?'
  } else {
    const response = await fetch(
      `https://api.themoviedb.org/3/${type}/${id}/content_ratings?api_key=${API_KEY}`,
      {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        }
      }
    )

    const certifications = await response.json()

    const cert = certifications.results.find(cert => cert.iso_3166_1 === 'RU')

    return cert?.rating || '?'
  }
}

const getGenres = (ids, allGenres) => {
  const string = ids.map(id => {
    const result = allGenres.genres.find(genre => genre.id === id)

    if (result) {
      return result.name
    }
  })

  return string.join(', ')
}

const getAllGenres = async type => {
  const response = await fetch(
    `https://api.themoviedb.org/3/genre/${type}/list?api_key=${API_KEY}&language=ru`,
    {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json;charset=utf-8'
      }
    }
  )

  return await response.json()
}

const renderPopular = async (type, title, release) => {
  const response = await fetch(
    `https://api.themoviedb.org/3/${type}/popular?api_key=${API_KEY}&language=ru-RU`,
    {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json;charset=utf-8'
      }
    }
  )

  const popular = await response.json()

  const allGenres = await getAllGenres(type)

  const html = await Promise.all(
    popular.results.map(async result => {
      return `
      <a href="filmPage?id=${result.id}&type=${type}" class="card" data-id="${result.id}">
        <div class="poster">
          ${
            result.poster_path
              ? `<img loading="lazy" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2/${result.poster_path}" alt="Film poster">`
              : '<img loading="lazy" src="../images/no_picture.png" alt="Film poster">'
          }
        </div>
        <div class="info">
          <h3 class="title">${result[title] ? result[title] : 'Неизвестно'}</h3>
          <div class="film-labels">
            <div class="certification item">${await getCertifications(
              type,
              result.id
            )}</div>
            <div class="release-year item">${
              result[release] ? result[release].slice(0, 4) : 'Неизвестно'
            }</div>
            <div class="genres item">${getGenres(
              result.genre_ids,
              allGenres
            )}</div>
          </div>
          <div class="rating">${
            result.vote_average.toString().length === 1
              ? result.vote_average + '.0'
              : result.vote_average
          }</div>
        </div>
      </a>
    `
    })
  )

  cards.innerHTML = html.join('')
}

const renderCards = async (type, title, release, query) => {
  const allGenres = await getAllGenres(type)

  const response = await fetch(
    `https://api.themoviedb.org/3/search/${type}?api_key=${API_KEY}&language=ru-RU&query=${query}`,
    {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json;charset=utf-8'
      }
    }
  )

  const data = await response.json()

  const checkedGenresIds = filter.genres
    .filter(genre => genre.check)
    .map(genre => genre.id)

  if (checkedGenresIds.length) {
    data.results = data.results.filter(res => {
      const satisfied = true

      for (const id of checkedGenresIds) {
        if (!res.genre_ids.includes(id)) {
          return !satisfied
        }
      }

      return satisfied
    })
  }

  const html = await Promise.all(
    data.results.map(async result => {
      return `
      <a href="#" class="card" data-id="${result.id}">
        <div class="poster">
          ${
            result.poster_path
              ? `<img loading="lazy" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2/${result.poster_path}" alt="Film poster">`
              : '<img loading="lazy" src="../images/no_picture.png" alt="Film poster">'
          }
        </div>
        <div class="info">
          <h3 class="title">${result[title] ? result[title] : 'Неизвестно'}</h3>
          <div class="film-labels">
            <div class="certification item">${await getCertifications(
              type,
              result.id
            )}</div>
            <div class="release-year item">${
              result[release] ? result[release].slice(0, 4) : 'Неизвестно'
            }</div>
            <div class="genres item">${getGenres(
              result.genre_ids,
              allGenres
            )}</div>
          </div>
          <div class="rating">${
            result.vote_average.toString().length === 1
              ? result.vote_average + '.0'
              : result.vote_average
          }</div>
        </div>
      </a>
    `
    })
  )

  cards.innerHTML = html.join('')
}

const inputHandler = () => {
  const value = searchInput.value

  if (value && searchInput.placeholder.includes('фильма')) {
    renderCards('movie', 'title', 'release_date', value)
  } else if (value && searchInput.placeholder.includes('сериала')) {
    renderCards('tv', 'name', 'first_air_date', value)
  } else if (searchInput.placeholder.includes('фильма')) {
    renderPopular('movie', 'title', 'release_date')
  } else if (searchInput.placeholder.includes('сериала')) {
    renderPopular('tv', 'name', 'first_air_date')
  }
}

const linkHandler = event => {
  if (!event.target.classList.contains('active')) {
    document
      .querySelector('.navbar-menu__link.active')
      .classList.remove('active')
    event.target.classList.add('active')

    navbarMenuLineAnimation(event)

    switch (event.target.textContent) {
      case 'Фильмы':
        searchInput.placeholder = 'Введите название фильма'
        renderPopular('movie', 'title', 'release_date')
        break
      case 'Сериалы':
        searchInput.placeholder = 'Введите название сериала'
        renderPopular('tv', 'name', 'first_air_date')
        break
    }
  }
}

const navbarMenuLineAnimation = event => {
  const active = document.querySelector('.navbar-menu__link.active')
  const activeWidth = active.offsetWidth
  const activeLeft = active.offsetLeft

  if (event.type === 'click') {
    navbarMenuLine.style.transition = '.3s'
  }

  navbarMenuLine.style.width = `${activeWidth}px`
  navbarMenuLine.style.left = `${activeLeft}px`
  navbarMenuLine.style.opacity = 1
}

const bodyHandler = event => {
  if (event.target.closest('.navbar-user__avatar')) {
    menu.classList.toggle('active')
  } else if (event.target.closest('.filter-toggler')) {
    document.body.classList.toggle('active-filter')
    document.querySelector('.filter__background').classList.toggle('active')
    filterElement.classList.toggle('active')
  } else if (
    !event.target.closest('.filter') &&
    filterElement.classList.contains('active')
  ) {
    document.body.classList.toggle('active-filter')
    document.querySelector('.filter__background').classList.remove('active')
    filterElement.classList.remove('active')
  } else {
    menu.classList.remove('active')
  }
}

document.addEventListener('DOMContentLoaded', event => {
  if (searchInput.placeholder.includes('фильма')) {
    renderPopular('movie', 'title', 'release_date')
  } else {
    renderPopular('tv', 'name', 'first_air_date')
  }

  navbarMenuLineAnimation(event)
})

navbarMenuLinks.forEach(link => {
  link.addEventListener('click', linkHandler)
})

searchInput.addEventListener('input', inputHandler)

themeToggler.addEventListener('click', themeHandler)

document.body.addEventListener('click', bodyHandler)

window.addEventListener('resize', event => {
  navbarMenuLineAnimation(event)
})
