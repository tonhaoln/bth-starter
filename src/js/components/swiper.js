var Swiper = require('swiper'); 

const swiper = new Swiper.default('.swiper-container', {
  // Optional parameters
  speed: 800,
  parallax: true, 

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