$(document).ready(function() {
    const imgFirstHeight = $('#ideology_img1').height();
    const imgSecondHeight = $('#ideology_img2').height();
    const imgTextBlockHeight = $('#ideology_text').height();
    let blockHeight = imgFirstHeight + imgSecondHeight - imgTextBlockHeight;

    $('#ideology').css({
        'height': blockHeight + 'px',
    });


    const contactUsBlock = $('.contactUs');
    const contactUsImg = $('#contactUs-img');
    const imgContactUsHeight = contactUsImg.height();
    let marginTopImg = imgContactUsHeight / 3;

    contactUsBlock.css({
        'height': imgContactUsHeight + 'px',
    });
    contactUsImg.css({
        'marginTop': '-' + marginTopImg + 'px',
    });
});