$(document).ready(function () {
    // Trasformo i gradi Celsius in Fahrenheit nella Show
    var temperaturaCelsius = $('.mid').text();
    var temperaturaFahrenheit = Math.ceil(temperaturaCelsius * (9/5) + 32 );
    $('.top').text(temperaturaFahrenheit);
})
