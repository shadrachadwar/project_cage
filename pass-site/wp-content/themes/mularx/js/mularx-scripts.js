jQuery(document).ready(function () {
  	var showcaseSwiperOne = new Swiper(".mularx-product-showcase", {
        spaceBetween: 50,
        slidesPerView:1,
  
         autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
          pagination: {
              el: ".mularx-slide-pagination",
              clickable: true,
          },
          navigation: {
            nextEl: '.mularx-slide-next',
            prevEl: '.mularx-slide-prev',
            clickable: true,
          },
          
    });
    var bannerSwiperOne = new Swiper(".mularx-slider-1", {
        spaceBetween: 50,
        slidesPerView:1,
  
         autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
          pagination: {
              el: ".mularx-slide-pagination",
              clickable: true,
          },
          navigation: {
            nextEl: '.mularx-slide-next',
            prevEl: '.mularx-slide-prev',
            clickable: true,
          },
          
    });

    var bannerSwiperTwo = new Swiper(".mularx-slider-2", {
        spaceBetween: 50,
        slidesPerView:1,
         autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
          pagination: {
              el: ".mularx-slide-pagination",
              clickable: true,
          },
          navigation: {
            nextEl: '.mularx-slide-next',
            prevEl: '.mularx-slide-prev',
            clickable: true,
          },
          
    });

  var bannerSwiperThree = new Swiper(".mularx-slider-3", {
      spaceBetween: 20,
      slidesPerView:1,
       autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
        pagination: {
            el: ".mularx-slide-pagination",
            clickable: true,
        },
        navigation: {
          nextEl: '.mularx-slide-next',
          prevEl: '.mularx-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 3,
        },
      }   
  });

   var bannerSwiperFour = new Swiper(".mularx-slider-4", {
      spaceBetween: 20,
      slidesPerView:1,
       autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
        pagination: {
            el: ".mularx-slide-pagination",
            clickable: true,
        },
        navigation: {
          nextEl: '.mularx-slide-next',
          prevEl: '.mularx-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 3,
        },
      }   
  });

   var swiperSlide5 = new Swiper(".mularx-slider-5", {
        spaceBetween: 20,
        slidesPerView: 2,
        centeredSlides: true,
        roundLengths: true,
        loop: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
          pagination: {
            el: ".mularx-slide-pagination",
            clickable: true,
          },
          navigation: {
              nextEl: '.mularx-slide-next',
              prevEl: '.mularx-slide-prev',
              clickable: true,
          },
          effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 2,
            coverflowEffect: {
              rotate: 50,
              stretch: 0,
              depth: 50,
              modifier: 1,
              slideShadows: true,
            },
        });

var swiperSlide6 = new Swiper(".mularx-slider-6", {
    spaceBetween: 10,
    slidesPerView:1,
    centeredSlides: true,
    roundLengths: true,
    loop: true,
    loopAdditionalSlides: 30,
         pagination: {
            el: ".mularx-slide-pagination",
            clickable: true,
          },
          navigation: {
              nextEl: '.mularx-slide-next',
              prevEl: '.mularx-slide-prev',
              clickable: true,
          },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 2,
        },
        1180: {
          slidesPerView: 2,
        },
      }
  });
    var catSwiper2 = new Swiper(".category-list-carousel", {
      spaceBetween: 5,
      slidesPerView:1,
       autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
        pagination: {
            el: ".mularx-slide-pagination",
            clickable: true,
        },
        navigation: {
          nextEl: '.mularx-slide-next',
          prevEl: '.mularx-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 4,
        },
        1024: {
          slidesPerView: 5,
        },
        1180: {
          slidesPerView: 7,
        },
      }   
  });

    var testimonialSwiperOne = new Swiper(".mularx-testimonial-slide", {
        spaceBetween: 50,
        slidesPerView:1,
        // effect: 'fade',
         autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
          pagination: {
              el: ".mularx-slide-pagination",
              clickable: true,
          },
          navigation: {
            nextEl: '.product-slide-next',
            prevEl: '.product-slide-prev',
            clickable: true,
          },
          
    });
    var testimonialSwiper2 = new Swiper(".testimonial-carousel-style-2", {
      spaceBetween: 50,
      slidesPerView:1,
       autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
        pagination: {
            el: ".mularx-slide-pagination",
            clickable: true,
        },
        navigation: {
          nextEl: '.product-slide-next',
          prevEl: '.product-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 3,
        },
      }   
  });
  var testimonialSwiper3 = new Swiper(".testimonial-carousel-style-3", {
    spaceBetween: 50,
    slidesPerView:1,
    centeredSlides: true,
    roundLengths: true,
    loop: true,
    loopAdditionalSlides: 30,
        pagination: {
           el: ".mularx-slide-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.product-slide-next',
          prevEl: '.product-slide-prev',
          clickable: true,
        },
        breakpoints: {
        560: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 1,
        },
        1024: {
          slidesPerView: 1,
        },
        1180: {
          slidesPerView: 1,
        },
      }
  });

var swiper_brands = new Swiper(".brands-logo-carousel", {
    spaceBetween: 20,
    slidesPerView:1,
    loopAdditionalSlides: 30,
    autoplay: {
        delay: 5000,
    },
        pagination: {
          el: ".brands-pagination",
          clickable: true,
        },
        breakpoints: {
        400: {
          slidesPerView: 1,
        },
        520: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 6,
        },
      }
  });

