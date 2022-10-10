function refreshAnnouncements(){

    setTimeout(refreshAnnouncements, 1000 * 60 * 5); // 5 minutes
}


function refreshMenu(){

    setTimeout(refreshMenu, 1000 * 60 * 30); // 30 minutes
}


function refreshTrainTimetable(){

    setTimeout(refreshTrainTimetable, 1000 * 60); // 1 minute
}


function refreshWeather(){

    setTimeout(refreshWeather, 1000 * 60 * 30); // 30 minutes
}


function refreshNews(){

    setTimeout(refreshNews, 1000 * 60 * 30); // 30 minutes
}


function refreshQuote(){

    setTimeout(refreshQuote, 1000 * 60 * 60 * 6); // 3 hours
}


const secondHand = document.querySelector('.second-hand');
const minsHand = document.querySelector('.min-hand');
const hourHand = document.querySelector('.hour-hand');
function refreshClock() {
    const now = new Date();

    const seconds = now.getSeconds();
    const secondsDegrees = ((seconds / 60) * 360) + 90;
    secondHand.style.transform = `rotate(${secondsDegrees}deg)`;

    const mins = now.getMinutes();
    const minsDegrees = ((mins / 60) * 360) + ((seconds/60)*6) + 90;
    minsHand.style.transform = `rotate(${minsDegrees}deg)`;

    const hour = now.getHours();
    const hourDegrees = ((hour / 12) * 360) + ((mins/60)*30) + 90;
    hourHand.style.transform = `rotate(${hourDegrees}deg)`;

    //Set digital clock with id "clock_digital"
    var clock_digital = document.getElementById("clock_digital");
    clock_digital.innerHTML = now.getDay()+"."+now.getMonth()+"."+now.getFullYear()+" "+hour + ":" + mins + ":" + seconds;
    setTimeout(refreshClock, 1000);
}

function refreshPage(){
    window.location.reload();
}
setTimeout(refreshPage, 1000 * 60 * 60 * 6); // 6 hours


function refreshAll(){
    refreshAnnouncements();
    refreshMenu();
    refreshTrainTimetable();
    refreshWeather();
    refreshNews();
    refreshQuote();
    refreshClock();
}
refreshAll();
