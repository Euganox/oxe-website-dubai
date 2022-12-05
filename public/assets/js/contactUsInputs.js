let input = $('.contactUs-form-input');

input.on('focusin', function() {
    $(this).parent().find('.contactUs-form-label').addClass('contactUs-form-label-active');
});

input.on('focusout', function() {
    if (!this.value) {
        $(this).parent().find('.contactUs-form-label').removeClass('contactUs-form-label-active');
    }
});

let options =  {
    onKeyPress: function(cep, e, field, options) {
        let masks = ['0-000-000-00000', '000-00-000-0000'];
        let mask = (cep.length > 14) ? masks[1] : masks[0];
        $('input[name="phone"]').mask(mask, options);
    }};

$('input[name="phone"]').mask('0-000-000-00000', options);