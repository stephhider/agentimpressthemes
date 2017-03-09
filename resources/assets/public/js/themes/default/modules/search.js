function fixedSearchSection() {
    $(window).scroll(function() {
        var sf = $('.fixed-top-search').offset().top;
        var top = $('#horizontal-search-form').outerHeight();
        if ($(this).scrollTop() > top) {
            $('body').addClass('search-at-top');
        } else {
            $('body').removeClass('search-at-top');
        }
    })
}
