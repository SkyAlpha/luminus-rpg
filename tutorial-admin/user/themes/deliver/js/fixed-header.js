$(document).ready(function() {
    var navbar = $('#navbar');
    var navbarOffset = navbar.offset().top;

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();

        if (scroll >= navbarOffset) {
            navbar.height(navbar.height());
            navbar.addClass('fixed');
        } else {
            navbar.removeClass('fixed');
        }
    });
});
