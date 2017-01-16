+function($){"use strict";function t(){var t=document.createElement("bootstrap"),e={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var i in e)if(void 0!==t.style[i])return{end:e[i]};return!1}$.fn.emulateTransitionEnd=function(t){var e=!1,i=this;$(this).one("bsTransitionEnd",function(){e=!0});var n=function(){e||$(i).trigger($.support.transition.end)};return setTimeout(n,t),this},$(function(){$.support.transition=t(),$.support.transition&&($.event.special.bsTransitionEnd={bindType:$.support.transition.end,delegateType:$.support.transition.end,handle:function(t){return $(t.target).is(this)?t.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function($){"use strict";function t(t){return this.each(function(){var i=$(this),n=i.data("bs.carousel"),s=$.extend({},e.DEFAULTS,i.data(),"object"==typeof t&&t),a="string"==typeof t?t:s.slide;n||i.data("bs.carousel",n=new e(this,s)),"number"==typeof t?n.to(t):a?n[a]():s.interval&&n.pause().cycle()})}var e=function(t,e){this.$element=$(t),this.$indicators=this.$element.find(".carousel-indicators"),this.options=e,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",$.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",$.proxy(this.pause,this)).on("mouseleave.bs.carousel",$.proxy(this.cycle,this))};e.VERSION="3.3.7",e.TRANSITION_DURATION=600,e.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},e.prototype.keydown=function(t){if(!/input|textarea/i.test(t.target.tagName)){switch(t.which){case 37:this.prev();break;case 39:this.next();break;default:return}t.preventDefault()}},e.prototype.cycle=function(t){return t||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval($.proxy(this.next,this),this.options.interval)),this},e.prototype.getItemIndex=function(t){return this.$items=t.parent().children(".item"),this.$items.index(t||this.$active)},e.prototype.getItemForDirection=function(t,e){var i=this.getItemIndex(e),n="prev"==t&&0===i||"next"==t&&i==this.$items.length-1;if(n&&!this.options.wrap)return e;var s="prev"==t?-1:1,a=(i+s)%this.$items.length;return this.$items.eq(a)},e.prototype.to=function(t){var e=this,i=this.getItemIndex(this.$active=this.$element.find(".item.active"));return t>this.$items.length-1||0>t?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){e.to(t)}):i==t?this.pause().cycle():this.slide(t>i?"next":"prev",this.$items.eq(t))},e.prototype.pause=function(t){return t||(this.paused=!0),this.$element.find(".next, .prev").length&&$.support.transition&&(this.$element.trigger($.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},e.prototype.next=function(){return this.sliding?void 0:this.slide("next")},e.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},e.prototype.slide=function(t,i){var n=this.$element.find(".item.active"),s=i||this.getItemForDirection(t,n),a=this.interval,o="next"==t?"left":"right",r=this;if(s.hasClass("active"))return this.sliding=!1;var l=s[0],d=$.Event("slide.bs.carousel",{relatedTarget:l,direction:o});if(this.$element.trigger(d),!d.isDefaultPrevented()){if(this.sliding=!0,a&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var c=$(this.$indicators.children()[this.getItemIndex(s)]);c&&c.addClass("active")}var h=$.Event("slid.bs.carousel",{relatedTarget:l,direction:o});return $.support.transition&&this.$element.hasClass("slide")?(s.addClass(t),s[0].offsetWidth,n.addClass(o),s.addClass(o),n.one("bsTransitionEnd",function(){s.removeClass([t,o].join(" ")).addClass("active"),n.removeClass(["active",o].join(" ")),r.sliding=!1,setTimeout(function(){r.$element.trigger(h)},0)}).emulateTransitionEnd(e.TRANSITION_DURATION)):(n.removeClass("active"),s.addClass("active"),this.sliding=!1,this.$element.trigger(h)),a&&this.cycle(),this}};var i=$.fn.carousel;$.fn.carousel=t,$.fn.carousel.Constructor=e,$.fn.carousel.noConflict=function(){return $.fn.carousel=i,this};var n=function(e){var i,n=$(this),s=$(n.attr("data-target")||(i=n.attr("href"))&&i.replace(/.*(?=#[^\s]+$)/,""));if(s.hasClass("carousel")){var a=$.extend({},s.data(),n.data()),o=n.attr("data-slide-to");o&&(a.interval=!1),t.call(s,a),o&&s.data("bs.carousel").to(o),e.preventDefault()}};$(document).on("click.bs.carousel.data-api","[data-slide]",n).on("click.bs.carousel.data-api","[data-slide-to]",n),$(window).on("load",function(){$('[data-ride="carousel"]').each(function(){var e=$(this);t.call(e,e.data())})})}(jQuery),+function($){"use strict";function t(t){var e,i=t.attr("data-target")||(e=t.attr("href"))&&e.replace(/.*(?=#[^\s]+$)/,"");return $(i)}function e(t){return this.each(function(){var e=$(this),n=e.data("bs.collapse"),s=$.extend({},i.DEFAULTS,e.data(),"object"==typeof t&&t);!n&&s.toggle&&/show|hide/.test(t)&&(s.toggle=!1),n||e.data("bs.collapse",n=new i(this,s)),"string"==typeof t&&n[t]()})}var i=function(t,e){this.$element=$(t),this.options=$.extend({},i.DEFAULTS,e),this.$trigger=$('[data-toggle="collapse"][href="#'+t.id+'"],[data-toggle="collapse"][data-target="#'+t.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};i.VERSION="3.3.7",i.TRANSITION_DURATION=350,i.DEFAULTS={toggle:!0},i.prototype.dimension=function(){var t=this.$element.hasClass("width");return t?"width":"height"},i.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var t,n=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(n&&n.length&&(t=n.data("bs.collapse"),t&&t.transitioning))){var s=$.Event("show.bs.collapse");if(this.$element.trigger(s),!s.isDefaultPrevented()){n&&n.length&&(e.call(n,"hide"),t||n.data("bs.collapse",null));var a=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[a](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var o=function(){this.$element.removeClass("collapsing").addClass("collapse in")[a](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!$.support.transition)return o.call(this);var r=$.camelCase(["scroll",a].join("-"));this.$element.one("bsTransitionEnd",$.proxy(o,this)).emulateTransitionEnd(i.TRANSITION_DURATION)[a](this.$element[0][r])}}}},i.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var t=$.Event("hide.bs.collapse");if(this.$element.trigger(t),!t.isDefaultPrevented()){var e=this.dimension();this.$element[e](this.$element[e]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var n=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return $.support.transition?void this.$element[e](0).one("bsTransitionEnd",$.proxy(n,this)).emulateTransitionEnd(i.TRANSITION_DURATION):n.call(this)}}},i.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},i.prototype.getParent=function(){return $(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each($.proxy(function(e,i){var n=$(i);this.addAriaAndCollapsedClass(t(n),n)},this)).end()},i.prototype.addAriaAndCollapsedClass=function(t,e){var i=t.hasClass("in");t.attr("aria-expanded",i),e.toggleClass("collapsed",!i).attr("aria-expanded",i)};var n=$.fn.collapse;$.fn.collapse=e,$.fn.collapse.Constructor=i,$.fn.collapse.noConflict=function(){return $.fn.collapse=n,this},$(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(i){var n=$(this);n.attr("data-target")||i.preventDefault();var s=t(n),a=s.data("bs.collapse"),o=a?"toggle":n.data();e.call(s,o)})}(jQuery),+function($){"use strict";function t(t){var e=t.attr("data-target");e||(e=t.attr("href"),e=e&&/#[A-Za-z]/.test(e)&&e.replace(/.*(?=#[^\s]*$)/,""));var i=e&&$(e);return i&&i.length?i:t.parent()}function e(e){e&&3===e.which||($(n).remove(),$(s).each(function(){var i=$(this),n=t(i),s={relatedTarget:this};n.hasClass("open")&&(e&&"click"==e.type&&/input|textarea/i.test(e.target.tagName)&&$.contains(n[0],e.target)||(n.trigger(e=$.Event("hide.bs.dropdown",s)),e.isDefaultPrevented()||(i.attr("aria-expanded","false"),n.removeClass("open").trigger($.Event("hidden.bs.dropdown",s)))))}))}function i(t){return this.each(function(){var e=$(this),i=e.data("bs.dropdown");i||e.data("bs.dropdown",i=new a(this)),"string"==typeof t&&i[t].call(e)})}var n=".dropdown-backdrop",s='[data-toggle="dropdown"]',a=function(t){$(t).on("click.bs.dropdown",this.toggle)};a.VERSION="3.3.7",a.prototype.toggle=function(i){var n=$(this);if(!n.is(".disabled, :disabled")){var s=t(n),a=s.hasClass("open");if(e(),!a){"ontouchstart"in document.documentElement&&!s.closest(".navbar-nav").length&&$(document.createElement("div")).addClass("dropdown-backdrop").insertAfter($(this)).on("click",e);var o={relatedTarget:this};if(s.trigger(i=$.Event("show.bs.dropdown",o)),i.isDefaultPrevented())return;n.trigger("focus").attr("aria-expanded","true"),s.toggleClass("open").trigger($.Event("shown.bs.dropdown",o))}return!1}},a.prototype.keydown=function(e){if(/(38|40|27|32)/.test(e.which)&&!/input|textarea/i.test(e.target.tagName)){var i=$(this);if(e.preventDefault(),e.stopPropagation(),!i.is(".disabled, :disabled")){var n=t(i),a=n.hasClass("open");if(!a&&27!=e.which||a&&27==e.which)return 27==e.which&&n.find(s).trigger("focus"),i.trigger("click");var o=" li:not(.disabled):visible a",r=n.find(".dropdown-menu"+o);if(r.length){var l=r.index(e.target);38==e.which&&l>0&&l--,40==e.which&&l<r.length-1&&l++,~l||(l=0),r.eq(l).trigger("focus")}}}};var o=$.fn.dropdown;$.fn.dropdown=i,$.fn.dropdown.Constructor=a,$.fn.dropdown.noConflict=function(){return $.fn.dropdown=o,this},$(document).on("click.bs.dropdown.data-api",e).on("click.bs.dropdown.data-api",".dropdown form",function(t){t.stopPropagation()}).on("click.bs.dropdown.data-api",s,a.prototype.toggle).on("keydown.bs.dropdown.data-api",s,a.prototype.keydown).on("keydown.bs.dropdown.data-api",".dropdown-menu",a.prototype.keydown)}(jQuery),function(){$(".video-programa").fitVids()}(),function(){var t=$(".navbar-default");$(window).scroll(function(){var e=$(window).scrollTop();e>=t.outerHeight(!0)?t.addClass("navbar-fixed-top"):t.removeClass("navbar-fixed-top")})}(),function(){$(window).scroll(function(){$(this).scrollTop()>400?$("#totop").fadeIn():$("#totop").fadeOut()}),$("#totop").click(function(){return $("body,html").animate({scrollTop:0},800),!1})}();