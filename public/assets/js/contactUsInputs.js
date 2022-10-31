let input = $('.contactUs-form-input');

input.on('focusin', function() {
    $(this).parent().find('.contactUs-form-label').addClass('contactUs-form-label-active');
});

input.on('focusout', function() {
    if (!this.value) {
        $(this).parent().find('.contactUs-form-label').removeClass('contactUs-form-label-active');
    }
});