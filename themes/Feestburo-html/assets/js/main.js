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

if( $('#PtSlider').length ){
    $('#PtSlider').slick({
      arrows:true,
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: $('.PtSliderArrow .leftArrow'),
      nextArrow: $('.PtSliderArrow .rightArrow'),
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

if( $('#PtBtmSlider').length ){
    $('#PtBtmSlider').slick({
      arrows:true,
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: $('.PtBtmSliderArrow .leftArrow'),
      nextArrow: $('.PtBtmSliderArrow .rightArrow'),
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 767,
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

          //zoomControl: false,
          //disableDefaultUI: true,
          zoom:11,
          streetViewControl: false,
          rotateControl: false,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          styles : [{"featureType":"all","elementType":"geometry","stylers":[{"color":"#63b5e5"},{"visibility":"simplified"}]},{"featureType":"all","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"gamma":0.01},{"lightness":20}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"saturation":-31},{"lightness":-33},{"weight":2},{"gamma":0.8}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text","stylers":[{"color":"#f6f6f4"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#919191"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":30},{"saturation":30},{"visibility":"simplified"},{"color":"#e3e7e8"}]},{"featureType":"landscape","elementType":"labels.text.fill","stylers":[{"color":"#8592a6"}]},{"featureType":"landscape","elementType":"labels.text.stroke","stylers":[{"color":"#20354d"}]},{"featureType":"landscape","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#202d40"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"color":"#20354d"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#a1b6cd"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#20354d"},{"weight":"0.25"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text.fill","stylers":[{"color":"#ff0000"},{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"lightness":20},{"saturation":-20}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#202d40"},{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":10},{"saturation":-30},{"visibility":"simplified"},{"color":"#4b576d"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":25},{"lightness":25},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#8592a6"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#202d40"}]},{"featureType":"water","elementType":"all","stylers":[{"lightness":-20}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#0a172b"}]}]
          };

        var map= new google.maps.Map(document.getElementById('googlemap'),mapProp);

        var marker= new google.maps.Marker({
          position:myCenter,
          icon:iconBase + '/assets/images/map-marker.png'
          });
        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
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









