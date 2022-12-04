$(document).ready(function() {
    let filter = $('.catalog-global-filter');
    let btn = $('.catalog-global-filter-btn');
    let oldScrollY = 0;
    if ($(window).width() < '736') {
        window.onscroll = function () {
            let scrolled = window.pageYOffset;
            let dY = scrolled - oldScrollY;

            if (dY > 0) btn.fadeOut();
            else btn.fadeIn();

            oldScrollY = scrolled;
        }

        btn.click(function (e) {
            $('body').css({
                'overflowY': 'hidden',
            })

            filter.fadeIn();
            btn.fadeOut();

            $('.catalog-global-filter-close').click(function (e) {
                filter.fadeOut();
                btn.fadeIn();
                $('body').css({
                    'overflowY': 'auto',
                })
            })
        })
    }
})