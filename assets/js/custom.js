/**
 * Buri front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of the datepicker, Magnific Popup and Owl Carousel that
 * build the same markup, so the theme's stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  UI.datepicker('#datepicker');

  UI.magnific('.popup-youtube, .popup-vimeo', {
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  if (document.getElementById('default-select')) {
    UI.enhanceSelects('select');
  }

  UI.owl('.client_review_part', {
    items: 3,
    loop: true,
    dots: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false,
    margin: 20,
    center: true,
    responsive: {
      0: {
        items: 1,
        dots: false
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });

  // menu fixed js code
  UI.ready(function () {
    var menus = UI.toElements('.main_menu');
    window.addEventListener('scroll', function () {
      var fixed = window.pageYOffset + 1 > 50;
      menus.forEach(function (menu) {
        if (fixed) {
          menu.classList.add('menu_fixed', 'animated', 'fadeInDown');
        } else {
          menu.classList.remove('menu_fixed', 'animated', 'fadeInDown');
        }
      });
    }, { passive: true });
  });

  UI.magnific('.gallery_img', {
    type: 'image',
    gallery: {
      enabled: true
    }
  });
}());
