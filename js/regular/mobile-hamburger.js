! function(i) {
  function s() {
    var e = i(".potter-mobile-menu-toggle");
    e.hasClass("active") ? (i(".potter-mobile-menu-container").removeClass("active").slideUp(), e.removeClass("active").removeClass("potterf-times").addClass("potterf-hamburger").attr("aria-expanded", "false")) : (i(".potter-mobile-menu-container").addClass("active").slideDown(), e.addClass("active").removeClass("potterf-hamburger").addClass("potterf-times").attr("aria-expanded", "true"), i(window).trigger("resize"))
  }
  i(".potter-mobile-menu-toggle").click(function() {
    s()
  }), i(".potter-mobile-menu a").click(function() {
    var e = i(this).attr("href"),
      a = i(this).parent().hasClass("menu-item-has-children");
    (e.match("^#") || e.match("^/#")) && 0 == a && s()
  });
  var e = i("body").attr("class").match(/potter-desktop-breakpoint-[\w-]*\b/);
  if (null !== e) var n = e.toString().match(/\d+/);
  else n = "1024";
  i(window).resize(function() {
    var e = i(window).height(),
      a = i("body").innerWidth(),
      s = i(".potter-mobile-nav-wrapper").outerHeight();
    i(".potter-mobile-menu-container.active nav").css({
      "max-height": e - s
    }), n < a ? (function() {
      var e = i(".potter-mobile-menu-toggle");
      e.hasClass("active") && (i(".potter-mobile-menu-container").removeClass("active").slideUp(), e.removeClass("active").removeClass("potterf-times").addClass("potterf-hamburger").attr("aria-expanded", "false"))
    }(), i(".potter-mobile-mega-menu").length && i(".potter-mobile-mega-menu").removeClass("potter-mobile-mega-menu").addClass("potter-mega-menu")) : i(".potter-mega-menu").length && i(".potter-mega-menu").removeClass("potter-mega-menu").addClass("potter-mobile-mega-menu")
  }), i(".potter-mobile-menu-hamburger .potter-submenu-toggle").click(function(e) {
    e.preventDefault(),
      function(e) {
        i(e).hasClass("active") ? (i("i", e).removeClass("potterf-arrow-up").addClass("potterf-arrow-down"), i(e).removeClass("active").attr("aria-expanded", "false").siblings(".sub-menu").slideUp()) : (i("i", e).removeClass("potterf-arrow-down").addClass("potterf-arrow-up"), i(e).addClass("active").attr("aria-expanded", "true").siblings(".sub-menu").slideDown())
      }(this)
  }), i(".potter-mobile-menu a").click(function() {
    var e = i(this).attr("href"),
      a = i(this).parent().hasClass("menu-item-has-children");
    (e.match("^#") || e.match("^/#")) && 1 == a && function(e) {
      var a = i(e).siblings(".potter-submenu-toggle");
      a.hasClass("active") ? (i("i", a).removeClass("potterf-arrow-up").addClass("potterf-arrow-down"), a.removeClass("active").attr("aria-expanded", "false").siblings(".sub-menu").slideUp()) : (i("i", a).removeClass("potterf-arrow-down").addClass("potterf-arrow-up"), a.addClass("active").attr("aria-expanded", "true").siblings(".sub-menu").slideDown())
    }(this)
  })
}(jQuery);
