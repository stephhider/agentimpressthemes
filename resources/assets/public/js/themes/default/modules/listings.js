function listingScripts() {
    $(function($) {
        $('#utility-costs .panel, .my-utility-score-score').css('min-height', $('#utility-costs .panel').outerWidth());
    });
    var chart_size = $('#utility-score').width();
    var speed = 2500;
    var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',');
    $('#listing-utility-scores').waypoint(function() {
        $('#listing-utility-scores .container').css('opacity', 1);
        $('.my-utility-score-chart').easyPieChart({
            lineWidth: 40,
            barColor: $('span.primary-color').css('color'),
            trackColor: $('#listing-utility-scores').css('background-color'),
            animate: ({duration: speed, enabled: true}),
            lineCap: 'butt',
            rotate: '180',
            scaleLength: 5,
            scaleColor: false,
            size: chart_size
        });
        // $('.chartload-hide').fadeIn();
        $('.animated-number').each(function(index, el) {
            var value = $(this).data('value');
            var speed = $(this).data('speed');
            $(this).animateNumber({
                number: value,
                numberStep: comma_separator_number_step,
                easing: 'easeInQuad'
            }, speed);
        });
        this.destroy();
        setTimeout(function() {
            $('.utility-score-rating').show().addClass('loaded rubberBand')
        }, speed);
    }, {offset: '50%'});
    $('.danger-chart').easyPieChart({
        lineWidth: 25,
        barColor: $('span.danger-color').css('color'),
        trackColor: 'transparent',
        lineCap: 'butt',
        rotate: '180',
        scaleLength: 0,
        scaleColor: false,
        size: chart_size
    });
    $('.warning-chart').easyPieChart({
        lineWidth: 25,
        barColor: $('span.warning-color').css('color'),
        trackColor: 'transparent',
        lineCap: 'butt',
        rotate: '-60',
        scaleLength: 0,
        scaleColor: false,
        size: chart_size
    });
    $('.success-chart').easyPieChart({
        lineWidth: 25,
        barColor: $('span.success-color').css('color'),
        trackColor: 'transparent',
        lineCap: 'butt',
        rotate: '60',
        scaleLength: 0,
        scaleColor: false,
        size: chart_size
    });
    $('.listing-gallery a.btn-gallery.video').featherlightGallery();
    $('.listing-gallery a.btn-gallery.image').featherlightGallery({previousIcon: '<i class="fa fa-chevron-left"></i>', nextIcon: '<i class="fa fa-chevron-right"></i>'});
}
