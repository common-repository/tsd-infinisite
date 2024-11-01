/**
 * Master IS JS function doc
 */

function init_div_click_hack() {

    $("[data-link]").click(function () {
        window.location.href = $(this).attr("data-link");
    })

}


function init_website_query_module_slider() {

    var carousel = $('.is-website-slider-query-module');

    carousel.each(function () {
        $(this).owlCarousel({
            'items': 1,
            'autoHeight': 1,
            'nav': 1,
            'autoplay': 1,
            'loop': 1,
            'navContainerClass': 'owl-nav align-spaced flex',
            'navText': ['<h6><i class="fas fa-arrow-circle-left"></i> Prev</h6>', '<h6>Next <i class="fas fa-arrow-circle-right"></i></h6>']
        });
    })

}


$(function () {
    $(document).foundation();
});


init_website_query_module_slider();
init_div_click_hack();