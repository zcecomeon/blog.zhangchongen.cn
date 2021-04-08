jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader = $('#loader');
    var loader_container = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    $('#top-bar').click(function(){
        $('#top-bar .wrapper').slideToggle();
        $('#top-bar').toggleClass('top-menu-active');
    });

    menu_toggle.click(function(){
        nav_menu.slideToggle();
        $(this).toggleClass('active');
       $('.main-navigation').toggleClass('menu-open');
       $('.menu-overlay').toggleClass('active');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
        $('#primary-menu > li:last-child button.active').unbind('keydown');
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#site-navigation').removeClass('menu-open');
            $('#primary-menu').slideUp();
            $('.menu-overlay').removeClass('active');
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });


/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });
}
else {
    $('#primary-menu').find("li").unbind('keydown');
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $('#primary-menu').find("li").unbind('keydown');
    }
});

menu_toggle.on('keydown', function (e) {
    var tabKey = e.keyCode === 9;
    var shiftKey = e.shiftKey;

    if( menu_toggle.hasClass('active') ) {
        if ( shiftKey && tabKey ) {
            e.preventDefault();
            nav_menu.slideUp();
            $('.main-navigation').removeClass('menu-open');
            $('.menu-overlay').removeClass('active');
            menu_toggle.removeClass('active');
        };
    }
});

/*------------------------------------------------
            SLICK SLIDER
------------------------------------------------*/

$('#featured-slider').slick();

$('.destination-slider').slick({
    responsive: [{
        breakpoint: 992,
            settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 767,
        settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 567,
        settings: {
            slidesToShow: 1
        }
    }]
});

$('.testimonial-slider').slick({
     responsive: [{
        breakpoint: 992,
            settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 767,
        settings: {
            slidesToShow: 1
        }
    },
    {
        breakpoint: 567,
        settings: {
            slidesToShow: 1
        }
    }]
});

/*------------------------------------------------
                MAGNIFIC POPUP
------------------------------------------------*/

$('.popup-video').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    preloader: true,
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});