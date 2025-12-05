/* ===============================================
  OPEN CLOSE Menu
============================================= */

function tech_review_blog_open_menu() {
  jQuery('button.menu-toggle').addClass('close-panal');
  setTimeout(function(){
    jQuery('nav#main-menu').show();
  }, 100);

  return false;
}
jQuery( "button.menu-toggle").on("click", tech_review_blog_open_menu);

function tech_review_blog_close_menu() {
  jQuery('button.close-menu').removeClass('close-panal');
  jQuery('nav#main-menu').hide();
}

jQuery( "button.close-menu").on("click", tech_review_blog_close_menu);

function tech_review_blog_search_show() {
	jQuery(".outer-search").addClass('show');
	jQuery(".outer-search").fadeIn();
}
jQuery( ".search-cont-button").on("click", tech_review_blog_search_show);

function tech_review_blog_search_hide() {
	jQuery(".outer-search").removeClass('show');
	jQuery(".outer-search").fadeOut();
}
jQuery( ".search-cont-button-close").on("click", tech_review_blog_search_hide);

/* ===============================================
  TRAP TAB FOCUS ON MODAL MENU
============================================= */

jQuery('button.close-menu').on('keydown', function (e) {
  if (jQuery("this:focus") && (e.which === 9)) {
    e.preventDefault();
    jQuery(this).blur();
    jQuery('#main-menu ul:first li:first a').focus();
  }
});

jQuery('button.close-menu').on('keydown', function (event) {
  if (event.shiftKey && event.keyCode == 9) {
    event.preventDefault();
    jQuery(this).blur();
    jQuery('#main-menu ul:last li:last a').focus();
  }
})

jQuery('#main-menu ul:first li:first a').on('keydown', function (event) {
  if (event.shiftKey && event.keyCode == 9) {
    event.preventDefault();
    jQuery(this).blur();
    jQuery('button.close-menu').focus();
  }
})

jQuery(document).ready(function() {
  window.addEventListener('load', (event) => {
      jQuery(".loader").delay(2000).fadeOut("slow");
  });
})
/* ===============================================
  Scroll Top //
============================================= */

jQuery(window).scroll(function () {
  if (jQuery(this).scrollTop() > 100) {
      jQuery('.scroll-up').fadeIn();
  } else {
      jQuery('.scroll-up').fadeOut();
  }
});

jQuery('a[href="#tobottom"]').click(function () {
  jQuery('html, body').animate({scrollTop: 0}, 'slow');
  return false;
});

(function( $ ) {
  $(window).scroll(function(){
      var sticky = $('.sticky-header'),
      scroll = $(window).scrollTop();

      if (scroll >= 100) sticky.addClass('fixed-header');
      else sticky.removeClass('fixed-header');
    });
  })( jQuery );

/* ===============================================
  Search pop up
============================================= */

jQuery('.search-cont-button-close').on('keydown', function (es) {
  if (jQuery("this:focus") && (es.which === 9)) {
    es.preventDefault();
    jQuery(this).blur();
    jQuery('.inner-search form input').focus();
  }
});

jQuery('.inner-search form input').on('keydown', function (eventsearch) {
  if (eventsearch.shiftKey && eventsearch.keyCode == 9) {
    eventsearch.preventDefault();
    jQuery(this).blur();
    jQuery('.search-cont-button-close').focus()
  }
});
/* ===============================================
  Custom Cursor
============================================= */

