<script src="resources/assets/custom/js/jquery.min.js"></script>
<!--  cant get to work with bower version =/
 -->
 <!-- <script src="resources/assets/vendor/jquery/dist/jquery.min.js"></script> -->
<script src="resources/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- <script src="resources/assets/vendor/flexslider/jquery.flexslider.js"></script> -->
<script src="resources/assets/custom/js/flexslider.min.js"></script>
<script src="resources/assets/vendor/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
<script src="resources/assets/custom/js/masonry.min.js"></script>
<script src="resources/assets/vendor/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="resources/assets/vendor/magnific-popup/dist/jquery.magnific-popup.js"></script>
<script src="resources/assets/custom/js/scripts.js"></script>

<script>

$('.owl-carousel').owlCarousel({
  autoplay: true,
  loop: true,
  margin: 25,
  responsiveClass: true,
  nav: true,
  loop: true,
  responsive: {
    0: {
      items: 1
    },
    568: {
      items: 2
    },
    600: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
})
$(document).ready(function() {
  $('.popup-youtube, .popup-text').magnificPopup({
    disableOn: 320,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: true
  });
});
$(document).ready(function() {
  $('.popup-text').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#name',
    callbacks: {
      beforeOpen: function() {
        if ($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#name';
        }
      }
    }
  });
});
</script>