function refreshAnnouncements(){

    setTimeout(refreshAnnouncements, 1000 * 60 * 5); // 5 minutes
}


function refreshMensa(){

    setTimeout(refreshMensa, 1000 * 60 * 30); // 30 minutes
}


function refreshTrains(){

    setTimeout(refreshTrains, 1000 * 60); // 1 minute
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


function refreshClock() {
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
