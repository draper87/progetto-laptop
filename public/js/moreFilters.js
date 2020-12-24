$(document).ready(function () {

// slider relativo a Laptop Noise
const $laptopNoise = $('#laptopNoise').find('input[type="range"]');
const $tooltipLaptopNoise = $('#range-tooltip-noise');
const sliderStatesLaptopNoise = [
    {name: "low", tooltip: "With this amount of decibel fan noise is quite inaudible or inaudible at all.", range: _.range(30, 40) },
    {name: "med", tooltip: "Start to feel something! With this amount of decibel fan noise is audible.", range: _.range(41, 50)},
    {name: "high", tooltip: "Loud!!! Over 50 decibel fan noise start to be cause of distraction. In case of long session with laptop's fans running high a pair of headphone is mandatory.", range: [51, 65] },
];
var currentStateLaptopNoise;
var $handleLaptopNoise;

$laptopNoise
    .rangeslider({
        polyfill: false,
        onInit: function() {
            $handleLaptopNoise = $('.rangeslider__handle', this.$range);
            updateHandle($handleLaptopNoise[0], this.value);
            updateState($handleLaptopNoise[0], this.value);
        }
    })
    .on('input', function() {
        updateHandle($handleLaptopNoise[0], this.value);
        checkState($handleLaptopNoise[0], this.value);
    });

// Update the value inside the slider handle
function updateHandle(el, val) {
    el.textContent = val;
}

// Check if the slider state has changed
function checkState(el, val) {
    // if the value does not fall in the range of the current state, update that shit.
    if (!_.contains(currentStateLaptopNoise.range, parseInt(val))) {
        updateState(el, val);
    }
}

// Change the state of the slider
function updateState(el, val) {
    for (var j = 0; j < sliderStatesLaptopNoise.length; j++){
        if (_.contains(sliderStatesLaptopNoise[j].range, parseInt(val))) {
            currentStateLaptopNoise = sliderStatesLaptopNoise[j];
            // updateSlider();
        }
    }

    // Update handle color
    $handleLaptopNoise
        .removeClass (function (index, css) {
            return (css.match (/(^|\s)js-\S+/g) ||   []).join(' ');
        })
        .addClass("js-" + currentStateLaptopNoise.name);
    // Update tooltip
    $tooltipLaptopNoise.html(currentStateLaptopNoise.tooltip);
}


})
