//------------Weather---------//

var search = document.querySelector('.search')
var city = document.querySelector('.city')
var country = document.querySelector('.country')
var datetime = document.querySelector('.datetime')
var value = document.querySelector('.value')
var short_desc = document.querySelector('.short-desc')
var desc = document.querySelector('.desc')
var visibility = document.querySelector('.visibility span')
var wind = document.querySelector('.wind span')
var sun = document.querySelector('.sun span')
var content = document.querySelector('.content')
var modalWeather = document.querySelector('.modal-weather')

async function changeWeatherUI(){
    capitalSearch = search.value.trim()
    let apiURL = `https://api.openweathermap.org/data/2.5/weather?q=${capitalSearch}&appid=aa58d5ec3cf60ca40fb97cf3b8659faa` 

    let data = await fetch(apiURL).then(res => res.json())
    console.log(data)
    if(data.cod == 200){
        content.classList.remove('hide')
        city.innerText = data.name
        country.innerText = data.sys.country
        visibility.innerText = data.visibility + '(m)'
        wind.innerText = data.wind.speed + '(m/s)'
        sun.innerText = data.main.humidity + '(%)'
        let temp = Math.round(data.main.temp - 273.15)
        value.innerText = temp
        short_desc.innerText = data.weather[0].main
        desc.innerText = data.weather[0] ? data.weather[0].description : ''
        let time = new Date()
        datetime.innerText = time
        if(6 <= time.getHours() && time.getHours() >= 18){
            modalWeather.classList.add('night')
        }else{
            modalWeather.classList.remove('night')
        }
    }else{
        content.classList.add('hide')
    }

}

search.addEventListener('keypress', function(e){
    if(e.key === 'Enter'){
        changeWeatherUI();
    }
})
