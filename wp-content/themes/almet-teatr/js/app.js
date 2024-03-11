document.addEventListener('DOMContentLoaded', () => {

     // Адаптируем видео на заднем фоне

     const backgroundVideo = new BackgroundVideo('.video__video', {
          src: [
               'video/video.mp4',
          ]
     });

     // Sound 

     const btnVideoSound = document.querySelector('.video-sound');
     const btnVideoSoundOff = document.querySelector('.video-sound__off');
     const btnVideoSoundOn = document.querySelector('.video-sound__on');
     const mainVideo = document.querySelector('video');

     if (btnVideoSound) {
          btnVideoSound.onclick = function () {
               btnVideoSoundOff.classList.toggle('d-none');
               btnVideoSoundOn.classList.toggle('d-none');
               btnVideoSound.classList.toggle('video-sound-on');

               if (btnVideoSound.classList.contains('video-sound-on')) {
                    mainVideo.muted = true;
               } else {
                    mainVideo.muted = false;
               }
          }
     }

     // Event search 

     const btnSearchEvent = document.querySelector('.header__search-img');
     const searchModal = document.querySelector('.search-modal');
     const bodyFix = document.querySelector('body');

     const searchClose = document.querySelector('.search-modal__close');
     const searchField = document.querySelector('.search-modal__field');

     if (btnSearchEvent) {
          btnSearchEvent.addEventListener('click', function () {
               searchModal.classList.add('search-modal-active');
               bodyFix.classList.add('body-fix');
          });
     }

     if (searchClose) {
          searchClose.addEventListener('click', function () {
               searchModal.classList.remove('search-modal-active');
               bodyFix.classList.remove('body-fix');
          });
     }

     document.addEventListener('click', e => {
          let target = e.target;
          let its_menu = target == searchField || searchField.contains(target);
          let its_hamburger = target == btnSearchEvent;
          let menu_is_active = searchModal.classList.contains('search-modal-active');

          if (!its_menu && !its_hamburger && menu_is_active) {
               searchModal.classList.remove('search-modal-active');
               bodyFix.classList.remove('body-fix');
          }
     })

     // Phone mask 

     const phones = document.querySelectorAll('.phone');
     const maskOptions = {
          mask: '+{7}(000)000-00-00'
     };

     for (let phone of phones) {
          let mask = IMask(phone, maskOptions);
     }

     // Fansybox

     Fancybox.bind("[data-fancybox]", {});

     /*
     * Галерея на странице новостей 
     */

     var swiper = new Swiper(".news-slider-1", {
          spaceBetween: 5,
          slidesPerView: 5,
          freeMode: true,
          watchSlidesProgress: true,
     });

     var swiper2 = new Swiper(".news-slider-2", {
          spaceBetween: 5,
          slidesPerView: 1.2,
          navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
          },
          thumbs: {
               swiper: swiper,
          },
     });

     /*
     * Сладйер в мобильной версии для блока вакансии
     */

     const swiper3 = new Swiper('.swiper-vacancies', {
          slidesPerView: 4,
          spaceBetween: 30,

          breakpoints: {

               320: {
                    slidesPerView: 1.3,
                    spaceBetween: 10
               },

               400: {
                    slidesPerView: 1.6,
                    spaceBetween: 10
               },

               600: {
                    slidesPerView: 2.5,
                    spaceBetween: 10
               },

               800: {
                    slidesPerView: 3.1,
                    spaceBetween: 10
               },

               900: {
                    slidesPerView: 3.2,
                    spaceBetween: 20
               },

               1100: {
                    slidesPerView: 4,
                    spaceBetween: 30
               }
          },

          navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
          },
     })

     /*
     * Скроллбар
     */

     const menuFixed = document.querySelector('.menu-fixed');
     const btnUp = document.querySelector('.btn-up');

     window.onscroll = function () {

          topScrollBar();

          if (window.pageYOffset > 400) {
               menuFixed.classList.add('menu-fixed__active');
          } else {
               menuFixed.classList.remove('menu-fixed__active');
          }

          if (window.pageYOffset > 500) {
               btnUp.classList.add('btn-up-active');
          } else {
               btnUp.classList.remove('btn-up-active');
          }
     };

     function topScrollBar() {
          var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
          var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
          var scrolled = (winScroll / height) * 100;

          let topBar = document.querySelector('.progress-bar');
          if (topBar) {
               topBar.style.width = scrolled + "%";
          }
     }

})

/*
 * Страница География деятельности 
 */

$(document).ready(() => {

     // Открываем pop-up  в мобильной версии

     if (window.innerWidth < 992) {

          $('.geografi-map__circle').on('click', function () {
               $(this).closest('.geografi-map__item').addClass('geografi-map__item-active');
               $('body').addClass('body-fix');
               $('.geografi-bgc').addClass('geografi-bgc-active');
          });

          $('.geografi-bgc').on('click', function () {
               $('.geografi-map__item').removeClass('geografi-map__item-active');
               $('body').removeClass('body-fix');
               $('.geografi-bgc').removeClass('geografi-bgc-active');
          });

          $('.geografi-map__item-close').on('click', function () {
               $(this).closest('.geografi-map__item').removeClass('geografi-map__item-active');
               $('body').removeClass('body-fix');
               $('.geografi-bgc').removeClass('geografi-bgc-active');
          });

     } else {

          $('.geografi-map__item').hover(
               function () {
                    $(this).addClass("geografi-map__item-active");
               }, function () {
                    $(this).removeClass("geografi-map__item-active");
               }
          );

     }

});

/*
 * Мобильная версия 
 */

$(document).ready(() => {

     // Открываем меню

     $('.mobile-btn, .header__btn-mobile-menu').on('click', function () {
          $('.main-mobile').addClass('main-mobile__active');
          $('.bgc-main-mobile-fix').addClass('bgc-main-mobile-fix__active');
          $('body').addClass('body-fix');
     });

     $('.main-mobile__close').on('click', function () {
          $('.main-mobile').removeClass('main-mobile__active');
          $('.bgc-main-mobile-fix').removeClass('bgc-main-mobile-fix__active');
          $('body').removeClass('body-fix');
     });

     $('.bgc-main-mobile-fix').on('click', function () {
          $(this).removeClass('bgc-main-mobile-fix__active');
          $('.main-mobile').removeClass('main-mobile__active');
          $('body').removeClass('body-fix');
     });

     // Кнопка поднятья на верх 

     $('.btn-up').on('click', function (e) {
          e.preventDefault();
     });

     var $page = $('html, body');

     $('a[href*="#"]').click(function () {
          $page.animate({
               scrollTop: $($.attr(this, 'href')).offset().top
          }, 400);
          return false;
     });

});


/*
 * Слайдер на странице компании
 */


$(document).ready(() => {
     const swiper6 = new Swiper('.swiper-company', {
          slidesPerView: 1,
          spaceBetween: 20,

          navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
          },

          autoplay: {
               delay: 5000,
          },
     })
});