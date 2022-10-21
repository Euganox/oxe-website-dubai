(function() {
    $.fatNav();
}());

$(function() {
    let header = $('.header');
    let headerHeight = header.height(); // вычисляем высоту шапки
    $('.main').css({
        'marginTop': '-'+headerHeight+'px'
    })

    $(window).scroll(function() {
        if($(this).scrollTop() > 1) {
            header.addClass('header-fixed');
            $('body').css({
                'paddingTop': headerHeight+'px' // делаем отступ у body, равный высоте шапки
            });
        } else {
            header.removeClass('header-fixed');
            $('body').css({
                'paddingTop': 0 // удаляю отступ у body, равный высоте шапки
            })
        }

        if($(this).scrollTop() > 1) {
            header.css({
                'background': 'rgba(51, 51, 51, 0.33)',
                'transition': '.3s'
            });
        } else {
            header.css({
                'background': 'rgba(255, 255, 255, 0.1)',
                'transition': '.3s'
            });
        }
    });
});