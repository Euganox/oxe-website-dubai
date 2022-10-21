$(function() {
    let timer = $('#timer').pietimer({
        timerSeconds: 15,
        color: '#C72D37',
        fill: false,
        showPercentage: true,
        callback: function() {
            $('#timer').pietimer('reset');
            //следующий элемент
        }
    });

    $('.swiper-header-nav-right').click(function () {
        //next elem
        return timer.pietimer('reset');
    });

    $('.swiper-header-nav-left').click(function () {
        //past elem
        return timer.pietimer('reset');
    });
});
