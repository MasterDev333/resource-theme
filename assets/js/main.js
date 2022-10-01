/* eslint-disable no-undef */
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
        self.initHeader();

        helper.isElementExist('.cursor', self.initCursor);
        helper.isElementExist('.circle-content', self.circleContent);
        helper.isElementExist('.image-carousel', self.initImageCarousel);
        helper.isElementExist('.service-blocks', self.initServiceBlocks);
        helper.isElementExist('.team-carousel', self.initTeamCarousel);
        helper.isElementExist('.lottie-play', self.initLottiePlay);
        helper.isElementExist('.cpt-grid', self.initCPTGrid);
        helper.isElementExist('.jobs-slider', self.initJobSlider);
        helper.isElementExist('.sector-details', self.initSectorDetails);
        helper.isElementExist('.acf-map', self.initACFMap);
        helper.isElementExist('.privacy-links', self.initPrivacy);
        helper.isElementExist('.tab', self.initTab);
        helper.isElementExist('.section-cta', self.initGlobalCTA);
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
      $('a[href^="#"]:not(.tab-link)').on('click touchstart', function() {
        const target = $(this).attr('href');
        if (target !== '#' && $(target).length > 0) {
          const offset =
            $(target).offset().top - $('header').outerHeight() - 50;
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
     * Init Header
     */
    initHeader() {
      $('.hamburger').on('click', function() {
        $(this).toggleClass('active');
        $('.header-mobile').slideToggle('medium', function() {
          if ($(this).is(':visible')) $(this).css('display', 'flex');
        });
      });
    },
    /**
     * Init Cursor
     */
    initCursor() {
      const cursor = {
        delay: 8,
        _x: 0,
        _y: 0,
        endX: window.innerWidth / 2,
        endY: window.innerHeight / 2,
        cursorVisible: true,
        cursorEnlarged: false,
        $dot: document.querySelector('.cursor-dot'),
        $outline: document.querySelector('.cursor-dot-outline'),

        init() {
          // Set up element sizes
          this.dotSize = this.$dot.offsetWidth;
          this.outlineSize = this.$outline.offsetWidth;

          this.setupEventListeners();
          this.animateDotOutline();
        },

        //     updateCursor: function(e) {
        //         var self = this;

        //         console.log(e)

        //         // Show the cursor
        //         self.cursorVisible = true;
        //         self.toggleCursorVisibility();

        //         // Position the dot
        //         self.endX = e.pageX;
        //         self.endY = e.pageY;
        //         self.$dot.style.top = self.endY + 'px';
        //         self.$dot.style.left = self.endX + 'px';
        //     },

        setupEventListeners() {
          const self = this;

          // Click events
          document.addEventListener('mousedown', function() {
            self.cursorEnlarged = true;
            self.toggleCursorSize();
          });
          document.addEventListener('mouseup', function() {
            self.cursorEnlarged = false;
            self.toggleCursorSize();
          });

          document.addEventListener('mousemove', function(e) {
            // Show the cursor
            self.cursorVisible = true;
            self.toggleCursorVisibility();
            if (e.target.tagName.toLowerCase() != 'a') {
              self.changeColor(e);
            }

            // Position the dot
            self.endX = e.pageX;
            self.endY = e.pageY;
            self.$dot.style.top = `${self.endY}px`;
            self.$dot.style.left = `${self.endX}px`;
          });

          // Hide/show cursor
          document.addEventListener('mouseenter', function(e) {
            self.cursorVisible = true;
            self.toggleCursorVisibility();
            self.$dot.style.opacity = 1;
            self.$outline.style.opacity = 1;
          });

          document.addEventListener('mouseleave', function(e) {
            self.cursorVisible = true;
            self.toggleCursorVisibility();
            self.$dot.style.opacity = 0;
            self.$outline.style.opacity = 0;
          });

          // Anchor hovering
          document.querySelectorAll('a, btn').forEach(function(el) {
            el.addEventListener('mouseover', function() {
              self.cursorEnlarged = true;
              self.toggleCursorSize();
              if (
                this.classList.contains('btn-green') ||
                $(this).closest('.menu-item').length
              ) {
                self.$dot.style.backgroundColor = '#f0f';
                self.$outline.style.backgroundColor = 'rgba(255, 0, 255, 0.5)';
              }
            });
            el.addEventListener('mouseout', function() {
              self.cursorEnlarged = false;
              self.toggleCursorSize();
              if (
                this.classList.contains('btn-green') ||
                $(this).closest('.menu-item').length
              ) {
                self.$dot.style.backgroundColor = '#59ff96';
                self.$outline.style.backgroundColor = 'rgba(89,255,150,.5)';
              }
            });
          });
        },

        animateDotOutline() {
          const self = this;

          self._x += (self.endX - self._x) / self.delay;
          self._y += (self.endY - self._y) / self.delay;
          self.$outline.style.top = `${self._y}px`;
          self.$outline.style.left = `${self._x}px`;

          requestAnimationFrame(this.animateDotOutline.bind(self));
        },

        toggleCursorSize() {
          const self = this;

          if (self.cursorEnlarged) {
            self.$dot.style.transform = 'translate(-50%, -50%) scale(0.75)';
            self.$outline.style.transform = 'translate(-50%, -50%) scale(1.5)';
          } else {
            self.$dot.style.transform = 'translate(-50%, -50%) scale(1)';
            self.$outline.style.transform = 'translate(-50%, -50%) scale(1)';
          }
        },

        toggleCursorVisibility() {
          const self = this;

          if (self.cursorVisible) {
            self.$dot.style.opacity = 1;
            self.$outline.style.opacity = 1;
          } else {
            self.$dot.style.opacity = 0;
            self.$outline.style.opacity = 0;
          }
        },

        changeColor(e) {
          const self = this;
          const $section = $(e.target).closest('section');
          const bgColor = $section.css('background-color');
          if (bgColor == 'rgb(89, 255, 150)') {
            self.$dot.style.backgroundColor = '#f0f';
            self.$outline.style.backgroundColor = 'rgba(255, 0, 255, 0.5)';
          } else {
            self.$dot.style.backgroundColor = '#59ff96';
            self.$outline.style.backgroundColor = 'rgba(89,255,150,.5)';
          }
        }
      };

      cursor.init();
    },
    /**
     * Circle Content
     */
    circleContent() {
      $('.circle').on('click touchstart', function() {
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
      helper.windowResize(resource.initServiceBlocks);
    },
    /**
     * Init team carousel
     */
    initTeamCarousel() {
      // Init Team carousel
      $('.team-carousel').slick({
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 3000,
        variableWidth: true,
        prevArrow:
          '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
          '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
          {
            breakpoint: 769,
            settings: {
              arrows: false
            }
          }
        ]
      });

      // Show information when click person image
      $('.team-image').on('click', function() {
        const id = $(this).attr('data-id');
        const $parent = $(this).closest('.team-slider');
        const $info = $('.person-info', $parent);
        if ($(this).hasClass('active')) {
          $(this).removeClass('active');
          $info.html('');
          $info.hide();
        } else {
          $('.team-image.active').removeClass('active');
          $.ajax({
            // eslint-disable-next-line no-undef
            url: ajaxurl, // ajaxurl comes from extras.php
            type: 'POST',
            data: {
              action: 'ajax_person_info',
              id
            },
            beforeSend() {},
            success(res) {
              const json = $.parseJSON(res);
              $info.html(json.output);
              $info.show();
            },
            complete() {}
          });
          $(this).addClass('active');
        }
      });
    },

    /**
     * Play lottie when only visible
     */
    initLottiePlay() {
      $('.lottie-play').viewportChecker({
        classToAdd: 'is-active',
        callbackFunction: element => {
          const name = $(element).attr('data-name');
          // eslint-disable-next-line no-undef
          bodymovin.play(name);
        }
      });
    },
    /**
     * Init Jobs Grid
     *
     */
    initCPTGrid() {
      const $grid = $('.cpt-grid');
      const $pagination = $('.pagination');
      /**
       * Get posts via ajax
       *
       */
      function ajaxPosts() {
        const cat = $grid.attr('data-filter');
        const paged = $grid.attr('data-paged');
        const type = $grid.attr('data-type');
        const postsPerPage = $grid.attr('data-posts-per-page');
        $.ajax({
          // eslint-disable-next-line no-undef
          url: ajaxurl,
          type: 'POST',
          data: {
            action: 'ajax_posts',
            type,
            cat,
            paged,
            posts_per_page: postsPerPage
          },
          beforeSend() {
            $grid.html(
              '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
            );
          },
          success(res) {
            const json = $.parseJSON(res);
            $('.lds-roller').remove();
            $grid.html(json.output);
            $pagination.html(json.pagination);
            $grid.attr('data-paged', json.paged);
          },
          complete() {}
        });
      }

      $('.btn-job-filter').on('click', function() {
        if ($(this).hasClass('active')) return;
        const filter = $(this).attr('data-filter');
        $grid.attr('data-filter', filter);
        $('.btn-job-filter.active').removeClass('active');
        $(this).addClass('active');
        ajaxPosts();
      });
    },
    /**
     * Init job slider
     */
    initJobSlider() {
      const options = {
        arrows: false,
        dots: false,
        variableWidth: true
      };
      const $slider = $('.jobs-slider');
      helper.mobileSlider($slider, options);
      helper.windowResize(resource.initJobSlider);
    },

    /**
     * Init Sector Details
     */
    initSectorDetails() {
      $('.sector-details__logo').on('click', function() {
        const $parent = $(this).closest('.sector-details');
        const index = $(this).index();
        const $slider = $('.image-carousel', $parent);
        if ($slider.length) {
          $slider.slick('slickGoTo', index);
        }
      });
    },

    /**
     * Init ACF Maps
     *
     */
    initACFMap() {
      /**
       * initMarker
       *
       * Creates a marker for the given element and map.
       *
       * @date    22/10/19
       * @since   5.8.6
       *
       * @param   element.
       * @param   object The map instance.
       * @return  object The marker instance.
       */
      function initMarker(marker, map) {
        // Get position from marker.
        const { lat } = marker.dataset;
        const { lng } = marker.dataset;
        const latLng = {
          lat: parseFloat(lat),
          lng: parseFloat(lng)
        };

        // Create marker instance.
        const svgMarker = {
          path:
            'M6.88147 20.9998C6.88147 20.9998 1.74239 12.1391 0.645323 9.79493C0.231267 8.91019 0 7.92287 0 6.88156C0 3.08099 3.08083 0 6.88156 0C10.682 0 13.7631 3.08083 13.7631 6.88156C13.7631 7.92304 13.5317 8.91065 13.1175 9.7956C12.0201 12.1393 6.88172 21 6.88172 21L6.88147 20.9998ZM6.88147 9.74868C8.46495 9.74868 9.74859 8.46499 9.74859 6.88156C9.74859 5.29792 8.46491 4.01427 6.88147 4.01427C5.29783 4.01427 4.01419 5.29796 4.01419 6.88156C4.01419 8.46503 5.29787 9.74868 6.88147 9.74868Z',
          fillColor: '#7026b2',
          fillOpacity: 1,
          strokeWeight: 0,
          rotation: 0,
          scale: 2,
          anchor: new google.maps.Point(15, 30)
        };

        const mapMarker = new google.maps.Marker({
          position: latLng,
          map,
          icon: svgMarker
        });

        // Append to reference for later use.
        map.markers.push(mapMarker);

        // If marker contains HTML, add it to an infoWindow.
        if (marker.innerHTML) {
          // Create info window.
          const infowindow = new google.maps.InfoWindow({
            content: marker.innerHTML
          });

          // Show info window when marker is clicked.
          google.maps.event.addListener(mapMarker, 'click', function() {
            infowindow.open(map, mapMarker);
          });
        }
      }

      /**
       * centerMap
       *
       * Centers the map showing all markers in view.
       *
       * @date    22/10/19
       * @since   5.8.6
       *
       * @param   object The map instance.
       * @return  void
       */
      function centerMap(map) {
        // Create map boundaries from all map markers.
        const bounds = new google.maps.LatLngBounds();
        map.markers.forEach(function(marker) {
          bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
          });
        });

        // Case: Single marker.
        if (map.markers.length === 1) {
          map.setCenter(bounds.getCenter());

          // Case: Multiple markers.
        } else {
          map.fitBounds(bounds);
        }
      }

      /**
       * initMap
       *
       * Renders a Google Map onto the selected element
       *
       * @date    22/10/19
       * @since   5.8.6
       *
       * @param   element
       * @return  object The map instance.
       */
      function initMap(element) {
        // Find marker elements within map.
        const markers = element.querySelectorAll('.marker');

        // Create gerenic map.
        const mapArgs = {
          // eslint-disable-next-line radix
          zoom: parseInt(element.dataset.zoom) || 16,
          // eslint-disable-next-line no-undef
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          // styles: [
          //   {
          //     featureType: 'all',
          //     elementType: 'labels.text.fill',
          //     stylers: [
          //       {
          //         saturation: 36
          //       },
          //       {
          //         color: '#000000'
          //       },
          //       {
          //         lightness: 40
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'all',
          //     elementType: 'labels.text.stroke',
          //     stylers: [
          //       {
          //         visibility: 'on'
          //       },
          //       {
          //         color: '#000000'
          //       },
          //       {
          //         lightness: 16
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'all',
          //     elementType: 'labels.icon',
          //     stylers: [
          //       {
          //         visibility: 'off'
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'administrative',
          //     elementType: 'geometry.fill',
          //     stylers: [
          //       {
          //         lightness: 20
          //       },
          //       {
          //         color: '#ff0000'
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'administrative',
          //     elementType: 'geometry.stroke',
          //     stylers: [
          //       {
          //         lightness: 17
          //       },
          //       {
          //         weight: 1.2
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'administrative',
          //     elementType: 'labels.text.fill',
          //     stylers: [
          //       {
          //         color: '#59ff96'
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'landscape',
          //     elementType: 'geometry',
          //     stylers: [
          //       {
          //         lightness: 20
          //       },
          //       {
          //         color: '#333333'
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'poi',
          //     elementType: 'geometry',
          //     stylers: [
          //       {
          //         color: '#000000'
          //       },
          //       {
          //         lightness: 21
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'road.highway',
          //     elementType: 'geometry.fill',
          //     stylers: [
          //       {
          //         lightness: 17
          //       },
          //       {
          //         color: '#59ff96'
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'road.highway',
          //     elementType: 'geometry.stroke',
          //     stylers: [
          //       {
          //         color: '#000000'
          //       },
          //       {
          //         lightness: 29
          //       },
          //       {
          //         weight: 0.2
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'road.arterial',
          //     elementType: 'geometry',
          //     stylers: [
          //       {
          //         color: '#000000'
          //       },
          //       {
          //         lightness: 18
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'road.local',
          //     elementType: 'geometry',
          //     stylers: [
          //       {
          //         color: '#000000'
          //       },
          //       {
          //         lightness: 16
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'transit',
          //     elementType: 'geometry',
          //     stylers: [
          //       {
          //         color: '#000000'
          //       },
          //       {
          //         lightness: 19
          //       }
          //     ]
          //   },
          //   {
          //     featureType: 'water',
          //     elementType: 'geometry',
          //     stylers: [
          //       {
          //         color: '#000000'
          //       },
          //       {
          //         lightness: 17
          //       }
          //     ]
          //   }
          // ],
          mapTypeControl: false,
          zoomControl: false,
          scaleControl: false,
          streetViewControl: false,
          fullscreenControl: false
        };
        // eslint-disable-next-line no-undef
        const map = new google.maps.Map(element, mapArgs);

        // Add markers.
        map.markers = [];
        markers.forEach(function(marker) {
          initMarker(marker, map);
        });

        // Center map based on markers.
        centerMap(map);

        // Return map instance.
        return map;
      }

      // Render maps on page load.
      document.querySelectorAll('.acf-map').forEach(map => {
        initMap(map);
      });
    },
    /**
     * Init Privacy policy
     */
    initPrivacy() {
      // Active anchor links on scroll
      window.onscroll = () => {
        let current = '';
        const sections = document.querySelectorAll('.privacy-block');
        const navLinks = document.querySelectorAll('.privacy-link');
        sections.forEach(section => {
          const sectionTop = section.offsetTop - 50;
          if (pageYOffset >= sectionTop) {
            current = section.getAttribute('id');
          }
        });
        navLinks.forEach(link => {
          link.classList.remove('active');
          if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
          }
        });
      };
      // Accordion
      if (window.matchMedia('(max-width: 768px)').matches) {
        $('.privacy-block__heading').on('click', function() {
          const $parent = $(this).closest('.privacy-block');
          $(this).toggleClass('active');
          $('.privacy-block__content', $parent).slideToggle();
        });
      }
    },
    /**
     * Init Tab
     */
    initTab() {
      $('.tab-link').on('click', function() {
        if ($(this).hasClass('active')) return;
        const target = $(this).attr('href');
        $('.tab-link.active').removeClass('active');
        $('.tab-content.active').removeClass('active');
        $(this).addClass('active');
        $(target).addClass('active');
        return false;
      });
    },
    /**
     * Init Global CTA section
     */
    initGlobalCTA() {
      if ($('.section-cta__image img').length) {
        $('.section-cta__image').slick({
          arrows: false,
          dots: false,
          autoplay: true,
          autoplaySpeed: 3000
        });
      }
    }
  };

  // Initialize Theme
  resource.init();
})(jQuery);
