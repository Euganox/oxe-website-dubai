$(document).on("click", "#tab-menu div", function() {
    let numberIndex = $(this).index();
    console.log(numberIndex)
    let tabItems = $("#tab-items");

    if (!$(this).is("about-fourth-menu-item-active")) {
        $("#tab-menu div").removeClass("about-fourth-menu-item-active");
        $("#tab-items li").removeClass("about-fourth-info-active");

        $(this).addClass("about-fourth-menu-item-active");
        tabItems.find(".about-fourth-info-item:eq(" + numberIndex + ")").addClass("about-fourth-info-active");

        let listItemHeight = tabItems
            .find(".about-fourth-info-item:eq(" + numberIndex + ")")
            .innerHeight();
        tabItems.height(listItemHeight + "px");
    }
});
