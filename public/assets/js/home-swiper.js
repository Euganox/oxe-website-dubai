$(document).ready(function() {
    const autoplaySlider = $('#features').lightSlider({
        auto:true,
        loop:true,
        autoWidth:true,
        pause: 8000,
        controls: false,
        pager: false,
        pauseOnHover: true,
        onBeforeSlide: function (el) {
            $('#current').text(el.getCurrentSlideCount());
        }
    });
    $('#goToPrevSlide').click(function(){
        autoplaySlider.goToPrevSlide();
    });
    $('#goToNextSlide').click(function(){
        autoplaySlider.goToNextSlide();
    });
    $('#total').text(autoplaySlider.getTotalSlideCount());
});