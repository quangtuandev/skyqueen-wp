jQuery(function ($) {

    if ($('body').hasClass("home")) {
        new Swiper(".swiper-testimonials", {
            slidesPerView: 1,
            spaceBetween: 30,
            autoHeight: true,
            breakpoints: {
                1200: {
                    autoHeight: false,
                    slidesPerView: 2,
                    spaceBetween: 20
                },
            },
        });
        new Swiper(".swiper-news", {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
            breakpoints: {
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
            }
        });

        new Swiper(".swiper-about", {
            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: ".about-button-next",
                prevEl: ".about-button-prev",
            },
        });
    }
    function isEmpty(el) {
        return !$.trim(el.html())
    }

    // Header search
    $('.search__btn').on("click", function (e) {
        $('.search__form').toggleClass("active");
    });
    $('.header__search--click').click(function (e) {
        e.stopPropagation();
    });
    $(document).click(function (e) {
        if ($('.search__form').hasClass('active')) $('.search__form').removeClass('active');
    });

    // Sticky navbar
    // =========================

    // Custom function which toggles between sticky class (is-sticky)
    var stickyToggle = function (sticky, stickyWrapper, scrollElement, stickyHeight) {
        var stickyTop = stickyWrapper.offset().top;
        var scrollTop = scrollElement.scrollTop();
        var triggerSticky = false;

        if ($('body').hasClass('home')) {
            var threshold = window.innerHeight - 100;
            triggerSticky = (scrollTop >= threshold);
        } else {
            triggerSticky = (scrollTop >= stickyTop && scrollTop > 0);
        }

        if (triggerSticky) {
            stickyWrapper.height(stickyHeight);
            sticky.addClass("is-sticky");
        }
        else {
            sticky.removeClass("is-sticky");
            stickyWrapper.height('auto');
        }
    };
    $('[data-toggle="sticky-onscroll"]').each(function () {
        var sticky = $(this);
        var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
        sticky.before(stickyWrapper);
        sticky.addClass('sticky');
        var stickyHeight = sticky.outerHeight();
        // Scroll & resize events
        $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
            stickyToggle(sticky, stickyWrapper, $(this), stickyHeight);
        });

        // On page load
        stickyToggle(sticky, stickyWrapper, $(window), stickyHeight);
        // Check scroll top
        var winSt_t = 0;
        $(window).scroll(function () {
            var winSt = $(window).scrollTop();
            if (winSt >= winSt_t) {
                sticky.removeClass("top_show")
            } else {
                sticky.addClass("top_show")
            }
            winSt_t = winSt
        });
    });

    // Initialize WOW.js animations
    if (typeof WOW !== 'undefined') {
        new WOW().init();
    }

    //-------------------------------------------------
    // Header Search
    //-------------------------------------------------
    var $headerSearchToggle = $('.header__search--toggle');
    var $headerSearchForm = $('.header__search__form');

    $headerSearchToggle.on('click', function () {
        var $this = $(this);
        var $header = $(this).closest('.header__search');

        if (!$header.hasClass('open-search')) {
            $header.addClass('open-search');
            $headerSearchForm.slideDown();
        } else {
            $header.removeClass('open-search');
            $headerSearchForm.slideUp();
        }
    });


    /*----Back to top---*/
    var back_to_top = $(".back-to-top"), offset = 220, duration = 500; $(window).scroll(function () { $(this).scrollTop() > offset ? back_to_top.addClass("active") : back_to_top.removeClass("active") }), $(document).on("click", ".back-to-top", function (o) { return o.preventDefault(), $("html, body").animate({ scrollTop: 0 }, duration), !1 });

    //-------------------------------------------------
    // Menu
    //-------------------------------------------------
    $.fn.dnmenu = function (options) {

        let thiz = this
        let menu = $(this).attr('id')
        let menu_id = '#' + menu
        var button = $('a[href="#' + menu + '"]')

        // Default options
        var settings = $.extend({
            name: 'John Doe'
        }, options);

        // get ScrollBar Width
        function getScrollBarWidth() {
            var $outer = $('<div>').css({ visibility: 'hidden', width: 100, overflow: 'scroll' }).appendTo('body'),
                widthWithScroll = $('<div>').css({ width: '100%' }).appendTo($outer).outerWidth();
            $outer.remove();
            return 100 - widthWithScroll;
        };
        let ScrollBarWidth = getScrollBarWidth() + 'px';

        // Create wrap
        // Button click
        button.click(function (e) {
            e.preventDefault()
            console.log(button)
            if (button.hasClass('active')) {
                // $('.dnmenu-backdrop').remove()
                $('body').removeClass('modal-open').css("padding-right", "")
                button.removeClass('active')
                $(menu_id).removeClass('active')

            } else {
                // $('<div class="dnmenu-backdrop">').appendTo('body')
                $('body').addClass('modal-open').css("padding-right", ScrollBarWidth)
                button.addClass('active')
                $(menu_id).addClass('active')

            }
        });

        // Custom close
        // $('.nav__mobile__close').click(function(){
        //     $('body').removeClass('modal-open')
        //     $(this).removeClass('active')
        //     $(menu_id).removeClass('active')
        // })

        // Close menu
        $('body').on("click", ".dnmenu-backdrop", function () {
            $('.dnmenu-backdrop').remove()
            button.removeClass('active')
            $(menu_id).removeClass('active')
        });
        // Menu
        var el = $(thiz).find(".nav__mobile--ul");
        el.find(".menu-item-has-children>a").after('<button class="nav__mobile__btn"><i></i></button>'),

            el.find(".nav__mobile__btn").on("click", function (e) {
                e.stopPropagation(),
                    $(this).parent().find('.sub-menu').first().is(":visible") ? $(this).parent().removeClass("sub-active") :
                        $(this).parent().addClass("sub-active"),
                    $(this).parent().find('.sub-menu').first().slideToggle()
            })

        // Apply options
        return;
    };
    $('#menu__mobile').dnmenu()

    // Dynamic stats counter animation using IntersectionObserver
    if ('IntersectionObserver' in window) {
        var counterObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var $this = $(entry.target);
                    var countTo = parseInt($this.attr('data-count'), 10);
                    $({ countNum: 0 }).animate({
                        countNum: countTo
                    }, {
                        duration: 5000,
                        easing: 'swing',
                        step: function () {
                            $this.html(Math.floor(this.countNum) + '<sup>+</sup>');
                        },
                        complete: function () {
                            $this.html(countTo + '<sup>+</sup>');
                        }
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        $('.stat-number').each(function () {
            counterObserver.observe(this);
        });
    } else {
        // Fallback for older browsers
        $('.stat-number').each(function () {
            var $this = $(this);
            $this.html($this.attr('data-count') + '<sup>+</sup>');
        });
    }

    // Solution cards interactive active state
    $('.solutions-grid').on('mouseenter', '.solution-card', function() {
        $('.solutions-grid .solution-card').removeClass('active');
        $(this).addClass('active');
    });

    $('.home-solutions').on('mouseleave', function() {
        $('.solutions-grid .solution-card').removeClass('active');
        $('.solutions-grid .solution-card').first().addClass('active');
    });

    // Initialize Swiper for Services Section
    var servicesSwiper;
    if ($('.swiper-services').length > 0) {
        servicesSwiper = new Swiper(".swiper-services", {
            direction: "vertical",
            slidesPerView: "auto",
            spaceBetween: 0,
            // loop: true,
            // autoplay: {
            //     delay: 2000,
            //     disableOnInteraction: false,
            //     pauseOnMouseEnter: true,
            //     waitForTransition: false,
            // },
            mousewheel: {
                forceToAxis: true,
                releaseOnEdges: true
            },
            pagination: {
                el: ".swiper-services-pagination",
                clickable: true
            },
            observer: true,
            observeParents: true
        });
    }

    // Services vertical accordion dynamic switcher
    function switchServiceIllustration($item) {
        if ($item.hasClass('active')) return;

        var slideIndex = parseInt($item.attr('data-index'), 10);

        // Remove active class from all items (including duplicates)
        $('.swiper-services .services-accordion-item').removeClass('active');

        // Add active class to all slides sharing the same data-index (original + duplicate clones)
        $('.swiper-services .services-accordion-item').filter(function() {
            return parseInt($(this).attr('data-index'), 10) === slideIndex;
        }).addClass('active');

        // Force Swiper update so it recalculates slide heights instantly
        if (servicesSwiper && typeof servicesSwiper.update === 'function') {
            servicesSwiper.update();
        }

        // Sync Swiper to slide to the active item index (loop-aware)
        if (servicesSwiper && typeof servicesSwiper.slideToLoop === 'function') {
            servicesSwiper.slideToLoop(slideIndex);
        }

        var newImage = $item.attr('data-image');
        var themeUri = window.themeUri || '/wp-content/themes/skyqueen';
        var newSrc = themeUri + '/assets/v2/services/' + newImage;

        var $illustration = $('#service-illustration');
        $illustration.addClass('fade-out');

        setTimeout(function() {
            $illustration.attr('src', newSrc).removeClass('fade-out');
        }, 150);
    }

    // Trigger on hover or click of an accordion item
    $('.swiper-services').on('click', '.services-accordion-item', function() {
        switchServiceIllustration($(this));
    });

    // Trigger on Swiper slide change (e.g. mousewheel scroll or bullet click)
    if (servicesSwiper) {
        servicesSwiper.on('slideChange', function() {
            var realIdx = servicesSwiper.realIndex;
            var $activeSlide = $('.swiper-services .services-accordion-item').filter(function() {
                return parseInt($(this).attr('data-index'), 10) === realIdx;
            }).first();
            switchServiceIllustration($activeSlide);
        });
    }

});
