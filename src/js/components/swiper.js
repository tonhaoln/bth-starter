var Swiper = require('swiper'); 

const swiper = new Swiper.default('.swiper-container', {
  // Optional parameters
  
  //direction: 'vertical',
  //loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

//alert("Hello! I am an alert box!!"); 