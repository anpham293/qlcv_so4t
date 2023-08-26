$(document).ready(function () {

    var ocClients = $("#oc-clients-full");
    ocClients.owlCarousel({
        items: 6,
        margin: 30,
        loop: true,
        nav: true,
        navText: ['<i class="icon-angle-left"></i>', '<i class="icon-angle-right"></i>'],
        autoplay: true,
        dots: false,
        autoplayHoverPause: true,
        responsive: {0: {items: 2}, 480: {items: 3}, 768: {items: 4}, 992: {items: 5}, 1200: {items: 6}}
    });
});
$(window).load(function () {
    $('#preloader').fadeOut('slow', function () {
        $(this).remove();
    });
});
$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();
    $('html, body').animate({scrollTop: ($($.attr(this, 'href')).offset().top - 200)}, 500);
});
$(document).ready(function () {
    var owl = $("#owl-tintuc");
    owl.owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        dots: false,
        autoplay: "2000",
        smartSpeed: 1000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn'
    });
    owl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY > 0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });
});