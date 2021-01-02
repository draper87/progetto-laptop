$(document).ready(function () {

    // sezione compare Products


    // dichiaro array dove pushare id,url immagine e nome del laptop da comparare
    let ids = [];
    let laptops_Image = [];
    let laptops_Name = [];
    let localStorageIds = JSON.parse(localStorage.getItem('compares'));
    let localStorageImages = JSON.parse(localStorage.getItem('laptopImage'));
    let localStorageNames = JSON.parse(localStorage.getItem('laptopName'));


    // Al click del bottone Compare faccio partire chiamata GET
    $('#compare-button').click(function (){
        if (JSON.parse(localStorage.getItem('compares')).length > 1) {
            window.location.href = '/compare?items=' + JSON.parse(localStorage.getItem('compares'));
        } else {
            console.log('Devi aggiungere almeno 2 laptops')
        }

    })

    // Al load della pagina verifico se la compare-view è gia stata popolata, in caso positivo
    // chiamo popolateCompare() e setto la visibilità sulla compare-view
    window.onload = function() {
        if (JSON.parse(localStorage.getItem('compares'))) {
            popolateCompare(JSON.parse(localStorage.getItem('compares')));
            console.log(localStorageIds);
            console.log(localStorageImages);
            console.log(localStorageNames);
            ids = localStorageIds;
            laptops_Image = localStorageImages;
            laptops_Name = localStorageNames;
        }
        if (localStorageIds.length > 0) {
            $('#compare-view').addClass('compare-show');
        }
    };

    // Quando clicco sulla X chiudo la compare-view
    $('.compare-view-close-button').click(function () {
        $('#compare-view').removeClass('compare-show').addClass('compare-hide');

    })

    // Quando clicco sulla compare-view-box elimino il laptop dalla lista
    $(document).on('click', '.compare-view-box',
        function () {
            console.log(localStorageImages);
            console.log(localStorageNames);
            let elementToRemoveId = $(this).data('id');
            let elementToRemoveImage = $(this).find('img').attr('src');
            let elementToRemoveName = $(this).find('h5').text();
            for( let i = 0; i < localStorageIds.length; i++){

                if (localStorageIds[i] === elementToRemoveId) {
                    localStorageIds.splice(i, 1);
                    i--;
                }
            }
            for( let y = 0; y < localStorageImages.length; y++){

                if (localStorageImages[y] === elementToRemoveImage) {
                    localStorageImages.splice(y, 1);
                    y--;
                }
            }
            for( let z = 0; z < localStorageNames.length; z++){

                if (localStorageNames[z] === elementToRemoveName) {
                    localStorageNames.splice(z, 1);
                    z--;
                }
            }
            ids = localStorageIds;
            laptops_Image = localStorageImages;
            laptops_Name = localStorageNames;
            console.log(localStorageIds);
            console.log(localStorageImages);
            console.log(localStorageNames);
            localStorage.setItem('compares', JSON.stringify(ids));
            localStorage.setItem('laptopImage', JSON.stringify(laptops_Image));
            localStorage.setItem('laptopName', JSON.stringify(laptops_Name));
            $(this).hide();
        }
    )

    // Bottone Add to compare
    let laptopId;
    let laptopImage;
    let laptopName;
    $(document).on('click', '.compare-add-button',
        function() {
            if (ids.length < 3) {
                laptopId = $(this).data('id');
                laptopImage = $(this).siblings('#card-clickable').find('.card-img-top').attr('src');
                laptopName = $(this).siblings('#card-clickable').find('#laptopName').text();
                if (!(ids.includes(laptopId))) {
                    ids.push(laptopId);
                    laptops_Image.push(laptopImage);
                    laptops_Name.push(laptopName);
                    console.log(ids);
                    console.log(laptops_Image);
                    console.log(laptops_Name);
                    $('#compare-view').prepend('<div class="compare-view-box text-center" data-id="' + laptopId + '">' +
                        '<img src="' + laptopImage + '" alt="test">' +
                        '<h5>' + laptopName + '</h5>' + '</div>');
                    localStorage.setItem('compares', JSON.stringify(ids));
                    localStorage.setItem('laptopImage', JSON.stringify(laptops_Image));
                    localStorage.setItem('laptopName', JSON.stringify(laptops_Name));
                }
                $('#compare-view').addClass('compare-show');
            } else {
                $('#compare-view').addClass('compare-show');
                console.log("You can't add more than 3 laptops");
            }
        }
    )

    // Funzione che popola la sezione compare-view-box se gia' popolata quando faccio il reload della pagina
    function popolateCompare(ids) {
        for( let i = 0; i < ids.length; i++){
            $('#compare-view').prepend('<div class="compare-view-box text-center" data-id="' + localStorageIds[i] + '">' +
                '<img src="' + localStorageImages[i] + '" alt="test">' +
                '<h5>' + localStorageNames[i] + '</h5>' + '</div>');
        }
    }

})


