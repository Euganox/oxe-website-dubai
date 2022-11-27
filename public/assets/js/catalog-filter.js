$(document).ready(function() {
    let elements = $('div.catalog-filter-block');
    elements.hide();

    $('.catalog-filter-accord').click(function (e) {
        let idBlock = '#' + e.target.id + '_block';

        if ($(idBlock).hasClass("filter-active")) {
            $(idBlock).removeClass("filter-active").fadeOut();
        } else {
            let otherEl = $(".catalog-filter-block.filter-active");
            otherEl.hide();
            otherEl.removeClass("filter-active");
            $(idBlock).addClass("filter-active").fadeIn();
        }
    });

    $(".js-range-slider").ionRangeSlider({
        type: "double",
        min: 10000,
        max: 1000000,
        from: 20000,
        to: 800000,
        skin: "round",
        prefix: "$",
        step: 5000,
    });

    $( function() {
        $( "#tabs" ).tabs({
            active: 0
        });

        $( "#tabs" ).tabs( "option", "active", 0);

        $(".catalog-section-header-tab").click(function(e) {
            let sortElement = $('.sort');

            if ($(this).attr('id') === 'tab-two') sortElement.hide();
            else sortElement.show()
        })
    });
});

function submitForm(){
    let name=document.getElementsByName('district[]');
    let str="";
    for(i=0; i < name.length; i++){
        if(name[i].checked){
            str += name[i].value + ",";
        }
    }
    if(str.length>0){str=str.substring(0,str.length-1)};// remove the last comma
    let url="catalog?district="+str;
    document.getElementById('formid').action=url;
    document.getElementById('formid').submit();
}

(function($) {
    $(function() {

        $('input').styler();

    });
})(jQuery);