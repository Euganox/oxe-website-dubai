function openObject($id) {
    $.ajax({
        type: "POST",
        url: "index.php?ajax=1&openObject=true",
        dataType: "json",
        data: {
            "id": $id
        },
        success: function(data) {
            if (data !== "error") {
                let modal = $('#toInsertModal');
                $('body').css({
                    'overflowY': 'hidden',
                })
                modal.css('display', 'flex');
                modal.html(data.text);

                $('.ajax-modal-close').click(function() {
                    modal.hide();
                    $('body').css({
                        'overflowY': 'visible',
                    })
                });

                $(document).keydown(function(e) {
                    if (e.keyCode === 27) {
                        e.stopPropagation();
                        modal.hide();
                        $('body').css({
                            'overflowY': 'visible',
                        })
                    }
                });

                modal.click(function(e) {
                    if ($(e.target).closest('.ajax-modal').length === 0) {
                        $(this).hide();
                        $('body').css({
                            'overflowY': 'visible',
                        })
                    }
                });

                $("#ajax-modal-slider").lightSlider({
                    item: 1,
                    loop:true,
                    keyPress: true,
                    currentPagerPosition: 'left',
                });

                let btnContactUs = $('.btn-contactUs');
                btnContactUs.click(function (e) {
                    let modalInModal = $('#contactInModal')
                    modalInModal.css('display', 'flex');

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
                            let masks = ['0-000-000-0000', '000-00-000-0000'];
                            let mask = (cep.length>11) ? masks[1] : masks[0];
                            $('input[name="phone"]').mask(mask, options);
                        }};

                    $('input[name="phone"]').mask('0-000-000-0000', options);

                    $('.contactUs-form-btn-place-close').click(function (e) {
                        modalInModal.hide();
                    });
                });

            } else {
                console.log('error')
            }
        }
    });
}

