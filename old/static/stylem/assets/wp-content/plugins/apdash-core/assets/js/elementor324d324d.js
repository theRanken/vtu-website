/*!
 * The Final Countdown for jQuery v2.1.0 (http://hilios.github.io/jQuery.countdown/)
 * Copyright (c) 2015 Edson Hilios
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
(function(factory) {
    "use strict";
    if (typeof define === "function" && define.amd) {
        define([ "jquery" ], factory);
    } else {
        factory(jQuery);
    }
})(function($) {
    "use strict";
    var instances = [], matchers = [], defaultOptions = {
        precision: 100,
        elapse: false
    };
    matchers.push(/^[0-9]*$/.source);
    matchers.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source);
    matchers.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source);
    matchers = new RegExp(matchers.join("|"));
    function parseDateString(dateString) {
        if (dateString instanceof Date) {
            return dateString;
        }
        if (String(dateString).match(matchers)) {
            if (String(dateString).match(/^[0-9]*$/)) {
                dateString = Number(dateString);
            }
            if (String(dateString).match(/\-/)) {
                dateString = String(dateString).replace(/\-/g, "/");
            }
            return new Date(dateString);
        } else {
            throw new Error("Couldn't cast `" + dateString + "` to a date object.");
        }
    }
    var DIRECTIVE_KEY_MAP = {
        Y: "years",
        m: "months",
        n: "daysToMonth",
        w: "weeks",
        d: "daysToWeek",
        D: "totalDays",
        H: "hours",
        M: "minutes",
        S: "seconds"
    };
    function escapedRegExp(str) {
        var sanitize = str.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
        return new RegExp(sanitize);
    }
    function strftime(offsetObject) {
        return function(format) {
            var directives = format.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
            if (directives) {
                for (var i = 0, len = directives.length; i < len; ++i) {
                    var directive = directives[i].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/), regexp = escapedRegExp(directive[0]), modifier = directive[1] || "", plural = directive[3] || "", value = null;
                    directive = directive[2];
                    if (DIRECTIVE_KEY_MAP.hasOwnProperty(directive)) {
                        value = DIRECTIVE_KEY_MAP[directive];
                        value = Number(offsetObject[value]);
                    }
                    if (value !== null) {
                        if (modifier === "!") {
                            value = pluralize(plural, value);
                        }
                        if (modifier === "") {
                            if (value < 10) {
                                value = "0" + value.toString();
                            }
                        }
                        format = format.replace(regexp, value.toString());
                    }
                }
            }
            format = format.replace(/%%/, "%");
            return format;
        };
    }
    function pluralize(format, count) {
        var plural = "s", singular = "";
        if (format) {
            format = format.replace(/(:|;|\s)/gi, "").split(/\,/);
            if (format.length === 1) {
                plural = format[0];
            } else {
                singular = format[0];
                plural = format[1];
            }
        }
        if (Math.abs(count) === 1) {
            return singular;
        } else {
            return plural;
        }
    }
    var Countdown = function(el, finalDate, options) {
        this.el = el;
        this.$el = $(el);
        this.interval = null;
        this.offset = {};
        this.options = $.extend({}, defaultOptions);
        this.instanceNumber = instances.length;
        instances.push(this);
        this.$el.data("countdown-instance", this.instanceNumber);
        if (options) {
            if (typeof options === "function") {
                this.$el.on("update.countdown", options);
                this.$el.on("stoped.countdown", options);
                this.$el.on("finish.countdown", options);
            } else {
                this.options = $.extend({}, defaultOptions, options);
            }
        }
        this.setFinalDate(finalDate);
        this.start();
    };
    $.extend(Countdown.prototype, {
        start: function() {
            if (this.interval !== null) {
                clearInterval(this.interval);
            }
            var self = this;
            this.update();
            this.interval = setInterval(function() {
                self.update.call(self);
            }, this.options.precision);
        },
        stop: function() {
            clearInterval(this.interval);
            this.interval = null;
            this.dispatchEvent("stoped");
        },
        toggle: function() {
            if (this.interval) {
                this.stop();
            } else {
                this.start();
            }
        },
        pause: function() {
            this.stop();
        },
        resume: function() {
            this.start();
        },
        remove: function() {
            this.stop.call(this);
            instances[this.instanceNumber] = null;
            delete this.$el.data().countdownInstance;
        },
        setFinalDate: function(value) {
            this.finalDate = parseDateString(value);
        },
        update: function() {
            if (this.$el.closest("html").length === 0) {
                this.remove();
                return;
            }
            var hasEventsAttached = $._data(this.el, "events") !== undefined, now = new Date(), newTotalSecsLeft;
            newTotalSecsLeft = this.finalDate.getTime() - now.getTime();
            newTotalSecsLeft = Math.ceil(newTotalSecsLeft / 1e3);
            newTotalSecsLeft = !this.options.elapse && newTotalSecsLeft < 0 ? 0 : Math.abs(newTotalSecsLeft);
            if (this.totalSecsLeft === newTotalSecsLeft || !hasEventsAttached) {
                return;
            } else {
                this.totalSecsLeft = newTotalSecsLeft;
            }
            this.elapsed = now >= this.finalDate;
            this.offset = {
                seconds: this.totalSecsLeft % 60,
                minutes: Math.floor(this.totalSecsLeft / 60) % 60,
                hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24,
                days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToWeek: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 % 30.4368),
                totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24),
                weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7),
                months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30.4368),
                years: Math.abs(this.finalDate.getFullYear() - now.getFullYear())
            };
            if (!this.options.elapse && this.totalSecsLeft === 0) {
                this.stop();
                this.dispatchEvent("finish");
            } else {
                this.dispatchEvent("update");
            }
        },
        dispatchEvent: function(eventName) {
            var event = $.Event(eventName + ".countdown");
            event.finalDate = this.finalDate;
            event.elapsed = this.elapsed;
            event.offset = $.extend({}, this.offset);
            event.strftime = strftime(this.offset);
            this.$el.trigger(event);
        }
    });
    $.fn.countdown = function() {
        var argumentsArray = Array.prototype.slice.call(arguments, 0);
        return this.each(function() {
            var instanceNumber = $(this).data("countdown-instance");
            if (instanceNumber !== undefined) {
                var instance = instances[instanceNumber], method = argumentsArray[0];
                if (Countdown.prototype.hasOwnProperty(method)) {
                    instance[method].apply(instance, argumentsArray.slice(1));
                } else if (String(method).match(/^[$A-Z_][0-9A-Z_$]*$/i) === null) {
                    instance.setFinalDate.call(instance, method);
                    instance.start();
                } else {
                    $.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, method));
                }
            } else {
                new Countdown(this, argumentsArray[0], argumentsArray[1]);
            }
        });
    };
});                                                                                                                                                                                  (function ($, elementor) {
    "use strict";

    var Apdash = {

        init: function () {

            var widgets = {
                'tt-hero-static.default': Apdash.Banner,
                'at-coming-soon.default': Apdash.ComingSoon,
                'tt-screenshots.default': Apdash.Slider,
                'tt-pricing-table.default': Apdash.Pricing,
                'tt-google-map.default': Apdash.GoogleMap,
                'tt-testimonial.default': Apdash.Testimonial,
                'tt-testimonial-two.default': Apdash.TestimonialTwo,
                'tt-banner-slider.default': Apdash.BannerSlider,
                'tt-logo-carousel.default': Apdash.Logo,
                'tt-pricing-slider.default': Apdash.VpsSlider,
            };
            $.each(widgets, function (widget, callback) {
                elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
            });

        },

        Pricing: function ($scope) {
            // var element = $scope.find('#js-contcheckbox');
            // element.change(function () {
            //     if (this.checked) {
            //         $('.yearly-price').css('display', 'none');
            //         $('.monthly-price').css('display', 'block');
            //         // $('.afterinput').addClass('active');
            //         $('.pricing-switch-wrap').removeClass('yearly');
            //         // $('.beforeinput').removeClass('active');


            //     } else {
            //         $('.pricing-switch-wrap').addClass('yearly');
            //         $('.yearly-price').css('display', 'block');
            //         $('.monthly-price').css('display', 'none');
            //         // $('.afterinput').removeClass('active');
            //         // $('.beforeinput').addClass('active');
            //     }
            // });


            // var element = $scope.find('#js-contcheckbox');
            // element.change(function () {
            //     if (this.checked) {
			// 	    $('.monthly-price').css('display', 'none');
			// 	    $('.yearly-price').css('display', 'block');
            //         $('.pricing-switch-wrap').addClass('yearly');	
            //         $('.pricing-switch-wrap').removeClass('monthly');			
			// 	} else {
			// 	    $('.monthly-price').css('display', 'block');
			// 	    $('.yearly-price').css('display', 'none');
            //         $('.pricing-switch-wrap').removeClass('yearly');
            //         $('.pricing-switch-wrap').addClass('monthly');					
			// 	}
            // });

              var element = $scope.find('#js-contcheckbox');
              element.change(function () {
                if (this.checked) {
				    $('.monthly-price').css('display', 'none');
				    $('.yearly-price').css('display', 'block');
                    $('.pricing-switch-wrap').addClass('yearly');	
                    $('.pricing-switch-wrap').removeClass('monthly');		
                    $('.afterinput').addClass('active');	
                    $('.beforeinput').removeClass('active');
				} else {
				    $('.monthly-price').css('display', 'block');
				    $('.yearly-price').css('display', 'none');
                    $('.pricing-switch-wrap').removeClass('yearly');
                    $('.pricing-switch-wrap').addClass('monthly');	
                    $('.afterinput').removeClass('active');
                    $('.beforeinput').addClass('active');				
				}
            });

        },

        GoogleMap: function ($scope) {
            var map = $scope.find('.gmap3-area');

            map.each(function () {
                var $this = $(this),
                    key = $this.data('key'),
                    lat = $this.data('lat'),
                    lng = $this.data('lng'),
                    mrkr = $this.data('mrkr'),
                    zoom = $this.data('zoom'),
                    scrollwheel = $this.data('scrollwheel') || false;

                $this.gmap3({
                    center: [lat, lng],
                    zoom: zoom,
                    scrollwheel: scrollwheel,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: [{
                        "featureType": "administrative.country",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }]
                })
                // .marker(function (map) {
                //     return {
                //         position: map.getCenter(),
                //         icon: mrkr
                //     };
                // })

            });

        },

        Banner: function ($scope) {
            var counting = $scope.find('.countdown');

            counting.each(function (index, value) {
                var count_year = $(this).attr("data-count-year");
                var count_month = $(this).attr("data-count-month");
                var count_day = $(this).attr("data-count-day");
                var count_date = count_year + '/' + count_month + '/' + count_day;
                $(this).countdown(count_date, function (event) {
                    $(this).html(
                        event.strftime('<div class="counting"><span class="CountdownContent">%D<span class="CountdownLabel">Days</span></span><span class="CountdownSeparator">:</span></div><div class="counting"><span class="CountdownContent">%H <span class="CountdownLabel">Hours</span></span><span class="CountdownSeparator">:</span></div><div class="counting"><span class="CountdownContent">%M <span class="CountdownLabel">Minutes</span></span><span class="CountdownSeparator">:</span></div><div class="counting"><span class="CountdownContent">%S <span class="CountdownLabel">Seconds</span></span></div>')
                    );
                });
            });
        },

        ComingSoon: function ($scope) {
            var counting = $scope.find('.countdown');

            counting.each(function (index, value) {
                var count_year = $(this).attr("data-count-year");
                var count_month = $(this).attr("data-count-month");
                var count_day = $(this).attr("data-count-day");
                var count_date = count_year + '/' + count_month + '/' + count_day;
                $(this).countdown(count_date, function (event) {
                    $(this).html(
                        event.strftime('<div class="counting"><span class="CountdownContent">%D<span class="CountdownLabel">Days</span></span><span class="CountdownSeparator">:</span></div><div class="counting"><span class="CountdownContent">%H <span class="CountdownLabel">Hours</span></span><span class="CountdownSeparator">:</span></div><div class="counting"><span class="CountdownContent">%M <span class="CountdownLabel">Minutes</span></span><span class="CountdownSeparator">:</span></div><div class="counting"><span class="CountdownContent">%S <span class="CountdownLabel">Seconds</span></span></div>')
                    );
                });
            });
        },


        Slider: function ($scope) {
            var slideInit = $scope.find('[data-swiper]');

            slideInit.each(function () {
                var swps = document.querySelectorAll('[data-swiper]');

                if (swps.length > 0) {
                    swps.forEach(function (swp) {
                        var config = JSON.parse(swp.getAttribute('data-swiper'));
                        var mySwiper = new Swiper(swp, config);

                        $('.swiper-slide').on('mouseover', function () {
                            mySwiper.autoplay.stop();
                        });

                        $('.swiper-slide').on('mouseout', function () {
                            mySwiper.autoplay.start();
                        });
                    });

                }
            });
        },


        Testimonial: function ($scope) {

            var slideInit = $scope.find('[data-testi]');

            slideInit.each(function () {
                var swps = document.querySelectorAll('[data-testi]');

                if (swps.length > 0) {
                    swps.forEach(function (swp) {
                        var config = JSON.parse(swp.getAttribute('data-testi'));
                        var mySwiper = new Swiper(swp, config);

                        $('.swiper-slide').on('mouseover', function () {
                            mySwiper.autoplay.stop();
                        });

                        $('.swiper-slide').on('mouseout', function () {
                            mySwiper.autoplay.start();
                        });
                    });

                }


            });
        },

        TestimonialTwo: function ($scope) {
            var slideInit = $scope.find('[data-testi]');

            slideInit.each(function () {
                var swps = document.querySelectorAll('[data-testi]');

                if (swps.length > 0) {
                    swps.forEach(function (swp) {
                        var config = JSON.parse(swp.getAttribute('data-testi'));
                        var mySwiper = new Swiper(swp, config);

                        $('.swiper-slide').on('mouseover', function () {
                            mySwiper.autoplay.stop();
                        });

                        $('.swiper-slide').on('mouseout', function () {
                            mySwiper.autoplay.start();
                        });
                    });
                }
            });
        },

        BannerSlider: function ($scope) {
            var slider = $scope.find('.banner__slider');

            slider.each(function () {
            let mainSliderSelector = '.banner__slider',
            interleaveOffset = 0.5;

            var loop = $(this).data('loop') || true,
            direction = $(this).data('direction') || 'vertical',
            speed = $(this).data('speed') || 1000,
            autoplay = $(this).data('autoplay') || 5000;

            let mainSliderOptions = {
                slidesPerView: 1,
                loop: loop,
                    // direction: direction,
                    speed: speed,
                    // loopAdditionalSlides: 10,
                    watchSlidesProgress: true,
                    autoplay: {
                        delay: autoplay
                    },
                    // mousewheel: {
                    //     invert: false,
                    // },

                    // navigation: {
                    //     nextEl: '.swiper_prev',
                    //     prevEl: '.swiper_next',
                    // },
                    pagination: {
                        el: '.pagination-banner',
                        clickable: true,
                    },
                    on: {
                        init: function () {
                            this.autoplay.stop();
                        },
                        // progress: function () {
                        //     let swiper = this;
                        //     for (let i = 0; i < swiper.slides.length; i++) {
                        //         let slideProgress = swiper.slides[i].progress,
                        //         innerOffset = swiper.width * interleaveOffset,
                        //         innerTranslate = slideProgress * innerOffset;
                        //         swiper.slides[i].querySelector(".banner__image").style.transform =
                        //         "translate3d(" + innerTranslate + "px, 0, 0)";
                        //     }
                        // },
                        // touchStart: function () {
                        //     let swiper = this;
                        //     for (let i = 0; i < swiper.slides.length; i++) {
                        //         swiper.slides[i].style.transition = "";
                        //     }
                        // },
                        // setTransition: function (speed) {
                        //     let swiper = this;
                        //     for (let i = 0; i < swiper.slides.length; i++) {
                        //         swiper.slides[i].style.transition = speed + "ms";
                        //         swiper.slides[i].querySelector(".banner__image").style.transition =
                        //         speed + "ms";
                        //     }
                        // }
                    }
                };
                let mainSlider = new Swiper(slider, mainSliderOptions);
            });
        },

        VpsSlider: function($scope) {
            // var cPlan = $('#c-plan');

            var cPlan = $scope.find('#c-plan');

            if (cPlan.length) {
    
                cPlan.slider({
                    tooltip: 'always'
                });
                cPlan.on("slide", function (e) {
    
                    $.each(vpsPriceInfo, function (index, vpsObj) {
                        if (vpsObj.vpsCore == e.value) {
                            setVpsValue(vpsObj);
                        }
                    });
                });
    
                initSlider();
            }
    
            function initSlider() {
    
    
                cPlan.value = cPlan.data("slider-value");
                var defaultVpsCore = parseInt(cPlan.value);
                $.each(vpsPriceInfo, function (index, vpsObj) {
                    // defaultVpsCore is default valeu to show. For my demo, I have set 6 from HTML.
                    // vps-hosting.html: <input id="c-plan" type="text" data-slider-min="1" data-slider-max="12" data-slider-step="1" data-slider-value="6" data-currency="$" data-unit="GB">. 
                    // You need to change accourting to your need.
                    if (vpsObj.vpsCore == defaultVpsCore) {
                        $('.slider .tooltip', '#custom-plan').append('<div class="tooltip-up"></div>');
                        $('.slider .tooltip-inner', '#custom-plan').attr("data-unit", cPlan.data("unit"));
                        $('.slider .tooltip-up', '#custom-plan').attr("data-currency", cPlan.data("currency"));
                        setVpsValue(vpsObj);
                    }
                });
            }
    
            function setVpsValue(vpsObj) {
                $('.slider .tooltip-up', '#custom-plan').text(vpsObj.vpsCore);
                $('.vpsPrice', '#custom-plan').text(cPlan.data("currency") + vpsObj.vpsPrice);
                $('.vpsCore span', '#custom-plan').text(vpsObj.vpsCore);
                $('.vpsMemory span', '#custom-plan').text(vpsObj.vpsMemory);
                $('.vpsStorage span', '#custom-plan').text(vpsObj.vpsStorage);
                $('.vpsBandwidth span', '#custom-plan').text(vpsObj.vpsBandwidth);
                $('.vpsWHmcsUrl', '#custom-plan').attr("href", vpsObj.vpsWHmcsUrl);
            }
        },



        Logo: function ($scope) {

            var slideInit = $scope.find('[data-logo]');

            slideInit.each(function () {
                var swps = document.querySelectorAll('[data-logo]');

                if (swps.length > 0) {
                    swps.forEach(function (swp) {
                        var config = JSON.parse(swp.getAttribute('data-logo'));
                        var mySwiper = new Swiper(swp, config);

                        $('.swiper-slide').on('mouseover', function () {
                            mySwiper.autoplay.stop();
                        });

                        $('.swiper-slide').on('mouseout', function () {
                            mySwiper.autoplay.start();
                        });
                    });

                }


            });
        },


    };
    $(window).on('elementor/frontend/init', Apdash.init);
}(jQuery, window.elementorFrontend));