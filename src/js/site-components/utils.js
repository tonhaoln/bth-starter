import $ from 'jquery';

jQuery(function( $ ) {

    $('.nav-toggler').click(function() {
        $(this).toggleClass('active');
        $(this).next('.nav-dropdown').toggleClass('show');
        $(this).parents('.site-wrap').parent('body').toggleClass('no-scroll');        
    })

    $('.menu-item-has-children').click(function() {
        $(this).toggleClass('active');
        $(this).find('.sub-menu').toggleClass('show');
        $('.menu-item-has-children > a').removeAttr("href");        
    })
});

alert("Hello! I am an alert box!!"); 