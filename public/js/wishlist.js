$(document).ready(function () {

    // dichiaro variabili
    let array_laptops = [];
    let array_localStorage = localStorage.getItem('wishlist');
    let array_wishlist_not_parsed_int;
    let array_wishlist;
    if (array_localStorage) {
        // trasformo il mio localStorage in un array dato che essendo uno storage in realtà è una stringa di numeri divisi da virgole.
        // tolgo il primo carattere della stringa '['
        array_localStorage = array_localStorage.substring(1);

        // tolgo l ultimo carattere della stringa ']'
        array_localStorage = array_localStorage.substring(0, array_localStorage.length - 1);

        // trasformo la stringa in array
        array_wishlist_not_parsed_int = array_localStorage.split(',')

        // trasformo tutti gli elementi dell array in integer per evitare incongruenze di dati.
        array_wishlist = array_wishlist_not_parsed_int.map((x) => parseInt(x));
    }

    // localStorage.clear();

    let laptopId;
    $(document).on('click', '.wishlist-add-button',
        function() {
            laptopId = $(this).data('id');

            if (!array_wishlist && !array_laptops.includes(laptopId)) {
                array_laptops.push(laptopId);
                localStorage.setItem('wishlist', JSON.stringify(array_laptops));
                // console.log('setto')
                $(this).toggleClass('opaque');
            } else if (!array_wishlist && array_laptops.includes(laptopId)) {
                // elimino l elemento dall array che corrisponde a laptopId
                for (let i = 0; i < array_laptops.length; i++) {
                    if (array_laptops[i] === laptopId)
                    array_laptops.splice(i, 1);
                }
                localStorage.setItem('wishlist', JSON.stringify(array_laptops));
                $(this).toggleClass('opaque');
            } else if (array_wishlist && !array_wishlist.includes(laptopId)) {
                array_wishlist.push(laptopId);
                // console.log(array_wishlist)
                localStorage.setItem('wishlist', JSON.stringify(array_wishlist));
                $(this).toggleClass('opaque');
            } else {
                // elimino l elemento dall array che corrisponde a laptopId
                for (let i = 0; i < array_wishlist.length; i++) {
                    if (array_wishlist[i] === laptopId)
                        array_wishlist.splice(i, 1);
                }
                localStorage.setItem('wishlist', JSON.stringify(array_wishlist));
                $(this).toggleClass('opaque');
            }
        }
    )

})
