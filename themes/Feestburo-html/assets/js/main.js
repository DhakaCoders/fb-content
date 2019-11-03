(function($) {

$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	

/**
Responsive on 767px
*/
var windowWidth = $(window).width();
// if (windowWidth <= 767) {

  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



/*Start code of Prashanto*/


$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


//match Height
if (windowWidth > 768) {
  if($('.matchHeightCol').length){
    $('.matchHeightCol').matchHeight();
  };
}

if( $('.categoty-meubilair-slider').length ){
    $('.categoty-meubilair-slider').slick({
      pauseOnHover: false,
      autoplay: false,
      dots: false,
      arrows:true,
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      fade: true,
    });
}








/*End code of Prashanto*/





/*Start code of Milon*/
if (windowWidth <= 767) {
  if( $('#HmServiceSlider').length ){
      $('#HmServiceSlider').slick({
        pauseOnHover: false,
        autoplay: false,
        autoplaySpeed: 6000,
        arrows:false,
        dots: true,
        infinite: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
      });
  }
}

if (windowWidth <= 767) {
  if( $('#HmGalleryItemTopLft').length ){
      $('#HmGalleryItemTopLft').slick({
        pauseOnHover: false,
        autoplay: false,
        autoplaySpeed: 6000,
        arrows:true,
        dots: true,
        infinite: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        prevArrow: $('.HmGalleryItem .leftArrow'),
        nextArrow: $('.HmGalleryItem .rightArrow'),
      });
  }
}
if (windowWidth <= 575) {
  if( $('#HmGalleryBtmLft').length ){
      $('#HmGalleryBtmLft').slick({
        pauseOnHover: false,
        autoplay: false,
        autoplaySpeed: 6000,
        arrows:true,
        dots: true,
        infinite: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        prevArrow: $('.HmGalleryBtmPagi .leftArrow'),
        nextArrow: $('.HmGalleryBtmPagi .rightArrow'),
      });
  }
}








/*End code of Milon*/









/*Start code of Rannojit*/




$('.hdr-search button').on('click', function(){
    $(this).parent().toggleClass('hdr-search-field-show');
});




/*End code of Rannojit*/



//$("[data-fancybox]").fancybox({});


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}

    new WOW().init();

})(jQuery);









