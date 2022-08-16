/* eslint-disable func-names */
// eslint-disable-next-line func-names
(function($) {
  const helper = {
    // custom helper function for debounce - how to work see https://codepen.io/Hyubert/pen/abZmXjm
    /**
     * Debounce
     * need for once call function
     *
     * @param { function } - callback function
     * @param { number } - timeout time (ms)
     * @return { function }
     */
    debounce(func, timeout) {
      let timeoutID;
      // eslint-disable-next-line no-param-reassign
      timeout = timeout || 200;
      return function() {
        const scope = this;
        // eslint-disable-next-line prefer-rest-params
        const args = arguments;
        clearTimeout(timeoutID);
        timeoutID = setTimeout(function() {
          func.apply(scope, Array.prototype.slice.call(args));
        }, timeout);
      };
    },
    /**
     * Helper if element exist then call function
     */
    isElementExist(_el, _cb, _argCb) {
      const elem = document.querySelector(_el);
      if (document.body.contains(elem)) {
        try {
          if (arguments.length <= 2) {
            _cb();
          } else {
            _cb(..._argCb);
          }
        } catch (e) {
          // eslint-disable-next-line no-console
          console.log(e);
        }
      }
    },

    /**
     *  viewportCheckerAnimate function
     *
     * @param whatElement - element name
     * @param whatClassAdded - class name if element is in viewport
     * @param classAfterAnimate - class name after element animates
     */
    viewportCheckerAnimate(whatElement, whatClassAdded, classAfterAnimate) {
      jQuery(whatElement)
        .addClass('a-hidden')
        .viewportChecker({
          classToRemove: 'a-hidden',
          classToAdd: `animated ${whatClassAdded}`,
          offset: 10,
          callbackFunction(elem) {
            if (classAfterAnimate) {
              elem.on('animationend', () => {
                elem.addClass('animation-end');
              });
            }
          }
        });
    },
    // helpler windowResize
    windowResize(functName) {
      const self = this;
      $(window).on('resize orientationchange', self.debounce(functName, 200));
    },
    /**
     * Init slick slider only on mobile device
     *
     * @param {DOM} $slider
     * @param {array} option - slick slider option
     */
    mobileSlider($slider, option) {
      if (window.matchMedia('(max-width: 768px)').matches) {
        if (!$slider.hasClass('slick-initialized')) {
          $slider.slick(option);
        }
      } else if ($slider.hasClass('slick-initialized')) {
        $slider.slick('unslick');
      }
    }
  };

  const resource = {
    /**
     * Main init function
     */
    init() {
      this.plugins(); // Init all plugins
      this.bindEvents(); // Bind all events
      this.initAnimations(); // Init all animations
    },

    /**
     * Init External Plugins
     */
    plugins() {
      // eslint-disable-next-line no-undef
      $('img[data-src]').lazyload(); // Init Lazyload from https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js
    },

    /**
     * Bind all events here
     *
     */
    bindEvents() {
      const self = this;
      /** * Run on Document Ready ** */
      $(document).on('ready', function() {
        self.smoothScrollLinks();
        self.scrollNextSection();

        helper.isElementExist('.circle-content', self.circleContent);
        helper.isElementExist('.image-carousel', self.initImageCarousel);
        helper.isElementExist('.service-blocks', self.initServiceBlocks);
      });
      /** * Run on Window Load ** */
      $(window).on('scroll', function() {
        if ($(window).scrollTop() >= 50)
          $('.header').addClass('header--sticky');
        else $('.header').removeClass('header--sticky');
      });
    },

    /**
     * init scroll revealing animations function
     */
    initAnimations() {
      helper.viewportCheckerAnimate('.a-up', 'fadeInUp', true);
      helper.viewportCheckerAnimate('.a-down', 'fadeInDown');
      helper.viewportCheckerAnimate('.a-left', 'fadeInLeft');
      helper.viewportCheckerAnimate('.a-right', 'fadeInRight');
      helper.viewportCheckerAnimate('.a-op', 'fade');
    },

    /**
     * Smooth Scroll link
     */
    smoothScrollLinks() {
      $('a[href^="#"').on('click', function() {
        const target = $(this).attr('href');
        if (target !== '#' && $(target).length > 0) {
          const offset = $(target).offset().top - $('header').outerHeight();
          $('html, body').animate(
            {
              scrollTop: offset
            },
            500
          );
        }
        return false;
      });
    },
    /**
     * Scroll to next section when click "scroll" button
     *
     */
    scrollNextSection() {
      $('.btn-next-section').on('click', function() {
        const $parent = $(this).closest('section');
        const $nextSection = $parent.next();
        $('html, body').animate(
          {
            scrollTop: $nextSection.offset().top
          },
          500
        );
      });
    },
    /**
     * Circle Content
     */
    circleContent() {
      $('.circle').on('click', function() {
        const index = $(this).index();
        if ($(this).hasClass('active')) return;
        $('.circle-content__content.active').removeClass('active');
        $(`.circle-content__content:nth-child(${index + 1})`).addClass(
          'active'
        );
      });
    },
    /**
     * Init image carousel
     */
    initImageCarousel() {
      $('.image-carousel').slick({
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        prevArrow:
          '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
          '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>'
      });
    },
    /**
     * Init service blocks mobile carousel
     */
    initServiceBlocks() {
      const $slider = $('.service-blocks');
      const options = {
        arrows: false,
        dots: false
      };
      helper.mobileSlider($slider, options);
    }
  };

  // Initialize Theme
  resource.init();
})(jQuery);
