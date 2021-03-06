(function($) {

/*Google Map Style*/
var CustomMapStyles  = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

var windowWidth = $(window).width();
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


//$('[data-toggle="tooltip"]').tooltip();

//banner animation
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


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}


/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
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




if( $('#mapID').length ){
var latitude = $('#mapID').data('latitude');
var longitude = $('#mapID').data('longitude');

var myCenter= new google.maps.LatLng(latitude,  longitude);
function initialize(){
    var mapProp = {
      center:myCenter,
      mapTypeControl:true,
      scrollwheel: false,
      zoomControl: true,
      disableDefaultUI: true,
      zoom:7,
      streetViewControl: false,
      rotateControl: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      styles: CustomMapStyles
      };

    var map= new google.maps.Map(document.getElementById('mapID'),mapProp);
    var marker= new google.maps.Marker({
      position:myCenter,
        //icon:'map-marker.png'
      });
    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

}




/* Start Shoriful ---> */

if( $('.gk-prod-slider').length ){
    $('.gk-prod-slider').slick({
      pauseOnHover: false,
      dots: false,
      infinite: true,
      arrows: true,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 300,
      centerMode: true,
      //centerPadding: '30%',
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $('.gk-prod-mainslider .mainslider-leftarrow'),
      nextArrow: $('.gk-prod-mainslider .mainslider-rightarrow'),
    });
}

var slickColodeWidth = $('.gk-prod-slider-item').outerWidth();
var slickColodeWidth2 = (slickColodeWidth / 2);
//alert(slickColodeWidth2);

$('.gk-prod-mainslider .mainslider-leftarrow').css("left",slickColodeWidth2);

 /*if (windowWidth <= 767) {
  if( $('.gk-ref-det-ctlr ul').length ){
    $('.gk-ref-det-ctlr ul').slick({
      pauseOnHover: false,
      dots: true,
      infinite: true,
      arrows: true,
      speed: 300,
      centerMode: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $('.gk-prod-mainslider .mainslider-leftarrow'),
      nextArrow: $('.gk-prod-mainslider .mainslider-rightarrow'),
    });
}


 }*/
 if( $('.gkRefGrdSlider').length ){
    $('.gkRefGrdSlider').slick({
      dots: false,
      infinite: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            dots: true
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            /*prevArrow: $('.mainslider .gk-ref-det-leftarrow'),
            nextArrow: $('.mainslider .gk-ref-det-rightarrow'),*/
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}


 if (windowWidth <= 767) {
  //$('.mob-fltr').hide();
  $('.gk-ref-filter-mob span').on('click', function(){
    $('.gk-ref-filter-rgt').slideToggle(500);
  });


 }



/*Start Milon ------> */

// footer slide menu
$('.ftr-col h6').on('click', function(){
  $(this).toggleClass('active');
  $(this).parent().siblings().find('h6').removeClass('active');
  $(this).parent().find('ul').slideToggle(300);
  $(this).parent().siblings().find('ul').slideUp(300);
});


/*
-----------------------
Start Contact Google Map ->> 
-----------------------
*/
if( $('#googlemap').length ){
    var latitude = $('#googlemap').data('latitude');
    var longitude = $('#googlemap').data('longitude');

    var myCenter= new google.maps.LatLng(latitude,  longitude);
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
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
          styles : CustomMapStyles
      };
      var map= new google.maps.Map(document.getElementById('googlemap'),mapProp);

      var marker= new google.maps.Marker({
        position:myCenter,
        icon:''
        });
      marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}






/*Start Rannojit ----> */


var containerWidth = $('.container').outerWidth();
var containerExtraWidthCal = (windowWidth - containerWidth ) / 2;
var containerExtraWidthCalMinusPx = containerExtraWidthCal - 15;

var containerExtraWidthCalAddPx = (containerExtraWidthCalMinusPx + 40) 
$('.page-banner-img-cntlr').css("right", containerExtraWidthCalMinusPx);

$('.main-slide-item-fea-img-img-cntlr').css("right", containerExtraWidthCalMinusPx);
$('.main-slide-prev-next').css("right", containerExtraWidthCalAddPx);




if( $('.dftResponsibilityGrdsSlider').length ){
    $('.dftResponsibilityGrdsSlider').slick({
      dots: false,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
          }
        }
      ]
    });
}
if( $('.hmTestiSLider').length ){
    $('.hmTestiSLider').slick({
      dots: false,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $('.hm-testi-slider-cntlr .testi-prev'),
      nextArrow: $('.hm-testi-slider-cntlr .testi-next'),
    });
}


if( $('.dftBlockquoteSlider').length ){
    $('.dftBlockquoteSlider').slick({
      dots: false,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
          }
        },
      ]
    });
}


if( $('.mainSlider').length ){
    $('.mainSlider').slick({
      dots: false,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 300,
      fade: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $('.main-slide-prev-next .fl-prev'),
      nextArrow: $('.main-slide-prev-next .fl-next')
    });
}

/**
Sidebar menu
*/
if (windowWidth <= 991) {
  $('.hdr-humbergur-btn').on('click', function(e){
    $('.xs-nav-cntlr').addClass('opacity-1');
    $('.bdoverlay').addClass('active');
    $('body').addClass('active-scroll-off');
  });
  $('.menu-closebtn').on('click', function(e){
    $('.bdoverlay').removeClass('active');
    $('.xs-nav-cntlr').removeClass('opacity-1');
    $('body').removeClass('active-scroll-off');
    $('.hdr-humbergur-btn').removeClass('menu-expend');
  });
  
  $('li.menu-item-has-children > a').on('click', function(e){
    e.preventDefault();
    $(this).parent().siblings().find('.sub-menu').slideUp(300);
    $(this).parent().find('.sub-menu').slideToggle(300);
    $(this).toggleClass('sub-menu-active');
  });
}



})(jQuery);