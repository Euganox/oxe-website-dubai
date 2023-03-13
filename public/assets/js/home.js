$(document).ready(function() {
    const imgFirstHeight = $('#ideology_img1').height();
    const imgSecondHeight = $('#ideology_img2').height();
    const imgTextBlockHeight = $('#ideology_text').height();

    const contactUsBlock = $('.contactUs');
    const contactUsImg = $('#contactUs-img');
    const imgContactUsHeight = contactUsImg.height();

    if ($(window).width() > '667') {
        // IDEOLOGY BLOCK
        let blockHeight = imgFirstHeight + imgSecondHeight - imgTextBlockHeight;
        $('#ideology').css({
            'height': blockHeight + 'px',
        });

        // CONTACT US BLOCK
        let marginTopImg = imgContactUsHeight / 3;
        contactUsImg.css({
            'marginTop': '-' + marginTopImg + 'px',
        });
    } else {
        // CONTACT US BLOCK
        let marginTopImg = imgContactUsHeight / 13 / 2;
        contactUsBlock.css({
            'marginTop': marginTopImg + 5 + 'rem',
        });
        contactUsImg.css({
            'marginTop': '-' + marginTopImg + 'rem',
        });
    }
});