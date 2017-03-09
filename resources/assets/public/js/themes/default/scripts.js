$(function($) {
    $('section.main-section').each(function(i) {
        $(this).addClass('section-' + (i + 1));
    });
    $('.video-modal').on('hidden.bs.modal', function(e) {
        $iframe = $(this).find('iframe');
        $iframe.attr('src', $iframe.attr('src'));
    });
    // START FORM ELEMENTS
    $('.money-mask').autoNumeric('init', {
        aSign: '$ ',
        vMin: '0',
        vMax: '99999999999999999999',
        nBracket: '(,)'
    });
    $('.comma-mask').autoNumeric('init', {
        vMin: '0',
        vMax: '99999999999999999999',
        nBracket: '(,)'
        // mDec: '0'
    });

    $('.modal-link').click(function() {
        var modal = $($(this).attr('href'));
        if (modal.hasClass('modal')) {
            modal.modal('show');
        }
    });
    // $('.typeahead').typeahead({
    //     source: ["item1", "item2", "item3"]
    // });
    var selectDropDown = $('.select-drop-down').select2();
    selectDropDown.on('select2:select', function(e) {
        var event = new Event('change');
        e.target.dispatchEvent(event);
    });
    $('.date-mask').mask('99/99/9999');
    $('.phone-mask').mask('(999) 999-9999');
    $('.tin-mask').mask('99-9999999');
    $('.ssn-mask').mask('999-99-9999');
    // END FORM ELEMENTS
    // START BOOTSTRAP ELEMENTS
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
    // END BOOTSTRAP ELEMENTS
    // START WOW.JS OPTIONS
    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: true, // trigger animations on mobile devices (default is true)
        live: true, // act on asynchronously loaded content (default is true)
        callback: function(box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
    });
    wow.init();
    // END WOW.JS OPTIONS
    //jQuery to collapse the navbar on scroll
    $(window).scroll(function() {
        if ($(".navbar").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });

    $('.video.modal').on('hidden.bs.modal', function(e) {
        $iframe = $(this).find("iframe");
        $iframe.attr("src", $iframe.attr("src"));
    });

    function softScrollTo(anchor) {
        var $anchor = anchor;
        var top_offset = parseInt($('body').css('padding-top'));
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - top_offset)
        }, 1500, 'easeInOutExpo');
    } 
    //jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        softScrollTo($(this))
        event.preventDefault();
    });
    // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
    $('.dropdown').on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });
    // ADD SLIDEUP ANIMATION TO DROPDOWN //
    $('.dropdown').on('hide.bs.dropdown', function(e) {
        e.preventDefault();
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(400, function() {
            //On Complete, we reset all active dropdown classes and attributes
            //This fixes the visual bug associated with the open class being removed too fast
            $('.dropdown').removeClass('open');
            $('.dropdown').find('.dropdown-toggle').attr('aria-expanded', 'false');
        });
    });
    windowSizer();
});
$(window).resize(function(event) {
    windowSizer();
});

function windowSizer() {
    $('.window-max-height').css('max-height', ($(window).height() - $('.navbar-default').height()));
}

function sameHeight(container, item) {
    $(container).each(function() {
        var highestBox = 0;
        $(this).find(item).each(function() {
            if ($(this).height() > highestBox) {
                highestBox = $(this).outerHeight();
            }
        })
        $(this).find(item).css('min-height', highestBox);
    });
}

$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

function getUrlQueryStringParameters () {
    return document.location.search.replace(/(^\?)/, '').split('&').map(function (n) {
        if (n != '') {
            return n = n.split('='),
                this[n[0]] = n[1].replace('%20', ' '),
                this;
        }
    }.bind({}))[0];
}
