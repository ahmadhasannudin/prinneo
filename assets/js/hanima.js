// Navbar
// scroll functions
$(window).scroll(function (e) {

    // add/remove class to navbar when scrolling to hide/show
    var scroll = $(window).scrollTop();
    if (scroll >= 150) {
        $('.navbar').addClass("navbar-hide");
    } else {
        $('.navbar').removeClass("navbar-hide");
    }

});

// carousel
jQuery(document).ready(function($) {
    var owl = $('.owl-carousel');
    owl.on('initialize.owl.carousel initialized.owl.carousel ' +
      'initialize.owl.carousel initialize.owl.carousel ' +
      'resize.owl.carousel resized.owl.carousel ' +
      'refresh.owl.carousel refreshed.owl.carousel ' +
      'update.owl.carousel updated.owl.carousel ' +
      'drag.owl.carousel dragged.owl.carousel ' +
      'translate.owl.carousel translated.owl.carousel ' +
      'to.owl.carousel changed.owl.carousel',
      function(e) {
        $('.' + e.type)
          .removeClass('secondary')
          .addClass('success');
        window.setTimeout(function() {
          $('.' + e.type)
            .removeClass('success')
            .addClass('secondary');
        }, 500);
      });
    owl.owlCarousel({
      loop: true,
      nav: false,
      lazyLoad: true,
      margin: 10,
      video: true,
      responsive: {
        0: {
          items: 2
        },
        600: {
          items: 2
        },
        960: {
          items: 2
        },
        1200: {
          items: 2
        }
      }
    });
  });

// image upload preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#tampil').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
    }
}

$('#tampil').attr('src', 'http://placehold.it/483x397');

$("#imgInp").change(function () {
    readURL(this);
});

