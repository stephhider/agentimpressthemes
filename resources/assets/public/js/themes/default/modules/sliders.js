function listingFeatured(item) {
    var swiper = new Swiper(item, {
        preloadImages: false,
        lazyLoading: true,
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        loop: true
    });
}

function listingImages(item) {
    var swiper = new Swiper(item, {
        preloadImages: false,
        lazyLoadingInPrevNext: true,
        lazyLoading: true,
        paginationClickable: true,
        slideToClickedSlide: true,
        slidesPerView: 'auto',
        spaceBetween: 20,
        lazyLoadingInPrevNextAmount: 4,
        breakpoints: {
            768: {
                slidesPerView: 1,
                spaceBetween: 0,
                spaceBetweenSlides: 0,
                lazyLoadingInPrevNextAmount: 1
            }
        }
    });
}

function indexSliderListings(item) {
    var swiper = new Swiper(item, {
        preloadImages: false,
        lazyLoadingInPrevNext: true,
        lazyLoading: true,
        paginationClickable: true,
        slideToClickedSlide: true,
        slidesPerView: 'auto',
        spaceBetween: 20,
        lazyLoadingInPrevNextAmount: 4,
        breakpoints: {
            768: {
                slidesPerView: 1,
                spaceBetween: 0,
                spaceBetweenSlides: 0,
                lazyLoadingInPrevNextAmount: 1
            }
        }
    });
}

function indexSliderContent(item) {
    var swiper = new Swiper(item, {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        autoplayDisableOnInteraction: false,
        effect: $(item).data('effect'),
        autoplay: $(item).data('autoplay'),
        loop: true
    });
}

function indexSliderIdx(item) {
    var swiper = new Swiper(item, {
        autoplayDisableOnInteraction: false,
        effect: $(item).data('effect'),
        autoplay: $(item).data('autoplay'),
        loop: true
    });
}

function indexSliderParallax(item) {
    var swiper = new Swiper(item, {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        parallax: true,
        autoplayDisableOnInteraction: false,
        autoplay: $(item).data('autoplay'),
        speed: 1200
    });
}
