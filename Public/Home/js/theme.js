$(function () {
    "use strict"; function a() {
        $(".scroll-top").click(
            function () {
            return $("html, body").animate({
                scrollTop: 0
            }, 2e3), !1 }),
            $('.scroll-down[href^="#"], .scroll-to-target[href^="#"]').on("click", function (a) {
                a.preventDefault();
                var e = this.hash, i = $(e);
                $("html, body").stop().animate({
                    scrollTop: i.offset().top }, 900, "swing", function () {
                    window.location.hash = e
                })
            })
    } function e() {
        var a = $(window).height();
        $(".js-fullscreen-height").css("height", a)
    } function i() {
        var a = $(window).scrollTop();
        $(window).height();
        a > 150 ? $(".header").addClass("header-prepare") : $(".header").removeClass("header-prepare"), a > 1 ? $(".header").addClass("header-fixed") : $(".header").removeClass("header-fixed")
    } function t() {
        p.css("max-height",
            $(window).height() - $(".header").height() - 20 + "px"),
            $(window).width() <= 1024 ? $(".header").addClass("mobile-device") : $(window).width() > 1024 && $(".header").removeClass("mobile-device") } function s() {
        $(".fullscreen-slider").owlCarousel({
            slideSpeed: 350, singleItem: !0, autoHeight: !1, navigation: !0, pagination: !0, navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"], responsive: !0 }),
            $(".intro-text-slider").owlCarousel({
                slideSpeed: 400, singleItem: !0, autoHeight: !1, navigation: !0, pagination: !0, navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"], responsive: !0 }),
            $(".team-carousel").owlCarousel({ autoPlay: !1, stopOnHover: !0, items: 3, itemsDesktop: [1170, 3], itemsDesktopSmall: [1e3, 2], itemsTabletSmall: [768, 1], itemsMobile: [480, 1], pagination: !1, navigation: !1, navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
            }),
            $(".testimonial-carousel").owlCarousel({
                autoPlay: !0, autoHeight: !0, stopOnHover: !0, singleItem: !0, slideSpeed: 350, pagination: !0, navigation: !1, navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
            }),
            $(".client-carousel").owlCarousel({ autoPlay: 2500, stopOnHover: !0, items: 6, itemsDesktop: [1170, 5], itemsDesktopSmall: [1024, 4], itemsTabletSmall: [768, 3], itemsMobile: [480, 2], pagination: !1, navigation: !1, navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
            }),
            $(".image-carousel").owlCarousel({
                navigation: !0, pagination: !0, slideSpeed: 350, paginationSpeed: 400, singleItem: !0, navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"], autoPlay: !1, autoHeight: !0, responsive: !0
            }),
            $(".post-carousel").owlCarousel({ autoPlay: !1, autoHeight: !0, stopOnHover: !0, singleItem: !0, slideSpeed: 350, pagination: !0, navigation: !1, navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"], responsive: !0
            })
    }
    function o() {
        $(function () {
            var a = new WOW({
                boxClass: "wow", animateClass: "animated", offset: 90, mobile: !1, live: !0
            });
            $("body").hasClass("wow-animate") && a.init()
        })
    } function n() {
        var a, e = $(".portfolio-grid");
        a = e.hasClass("masonry") ? "masonry" : "fitRows", e.isotope({ itemSelector: ".portfolio-item", layoutMode: a, animationOptions: {
            duration: 750, easing: "linear", queue: !1
        }
        }),
            $(".portfolio-filter").on("click", ".categories",
                function () {
                    var a = $(this).attr("data-filter");
                    e.isotope({
                        filter: a
                    })
                }),
            $(".categories-filter").each(function (a, e) {
                var i = $(e); i.on("click", ".categories", function () {
                    i.find(".active").removeClass("active"),
                        $(this).addClass("active")
                })
            })
    } function l(a) {
        var e = $(window).scrollTop(), i = $(".parallax").height(), t = .5 * e, s = -(.5 * e), o = e / i;
        $(".parallax").hasClass("parallax-section") && a.css("top", t), $(".parallax").hasClass("parallax-section2") && a.css("top", s),
        $(".parallax").hasClass("parallax-static") && a.css("top", 1 * e), $(".parallax").hasClass("parallax-opacity") && a.css("opacity", 1 - 1 * o), $(".parallax").hasClass("parallax-background1") && a.css("background-position", "left " + t + "px"),
        $(".parallax").hasClass("parallax-background2") && a.css("background-position", "left " + -t + "px")
    } function r() {
        $(".gallery-popup").magnificPopup({
            delegate: ".gallery-popup-link", type: "image", tLoading: "Loading image #%curr%...", mainClass: "mfp-img-mobile", gallery: {
                enabled: !0, navigateByImgClick: !0, preload: [0, 1]
            }, image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.', titleSrc: function (a) {
                    return a.el.attr("title")
                }
            }
        }),
            $(".popup-youtube, .popup-vimeo, .popup-gmaps, .video-popup").magnificPopup({
                disableOn: 700, type: "iframe", mainClass: "mfp-fade", removalDelay: 160, preloader: !1, fixedContentPos: !1
            })
    } function c() {
        $(".skillbar").appear(function () {
            $(".skillbar").each(function () {
                $(this).find(".skillbar-bar-child").animate({ width:
                    $(this).attr("data-percent") }, 2e3)
            })
        }),
            $(".counter-num").appear(function () {
                var a = $(this);
                a.countTo({ from: 0, to: a.html(), speed: 1300, refreshInterval: 60
                })
            }),
            $(".tab-content > .tab-pane").hide(),
            $(".tab-content > .tab-pane:first-of-type").show(),
            $(".tabs a").click(function (a) {
                a.preventDefault();
                var e = $(this), i = "#" + e.parents(".tabs").data("tabgroup"), t = e.closest("li").siblings().children("a"), s = e.attr("href");
                t.removeClass("active"), e.addClass("active"), $(i).children(".tab-pane").hide(), $(s).fadeIn().show;
                var o = $(".tab-content > .tab-pane").filter(
                    $(this).attr("href")).height();
                $(".tab-content").animate({
                    height: o }, function () {
                    $(".tab-content").css("height", "auto")
                })
            });
        $(".toggle > .toggle-content").hide();
        $(".toggle > .toggle-title > a").click(function () {
            if ($(this).hasClass("active"))
                $(this).parent().next().slideUp("easeOutExpo"),
                    $(this).removeClass("active"); else {
                $(this).parent().next(".toggle-content");
                $(this).addClass("active"),
                    $(this).parent().next().slideDown("easeOutExpo")
            }
            return !1
        });
        var a = $(".accordion > .accordion-content").hide();
        a.first().slideDown("easeOutExpo"),
            $(".accordion > .accordion-title > a").first().addClass("active"),
            $(".accordion > .accordion-title > a").click(function () {
                var e = $(this).parent().next(".accordion-content");
                return $(".accordion > .accordion-title > a").removeClass("active"),
                    $(this).addClass("active"), a.not(e).slideUp("easeInExpo"), $(this).parent().next().slideDown("easeOutExpo"), !1
            })
    }
    $(document).ready(function () {
        a(), e(), i(), t(), s(), o(), n(), r(), c() }),
        $(window).load(function () { n(),
        $("#preloader").fadeOut("slow", function () {
        $(this).remove() }) }),
        $(window).resize(function () {
            e(), i(), t(), s() }),
        $(window).scroll(function () {
            i() }); var d = $(".slide-bg-image, .bg-image");
    d.each(
        function (a) {
        $(this).attr("data-background-img") && $(this).css("background-image", "url(" + $(this).data("background-img") + ")")
        });
    var f = $(".nav-mobile"), p = $(".nav-menu");
    f.click(function () {
        $(this).hasClass("active") ? $(this).hasClass("active") && (f.removeClass("active"),
            p.removeClass("active")) : (f.addClass("active"), p.addClass("active"))
    });
    var u, h = $(".menu-has-sub");
    $(".mobile-device .menu-has-sub").find(".fa:first").removeClass("fa-angle-right").addClass("fa-angle-down"),
        /*导航js注销，否则点击没反应*/
        //h.click(function () {
        //        return $(".header").hasClass("mobile-device") ? (u = $(this).parent("li:first"),
        //            u.hasClass("menu-opened") ? u.find(".sub-dropdown:first").slideUp(
        //                function () {
        //                    u.removeClass("menu-opened"),
        //                        u.find(".menu-has-sub").find(".fa:first").removeClass("fa-angle-up").addClass("fa-angle-down")
        //                }) : ($(this).find(".fa:first").removeClass("fa-angle-down").addClass("fa-angle-up"),
        //                u.addClass("menu-opened"),
        //                u.find(".sub-dropdown:first").slideDown()), !1) : !1
        //    }),
        u = h.parent("li"),
        u.hover(
            function () {
                $(".header").hasClass("mobile-device") || $(this).find(".sub-dropdown:first").stop(!0, !0).fadeIn("fast")
            },
            function () {
                $(".header").hasClass("mobile-device") || $(this).find(".sub-dropdown:first").stop(!0, !0).delay(100).fadeOut("fast")
            });
    var v = $(".overlay-menu-btn"),
        g = $(".overlay-menu"),
        m = $(".overlay-menu-close");
    v.click(
        function () {
        $(this).hasClass("active") ? $(this).hasClass("active") && (v.removeClass("active"),
            g.removeClass("active"), $("body").removeClass("overlay-menu-active")) : (v.addClass("active"),
            g.addClass("active"), $("body").addClass("overlay-menu-active"))
        }),
        m.click(
            function () {
                v.hasClass("active") && g.hasClass("active") && (v.removeClass("active"),
                    g.removeClass("active"), $("body").removeClass("overlay-menu-active"))
            }),
        $(".video-fit, .audio-fit, .post-media").fitVids();
    var C; C = $(window).width() >= 1024 ? "position" : "transform",
        $(window).stellar({
            responsive: !0, positionProperty: C, horizontalScrolling: !1
        }),
        $(".parallax").each(function () {
            var a = $(this);
            $(window).scroll(function () {
                l(a) }), l(a) }),
        $(".singlepage-nav").singlePageNav({ offset: 0,
            currentClass: "current",
            filter: ":not(.external)",
            easing: "easeInOutExpo",
            speed: 1500, updateHash: !0,
            beforeStart: function () {
                f.hasClass("active") && (f.removeClass("active"),
                    p.removeClass("active")),
                v.hasClass("active") && (v.removeClass("active"),
                    g.removeClass("active"),
                    $("body").removeClass("overlay-menu-active"))
            }
        })
});