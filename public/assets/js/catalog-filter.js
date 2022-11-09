$(document).ready(function() {
    let elements = $('div.catalog-filter-block');
    elements.hide();

    $('.catalog-filter-accord').click(function (e) {
        let idBlock = '#' + e.target.id + '_block';

        if ($(idBlock).hasClass("filter-active")) {
            $(idBlock).removeClass("filter-active").fadeOut();
        } else {
            let otherEl = $(".catalog-filter-block.filter-active");
            otherEl.hide();
            otherEl.removeClass("filter-active");
            $(idBlock).addClass("filter-active").fadeIn();
        }
    });

    $('.filter-checkbox-input').click(function (e) {
        console.log($(this))
    })

    $(".js-range-slider").ionRangeSlider({
        type: "double",
        min: 1000,
        max: 500000,
        from: 20000,
        to: 100000,
        skin: "round",
        prefix: "$",
        step: 1000,
        grid: true
    });
});

(function($) {
    $(function() {

        $('input').styler();

    });
})(jQuery);