const tech_review_blog_customCursor = {
  init: function () {
    this.tech_review_blog_customCursor();
  },
  isVariableDefined: function (el) {
    return typeof el !== "undefined" && el !== null;
  },
  select: function (selectors) {
    return document.querySelector(selectors);
  },
  selectAll: function (selectors) {
    return document.querySelectorAll(selectors);
  },
  tech_review_blog_customCursor: function () {
    const tech_review_blog_cursorDot = this.select(".cursor-point");
    const tech_review_blog_cursorOutline = this.select(".cursor-point-outline");
    if (this.isVariableDefined(tech_review_blog_cursorDot) && this.isVariableDefined(tech_review_blog_cursorOutline)) {
      const cursor = {
        delay: 8,
        _x: 0,
        _y: 0,
        endX: window.innerWidth / 2,
        endY: window.innerHeight / 2,
        cursorVisible: true,
        cursorEnlarged: false,
        $dot: tech_review_blog_cursorDot,
        $outline: tech_review_blog_cursorOutline,

        init: function () {
          this.dotSize = this.$dot.offsetWidth;
          this.outlineSize = this.$outline.offsetWidth;
          this.setupEventListeners();
          this.animateDotOutline();
        },

        updateCursor: function (e) {
          this.cursorVisible = true;
          this.toggleCursorVisibility();
          this.endX = e.clientX;
          this.endY = e.clientY;
          this.$dot.style.top = `${this.endY}px`;
          this.$dot.style.left = `${this.endX}px`;
        },

        setupEventListeners: function () {
          window.addEventListener("load", () => {
            this.cursorEnlarged = false;
            this.toggleCursorSize();
          });

          tech_review_blog_customCursor.selectAll("a, button").forEach((el) => {
            el.addEventListener("mouseover", () => {
              this.cursorEnlarged = true;
              this.toggleCursorSize();
            });
            el.addEventListener("mouseout", () => {
              this.cursorEnlarged = false;
              this.toggleCursorSize();
            });
          });

          document.addEventListener("mousedown", () => {
            this.cursorEnlarged = true;
            this.toggleCursorSize();
          });
          document.addEventListener("mouseup", () => {
            this.cursorEnlarged = false;
            this.toggleCursorSize();
          });

          document.addEventListener("mousemove", (e) => {
            this.updateCursor(e);
          });

          document.addEventListener("mouseenter", () => {
            this.cursorVisible = true;
            this.toggleCursorVisibility();
            this.$dot.style.opacity = 1;
            this.$outline.style.opacity = 1;
          });

          document.addEventListener("mouseleave", () => {
            this.cursorVisible = false;
            this.toggleCursorVisibility();
            this.$dot.style.opacity = 0;
            this.$outline.style.opacity = 0;
          });
        },

        animateDotOutline: function () {
          this._x += (this.endX - this._x) / this.delay;
          this._y += (this.endY - this._y) / this.delay;
          this.$outline.style.top = `${this._y}px`;
          this.$outline.style.left = `${this._x}px`;

          requestAnimationFrame(this.animateDotOutline.bind(this));
        },

        toggleCursorSize: function () {
          if (this.cursorEnlarged) {
            this.$dot.style.transform = "translate(-50%, -50%) scale(0.75)";
            this.$outline.style.transform = "translate(-50%, -50%) scale(1.6)";
          } else {
            this.$dot.style.transform = "translate(-50%, -50%) scale(1)";
            this.$outline.style.transform = "translate(-50%, -50%) scale(1)";
          }
        },

        toggleCursorVisibility: function () {
          if (this.cursorVisible) {
            this.$dot.style.opacity = 1;
            this.$outline.style.opacity = 1;
          } else {
            this.$dot.style.opacity = 0;
            this.$outline.style.opacity = 0;
          }
        },
      };
      cursor.init();
    }
  },
};
tech_review_blog_customCursor.init();

/* ===============================================
  Progress Bar
============================================= */
const tech_review_blog_progressBar = {
  init: function () {
      let tech_review_blog_progressBarDiv = document.getElementById("elemento-progress-bar");

      if (tech_review_blog_progressBarDiv) {
          let tech_review_blog_body = document.body;
          let tech_review_blog_rootElement = document.documentElement;

          window.addEventListener("scroll", function (event) {
              let tech_review_blog_winScroll = tech_review_blog_body.scrollTop || tech_review_blog_rootElement.scrollTop;
              let tech_review_blog_height =
              tech_review_blog_rootElement.scrollHeight - tech_review_blog_rootElement.clientHeight;
              let tech_review_blog_scrolled = (tech_review_blog_winScroll / tech_review_blog_height) * 100;
              tech_review_blog_progressBarDiv.style.width = tech_review_blog_scrolled + "%";
          });
      }
  },
};
tech_review_blog_progressBar.init();

/* ===============================================
   sticky copyright
============================================= */

window.addEventListener('scroll', function() {
  var tech_review_blog_footer = document.querySelector('.sticky-copyright');
  if (!tech_review_blog_footer) return; 

  var tech_review_blog_scrollTop = window.scrollY || document.documentElement.tech_review_blog_scrollTop;

  if (tech_review_blog_scrollTop >= 100) {
    tech_review_blog_footer.classList.add('active-sticky');
  }
});