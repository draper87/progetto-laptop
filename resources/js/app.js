// require('./bootstrap');
const Handlebars = require("handlebars");


$(document).ready(function () {

    // chiamata Ajax quando premo il tasto Search
    $('#bottone').click(function () {
        chiamaLaptops();
        // eseguo scroll "ritardato", in modo che risulti piu fluido
        setTimeout(function () {
            $('html, body').animate({
                scrollTop: $("#show").offset().top
            }, 1000);
        }, 500);

    })

    // bottone form reset
    $('#reset').click(function () {
        event.preventDefault();
        $('#rambettercheckbox').lcs_on();
        $('#videocardbettercheckbox').lcs_on();
        $('#cpubettercheckbox').lcs_on();
        $('#chassisbettercheckbox').lcs_on();
        $('.js-basic-single-videocard').val(null).trigger('change');
        $('.js-basic-single-cpu').val(null).trigger('change');
        $('.js-basic-multiple-ram').val(null).trigger('change');
        $('.js-basic-single-chassis').val(null).trigger('change');
        sliderDisplay.noUiSlider.reset();
        sliderWeight.noUiSlider.reset();
        sliderPrice.noUiSlider.reset();
        laptopTemperature = null;
    })

    // bottone more filters
    $('#moreFilters').click(function () {
        event.preventDefault();
        $('#filters').toggle();
    })

    // metto in una variabile il valore scelto dall utente della select "video_card"
    var videocard;
    $("#videocard").change(function () {
        videocard = $('#videocard').val();
    })

    // metto in una variabile il valore scelto dall utente della select "cpu"
    var cpu;
    $("#cpu").change(function () {
        cpu = $('#cpu').val();
    })

    // metto in una variabile il valore scelto dall utente della select "ram"
    var ram;
    $("#ram_memory").change(function () {
        ram = $('#ram_memory').val();
    })

    // metto in una variabile il valore scelto dall utente della select "material"
    var laptopMaterial;
    $("#chassis").change(function () {
        laptopMaterial = $('#chassis').val();
    })


    // metto in una variabile il valore scelto dall utente dello slider laptop Noise
    var laptopNoise;
    $('#laptopNoise').find('input[type="range"]').change(function () {
        laptopNoise = $('#laptopNoise').find('input[type="range"]').val();
        console.log(laptopNoise);
    })

    // metto in una variabile il valore scelto dall utente dello slider laptop Temperature
    var laptopTemperature;
    $('#laptopTemperature').find('input[type="range"]').change(function () {
        laptopTemperature = $('#laptopTemperature').find('input[type="range"]').val();
        var laptopTemperatureFahrenheit = Math.ceil(laptopTemperature * (9/5) + 32 );
        $('#fahrenheit').text(laptopTemperatureFahrenheit + '°F');
        console.log(laptopTemperature);
    })


    // funzione che fa chiamata Ajax all mia API su laravel
    function chiamaLaptops(page) {

        $.ajax({
            url: '/api/laptops',
            method: 'GET',
            data: {
                video_card: videocard,
                cpu: cpu,
                ram: ram,
                ramchecked: ramchecked,
                laptopMaterial: laptopMaterial,
                coresChecked: coresChecked,
                videocardChecked: videocardChecked,
                chassisChecked: chassisChecked,
                display: sliderDisplay.noUiSlider.get(),
                price: sliderPrice.noUiSlider.get(),
                mySliderWeight: sliderWeight.noUiSlider.get(),
                laptopTemperature: laptopTemperature,
                page: page,
            },
            success: function (dataResponse) {
                // sessionStorage.setItem('url', this.url);
                numeroPagina(dataResponse["current_page"], dataResponse["last_page"]);
                stampaLaptops(dataResponse);
            },
            error: function () {
                alert('il server non funziona');
            }
        })
    }


    // funzione che usa handlebars per stampare i risultati ottenuti dalla chiamata Ajax
    function stampaLaptops(dataResponse) {
        $('.lista').html('');
        const source = $('#entry-template').html(); // questo e il path al nostro template html
        const template = Handlebars.compile(source); // passiamo a Handlebars il percorso del template html

        for (var i = 0; i < dataResponse.data.length; i++) {
            var context = dataResponse.data[i];
            // se non è disponibile un immagine per il laptop viene caricata quella di default
            if (context['image_path'] === null) {
                context['image_path'] = "images/laptop.jpg";
            }
            var html = template(context);
            $('.lista').append(html);
        }
        stampaPagination(dataResponse['total'], dataResponse['current_page'], dataResponse['last_page']);
    }

    // logica per la numerazione delle pagine
    // dichiaro le mie variabili globali
    var currentPage;
    var lastPage;
    var paginaSuccessiva;
    var paginaIndietro;

    // scrivo la logica per la numerazione delle pagine
    function numeroPagina(pagina, ultimaPagina) {
        currentPage = pagina;
        lastPage = ultimaPagina;
        if (currentPage < lastPage && currentPage !== 1) {
            paginaSuccessiva = pagina + 1;
            paginaIndietro = pagina - 1;
        } else if (currentPage === 1 && currentPage !== lastPage) {
            paginaSuccessiva = pagina + 1;
        } else {
            paginaIndietro = pagina - 1;
        }

    }

    // aggiungo un event listener per il bottone next
    $(document).on('click', '.next', function () {
        if (currentPage !== lastPage) {
            chiamaLaptops(paginaSuccessiva);
            setTimeout(function () {
                $('html, body').animate({
                    scrollTop: $("#show").offset().top
                }, 1000);
            }, 500);
        }
    });
    // aggiungo un event listener per il bottone previous
    $(document).on('click', '.previous', function () {
        if (currentPage !== 1) {
            chiamaLaptops(paginaIndietro);
            setTimeout(function () {
                $('html, body').animate({
                    scrollTop: $("#show").offset().top
                }, 1000);
            }, 500);
        }

    });

    // stampo a schermo i bottoni della pagination
    function stampaPagination(total, current, last) {
        $('#pagina').html('');
        var html = "<p>Found " + total + " results. Page " + current + " of " + last + "</p><ul class=\"pagination \"><li class=\"page-item\"><a class=\"page-link previous\">Previous</a></li>" + " <li class=\"page-item\"><a class=\"page-link next\" >Next</a></li></ul>";
        $('#pagina').append(html);
    }

    // SELECT
    // select per le videocard
    $('.js-basic-single-videocard').select2({
        placeholder: "Select videocard",
        allowClear: true
    });

    // select per CPU Cores
    $('.js-basic-single-cpu').select2({
        placeholder: "CPU # Cores",
        allowClear: true
    });

    // select per memoria ram
    $('.js-basic-multiple-ram').select2({
        placeholder: "Select ram amount",
        allowClear: true
    });

    // select per lo chassis
    $('.js-basic-single-chassis').select2({
        placeholder: "Select chassis material",
        allowClear: true
    });

    // Switcher (tasti on-off relativi alle select)

    //





    $('#rambettercheckbox').lc_switch('Yes', 'No');
    $('#rambettercheckbox').lcs_on();
    var ramchecked = 1;
    $('body').delegate('#rambettercheckbox', 'lcs-on', function () {
        ramchecked = 1;
        // console.log(ramchecked);
    });
    $('body').delegate('#rambettercheckbox', 'lcs-off', function () {
        ramchecked = 0;
        // console.log(ramchecked);
    });

    $('#videocardbettercheckbox').lc_switch('Yes', 'No');
    $('#videocardbettercheckbox').lcs_on();
    var videocardChecked = 1;
    $('body').delegate('#videocardbettercheckbox', 'lcs-on', function () {
        videocardChecked = 1;
    });
    $('body').delegate('#videocardbettercheckbox', 'lcs-off', function () {
        videocardChecked = 0;
    });

    $('#cpubettercheckbox').lc_switch('Yes', 'No');
    $('#cpubettercheckbox').lcs_on();
    var coresChecked = 1;
    $('body').delegate('#cpubettercheckbox', 'lcs-on', function () {
        coresChecked = 1;
    });
    $('body').delegate('#cpubettercheckbox', 'lcs-off', function () {
        coresChecked = 0;
    });

    $('#chassisbettercheckbox').lc_switch('Yes', 'No');
    $('#chassisbettercheckbox').lcs_on();
    var chassisChecked = 1;
    $('body').delegate('#chassisbettercheckbox', 'lcs-on', function () {
        chassisChecked = 1;
    });
    $('body').delegate('#chassisbettercheckbox', 'lcs-off', function () {
        chassisChecked = 0;
    });

    // RANGE SLIDER
    // range slider per il display size
    var sliderDisplay = document.getElementById('sliderDisplay');

    noUiSlider.create(sliderDisplay, {
        start: [10, 18],
        connect: true,
        step: 1,
        tooltips: true,
        range: {
            'min': 10,
            'max': 18
        },
        format: wNumb({
            decimals: 0,
            suffix: '"'
        })
    });

    // range slider per il peso laptop
    var sliderWeight = document.getElementById('sliderWeight');

    noUiSlider.create(sliderWeight, {
        start: [0, 5],
        connect: true,
        step: 1,
        tooltips: true,
        range: {
            'min': 0,
            'max': 5
        },
        format: wNumb({
            decimals: 0,
            suffix: 'Kg'
        })
    });

    // range slider per il prezzo
    var sliderPrice = document.getElementById('sliderPrice');

    noUiSlider.create(sliderPrice, {
        start: [0, 9999],
        connect: true,
        step: 1,
        tooltips: true,
        range: {
            'min': 0,
            '10%': 500,
            '25%': 1000,
            '45%': 1500,
            '65%': 2000,
            '85%': 3000,
            'max': 9999
        },
        format: wNumb({
            decimals: 0,
            suffix: '$'
        })
    });




})


