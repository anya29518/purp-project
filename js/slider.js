
$(function() {
    $('.rotating-slider').rotatingSlider({
        slideHeight : 210,
        slideWidth : Math.min(280, document.querySelector('.rotating-slider-container' ).offsetWidth)
    });
});