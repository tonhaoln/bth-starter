import $ from 'jquery';

jQuery(function( $ ) {

    /**
    * Mobile Navigation dropdown
    */
    $('.nav-toggler').click(function() {
        $(this).toggleClass('active');
        $(this).next('.nav-dropdown').toggleClass('show');
        $(this).parents('.site-wrap').parent('body').toggleClass('no-scroll');        
    })

    
    /**
    * Navigation item with sub-menu class toggle 
    * sub-menu show/hide slide animation
    */
    $('.menu-item-has-children').click(function() {
        $(this).toggleClass('active');
        $(this).find('.sub-menu').toggleClass('show');
        $('.menu-item-has-children > a').removeAttr("href");        
    })

    $( ".menu-item-has-children" ).hover(function() {
      $( ".sub-menu" ).slideToggle( "", function() {
        // Animation complete.
      });
    });


    /**
    * Hide Show Header on Scroll
    */
    var lastScroll = 0;
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > lastScroll) {
            $('.site-header').css({
                'transition': 'transform .3s ease',
                'transform': 'translate3d(0px, -100%, 0px) scale3d(1, 1, 1)',
                'will-change': 'transform'
            });                    

        } else if (scroll < lastScroll) {
            $('.site-header').css({
                'transition': 'transform 1s ease',
                'transform': 'translate3d(0px, 0px, 0px) scale3d(1, 1, 1)',               
            });
        }
    lastScroll = scroll;
    });

});

//alert("Hello! I am an alert box!!"); 