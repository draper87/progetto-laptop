$(document).ready(function () {
    // Trasformo i gradi Celsius in Fahrenheit nella Show
    var temperaturaCelsius = $('.mid').text();
    var temperaturaFahrenheit = Math.ceil(temperaturaCelsius * (9/5) + 32 );
    $('.top').text(temperaturaFahrenheit);

    var pesoKg = $('.laptop-weight').text();
    console.log(pesoKg)
    var pesoLbs = pesoKg * 2.205;
    var pesoLbsCeil = pesoLbs.toFixed(2);
    console.log(pesoLbsCeil)
    $('.laptop-weight span').append('kg - '  + pesoLbsCeil + 'lbs');
})
