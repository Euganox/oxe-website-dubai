$(document).ready(function() {
    const autoplaySlider = $('#team').lightSlider({
        auto:false,
        loop:true,
        autoWidth:true,
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
});