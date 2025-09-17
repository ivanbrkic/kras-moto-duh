/**
 * Main.
 */
import SmoothScroll from 'smooth-scroll';
import Swiper from 'swiper/bundle';
// import Swiper styles
import 'swiper/swiper-bundle.min.css';

$('.js-pravila').attr('href', '/wp-content/themes/pg/assets/Pravila%20nagradnog%20natjec%CC%8Caja_Tko%20Moto%20njama%20njemu%20ljama.pdf');
$('.js-pravila').attr('target', '_blank');
new SmoothScroll('a[data-scroll]', {
	offset:100
});

$('.ginput_container_fileupload input').on('change', function () {
  var fileName = $(this).val().split('\\').pop();
  var $label = $(this).parent().siblings('label');
  if (fileName) {
    $label.html(fileName).addClass('has-file');
  } else {
    $label.html('Uploadaj fotku').removeClass('has-file');
  }
});

var swiper = new Swiper('.js-swiper', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
	initialSlide: 0,
  slidesPerView: 1.5,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 252,
    modifier: 1,
    slideShadows: false,
		scale:0.88,
  },
	navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
	breakpoints: {
    // when window width is >= 1024
    1024: {
      slidesPerView: 3,
			coverflowEffect: {
				depth: 352,

			},
    },
    
  }
});

$('.menu-toggle').on('click', function () {
  $('body').toggleClass('is-nav-open');
});
