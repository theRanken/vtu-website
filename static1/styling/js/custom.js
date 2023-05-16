;
(function($) {
    "use strict";


    // back to top - start
    // --------------------------------------------------
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#backtotop:hidden').stop(true, true).fadeIn();
        } else {
            $('#backtotop').stop(true, true).fadeOut();
        }
    });
    $(function() {
        $("#scroll").on('click', function() {
            $("html,body").animate({
                scrollTop: $("#thetop").offset().top
            }, "slow");
            return false
        })
    });
    // back to top - end
    // --------------------------------------------------


    // tooltip - start
    // --------------------------------------------------
    $('[data-toggle="tooltip"]').tooltip();
    // tooltip - end
    // --------------------------------------------------


    // preloader - start
    // --------------------------------------------------
    /*$(window).on('load', function() {
      $('#ctn-preloader').addClass('loaded');

      if ($('#ctn-preloader').hasClass('loaded')) {
        $('#preloader').delay(1000).queue(function () {
          $(this).remove();
        });
      }
    });*/
    // preloader - end
    // --------------------------------------------------


    // background image - start
    // --------------------------------------------------
    $('[data-background]').each(function() {
        $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
    });
    // background image - end
    // --------------------------------------------------


    // text animation - start
    // --------------------------------------------------
    var $text_effect = $('.text_effect_wrap');
    var $window = $(window);

    function scroll_addclass() {
        var window_height = $(window).height() - 100;
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        $.each($text_effect, function() {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);

            if ((element_bottom_position >= window_top_position) &&
                (element_top_position <= window_bottom_position)) {
                $element.addClass('is_show');
            }
        });
    }

    $window.on('scroll resize', scroll_addclass);
    $window.trigger('scroll');


    var $c_slide_effect = $('.c_slide_in');
    var $window = $(window);

    function c_scroll_addclass() {
        var window_height = $(window).height() - 100;
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        $.each($c_slide_effect, function() {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);

            if ((element_bottom_position >= window_top_position) &&
                (element_top_position <= window_bottom_position)) {
                $element.addClass('is_shown');
            }
        });
    }

    $window.on('scroll resize', c_scroll_addclass);
    $window.trigger('scroll');


    Splitting({
        target: "[data-splitting]",
        by: "chars"
    });
    // text animation - end
    // --------------------------------------------------


    // menu button - start
    // --------------------------------------------------
    $(document).ready(function() {
        $('.close_btn, .overlay').on('click', function() {
            $('#mobile_menu').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('.menu_btn').on('click', function() {
            $('#mobile_menu').addClass('active');
            $('.overlay').addClass('active');
        });
    });

    $('.mobile_menu .dropdown').on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(400);
    });
    $('.mobile_menu .dropdown').on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(500);
    });
    // menu button - end
    // --------------------------------------------------



    // sticky header - start
    // --------------------------------------------------
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 120) {
            $('.sticky_header').addClass("stuck");
            // $(".sticky_header.text-white .brand_link > img").attr("src", "assets/images/logo/logo_2.png");
            // $(".home_app_landing .sticky_header.text-white .brand_link > img").attr("src", "assets/images/logo/logo_7.png");
            // $(".home_payment .sticky_header.text-white .brand_link > img").attr("src", "assets/images/logo/logo_10.png");
        } else {
            $('.sticky_header').removeClass("stuck");
            // $(".sticky_header.text-white .brand_link > img").attr("src", "assets/images/logo/logo_1.png");
            // $(".home_app_landing .sticky_header.text-white .brand_link > img").attr("src", "assets/images/logo/logo_4.png");
            // $(".home_payment .sticky_header.text-white .brand_link > img").attr("src", "assets/images/logo/logo_9.png");
        }
    });
    // sticky header - end
    // --------------------------------------------------


    // sticky header - start
    // --------------------------------------------------
    if ($('.feature_section .tabs_nav > ul > li > a').length > 0) {
        $(".feature_section .tabs_nav > ul > li > a").click(function() {
            var tab_id = $(this).attr("data-tab");
            $(".feature_image_3").removeClass("active");
            $("#" + tab_id).addClass("active");
        });
    };
    // sticky header - end
    // --------------------------------------------------


    // magnific popup - start
    // --------------------------------------------------
    $('.popup_video').magnificPopup({
        // disableOn: 700,
        type: 'iframe',
        preloader: false,
        removalDelay: 160,
        fixedContentPos: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile'
    });

    $('.zoom-gallery').magnificPopup({
        delegate: '.popup_image',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        /*image: {
          verticalFit: true,
          titleSrc: function(item) {
            return item.el.attr('title') + ' &middot; <a class="popup_image" href="'+item.el.attr('data-source')+'"></a>';
          }
        },*/
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function(element) {
                return element.find('img');
            }
        }
    });

    if ($(".popup_image").length) {
        $(".popup_image").each(function() {
            $(".popup_image").magnificPopup({
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                removalDelay: 300,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1]
                }
            });
        })
    }
    // magnific popup - end
    // --------------------------------------------------


    // magnific popup - start
    // --------------------------------------------------
    $(".tab_btn").on("click", function() {
        $(".tab_switcher, .pricing_tab").toggleClass("active"),
            $(".amount").toggleClass("change_amount")
    });
    $(".tab_switcher").on("click", function() {
        $(this).toggleClass("active"),
            $(".pricing_tab").toggleClass("active"),
            $(".amount").toggleClass("change_amount")
    });
    // magnific popup - end
    // --------------------------------------------------


    // masoney grid layout - start
    // --------------------------------------------------
    var $grid = $('.grid').imagesLoaded(function() {
        $grid.masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer'
        });
    });
    // masoney grid layout - end
    // --------------------------------------------------


    // masoney - start
    // --------------------------------------------------
    var $element_grid = $(".element_grid").isotope({
        itemSelector: ".element-item",
        layoutMode: "fitRows"
    });
    var filterFns = {
        numberGreaterThan50: function() {
            var number = $(this)
                .find(".number")
                .text();
            return parseInt(number, 10) > 50;
        },
        ium: function() {
            var name = $(this)
                .find(".name")
                .text();
            return name.match(/ium$/);
        }
    };
    $(".filter-btns-group").on("click", "button", function() {
        var filterValue = $(this).attr("data-filter");
        filterValue = filterFns[filterValue] || filterValue;
        $element_grid.isotope({
            filter: filterValue
        });
    });
    $(".button-group").each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on("click", "button", function() {
            $buttonGroup.find(".active").removeClass("active");
            $(this).addClass("active");
        });
    });

    function portfolioMasonry() {
        var portfolio = $(".masonry_portfolio");
        if (portfolio.length) {
            portfolio.imagesLoaded(function() {
                portfolio.isotope({
                    itemSelector: ".element-item",
                    layoutMode: 'masonry',
                    filter: "*",
                    animationOptions: {
                        duration: 1000
                    },
                    transitionDuration: '0.5s',
                    masonry: {

                    }
                });

                $(".filter-btns-group > ul > li > button").on('click', function() {
                    $(".filter-btns-group > ul > li > button").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr("data-filter");
                    portfolio.isotope({
                        filter: selector,
                        animationOptions: {
                            animationDuration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    })
                    return false;
                })
            });
        }
    }
    portfolioMasonry();
    // masoney - end
    // --------------------------------------------------


    // cart quantity - start
    // --------------------------------------------------
    $('.item_increase').on('click', function() {
        var getID = $(this).next().attr('id');
        var result = document.getElementById(getID);
        var qty = result.value;
        $('.quantity_input').removeAttr('disabled');
        if (!isNaN(qty)) {
            result.value++;
        } else {
            return false;
        }
    });
    $('.item_decrease').on('click', function() {
        var getID = $(this).prev().attr('id');
        var result = document.getElementById(getID);
        var qty = result.value;
        $('.quantity_input').removeAttr('disabled');
        if (!isNaN(qty) && qty > 0) {
            result.value--;
        } else {
            return false;
        }
    });
    // cart quantity - end
    // --------------------------------------------------


    // for wp side menu - start
    // --------------------------------------------------
    // if($('.mobile_menu_dropdown .dropdown .dropdown-menu').length){
    //   $('.mobile_menu_dropdown .dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
    //   $('.mobile_menu_dropdown .dropdown .dropdown-btn').on('click', function() {
    //     $(this).prev('.dropdown-menu').slideToggle(500);
    //   });
    // }


    $('.dropdown > a').addClass('dropdown-toggle');
    $('.dropdown-menu .dropdown > a').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');
        $(this).parents('li.dropdown.show').on('.dropdown', function(e) {
            $('.dropdown-menu > .dropdown .show').removeClass("show");
        });
        $('.dropdown-menu li a.dropdown-toggle').removeClass("show_dropdown");
        if ($(this).next().hasClass('show')) {
            $(this).addClass("show_dropdown");
        }
        return false;
    });
    // for wp side menu - end
    // --------------------------------------------------


    // service carousel - start
    // --------------------------------------------------
    $('#service_carousel').owlCarousel({
        nav: true,
        margin: 30,
        loop: true,
        dots: false,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            767: {
                items: 2
            },
            1000: {
                items: 3
            },
            1560: {
                items: 3
            },
            1920: {
                items: 4
            }
        }
    });
    // service carousel - end
    // --------------------------------------------------


    // shop carousel - start
    // --------------------------------------------------
    $('#shop_carousel').owlCarousel({
        nav: true,
        margin: 30,
        loop: true,
        dots: false,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            580: {
                items: 2
            },
            767: {
                items: 3
            },
            991: {
                items: 3
            },
            1000: {
                items: 4
            },
            1560: {
                items: 4
            },
            1920: {
                items: 4
            }
        }
    });
    // shop carousel - end
    // --------------------------------------------------


    // testimonial carousel 1 - start
    // --------------------------------------------------
    $('#testimonial_carousel_1').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        margin: 30,
        // autoplay:true,
        smartSpeed: 1000,
        autoplayTimeout: 6000,
        autoplayHoverPause: false
    });

    $('#testimonial_carousel_2').owlCarousel({
        nav: true,
        margin: 0,
        loop: true,
        dots: false,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            880: {
                items: 2
            },
            991: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
    // testimonial carousel 1 - end
    // --------------------------------------------------


    // casestudy carousel - start
    // --------------------------------------------------
    $('#casestudy_carousel').owlCarousel({
        margin: 0,
        loop: true,
        nav: false,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            580: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });
    // casestudy carousel - end
    // --------------------------------------------------


    // details images carousel - start
    // --------------------------------------------------
    $('.details_images_carousel').owlCarousel({
        items: 1,
        nav: true,
        loop: true,
        margin: 15,
        dots: false,
        smartSpeed: 1000
    });
    // details images carousel - end
    // --------------------------------------------------


    // testimonial carousel 1 - start
    // --------------------------------------------------
    function appScreenshot() {
        if ($('.appScreenshot').length) {
            var swiper = new Swiper('.appScreenshot', {
                effect: 'coverflow',
                loop: true,
                centeredSlides: true,
                slidesPerView: 4,
                initialSlide: 1,
                keyboardControl: true,
                mousewheelControl: false,
                lazyLoading: true,
                preventClicks: false,
                preventClicksPropagation: false,
                lazyLoadingInPrevNext: true,
                nextButton: '.swiper-next',
                prevButton: '.swiper-prev',
                coverflow: {
                    rotate: 0,
                    stretch: -38,
                    depth: 170,
                    modifier: 1,
                    slideShadows: false
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 4,
                        spaceBetween: 0,
                    },
                    991: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    400: {
                        slidesPerView: 1,
                    }
                }
            });
        }
    }
    appScreenshot();
    // testimonial carousel 1 - end
    // --------------------------------------------------


    // google map - start
    // --------------------------------------------------
    function isMobile() {
        return ('ontouchstart' in document.documentElement);
    }

    function init_gmap() {
        if (typeof google == 'undefined') return;
        var options = {
            center: [1.2960841, 103.8458455],
            zoom: 14,
            styles: [{
                    elementType: 'geometry',
                    stylers: [{
                        color: '#eaeaea'
                    }]
                },
                {
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#ffffff'
                    }]
                },
                {
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '$pure-black'
                    }]
                },
                {
                    featureType: 'administrative.locality',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#d59563'
                    }]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#61605e'
                    }]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#cbe99f'
                    }]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#98786d'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#ffffff'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#ffffff'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#39c2f8'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#fedd96'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#eeca83'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#965c28'
                    }]
                },
                {
                    featureType: 'transit',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#fef5b6'
                    }]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#f1e0ca'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#a1cafe'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '$pure-black'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#ffffff'
                    }]
                }
            ],
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            navigationControl: true,
            scrollwheel: false,
            streetViewControl: true,
        }

        if (isMobile()) {
            options.draggable = false;
        }

        $('#google-map').gmap3({
            map: {
                options: options
            },
            marker: {
                latLng: [1.2960841, 103.8458455],
                // options: { icon: 'assets/img/map.png' }
            }
        });
    }
    init_gmap();
    // google map - end
    // --------------------------------------------------


    // scroll animation - start
    // --------------------------------------------------
    AOS.init({
        // disable: function() {
        //   var maxWidth = 769;
        //   return window.innerWidth < maxWidth;
        // }
        once: true,
        duration: 800,
    });
    // scroll animation - end
    // --------------------------------------------------


    // parallax - start
    // --------------------------------------------------
    if ($('.scene,.scene_1,.scene_2,.scene_3,.scene_4,.scene_5').length > 0) {
        $('.scene,.scene_1,.scene_2,.scene_3,.scene_4,.scene_5').parallax({
            scalarX: 10.0,
            scalarY: 10.0,
        });
    }
    // parallax - end
    // --------------------------------------------------


})(jQuery)