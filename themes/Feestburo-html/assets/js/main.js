(function($) {

$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	

 //matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
}; 

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


$('.ftr-xs-links > span').on('click', function(){
    $(this).parent().toggleClass('non-expend');
    $(this).parent().find('ul').slideToggle();
});

$('.ftr-xs-contact-spn-wrp').on('click', function(){
    $(this).parent().toggleClass('expend');
    $(this).parent().find('ul').slideToggle();
});

//match Height
if (windowWidth > 768) {
  if($('.matchHeightCol').length){
    $('.matchHeightCol').matchHeight();
  };
}

if($('.subcatGrd-matchCol').length){
  $('.subcatGrd-matchCol').matchHeight();
}

if($('.refOvrGrd-matchCol').length){
  $('.refOvrGrd-matchCol').matchHeight();
}



if( $('.refDetailsSlider').length){
  $('.refDetailsSlider').slick({
    pauseOnHover: false,
    autoplay: false,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
        responsive: [
        {
          breakpoint: 1599,
          settings: {
            dots: true,
          }
        }
      ]
  });
}


if( $('.catMeubilairSlider').length){
  $('.catMeubilairSlider').slick({
    pauseOnHover: false,
    autoplay: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    responsive: [
        {
          breakpoint: 1599,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
  });
}

// go to functoion
$(".categoty-meubilair-lft-des > a").click(function(e) {
    e.preventDefault();
    var goto = $(this).attr('href');
    $('html, body').animate({
        scrollTop: $(goto).offset().top - 0
    }, 800);
});


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


if( $('#PtBtmSlider').length){
  $('#PtBtmSlider').slick({
    pauseOnHover: false,
    autoplay: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    prevArrow: $('.PtBtmSliderArrow .leftArrow'),
    nextArrow: $('.PtBtmSliderArrow .rightArrow'),
    responsive: [
        {
          breakpoint: 1599,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
          }
        },
        {
          breakpoint: 1499,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
  });
}

$('.scrolltobtn').on('click', function(e){
  e.preventDefault();
  var togo = $(this).data('to');
  goToByScroll(togo, 0);
});

function goToByScroll(id, offset){
  if(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate(
        {scrollTop: $(id).offset().top - offset},
      500);
  }
}

$('.checkmarkbtn').on('click', function(e){
  e.preventDefault();
  var togo = $(this).data('to');
  goToByScroll(togo, 0);
});

function goToByScroll(id, offset){
  if(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate(
        {scrollTop: $(id).offset().top - offset},
      500);
  }
}




/*
-----------------------
Start Contact Google Map ->> 
-----------------------
*/
if( $('#googlemap').length ){
    var latitude = $('#googlemap').data('latitude');
    var longitude = $('#googlemap').data('longitude');

    var myCenter= new google.maps.LatLng(latitude,  longitude);
    var iconBase = $('#googlemap').data('homeurl');
    function initialize(){
        var mapProp = {
          center:myCenter,

          mapTypeControl:false,
          scrollwheel: false,

          zoomControl: false,
          disableDefaultUI: true,
          zoom:17,
          streetViewControl: false,
          rotateControl: false,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          styles : [
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "hue": "#ff0000"
            },
            {
                "weight": "6.00"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.icon",
        "stylers": [
            {
                "weight": "1"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#dddddd"
            },
            {
                "lightness": 17
            },
            {
                "visibility": "on"
            },
            {
                "weight": "2"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    }
]
          };

        var map= new google.maps.Map(document.getElementById('googlemap'),mapProp);

        var marker= new google.maps.Marker({
          position:myCenter,
          icon: iconBase + '/assets/images/map-marker.png'
          });
        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}






/*End code of Milon*/









/*Start code of Rannojit*/




if( $('.dftImgTitleGrdSlider').length ){
    $('.dftImgTitleGrdSlider').slick({
      dots: false,
      arrow: false,
      infinite: false,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
             dots: true,
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
}

if( $('.woocommerce-product-gallery').length ){
    $('.woocommerce-product-gallery').slick({
      dots: false,
      arrow: true,
      infinite: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1
    });
}

$('.hdr-search button').on('click', function(){
    $(this).parent().toggleClass('hdr-search-field-show');
});



$('.scrollto').on('click', function(e){
  e.preventDefault();
  var togo = $(this).data('to');
  goToByScroll(togo, 0);
});

function goToByScroll(id, offset){
  if(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate(
        {scrollTop: $(id).offset().top - offset},
      500);
  }
}

//sm-popup-main-menu

if (windowWidth <= 991) {
    $('.home-bnr-xs-nav-bar-controller').on('click', function(){
      $('.xs-popup-main-menu-wrap').fadeIn(500);
      $('.xs-popup-main-menu-wrap').addClass('add-cls-show');
      $('body').addClass('pop-up-menu-active');
    });
    $('.xs-menu-popup-close-btn').on('click', function(){
      $('.xs-popup-main-menu-wrap').fadeOut(500);
      $('.xs-popup-main-menu-wrap').removeClass('add-cls-show');
      $('body').removeClass('pop-up-menu-active');
    });
}

/*End code of Rannojit*/



//$("[data-fancybox]").fancybox({});

/**
Banner slider
*/
if( $('.bannerSlider').length ){
    $('.bannerSlider').slick({
      pauseOnHover: false,
      autoplay: false,
      autoplaySpeed: 5000,
      arrows:false,
      dots: false,
      infinite: false,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
    });
}
if( $('.hdr-topbar-lft ul').length ){
    $('.hdr-topbar-lft ul').slick({
      pauseOnHover: true,
      autoplay: true,
      autoplaySpeed: 0,
      cssEase: 'linear',
      arrows:false,
      dots: false,
      infinite: true,
      speed: 9000,
      slidesToShow: 2,
      variableWidth: true
    });
}


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

  if( $('#go-spacification').length ){
    $('#go-spacification').on('click', function(e){
      e.preventDefault();
      $('html, body').animate({
          scrollTop: $("#specificaties").offset().top
      }, 100);
    })

  }

})(jQuery);









