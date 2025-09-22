/**
 * Main.
 */

import Swiper from 'swiper/bundle';
// import Swiper styles
import 'swiper/swiper-bundle.min.css';

$('.js-pravila').attr('href', '/wp-content/themes/pg/assets/Pravila%20nagradnog%20natječaja%20Ulovi%20Moto%20duuuha.pdf');
$('.js-pravila').attr('target', '_blank');


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
		scale: 0.88,
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

$(".js-scroll").on('click', function (event) {
	event.preventDefault();
	$('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top - 220 }, 100);
	$("body").removeClass("is-nav-open");

});



let options = {
  threshold: 0.2,
};

const observer = new IntersectionObserver(function (entries) {
  entries.forEach(entry => {
    const $target = $(entry.target);
    const $animate = $target.find('.animate');

    if (entry.isIntersecting) {
      $animate.addClass('reveal');
    } else {
      $animate.removeClass('reveal');
    }
  });
}, options);

// Attach observer and force an intersection check
$('.observe').each(function () {
  const element = $(this).get()[0];
  observer.observe(element);
});
