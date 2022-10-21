$(document).ready(function(){
    $('.accordion-list > .accordion-el > .accordion-answer').hide();

    $('.accordion-list > .accordion-el').click(function() {
        if ($(this).hasClass("accordion-active")) {
            $(this).removeClass("accordion-active").find(".accordion-answer").slideUp();
        } else {
            $(".accordion-list > .accordion-el.accordion-active .accordion-answer").slideUp();
            $(".accordion-list > .accordion-el.accordion-active").removeClass("accordion-active");
            $(this).addClass("accordion-active").find(".accordion-answer").slideDown();
        }
        return false;
    });

});