!function(){var t,e,i;!function(o){function s(t,e){return T.call(t,e)}function n(t,e){var i,o,s,n,r,a,l,p,c,h,u,d,f=e&&e.split("/"),g=b.map,m=g&&g["*"]||{};if(t){for(t=t.split("/"),r=t.length-1,b.nodeIdCompat&&C.test(t[r])&&(t[r]=t[r].replace(C,"")),"."===t[0].charAt(0)&&f&&(d=f.slice(0,f.length-1),t=d.concat(t)),c=0;c<t.length;c++)if(u=t[c],"."===u)t.splice(c,1),c-=1;else if(".."===u){if(0===c||1===c&&".."===t[2]||".."===t[c-1])continue;c>0&&(t.splice(c-1,2),c-=2)}t=t.join("/")}if((f||m)&&g){for(i=t.split("/"),c=i.length;c>0;c-=1){if(o=i.slice(0,c).join("/"),f)for(h=f.length;h>0;h-=1)if(s=g[f.slice(0,h).join("/")],s&&(s=s[o])){n=s,a=c;break}if(n)break;!l&&m&&m[o]&&(l=m[o],p=c)}!n&&l&&(n=l,a=p),n&&(i.splice(0,a,n),t=i.join("/"))}return t}function r(t,e){return function(){var i=$.call(arguments,0);return"string"!=typeof i[0]&&1===i.length&&i.push(null),f.apply(o,i.concat([t,e]))}}function a(t){return function(e){return n(e,t)}}function l(t){return function(e){v[t]=e}}function p(t){if(s(y,t)){var e=y[t];delete y[t],w[t]=!0,d.apply(o,e)}if(!s(v,t)&&!s(w,t))throw new Error("No "+t);return v[t]}function c(t){var e,i=t?t.indexOf("!"):-1;return i>-1&&(e=t.substring(0,i),t=t.substring(i+1,t.length)),[e,t]}function h(t){return t?c(t):[]}function u(t){return function(){return b&&b.config&&b.config[t]||{}}}var d,f,g,m,v={},y={},b={},w={},T=Object.prototype.hasOwnProperty,$=[].slice,C=/\.js$/;g=function(t,e){var i,o=c(t),s=o[0],r=e[1];return t=o[1],s&&(s=n(s,r),i=p(s)),s?t=i&&i.normalize?i.normalize(t,a(r)):n(t,r):(t=n(t,r),o=c(t),s=o[0],t=o[1],s&&(i=p(s))),{f:s?s+"!"+t:t,n:t,pr:s,p:i}},m={require:function(t){return r(t)},exports:function(t){var e=v[t];return"undefined"!=typeof e?e:v[t]={}},module:function(t){return{id:t,uri:"",exports:v[t],config:u(t)}}},d=function(t,e,i,n){var a,c,u,d,f,b,T,$=[],C=typeof i;if(n=n||t,b=h(n),"undefined"===C||"function"===C){for(e=!e.length&&i.length?["require","exports","module"]:e,f=0;f<e.length;f+=1)if(d=g(e[f],b),c=d.f,"require"===c)$[f]=m.require(t);else if("exports"===c)$[f]=m.exports(t),T=!0;else if("module"===c)a=$[f]=m.module(t);else if(s(v,c)||s(y,c)||s(w,c))$[f]=p(c);else{if(!d.p)throw new Error(t+" missing "+c);d.p.load(d.n,r(n,!0),l(c),{}),$[f]=v[c]}u=i?i.apply(v[t],$):void 0,t&&(a&&a.exports!==o&&a.exports!==v[t]?v[t]=a.exports:u===o&&T||(v[t]=u))}else t&&(v[t]=i)},t=e=f=function(t,e,i,s,n){if("string"==typeof t)return m[t]?m[t](e):p(g(t,h(e)).f);if(!t.splice){if(b=t,b.deps&&f(b.deps,b.callback),!e)return;e.splice?(t=e,e=i,i=null):t=o}return e=e||function(){},"function"==typeof i&&(i=s,s=n),s?d(o,t,e,i):setTimeout(function(){d(o,t,e,i)},4),f},f.config=function(t){return f(t)},t._defined=v,i=function(t,e,i){if("string"!=typeof t)throw new Error("See almond README: incorrect module build, no module name");e.splice||(i=e,e=[]),s(v,t)||s(y,t)||(y[t]=[t,e,i])},i.amd={jQuery:!0}}(),i("bower_components/almond/almond",function(){}),i("jquery",[],function(){"use strict";return jQuery}),i("underscore",[],function(){"use strict";return _}),i("assets/js/SimpleMap",["jquery","underscore"],function(t,e){"use strict";var i={latLng:"0,0",zoom:5,type:"ROADMAP",styles:"",scrollwheel:!1,draggable:!0,markers:[{locationlatlng:"0,0",title:"demo marker",custompinimage:""}]};Modernizr.touch&&(i.draggable=!1);var o=function(e,o){return this.mapOptions=t.extend({},i,o),this.elm=e,this.setOptions(),this};return o.prototype.setOptions=function(){return this.mapOptions.latLng=this.getLatLngFromString(this.mapOptions.latLng),this.mapOptions.center=new google.maps.LatLng(this.mapOptions.latLng[0],this.mapOptions.latLng[1]),this.mapOptions.mapTypeId=this.getMapConstant(),this},o.prototype.getMapConstant=function(){switch(this.mapOptions.type.toLowerCase()){case"roadmap":return google.maps.MapTypeId.ROADMAP;case"satellite":return google.maps.MapTypeId.SATELLITE;case"hybrid":return google.maps.MapTypeId.HYBRID;case"terrain":return google.maps.MapTypeId.TERRAIN;default:return google.maps.MapTypeId.ROADMAP}},o.prototype.getLatLngFromString=function(t){return e.isString(t)?e.map(t.split(","),function(t){return parseFloat(t,10)}):t},o.prototype.renderMap=function(){return e.isUndefined(this.elm)?!1:(this.map=new google.maps.Map(this.elm.get(0),this.mapOptions),this.addMarkers(),this)},o.prototype.addMarkers=function(){t.each(this.mapOptions.markers,t.proxy(function(t,i){var o=this.getLatLngFromString(i.locationlatlng),s=new google.maps.Marker({position:new google.maps.LatLng(o[0],o[1]),title:i.title});e(i.custompinimage).isEmpty()||s.setIcon(i.custompinimage),s.setMap(this.map)},this))},o}),+function(t){"use strict";function e(e){return this.each(function(){var o=t(this),s=o.data("bs.carousel"),n=t.extend({},i.DEFAULTS,o.data(),"object"==typeof e&&e),r="string"==typeof e?e:n.slide;s||o.data("bs.carousel",s=new i(this,n)),"number"==typeof e?s.to(e):r?s[r]():n.interval&&s.pause().cycle()})}var i=function(e,i){this.$element=t(e),this.$indicators=this.$element.find(".carousel-indicators"),this.options=i,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",t.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",t.proxy(this.pause,this)).on("mouseleave.bs.carousel",t.proxy(this.cycle,this))};i.VERSION="3.3.7",i.TRANSITION_DURATION=600,i.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},i.prototype.keydown=function(t){if(!/input|textarea/i.test(t.target.tagName)){switch(t.which){case 37:this.prev();break;case 39:this.next();break;default:return}t.preventDefault()}},i.prototype.cycle=function(e){return e||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(t.proxy(this.next,this),this.options.interval)),this},i.prototype.getItemIndex=function(t){return this.$items=t.parent().children(".item"),this.$items.index(t||this.$active)},i.prototype.getItemForDirection=function(t,e){var i=this.getItemIndex(e),o="prev"==t&&0===i||"next"==t&&i==this.$items.length-1;if(o&&!this.options.wrap)return e;var s="prev"==t?-1:1,n=(i+s)%this.$items.length;return this.$items.eq(n)},i.prototype.to=function(t){var e=this,i=this.getItemIndex(this.$active=this.$element.find(".item.active"));return t>this.$items.length-1||0>t?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){e.to(t)}):i==t?this.pause().cycle():this.slide(t>i?"next":"prev",this.$items.eq(t))},i.prototype.pause=function(e){return e||(this.paused=!0),this.$element.find(".next, .prev").length&&t.support.transition&&(this.$element.trigger(t.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},i.prototype.next=function(){return this.sliding?void 0:this.slide("next")},i.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},i.prototype.slide=function(e,o){var s=this.$element.find(".item.active"),n=o||this.getItemForDirection(e,s),r=this.interval,a="next"==e?"left":"right",l=this;if(n.hasClass("active"))return this.sliding=!1;var p=n[0],c=t.Event("slide.bs.carousel",{relatedTarget:p,direction:a});if(this.$element.trigger(c),!c.isDefaultPrevented()){if(this.sliding=!0,r&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var h=t(this.$indicators.children()[this.getItemIndex(n)]);h&&h.addClass("active")}var u=t.Event("slid.bs.carousel",{relatedTarget:p,direction:a});return t.support.transition&&this.$element.hasClass("slide")?(n.addClass(e),n[0].offsetWidth,s.addClass(a),n.addClass(a),s.one("bsTransitionEnd",function(){n.removeClass([e,a].join(" ")).addClass("active"),s.removeClass(["active",a].join(" ")),l.sliding=!1,setTimeout(function(){l.$element.trigger(u)},0)}).emulateTransitionEnd(i.TRANSITION_DURATION)):(s.removeClass("active"),n.addClass("active"),this.sliding=!1,this.$element.trigger(u)),r&&this.cycle(),this}};var o=t.fn.carousel;t.fn.carousel=e,t.fn.carousel.Constructor=i,t.fn.carousel.noConflict=function(){return t.fn.carousel=o,this};var s=function(i){var o,s=t(this),n=t(s.attr("data-target")||(o=s.attr("href"))&&o.replace(/.*(?=#[^\s]+$)/,""));if(n.hasClass("carousel")){var r=t.extend({},n.data(),s.data()),a=s.attr("data-slide-to");a&&(r.interval=!1),e.call(n,r),a&&n.data("bs.carousel").to(a),i.preventDefault()}};t(document).on("click.bs.carousel.data-api","[data-slide]",s).on("click.bs.carousel.data-api","[data-slide-to]",s),t(window).on("load",function(){t('[data-ride="carousel"]').each(function(){var i=t(this);e.call(i,i.data())})})}(jQuery),i("bootstrapCarousel",["jquery"],function(){}),i("assets/js/HeaderCarousel",["jquery","underscore","bootstrapCarousel"],function(t,e){"use strict";var i={selector:".js-jumbotron-slider",interval:t(".js-jumbotron-slider").data("interval")},o=function(){if(Modernizr.mq("(min-width: 992px)"))return void t(i.selector).removeAttr("style");var o=t(i.selector).outerHeight(),s=t(i.selector).css("min-height");(!e(s).isNumber()||o>s)&&t(i.selector).css("min-height",o)},s=t(i.selector).carousel({interval:i.interval});s.on("slid.bs.carousel",o),t(window).on("resize",e.debounce(function(){t(i.selector).css("min-height",0),o()},300))}),i("assets/js/StickyNavbar",["jquery","underscore"],function(t,e){"use strict";var i=function(){return t(".js-sticky-offset").offset().top-parseInt(t("html").css("marginTop"))},o=i(),s="fixed-navigation";t("body").on("update_sticky_state.pt",function(){t("body").hasClass(s)?(n(),t(window).trigger("scroll.stickyNavbar")):r()});var n=function(){t(window).on("scroll.stickyNavbar",e.throttle(function(){t("body").toggleClass("is-sticky-navbar",t(window).scrollTop()>o)},20))},r=function(){t(window).off("scroll.stickyNavbar"),t("body").removeClass("is-sticky-navbar")};t(window).on("resize.stickyNavbar",e.debounce(function(){o=i(),t("body").trigger("update_sticky_state.pt")},40)),t(window).trigger("resize.stickyNavbar")}),i("assets/js/TouchDropdown",["jquery"],function(t){"use strict";Modernizr&&Modernizr.touch&&Modernizr.mq("(min-width: 992px)")&&(t("ul.js-dropdown").find(".sub-menu").addClass("js-dropdown"),t("ul.js-dropdown").each(function(e,i){t(i).children(".menu-item-has-children").on("click.td","a",function(e){e.preventDefault(),t(i).children(".is-hover").removeClass("is-hover"),t(e.delegateTarget).addClass("is-hover"),t(e.delegateTarget).off("click.td")})}))}),+function(t){"use strict";function e(){var t=document.createElement("bootstrap"),e={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var i in e)if(void 0!==t.style[i])return{end:e[i]};return!1}t.fn.emulateTransitionEnd=function(e){var i=!1,o=this;t(this).one("bsTransitionEnd",function(){i=!0});var s=function(){i||t(o).trigger(t.support.transition.end)};return setTimeout(s,e),this},t(function(){t.support.transition=e(),t.support.transition&&(t.event.special.bsTransitionEnd={bindType:t.support.transition.end,delegateType:t.support.transition.end,handle:function(e){return t(e.target).is(this)?e.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),i("bootstrapTransition",["jquery"],function(){}),+function(t){"use strict";function e(e){var i,o=e.attr("data-target")||(i=e.attr("href"))&&i.replace(/.*(?=#[^\s]+$)/,"");return t(o)}function i(e){return this.each(function(){var i=t(this),s=i.data("bs.collapse"),n=t.extend({},o.DEFAULTS,i.data(),"object"==typeof e&&e);!s&&n.toggle&&/show|hide/.test(e)&&(n.toggle=!1),s||i.data("bs.collapse",s=new o(this,n)),"string"==typeof e&&s[e]()})}var o=function(e,i){this.$element=t(e),this.options=t.extend({},o.DEFAULTS,i),this.$trigger=t('[data-toggle="collapse"][href="#'+e.id+'"],[data-toggle="collapse"][data-target="#'+e.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};o.VERSION="3.3.7",o.TRANSITION_DURATION=350,o.DEFAULTS={toggle:!0},o.prototype.dimension=function(){var t=this.$element.hasClass("width");return t?"width":"height"},o.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var e,s=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(s&&s.length&&(e=s.data("bs.collapse"),e&&e.transitioning))){var n=t.Event("show.bs.collapse");if(this.$element.trigger(n),!n.isDefaultPrevented()){s&&s.length&&(i.call(s,"hide"),e||s.data("bs.collapse",null));var r=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[r](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var a=function(){this.$element.removeClass("collapsing").addClass("collapse in")[r](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!t.support.transition)return a.call(this);var l=t.camelCase(["scroll",r].join("-"));this.$element.one("bsTransitionEnd",t.proxy(a,this)).emulateTransitionEnd(o.TRANSITION_DURATION)[r](this.$element[0][l])}}}},o.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var e=t.Event("hide.bs.collapse");if(this.$element.trigger(e),!e.isDefaultPrevented()){var i=this.dimension();this.$element[i](this.$element[i]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var s=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return t.support.transition?void this.$element[i](0).one("bsTransitionEnd",t.proxy(s,this)).emulateTransitionEnd(o.TRANSITION_DURATION):s.call(this)}}},o.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},o.prototype.getParent=function(){return t(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(t.proxy(function(i,o){var s=t(o);this.addAriaAndCollapsedClass(e(s),s)},this)).end()},o.prototype.addAriaAndCollapsedClass=function(t,e){var i=t.hasClass("in");t.attr("aria-expanded",i),e.toggleClass("collapsed",!i).attr("aria-expanded",i)};var s=t.fn.collapse;t.fn.collapse=i,t.fn.collapse.Constructor=o,t.fn.collapse.noConflict=function(){return t.fn.collapse=s,this},t(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(o){var s=t(this);s.attr("data-target")||o.preventDefault();var n=e(s),r=n.data("bs.collapse"),a=r?"toggle":s.data();i.call(n,a)})}(jQuery),i("bootstrapCollapse",["jquery","bootstrapTransition"],function(){}),+function(t){"use strict";function e(e){return this.each(function(){var o=t(this),s=o.data("bs.tooltip"),n="object"==typeof e&&e;(s||!/destroy|hide/.test(e))&&(s||o.data("bs.tooltip",s=new i(this,n)),"string"==typeof e&&s[e]())})}var i=function(t,e){this.type=null,this.options=null,this.enabled=null,this.timeout=null,this.hoverState=null,this.$element=null,this.inState=null,this.init("tooltip",t,e)};i.VERSION="3.3.7",i.TRANSITION_DURATION=150,i.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},i.prototype.init=function(e,i,o){if(this.enabled=!0,this.type=e,this.$element=t(i),this.options=this.getOptions(o),this.$viewport=this.options.viewport&&t(t.isFunction(this.options.viewport)?this.options.viewport.call(this,this.$element):this.options.viewport.selector||this.options.viewport),this.inState={click:!1,hover:!1,focus:!1},this.$element[0]instanceof document.constructor&&!this.options.selector)throw new Error("`selector` option must be specified when initializing "+this.type+" on the window.document object!");for(var s=this.options.trigger.split(" "),n=s.length;n--;){var r=s[n];if("click"==r)this.$element.on("click."+this.type,this.options.selector,t.proxy(this.toggle,this));else if("manual"!=r){var a="hover"==r?"mouseenter":"focusin",l="hover"==r?"mouseleave":"focusout";this.$element.on(a+"."+this.type,this.options.selector,t.proxy(this.enter,this)),this.$element.on(l+"."+this.type,this.options.selector,t.proxy(this.leave,this))}}this.options.selector?this._options=t.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},i.prototype.getDefaults=function(){return i.DEFAULTS},i.prototype.getOptions=function(e){return e=t.extend({},this.getDefaults(),this.$element.data(),e),e.delay&&"number"==typeof e.delay&&(e.delay={show:e.delay,hide:e.delay}),e},i.prototype.getDelegateOptions=function(){var e={},i=this.getDefaults();return this._options&&t.each(this._options,function(t,o){i[t]!=o&&(e[t]=o)}),e},i.prototype.enter=function(e){var i=e instanceof this.constructor?e:t(e.currentTarget).data("bs."+this.type);return i||(i=new this.constructor(e.currentTarget,this.getDelegateOptions()),t(e.currentTarget).data("bs."+this.type,i)),e instanceof t.Event&&(i.inState["focusin"==e.type?"focus":"hover"]=!0),i.tip().hasClass("in")||"in"==i.hoverState?void(i.hoverState="in"):(clearTimeout(i.timeout),i.hoverState="in",i.options.delay&&i.options.delay.show?void(i.timeout=setTimeout(function(){"in"==i.hoverState&&i.show()},i.options.delay.show)):i.show())},i.prototype.isInStateTrue=function(){for(var t in this.inState)if(this.inState[t])return!0;return!1},i.prototype.leave=function(e){var i=e instanceof this.constructor?e:t(e.currentTarget).data("bs."+this.type);return i||(i=new this.constructor(e.currentTarget,this.getDelegateOptions()),t(e.currentTarget).data("bs."+this.type,i)),e instanceof t.Event&&(i.inState["focusout"==e.type?"focus":"hover"]=!1),i.isInStateTrue()?void 0:(clearTimeout(i.timeout),i.hoverState="out",i.options.delay&&i.options.delay.hide?void(i.timeout=setTimeout(function(){"out"==i.hoverState&&i.hide()},i.options.delay.hide)):i.hide())},i.prototype.show=function(){var e=t.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(e);var o=t.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(e.isDefaultPrevented()||!o)return;var s=this,n=this.tip(),r=this.getUID(this.type);this.setContent(),n.attr("id",r),this.$element.attr("aria-describedby",r),this.options.animation&&n.addClass("fade");var a="function"==typeof this.options.placement?this.options.placement.call(this,n[0],this.$element[0]):this.options.placement,l=/\s?auto?\s?/i,p=l.test(a);p&&(a=a.replace(l,"")||"top"),n.detach().css({top:0,left:0,display:"block"}).addClass(a).data("bs."+this.type,this),this.options.container?n.appendTo(this.options.container):n.insertAfter(this.$element),this.$element.trigger("inserted.bs."+this.type);var c=this.getPosition(),h=n[0].offsetWidth,u=n[0].offsetHeight;if(p){var d=a,f=this.getPosition(this.$viewport);a="bottom"==a&&c.bottom+u>f.bottom?"top":"top"==a&&c.top-u<f.top?"bottom":"right"==a&&c.right+h>f.width?"left":"left"==a&&c.left-h<f.left?"right":a,n.removeClass(d).addClass(a)}var g=this.getCalculatedOffset(a,c,h,u);this.applyPlacement(g,a);var m=function(){var t=s.hoverState;s.$element.trigger("shown.bs."+s.type),s.hoverState=null,"out"==t&&s.leave(s)};t.support.transition&&this.$tip.hasClass("fade")?n.one("bsTransitionEnd",m).emulateTransitionEnd(i.TRANSITION_DURATION):m()}},i.prototype.applyPlacement=function(e,i){var o=this.tip(),s=o[0].offsetWidth,n=o[0].offsetHeight,r=parseInt(o.css("margin-top"),10),a=parseInt(o.css("margin-left"),10);isNaN(r)&&(r=0),isNaN(a)&&(a=0),e.top+=r,e.left+=a,t.offset.setOffset(o[0],t.extend({using:function(t){o.css({top:Math.round(t.top),left:Math.round(t.left)})}},e),0),o.addClass("in");var l=o[0].offsetWidth,p=o[0].offsetHeight;"top"==i&&p!=n&&(e.top=e.top+n-p);var c=this.getViewportAdjustedDelta(i,e,l,p);c.left?e.left+=c.left:e.top+=c.top;var h=/top|bottom/.test(i),u=h?2*c.left-s+l:2*c.top-n+p,d=h?"offsetWidth":"offsetHeight";o.offset(e),this.replaceArrow(u,o[0][d],h)},i.prototype.replaceArrow=function(t,e,i){this.arrow().css(i?"left":"top",50*(1-t/e)+"%").css(i?"top":"left","")},i.prototype.setContent=function(){var t=this.tip(),e=this.getTitle();t.find(".tooltip-inner")[this.options.html?"html":"text"](e),t.removeClass("fade in top bottom left right")},i.prototype.hide=function(e){function o(){"in"!=s.hoverState&&n.detach(),s.$element&&s.$element.removeAttr("aria-describedby").trigger("hidden.bs."+s.type),e&&e()}var s=this,n=t(this.$tip),r=t.Event("hide.bs."+this.type);return this.$element.trigger(r),r.isDefaultPrevented()?void 0:(n.removeClass("in"),t.support.transition&&n.hasClass("fade")?n.one("bsTransitionEnd",o).emulateTransitionEnd(i.TRANSITION_DURATION):o(),this.hoverState=null,this)},i.prototype.fixTitle=function(){var t=this.$element;(t.attr("title")||"string"!=typeof t.attr("data-original-title"))&&t.attr("data-original-title",t.attr("title")||"").attr("title","")},i.prototype.hasContent=function(){return this.getTitle()},i.prototype.getPosition=function(e){e=e||this.$element;var i=e[0],o="BODY"==i.tagName,s=i.getBoundingClientRect();null==s.width&&(s=t.extend({},s,{width:s.right-s.left,height:s.bottom-s.top}));var n=window.SVGElement&&i instanceof window.SVGElement,r=o?{top:0,left:0}:n?null:e.offset(),a={scroll:o?document.documentElement.scrollTop||document.body.scrollTop:e.scrollTop()},l=o?{width:t(window).width(),height:t(window).height()}:null;return t.extend({},s,a,l,r)},i.prototype.getCalculatedOffset=function(t,e,i,o){return"bottom"==t?{top:e.top+e.height,left:e.left+e.width/2-i/2}:"top"==t?{top:e.top-o,left:e.left+e.width/2-i/2}:"left"==t?{top:e.top+e.height/2-o/2,left:e.left-i}:{top:e.top+e.height/2-o/2,left:e.left+e.width}},i.prototype.getViewportAdjustedDelta=function(t,e,i,o){var s={top:0,left:0};if(!this.$viewport)return s;var n=this.options.viewport&&this.options.viewport.padding||0,r=this.getPosition(this.$viewport);if(/right|left/.test(t)){var a=e.top-n-r.scroll,l=e.top+n-r.scroll+o;a<r.top?s.top=r.top-a:l>r.top+r.height&&(s.top=r.top+r.height-l)}else{var p=e.left-n,c=e.left+n+i;p<r.left?s.left=r.left-p:c>r.right&&(s.left=r.left+r.width-c)}return s},i.prototype.getTitle=function(){var t,e=this.$element,i=this.options;return t=e.attr("data-original-title")||("function"==typeof i.title?i.title.call(e[0]):i.title)},i.prototype.getUID=function(t){do t+=~~(1e6*Math.random());while(document.getElementById(t));return t},i.prototype.tip=function(){if(!this.$tip&&(this.$tip=t(this.options.template),1!=this.$tip.length))throw new Error(this.type+" `template` option must consist of exactly 1 top-level element!");return this.$tip},i.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},i.prototype.enable=function(){this.enabled=!0},i.prototype.disable=function(){this.enabled=!1},i.prototype.toggleEnabled=function(){this.enabled=!this.enabled},i.prototype.toggle=function(e){var i=this;e&&(i=t(e.currentTarget).data("bs."+this.type),i||(i=new this.constructor(e.currentTarget,this.getDelegateOptions()),t(e.currentTarget).data("bs."+this.type,i))),e?(i.inState.click=!i.inState.click,i.isInStateTrue()?i.enter(i):i.leave(i)):i.tip().hasClass("in")?i.leave(i):i.enter(i)},i.prototype.destroy=function(){var t=this;clearTimeout(this.timeout),this.hide(function(){t.$element.off("."+t.type).removeData("bs."+t.type),t.$tip&&t.$tip.detach(),t.$tip=null,t.$arrow=null,t.$viewport=null,t.$element=null})};var o=t.fn.tooltip;t.fn.tooltip=e,t.fn.tooltip.Constructor=i,t.fn.tooltip.noConflict=function(){return t.fn.tooltip=o,this}}(jQuery),i("bootstrapTooltip",["jquery"],function(){}),e.config({paths:{jquery:"assets/js/fix.jquery",underscore:"assets/js/fix.underscore",bootstrapAffix:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/affix",bootstrapAlert:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/alert",bootstrapButton:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/button",bootstrapCarousel:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/carousel",bootstrapCollapse:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/collapse",bootstrapDropdown:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/dropdown",bootstrapModal:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/modal",bootstrapPopover:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/popover",bootstrapScrollspy:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/scrollspy",bootstrapTab:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/tab",bootstrapTooltip:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/tooltip",bootstrapTransition:"bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/transition"},shim:{bootstrapAffix:{deps:["jquery"]},bootstrapAlert:{deps:["jquery"]},bootstrapButton:{deps:["jquery"]},bootstrapCarousel:{deps:["jquery"]},bootstrapCollapse:{deps:["jquery","bootstrapTransition"]},bootstrapDropdown:{deps:["jquery"]},bootstrapPopover:{deps:["jquery"]},bootstrapScrollspy:{deps:["jquery"]},bootstrapTab:{deps:["jquery"]},bootstrapTooltip:{deps:["jquery"]},bootstrapTransition:{deps:["jquery"]},jqueryVimeoEmbed:{deps:["jquery"]}}}),e.config({baseUrl:BuildPressVars.pathToTheme}),e(["jquery","underscore","assets/js/SimpleMap","assets/js/HeaderCarousel","assets/js/StickyNavbar","assets/js/TouchDropdown","bootstrapCollapse","bootstrapTooltip"],function(t,e,i){"use strict";t(window).on("resize",e.debounce(function(){Modernizr.mq("(min-width: 992px)")&&t("#buildpress-navbar-collapse").removeAttr("style").removeClass("in")},500)),t(".js-where-we-are").each(function(){new i(t(this),{latLng:t(this).data("latlng"),markers:t(this).data("markers"),zoom:t(this).data("zoom"),type:t(this).data("type"),styles:t(this).data("style")}).renderMap()}),t('[data-toggle="tooltip"]').tooltip()}),i("assets/js/main",function(){})}();