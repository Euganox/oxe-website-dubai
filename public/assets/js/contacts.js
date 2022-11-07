$(document).ready(function() {
    let header = $('.contacts-header-page');

    new ResizeSensor(jQuery(header), function() {
        let paddingTop = header.innerHeight() - header.height();
        let margin = '-' + paddingTop + 'px';
        let padding = paddingTop + 'px';
        let height = header.innerHeight() + 'px';

        $('.contacts-line').css({
            'marginTop': margin,
            'paddingTop': padding,
            'height': height
        })
    });
});