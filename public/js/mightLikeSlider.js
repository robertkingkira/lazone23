new Glider(document.querySelector('.glider'), {
    // Mobile-first defaults
    slidesToShow: 1,
    slidesToScroll: 1,
    scrollLock: true,
    draggable: true,
    dots: '#resp-dots',
    arrows: {
        prev: '.glider-prev',
        next: '.glider-next'
    },
    responsive: [{
        // screens greater than >= 775px
        breakpoint: 775,
        draggable: true,
        settings: {
            // Set to `auto` and provide item width to adjust to viewport
            slidesToShow: 'auto',
            slidesToScroll: 'auto',
            itemWidth: 150,
            dots: '#dots',
            duration: 0.5
        }
    }, {
        // screens greater than >= 1024px
        breakpoint: 1024,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            itemWidth: 150,
            dots: '#dots',
            duration: 0.5
        }
    }]
});
