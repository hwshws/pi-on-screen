function refreshAnnouncements(){

}

function refreshMenu(){

}

function refreshTrainTimetable(){

}

function refreshWeather(){

}

function refreshNews(){

}

function refreshQuote(){

}

function refreshClock(){
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
        h + ":" + m + ":" + s;
    var t = setTimeout(startClock, 500);
}
