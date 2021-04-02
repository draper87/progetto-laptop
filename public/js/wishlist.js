$(document).ready(function () {

    let array_laptops = [];
    let array_localStorage = localStorage.getItem('wishlist');
    let array_wishlist_not_parsed_int;
    let array_wishlist;
    if (array_localStorage) {
        array_localStorage = array_localStorage.substring(1);
        array_localStorage = array_localStorage.substring(0, array_localStorage.length - 1);
        array_wishlist_not_parsed_int = array_localStorage.split(',')
        array_wishlist = array_wishlist_not_parsed_int.map((x) => parseInt(x));
    }

    let laptopId;
    $(document).on('click', '.wishlist-add-button',
        function() {
            laptopId = $(this).data('id');

            if (!array_wishlist && !array_laptops.includes(laptopId)) {
                array_laptops.push(laptopId);
                localStorage.setItem('wishlist', JSON.stringify(array_laptops));
                console.log('setto')
                $(this).toggleClass('opaque');
            } else if (!array_wishlist && array_laptops.includes(laptopId)) {
                // let laptop_index = array_laptops.indexOf(laptopId)
                // // array_laptops = array_laptops.splice(laptop_index, 1)
                for (let i = 0; i < array_laptops.length; i++) {
                    if (array_laptops[i] === laptopId)
                    array_laptops.splice(i, 1);
                }
                localStorage.setItem('wishlist', JSON.stringify(array_laptops));
                $(this).toggleClass('opaque');
            } else if (array_wishlist && !array_wishlist.includes(laptopId)) {
                array_laptops.push(laptopId);
                let concat_array = array_wishlist.concat(array_laptops);
                console.log(concat_array)
                localStorage.setItem('wishlist', JSON.stringify(concat_array));
                $(this).toggleClass('opaque');
            } else {
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
