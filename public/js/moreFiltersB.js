$(document).ready(function () {

// slider relativo a Laptop Temperature
    const $laptopTemperature = $('#laptopTemperature').find('input[type="range"]');
    const $tooltipLaptopTemperature = $('#range-tooltip-temperature');
    const sliderStatesLaptopTemperature = [
        {name: "low", tooltip: "All cool!.", range: _.range(30, 40) },
        {name: "med", tooltip: "Start to feel hot!", range: _.range(41, 50)},
        {name: "high", tooltip: "Burning!", range: [51, 65] },
    ];
    var currentStateLaptopTemperature;
    var $handleLaptopTemperature;

    $laptopTemperature
        .rangeslider({
            polyfill: false,
            onInit: function() {
                $handleLaptopTemperature = $('.rangeslider__handle', this.$range);
                updateHandle($handleLaptopTemperature[0], this.value);
                updateState($handleLaptopTemperature[0], this.value);
            }
        })
        .on('input', function() {
            updateHandle($handleLaptopTemperature[0], this.value);
            checkState($handleLaptopTemperature[0], this.value);
        });

// Update the value inside the slider handle
    function updateHandle(el, val) {
        el.textContent = val;
    }

// Check if the slider state has changed
    function checkState(el, val) {
        // if the value does not fall in the range of the current state, update that shit.
        if (!_.contains(currentStateLaptopTemperature.range, parseInt(val))) {
            updateState(el, val);
        }
    }

// Change the state of the slider
    function updateState(el, val) {
        for (var j = 0; j < sliderStatesLaptopTemperature.length; j++){
            if (_.contains(sliderStatesLaptopTemperature[j].range, parseInt(val))) {
                currentStateLaptopTemperature = sliderStatesLaptopTemperature[j];
                // updateSlider();
            }
        }
        // // If the state is high, update the handle count to read 50+
        // if (currentStateLaptopTemperature.name == "high") {
        //     updateHandle($handleLaptopTemperature[0], "50+");
        // }
        // Update handle color
        $handleLaptopTemperature
            .removeClass (function (index, css) {
                return (css.match (/(^|\s)js-\S+/g) ||   []).join(' ');
            })
            .addClass("js-" + currentStateLaptopTemperature.name);
        // Update tooltip
        $tooltipLaptopTemperature.html(currentStateLaptopTemperature.tooltip);
    }


})
