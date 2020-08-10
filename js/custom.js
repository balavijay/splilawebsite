/*-------------------------------------------------------------------------------
  PRE LOADER
-------------------------------------------------------------------------------*/

$(window).load(function() {
    $('.preloader').fadeOut(1000); // set duration in brackets    
});



/* HTML document is loaded. DOM is ready. 
-------------------------------------------*/

$(document).ready(function() {


    var date = new Date();

    var day = date.getDay();

    if (day == 1) {

        $('.home-img').addClass("home-img1");

    } else if (day == 2) {

        $('.home-img').addClass("home-img2");

    } else if (day == 3) {

        $('.home-img').addClass("home-img3");

    } else if (day == 4) {

        $('.home-img').addClass("home-img4");

    } else if (day == 5) {

        $('.home-img').addClass("home-img5");

    } else if (day == 6) {

        $('.home-img').addClass("home-img1");

    } else if (day == 0) {

        $('.home-img').addClass("home-img2");

    } else {

        $('.home-img').addClass("home-img1");

    }



    /*-------------------------------------------------------------------------------
      Navigation - Hide mobile menu after clicking on a link
    -------------------------------------------------------------------------------*/

    $('.navbar-collapse a').click(function() {
        $(".navbar-collapse").collapse('hide');
    });


    $(window).scroll(function() {
        if ($(".navbar").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });



    /*-------------------------------------------------------------------------------
      jQuery Parallax
    -------------------------------------------------------------------------------*/

    function initParallax() {
        $('#home').parallax("100%", 0.1);
        $('#about').parallax("100%", 0.3);
        $('#service').parallax("100%", 0.2);
        $('#experience').parallax("100%", 0.3);
        $('#education').parallax("100%", 0.1);
        $('#quotes').parallax("100%", 0.3);
        $('#contact').parallax("100%", 0.1);
        $('footer').parallax("100%", 0.2);

    }
    initParallax();



    /*-------------------------------------------------------------------------------
      smoothScroll js
    -------------------------------------------------------------------------------*/

    $(function() {
        $('.custom-navbar a, #home a').bind('click', function(event) {
            var $anchor = $(this);
            if ($($anchor.attr('href')) && $($anchor.attr('href')).offset()) {
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top - 49
                }, 1000);
            }

            event.preventDefault();
        });
    });



    /*-------------------------------------------------------------------------------
      wow js - Animation js
    -------------------------------------------------------------------------------*/

    new WOW({ mobile: false }).init();


});
