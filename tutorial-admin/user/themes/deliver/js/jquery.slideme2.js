/*!
  jQuery Slideme 2 plugin
  @name jquery.slideme2.js
  @author Luigi Ferraresi (luigi.ferraresi@gmail.com)
  @version 2.21.36
  @date 2014/12/16
  @category jQuery Plugin
  @copyright (c)2014 Luigi Ferraresi (http://slideme.luigiferraresi.it)
*/

(function ($) {

    var version = '2.21.36';
    var pluginName = 'slideme';
    var Plugin, defaultOptions, __bind;
    var methods = [ 'init',
		    'animate',
		    'arrowClicked',
		    'arrowTaped',
		    'beforeScrollTo',
		    'checkArrows',
                    'clearFromClone',
		    'createArrows',
		    'createNumbers',
		    'createPagination',
		    'createThumbs',
		    'css3Supports',
		    'destroy',
		    'getBrowser',
		    'getInfinitePaginationIndex',
		    'getNativeTouchScrollNext',
		    'getNext',
		    'getNextById',
		    'getReadyForNewAnimation',
		    'getTotalSlides',
		    'inquire',
		    'jumpTo',
		    'jumpToId',
		    'onAnimationEnded',
		    'onOrientationchange',
		    'onResize',
		    'onSnapEnd',
                    'onSwipeEnd',
		    'onTouchend',
		    'onWindowScroll',
		    'play',
		    'playTo',
		    'playToId',
                    'redraw',
		    'removeAutoslide',
                    'resetAutoslide',
		    'restoreStartOrder',
		    'scrollTo',
		    'setAfter',
		    'setAutoslide',
		    'setBefore',
		    'setCurrent',
		    'setInfiniteSlides',
		    'setNext',
		    'setPaginationCurrent',
		    'setSibling',
		    'setStartOrder',
		    'setSwipe',
		    'setSwipeEnd',
		    'setSwipeMove',
		    'setSwipeStart',
		    'snapTo',
                    'stop',
		    'swipeSupport',
		    'swipeTo',
		    'update'
                  ];

    __bind = function (fn, me) {
        return function () {
            return fn.apply(me, arguments);
        };
    };

    // Plugin default options.
    defaultOptions = {
        arrows: false,
        autoslide: false,
        autoslideHoverStop: true,
        css3: true,
        current: 0,
        defaultWrapper: '.slideme',
        direction: 1,
        interval: 1000,
        itemsForSlide: 1,
        labels: {
            prev: '',
            next: ''
        },
        loop: false,
        nativeTouchScroll: false,
        totalSlides: 0,
        onCreatedCallback: '',
        onEndCallback: '',
        onInquire: '',
        onStartCallback: '',
        pagination: '',
        ready: false,
        resizable: {
            width: '',
            height: ''
        },
        thumbs: {
            width: 50,
            height: 40
        },
        transition: 'slide',
        speed: 500,
        swipe: true
    };

    Plugin = (function (options) {

        function Plugin(options) {
            this.settings = $.extend({}, defaultOptions, options);
            for (var i = 0, n = methods.length; i < n; i++) {
                var method = methods[i];
                this[method] = __bind(this[method], this);
            }
        };

        $.extend(Plugin.prototype, {

            init: function (selector) {
                this.dom = {};
                this.dom.slideme_container = $(selector).addClass('slideme_container');
                this.dom.slideme = this.dom.slideme_container.find(this.settings.defaultWrapper);
                if (!this.dom.slideme.length) {
                    console.error('Wrapper don\'t found');
                    return false;
                }
                if (this.settings.nativeTouchScroll) {
                    this.settings.swipe = false;
                    this.dom.slideme.addClass('slideme-touch').on('touchend', this.onTouchend);
                    if (this.settings.autoslide) {
                        this.dom.slideme.addClass('slideme-touch').on('touchstart', this.removeAutoslide);
                    }
                    $(window).on('resize.orientationchange', this.onOrientationchange);
                } else {
                    this.dom.slideme.addClass('slideme-' + this.settings.transition);
                }
                if (this.settings.itemsForSlide > 1) {
                    var slides = this.dom.slideme.children();
                    var k = this.settings.itemsForSlide;
                    for (var i = 0, n = slides.length; i < n; i += k) {
                        slides.slice(i, i + k).wrapAll("<li class='new'/>");
                    }
                }
                this.browser = this.getBrowser();
                this.counters = {
                    current: 0,
                    index: 0,
                    next: 0,
                    total: this.getTotalSlides()
                };
                if (this.counters.total === 0) {
                    this.dom.slideme_container.addClass('single');
                } else if (this.counters.total < 1) {
                    console.log('At last, one slide is needed!');
                }
                if (this.settings.css3 && !this.css3Supports()) {
                    this.settings.css3 = false;
                    if (this.settings.transition === "zoom") {
                        this.dom.slideme.removeClass('slideme-zoom').addClass('slideme-slide');
                    }
                    console.log('Please, take notice that this browser don\'t supports css3 transition.');
                }
                if (this.settings.arrows) {
                    var event = this.settings.nativeTouchScroll ? this.arrowTaped : this.arrowClicked;
                    var arrows = this.createArrows(event);
                    this.dom.arrows = arrows;
                }
                if (this.settings.arrows && !this.settings.loop) {
                    this.checkArrows();
                }
                if (this.settings.pagination) {
                    this.createPagination();
                }
                if (this.settings.autoslide && this.settings.autoslideHoverStop && this.counters.total !== 0) {
                    this.dom.slideme_container.on('mouseenter', this.removeAutoslide).on('mouseleave', this.resetAutoslide);
                }
                if (this.settings.resizable.width && this.settings.resizable.height) {
                    this.resize = $(window).on('resize', this.onResize);
                    this.onResize();
                }
                if (this.settings.onCreatedCallback) {
                    this.settings.onCreatedCallback({ 'instance': this.dom.slideme_container, 'index': this.counters.current });
                }
                if (this.settings.swipe && this.swipeSupport()) {
                    this.swipe = {
                        'startX': 0,
                        'startY': 0,
                        'endX': 0,
                        'endY': 0,
                        'deltaX': 0,
                        'deltaY': 0
                    };
                    this.setSwipe();
                }
                this.setCurrent();
                if (this.settings.loop && this.settings.nativeTouchScroll) {
                    this.setStartOrder();
                    this.setInfiniteSlides();
                } else if (!this.settings.nativeTouchScroll && this.counters.total !== 0) {
                    this.setSibling();
                }
                this.working = false;
                if (this.settings.autoslide && this.counters.total !== 0) {
                    this.setAutoslide();
                }
            },

            animate: function (data) {
                if (this.counters.current !== this.counters.next) {
                    this.working = true;
                    this.animation = data.direction === 1 ? "nextClicked" : "prevClicked";
                    this.setNext();
                    if (this.settings.onStartCallback) {
                        this.settings.onStartCallback({ 'instance': this.dom.slideme_container, 'index': this.counters.current, 'total': this.counters.total, 'next': this.counters.next });
                    }
                    if (data.direction === 1) {
                        this.dom.slideme.children().removeClass('before');
                    } else {
                        this.dom.slideme.children().removeClass('after');
                    }
                    this.redraw(this.dom.next);
                    if (this.settings.css3) {
                        this.dom.current.one('otransitionend webkitTransitionEnd transitionend', this.onAnimationEnded);
                        this.dom.slideme.addClass(this.animation);
                    } else {
                        var currentAnimation = {},
                        nextAnimation = {};
                        switch (this.settings.transition) {
                            case "fade":
                                currentAnimation['opacity'] = 0;
                                nextAnimation['opacity'] = 1;
                                break;
                            case "page":
                                nextAnimation['left'] = '0%';
                                break;
                            default:
                                currentAnimation['left'] = -100 * data.direction + '%';
                                nextAnimation['left'] = 0;
                                break;
                        }
                        this.dom.current.stop(true, false).animate(currentAnimation, this.speed);
                        this.dom.next.stop(true, false).animate(nextAnimation, this.speed, this.onAnimationEnded);
                    }
                }
            },

            arrowClicked: function (e) {
                if (!this.working) {
                    var direction = e.data.direction;
                    this.counters.next = this.getNext(direction);
                    this.animate({ 'direction': direction });
                    if (this.settings.swipe && this.swipeSupport() && this.settings.autoslide) {
                        this.removeAutoslide();
                    }
                    e.preventDefault();
                }
            },

            arrowTaped: function (e) {
                if (!this.working) {
                    var direction = e.data.direction;
                    var index;
                    if (this.settings.loop) {
                        this.counters.index = this.counters.index + direction;
                        index = this.counters.current + direction;
                    } else {
                        index = this.getNext(direction);
                    }
                    if (this.settings.autoslide) {
                        this.removeAutoslide();
                    }
                    this.scrollTo(index);
                    e.preventDefault();
                }
            },

            beforeScrollTo: function (e) {
                if (this.settings.loop) {
                    var i = this.getInfinitePaginationIndex();
                    this.clearFromClone(i);
                    this.restoreStartOrder(i);
                    this.counters.index = e.data.index;
                }
                if (this.settings.autoslide) {
                    this.removeAutoslide();
                }
                this.scrollTo(e);
            },

            checkArrows: function () {
                if (this.counters.current === this.counters.total) {
                    this.dom.arrows.next.attr({ 'disabled': 'disabled' });
                } else {
                    this.dom.arrows.next.removeAttr('disabled');
                }
                if (this.counters.current === 0) {
                    this.dom.arrows.prev.attr({ 'disabled': 'disabled' });
                } else {
                    this.dom.arrows.prev.removeAttr('disabled');
                }
            },
            
            clearFromClone: function() {
                this.dom.slideme.children().removeClass('original').filter('.clone').remove();
                var x = this.dom.current.position().left + this.dom.slideme.scrollLeft();
                this.dom.slideme.scrollLeft(x);
            },

            createArrows: function (event) {
                var arrows = {};
                for (key in this.settings.labels) {
                    var params = { 'direction': key === "next" ? 1 : -1, 'key': key };
                    var arrow = $('<button class="arrow" />').addClass(key).html(this.settings.labels[key]).on('click', params, event);
                    arrows[key] = arrow;
                    this.dom.slideme_container.append(arrows[key]);
                }
                return arrows;
            },

            createNumbers: function (event) {
                var numbers = [];
                for (var i = 0, n = this.counters.total; i <= n; i++) {
                    var params = { 'index': i },
                    number = $('<li/>').on('click', params, event);
                    numbers.push(number);
                }
                return numbers;
            },

            createPagination: function (event) {
                this.dom.slideme_pagination = $('<nav class="pagination"/>');
                if (this.settings.pagination === "numbers" || this.settings.pagination === "both") {
                    var numbers_container = $('<ol class="numbers" />');
                    var event = this.settings.nativeTouchScroll ? this.beforeScrollTo : this.playTo;
                    var numbers = this.createNumbers(event);
                    numbers_container.append(numbers.slice());
                    this.dom.slideme_pagination.append(numbers_container);
                }
                if (this.settings.pagination === "thumbs" || this.settings.pagination === "both") {
                    var thumbs_container = $('<ol class="thumbs" />');
                    var event = this.settings.nativeTouchScroll ? this.beforeScrollTo : this.playTo;
                    var thumbs = this.createThumbs(event);
                    thumbs_container.append(thumbs.slice());
                    this.dom.slideme_pagination.append(thumbs_container);
                }
                this.dom.slideme_container.append(this.dom.slideme_pagination);
                this.setPaginationCurrent(this.counters.current);
            },

            createThumbs: function (event) {
                var thumbs = [],
                width = this.settings.thumbs.width,
                height = this.settings.thumbs.height;
                this.dom.slideme.find('>*').each(function (i) {
                    var params = { 'index': i },
                    src = $(this).find('img').eq(0).attr('src'),
                    img = $('<img />').attr({ 'src': src, 'width': width, 'height': height }),
                    thumb = $('<li/>').html(img).on('click', params, event);
                    thumbs.push(thumb);
                });
                return thumbs;
            },

            css3Supports: function () {
                var b = document.body || document.documentElement;
                var s = b.style;
                var t = 'transition';
                if (typeof s[t] === "string") {
                    return true;
                }
                var browsers = ['Moz', 'Webkit', 'Khtml', 'O', 'ms'],
                t = t.charAt(0).toUpperCase() + t.substr(1);
                for (var i = 0, n = browsers.length; i < n; i++) {
                    if (typeof s[browsers[i] + t] === "string") {
                        return true;
                    }
                }
                return false;
            },

            destroy: function () {
                this.dom.slideme_container.removeClass('slideme_container single').removeData();
                this.dom.slideme.removeClass('slideme-' + this.settings.transition);
                if (this.settings.pagination) {
                    this.dom.slideme_pagination.remove();
                }
                if (this.settings.arrows) {
                    this.dom.arrows.next.prev();
                    this.dom.arrows.next.remove();
                }
                if (this.settings.resizable.width && this.settings.resizable.height) {
                    this.dom.slideme.css({ 'height': 'auto' });
                    this.resize = null;
                }
                if (this.settings.autoslide) {
                    this.removeAutoslide();
                }
            },

            getBrowser: function () {
                var useragent = navigator.userAgent;
                switch (true) {
                    case useragent.lastIndexOf('MSIE') > 0:
                        return 'MSIE';
                        break;
                    case useragent.lastIndexOf('Chrome') > 0:
                        return 'Chrome';
                        break;
                    case useragent.lastIndexOf('Firefox') > 0:
                        return 'Firefox';
                        break;
                    case useragent.lastIndexOf('Safari') > 0:
                        return 'Safari';
                        break;
                    default:
                        return '';
                }
            },

            getInfinitePaginationIndex: function () {
                var index = (this.counters.index >= 0 && this.counters.index <= this.counters.total) || (this.counters.index < 0 && this.counters.index >= -this.counters.total) ? this.counters.index : this.counters.index % (this.counters.total + 1);
                return index;
            },

            getNext: function (direction) {
                var next = this.counters.current + direction;
                switch (true) {
                    case (next > this.counters.total && this.settings.loop):
                        next = 0;
                        break;
                    case (next < 0 && this.settings.loop):
                        next = this.counters.total;
                        break;
                    case (next > this.counters.total && !this.settings.loop || next < 0 && !this.settings.loop):
                        next = this.counters.current;
                        break;
                }
                return next;
            },

            getNextById: function (id) {
                var next = this.dom.slideme.find(id).index();
                return next;
            },

            getReadyForNewAnimation: function () {
                this.dom.slideme.children().removeClass('current next after before');
                if (!this.settings.nativeTouchScroll) {
                    this.counters.current = this.counters.next;
                    this.setCurrent();
                    this.setSibling();
                } else if (this.settings.nativeTouchScroll && !this.settings.loop) {
                    this.setCurrent();
                } else if (this.settings.nativeTouchScroll && this.settings.loop) {
                    this.setCurrent();
                    this.setInfiniteSlides();
                }
                if (!this.settings.loop && this.settings.arrows) {
                    this.checkArrows();
                }
                if (this.settings.pagination && (this.settings.nativeTouchScroll && this.settings.loop)) {
                    var index = this.getInfinitePaginationIndex();
                    this.setPaginationCurrent(index);
                } else if (this.settings.pagination) {
                    this.setPaginationCurrent(this.counters.current);
                }
                if (this.settings.onEndCallback) {
                    this.settings.onEndCallback({ 'instance': this.dom.slideme_container, 'index': this.counters.current, 'total': this.counters.total });
                }
                this.working = false;
                if (this.settings.autoslide && !this.pause || this.settings.autoslide && this.settings.swipe && this.swipeSupport()) {
                    this.setAutoslide();
                }
            },

            getTotalSlides: function () {
                return this.dom.slideme.children().length - 1;
            },

            inquire: function () {
                if (this.settings.onInquire) {
                    this.settings.onInquire({ 'instance': this.dom.slideme_container, 'index': this.counters.current, 'total': this.counters.total, 'version': version });
                } else {
                    console.log('Please, take notice that onInquire callback function must exist.');
                }
            },

            jumpTo: function (index) {
                clearTimeout(this.timer);
                this.counters.next = index;
                this.getReadyForNewAnimation();
            },

            jumpToId: function (id) {
                clearTimeout(this.timer);
                var index = this.getNextById(id);
                this.counters.next = index;
                this.getReadyForNewAnimation();
            },

            onAnimationEnded: function (e) {
                if (this.settings.css3) {
                    this.dom.current.off('otransitionend webkitTransitionEnd transitionend');
                    this.dom.slideme.removeClass(this.animation);
                } else {
                    this.dom.slideme.children().removeAttr('style');
                }
                this.getReadyForNewAnimation();
            },

            onOrientationchange: function () {
                if (this.settings.autoslide) {
                    this.removeAutoslide();
                }
                this.scrollTo(this.counters.current);
            },

            onResize: function () {
                var width = this.settings.resizable.width,
                height = this.settings.resizable.height,
                h = Math.round(height * this.dom.slideme.width() / width);
                this.dom.slideme.css({ 'height': h });
            },

            onTouchend: function (e) {
                if (!this.working) {
                    var x = e.currentTarget.scrollLeft;
                    var w = Math.round(this.dom.current.width() / 1.3);
                    var after = this.dom.current.next();
                    var before = this.dom.current.prev();
                    var afterX = after.length ? Math.abs(after.position().left + x) : 0;
                    var beforeX = before.length ? Math.abs(before.position().left + x) : 0;
                    var currentX = Math.abs(this.dom.current.position().left + x);
                    if (x >= afterX - w && (this.settings.loop || !this.settings.loop && this.counters.current !== this.counters.total)) {
                        this.counters.current = this.counters.current + 1;
                        this.counters.index = this.counters.index + 1;
                        x = afterX;
                    } else if (x <= beforeX + w && (this.settings.loop || !this.settings.loop && this.counters.current !== 0)) {
                        this.counters.current = this.counters.current - 1;
                        this.counters.index = this.counters.index - 1;
                        x = beforeX;
                    } else {
                        x = currentX;
                    }
                    this.working = true;
                    this.dom.slideme.addClass('snapping');
                    this.redraw(this.dom.slideme);
                    this.snapTo(x);
                }
            },

            onSnapEnd: function (e) {
                this.dom.slideme.removeClass('snapping');
                this.pause = false;
                this.getReadyForNewAnimation();
            },

            onSwipeEnd: function (e) {
                if (this.settings.autoslide) {
                    this.setAutoslide();
                }
            },

            onWindowScroll: function (e) {
                if (this.working) {
                    this.onAnimationEnded();
                    e.preventDefault();
                }
            },

            play: function (e) {
                this.pause = false;
                this.setAutoslide();
            },

            playTo: function (e) {
                var index = typeof e.data != "undefined" ? e.data.index : e;
                if (!this.working && index !== this.counters.current && index <= this.counters.total) {
                    var direction = index > this.counters.current ? 1 : -1;
                    direction > 0 ? this.setAfter(index) : this.setBefore(index);
                    this.counters.next = index;
                    if (this.settings.autoslide) {
                        clearTimeout(this.timer);
                    }
                    this.settings.nativeTouchScroll ? this.scrollTo(index) : this.animate({ 'direction': direction });
                }
            },

            playToId: function (id) {
                var index = this.getNextById(id);
                this.playTo(index);
                if (this.settings.autoslide) {
                    clearTimeout(this.timer);
                }
            },

            redraw: function (elements) {
                elements.each(function () {
                    var redraw = this.offsetHeight;
                });
            },

            removeAutoslide: function () {
                this.pause = true;
                clearTimeout(this.timer);
            },
            
            resetAutoslide: function() {
                this.pause = false;
                this.setAutoslide();
            },

            restoreStartOrder: function (index) {
                var x;
                var slides = this.dom.slideme.children().detach();
                slides.sort(function (a, b) {
                    var indexA = $(a).data('index');
                    var indexB = $(b).data('index');
                    if (indexA > indexB) {
                        return 1;
                    } else {
                        return -1;
                    }
                });
                this.counters.index = this.counters.current;
                this.dom.slideme.append(slides);
                x = this.dom.slideme.children().eq(index).position().left + this.dom.slideme.scrollLeft();
                this.dom.slideme.scrollLeft(x);
            },

            scrollTo: function (e) {
                var index = typeof e.data != "undefined" ? e.data.index : e;
                var x = this.dom.slideme.children().eq(index).position().left + this.dom.slideme.scrollLeft();
                this.counters.current = index;
                if (this.settings.onStartCallback) {
                    this.settings.onStartCallback({ 'instance': this.dom.slideme_container, 'index': this.counters.current, 'total': this.counters.total, 'next': this.counters.current });
                }
                this.snapTo(x);
            },

            setAfter: function (index) {
                var afterSlide = this.dom.slideme.children().removeClass('after before').eq(index).addClass('after');
                this.redraw(afterSlide);
            },

            setAutoslide: function () {
                if (!this.working && (this.settings.loop || !this.settings.loop && ((this.counters.current !== this.counters.total && this.settings.direction === 1) || (this.counters.current !== 0 && this.settings.direction === -1)))) {
                    var direction = this.settings.direction;
                    var interval = this.settings.interval;
                    var event = this.settings.nativeTouchScroll ? this.scrollTo : this.animate;
                    this.pause = false;
                    this.counters.next = this.getNext(direction);
                    if (this.settings.nativeTouchScroll) {
                        var index = this.settings.loop ? this.counters.current + direction : this.getNext(direction);
                        this.timer = setTimeout(function () {
                            event(index);
                        }, interval);
                    } else {
                        this.timer = setTimeout(function () {
                            event({ 'direction': direction });
                        }, interval);
                    }
                }
            },

            setBefore: function (index) {
                var beforeSlide = this.dom.slideme.children().removeClass('after before').eq(index).addClass('before');
                this.redraw(beforeSlide);
            },

            setCurrent: function () {
                this.dom.current = this.dom.slideme.children().eq(this.counters.current).addClass('current');
                this.redraw(this.dom.current);
            },
            
            setInfiniteSlides: function () {
                if(this.counters.total !== 1) {
                    if (!this.dom.current.next().length) {
                        var slide = this.dom.slideme.children(':first-child').detach();
                        this.counters.current = this.counters.current - 1;
                        this.dom.slideme.append(slide);
                    } else if (!this.dom.current.prev().length) {
                        var slide = this.dom.slideme.children(':last-child').detach();
                        this.counters.current = this.counters.current + 1;
                        this.dom.slideme.prepend(slide);
                    }
                } else {
                    var clone = this.dom.slideme.children().filter('.clone');
                    var original = this.dom.slideme.children().filter('.original');
                    if(clone.is('.current')) {
                        original.addClass('current');
                        this.dom.current = original;
                    }
                    if(clone.length){
                        original.removeClass('original');
                        clone.removeClass('clone current').remove();
                    }
                    original = this.dom.slideme.children().filter(':not(".current")');
                    clone = original.clone().addClass('clone');
                    original.addClass('original');
                    this.counters.current = 1;
                    if (!this.dom.current.next().length) {
                        this.dom.slideme.append(clone);
                    } else if (!this.dom.current.prev().length) {
                        this.dom.slideme.prepend(clone);
                    }
                }
                var x = this.dom.slideme.children().eq(this.counters.current).position().left + this.dom.slideme.scrollLeft();
                this.dom.slideme.scrollLeft(x);
            },

            setNext: function () {
                this.dom.next = this.dom.slideme.children().eq(this.counters.next).addClass('next');
                this.redraw(this.dom.next);
            },

            setPaginationCurrent: function (index) {
                this.dom.slideme_pagination.find('li').removeClass('current');
                this.dom.slideme_pagination.find('ol.numbers li').eq(index).addClass('current');
                this.dom.slideme_pagination.find('ol.thumbs li').eq(index).addClass('current');
            },

            setSibling: function () {
                var after = this.counters.current + 1 > this.counters.total ? 0 : this.counters.current + 1;
                var before = this.counters.current - 1;
                this.dom.after = this.dom.slideme.children().eq(after).addClass('after');
                this.dom.before = this.dom.slideme.children().eq(before).addClass('before');
            },

            setStartOrder: function () {
                var slides = this.dom.slideme.children();
                $.each(slides, function (i) {
                    $(this).data('index', i);
                });
            },

            setSwipe: function () {
                this.dom.slideme.on('touchstart', this.setSwipeStart);
                this.dom.slideme.on('touchmove', this.setSwipeMove);
                this.dom.slideme.on('touchend', this.setSwipeEnd);
                if (this.browser === "Safari" && this.settings.css3) {
                    $(window).on('scroll', this.onWindowScroll);
                }
            },

            setSwipeEnd: function () {
                if (this.pause && !this.working) {
                    this.swipeTo();
                }
            },

            setSwipeMove: function (e) {
                var touch = e.originalEvent.touches[0];
                if (this.pause && !this.working && touch) {
                    this.swipe.deltaX = this.swipe.startX - touch.pageX;
                    this.swipe.deltaY = this.swipe.startY - touch.pageY;
                    if (Math.abs(this.swipe.deltaX) > 30) {
                        e.preventDefault();
                    }
                }
            },

            setSwipeStart: function (e) {
                var touch = e.originalEvent.touches[0];
                if (!this.pause && !this.working && touch) {
                    this.pause = true;
                    this.swipe.deltaX = 0;
                    this.swipe.deltaY = 0;
                    this.swipe.startX = touch.pageX;
                    this.swipe.startY = touch.pageY;
                    if (this.settings.autoslide) {
                        this.removeAutoslide();
                    }
                }
            },

            snapTo: function (x) {
                var speed = Math.round(350 + Math.abs((this.counters.next - this.counters.current) * 10));
                this.dom.slideme.stop(true, false).animate({
                    scrollLeft: x
                }, speed, this.onSnapEnd);
            },
            
            stop: function () {
                this.pause = true;
                this.removeAutoslide();
            },

            swipeSupport: function () {
                return (('ontouchstart' in window) || (navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0));
            },

            swipeTo: function (x, y) {
                if (!this.working && (Math.abs(this.swipe.deltaX) > 30 && Math.abs(this.swipe.deltaY) < 75)) {
                    this.working = true;
                    this.pause = false;
                    var direction = this.swipe.deltaX > 0 ? 1 : -1;
                    this.counters.next = this.getNext(direction);
                    this.animate({ 'direction': direction });
                } else if (!this.working && this.pause) {
                    this.resetAutoslide();
                }
            },

            update: function () {
                this.counters.total = this.getTotalSlides();
                if (this.settings.pagination) {
                    this.dom.slideme_pagination.remove();
                    this.createPagination();
                }
                if (!this.settings.loop && this.settings.arrows) {
                    this.checkArrows();
                }
            }

        });

        return Plugin;

    })();

    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!this.instance && $.inArray(options, methods) === -1) {
                this.instance = new Plugin(options || {});
                this.instance.init(this);
            } else if (this.instance && $.inArray(options, methods) !== -1) {
                switch (options) {
                    case "destroy":
                        this.instance.destroy();
                        delete this.instance;
                        break;
                    default:
                        this.instance[options](arguments[1]);
                        break;
                }
            } else if (this.instance && $.inArray(options, methods) === -1) {
                this.instance.update();
            } else {
                return false;
            }
            return this;
        }, arguments);
    };

})(jQuery);