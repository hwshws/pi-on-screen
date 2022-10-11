function easterEggBirthdays(){
    var today = new Date();
    var day = today.getDate();
    var month = today.getMonth()+1; //January is 0!

    shouldShow = true;
    names = ["Max Klein"];

    if(day === 30 && month === 3) {
        names.push("Maximilian Klein");
        shouldShow = true;
    }

    if(day === 10 && month === 5) {
        names.push("Heinz-Wilhelm Schäbe");
        shouldShow = true;
    }

    if (shouldShow) {
        var easterEgg = document.getElementById("extra_info");
        easterEgg.classList.add('rainbow-text');
        easterEgg.innerHTML = "🎂🥳🎉 Happy Birthday to: " + names.join(", ");
    }
    setInterval(easterEggBirthdays, 1000 * 60 * 60 * 12); // 12 hours
}
easterEggBirthdays();
