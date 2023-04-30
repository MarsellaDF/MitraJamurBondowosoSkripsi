// swiper
const swiperBanner = new Swiper('.swiperBanner', {
    // Optional parameters
    direction: 'horizontal',
    loop: false,
    slidesPerView: "auto",
    spacebetween:10,
    breakpoints: {
        // when window width is <= 499px
        320: {
            slidesPerView: 1,
            spaceBetweenSlides: 10
        },
        // when window width is <= 999px
        999: {
            // slidesPerView: dataRekomendasi,
            slidesPerView: "auto",
            spacebetween:10,
        }
    },

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },

    autoplay: {
        delay: 3000,
        disableOnInteraction: false
      },
});
// end swiper
// swiper
const swiperGaleri = new Swiper('.swiperGaleri', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView: 2,
  spacebetween:3,
  breakpoints: {
    // when window width is <= 499px
    320: {
        slidesPerView: 1,
        spaceBetweenSlides: 10
    },
    // when window width is <= 999px
    999: {
        // slidesPerView: dataRekomendasi,
        slidesPerView: 2,
        spacebetween:3,
    }
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },

  autoplay: {
        delay: 3000,
        disableOnInteraction: false
      },
});

// galeri
