/**
 * Main.
 */

import Swiper from 'swiper/bundle';
// Import Swiper styles
import 'swiper/swiper-bundle.min.css';

$('.js-pravila').attr('href', '/wp-content/themes/pg/assets/Pravila%20nagradnog%20natječaja%20Ulovi%20Moto%20duuuha.pdf');
$('.js-pravila').attr('target', '_blank');

$('.ginput_container_fileupload input').on('change', function() {
  const fileName = $(this).val().split('\\').pop();
  const $label = $(this).parent().siblings('label');
  if (fileName) {
    $label.html(fileName).addClass('has-file');
  } else {
    $label.html('Uploadaj fotku').removeClass('has-file');
  }
});

const swiper = new Swiper('.js-swiper', {
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
    // When window width is >= 1024
    1024: {
      slidesPerView: 3,
      coverflowEffect: {
        depth: 352,

      },
    },

  },
});

$('.menu-toggle').on('click', () => {
  $('body').toggleClass('is-nav-open');
});

$('.js-scroll').on('click', function(event) {
  event.preventDefault();
  $('html, body').animate({scrollTop: $($(this).attr('href')).offset().top - 220}, 100);
  $('body').removeClass('is-nav-open');
});

const options = {
  threshold: 0.2,
};

const observer = new IntersectionObserver((entries => {
  entries.forEach(entry => {
    const $target = $(entry.target);
    const $animate = $target.find('.animate');

    if (entry.isIntersecting) {
      $animate.addClass('reveal');
    } else {
      $animate.removeClass('reveal');
    }
  });
}), options);

// Attach observer and force an intersection check
$('.observe').each(function() {
  const element = $(this).get()[0];
  observer.observe(element);
});

import 'vanilla-cookieconsent/dist/cookieconsent.css';
import * as CookieConsent from 'vanilla-cookieconsent/dist/cookieconsent.umd.js';

// Enable dark mode
//document.documentElement.classList.add('cc--darkmode');
window.cc = CookieConsent;
window.cc.run({

  guiOptions: {
    consentModal: {
      layout: 'cloud',
      position: 'bottom center',
      equalWeightButtons: true,
      flipButtons: false,
    },
    preferencesModal: {
      layout: 'box',
      position: 'right',
      equalWeightButtons: true,
      flipButtons: false,
    },
  },
  categories: {
    preferences: {
      autoClear: {
        reloadPage: true,
      },
      services: {
        typekit: {
          label: 'Adobe Typekit',
          onAccept() {
            //console.log('onAccept');

          },
          onReject() {
            //console.log('onReject');
          },
        },
      },
    },

  },
  language: {
    default: 'hr',
    translations: {
      hr: {
        consentModal: {
          title: 'Poštujemo Vašu privatnost!',
          description: 'Koristimo skripte trećih strana kako bismo vam mogli prikazati web stranicu, s ciljem poboljšanja korisničkog iskustva i razvoja naših proizvoda. Klikom na „Prihvaćam“ učitat će se stilska skripta. Za više informacija, kliknite na Postavke privole.',
          acceptAllBtn: 'Prihvaćam',
          acceptNecessaryBtn: 'Ne prihvaćam',
          showPreferencesBtn: 'Postavke privole',
        },
        preferencesModal: {
          title: 'Postavke privole',
          acceptAllBtn: 'Prihvaćam',
          acceptNecessaryBtn: 'Ne prihvaćam',
          savePreferencesBtn: 'Spremi postavke',
          closeIconLabel: 'Zatvori',
          sections: [
            {
              title: 'Stilske skripte',
              description: 'Skripta koje učitava Adobe Typekit font',
              linkedCategory: 'preferences',
            },
            {
              title: 'Više informacija',
              description: 'Za više informacija, uključujući i obradu podataka od strane nezavisnih pružatelja, pogledaj  <a href="https://kras.hr/hr/kras-copyrights/uvjeti-koristenja" target="_blank">Informacije o obradi osobnih podataka</a>.',
            },
          ],
        },
      },
    },
  },
});
