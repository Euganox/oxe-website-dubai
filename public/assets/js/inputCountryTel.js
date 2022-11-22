// let phone = document.querySelector("#phone");
// intlTelInput(phone, {
//     initialCountry: "ae",
//     nationalMode: true,
//     allowExtensions: false,
//     utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js',
//     formatOnDisplay: true,
// });

$(document).ready(function() {
    let phone = $('#phone');

    phone.intlTelInput({
        utilsScript: 'public/assets/js/build/js/utils.js',
        autoHideDialCode: true,
        initialCountry: "ae",
        preferredCountries: ['ae', 'ru', 'us']
    });
});