var latestProduct6 = new Swiper(".latest-product-carousel-6", {
    spaceBetween: 20,
    slidesPerView:1,
    loopAdditionalSlides: 30,
    autoplay: {
        delay: 5000,
    },
        pagination: {
          el: ".products-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.product-slide-next',
          prevEl: '.product-slide-prev',
          clickable: true,
        },
        breakpoints: {
        400: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 6,
        },
      }
  });
var latestProduct5 = new Swiper(".latest-product-carousel-5", {
    spaceBetween: 20,
    slidesPerView:1,
    loopAdditionalSlides: 30,
    autoplay: {
        delay: 5000,
    },
        pagination: {
          el: ".products-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.product-slide-next',
          prevEl: '.product-slide-prev',
          clickable: true,
        },
        breakpoints: {
        400: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 5,
        },
      }
  });
var latestProduct4 = new Swiper(".latest-product-carousel-4", {
    spaceBetween: 20,
    slidesPerView:1,
    loopAdditionalSlides: 30,
    autoplay: {
        delay: 5000,
    },
        pagination: {
          el: ".products-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.product-slide-next',
          prevEl: '.product-slide-prev',
          clickable: true,
        },
        breakpoints: {
        400: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 4,
        },
      }
  });
var latestProduct3 = new Swiper(".latest-product-carousel-3", {
    spaceBetween: 20,
    slidesPerView:1,
    loopAdditionalSlides: 30,
    autoplay: {
        delay: 5000,
    },
        pagination: {
          el: ".products-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.product-slide-next',
          prevEl: '.product-slide-prev',
          clickable: true,
        },
        breakpoints: {
        400: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 3,
        },
      }
  });


jQuery('.search-toggle').on('click', function(e) {
    e.preventDefault();
    jQuery('body').addClass('modal-active');
    jQuery('.search-modal').fadeIn('fast');
  });
  jQuery('.modal-close').on('click', function(e){
     e.preventDefault();
     jQuery('body').removeClass('modal-active');
    jQuery('.search-modal').fadeOut('fast');
  });
  jQuery('#searchModel button.btn-default').on('keydown', function(e){
    jQuery('#searchModel button.modal-close').focus();
    e.preventDefault();
  });


/*navmenu-toggle control*/
var menuFocus, navToggleItem, focusBackward;
var menuToggle = document.querySelector('.menu-toggle');
var navMenu = document.querySelector('.nav-menu');
var navMenuLinks = navMenu.getElementsByTagName('a');
var navMenuListItems = navMenu.querySelectorAll('li');
var nav_lastIndex = navMenuListItems.length - 1;
var navLastParent = document.querySelectorAll('.main-navigation > ul > li').length - 1;

document.addEventListener('menu_focusin', function () {
    menuFocus = document.activeElement;
    if (navToggleItem && menuFocus !== navMenuLinks[0]) {
        document.querySelectorAll('.main-navigation > ul > li')[navLastParent].querySelector('a').focus();
    }
    if (menuFocus === menuToggle) {
        navToggleItem = true;
    } else {
        navToggleItem = false;
    }
}, true);


document.addEventListener('keydown', function (e) {
    if (e.shiftKey && e.keyCode == 9) {
        focusBackward = true;
    } else {
        focusBackward = false;
    }
});


for (el of navMenuLinks) {
    el.addEventListener('blur', function (e) {
        if (!focusBackward) {
            if (e.target === navMenuLinks[nav_lastIndex]) {
                menuToggle.focus();
            }
        }
    });
}
menuToggle.addEventListener('blur', function (e) {
    if (focusBackward) {
        navMenuLinks[nav_lastIndex].focus();
    }
});


/*products tabs*/
  jQuery('.mularx-tabs li:first-child').addClass('active');
  jQuery('.mularx-content-wrapper .mularx-tab-content:first-child').addClass('active');
  jQuery('.tab-buttons').click( function() {
      var tabID = jQuery(this).attr('data-tab');
      jQuery(this).addClass('active').siblings().removeClass('active');
      jQuery('#tab-'+tabID).addClass('active').siblings().removeClass('active');
    });





/*scroll top*/
jQuery(window).scroll(function(){ 
      if (jQuery(this).scrollTop() > 100) { 
          jQuery('a.mularx-top').fadeIn(); 
      } else { 
          jQuery('a.mularx-top').fadeOut(); 
      } 
}); 
jQuery('a.mularx-top').click(function(){ 
        jQuery("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
}); 


});

/*home section animate*/
jQuery(function($, win) {
  $.fn.inViewport = function(cb) {
    return this.each(function(i,el){
      function visPx(){
        var H = $(this).height(),
            r = el.getBoundingClientRect(), t=r.top, b=r.bottom;
        return cb.call(el, Math.max(0, t>0? H-t : (b<H?b:H)));  
      } visPx();
      $(win).on("resize scroll", visPx);
    });
  };
}(jQuery, window));


jQuery(function($) { 
  $(".count-number").inViewport(function(px) { 
    if(px>0 && !this.initNumAnim) { 
      this.initNumAnim = true;
      $(this).prop('Counter',0).animate({
        Counter: $(this).text()
      }, {
        duration: 1000,
        step: function (now) {
          $(this).text(Math.ceil(now));
        }
      });         
    }
  });
});

jQuery(function($) { 
  $(".section-animate").inViewport(function(px) { 
    if(px>0 && !this.initNumAnim) { 
      this.initNumAnim = true;
      jQuery(this).addClass('mularxFadeInUp');
    }
  });


  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 100) {
        jQuery('.sticky-header').addClass('sticky-header-enabled');
    }
    else {
        jQuery('.sticky-header').removeClass('sticky-header-enabled');
    }
});

});

