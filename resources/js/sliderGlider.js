window.addEventListener('load', function() {
    new Glider(document.querySelector('.carousel__lista'), {
        slidesToShow: 2,
        slidesToScroll: 2,
        draggable: true,
        rewind: true,
        duration: 0.25,
        dots: '.carousel__indicadores',
        arrows: {
            prev: '.carousel__anterior',
            next: '.carousel__siguiente'
        },
        responsive: [{
                // screens greater than >= 320px
                breakpoint: 319,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    draggable: true,
                    slidesToShow: 1.3,
                    slidesToScroll: 1
                }
            },
            {
                // screens greater than >= 576px
                breakpoint: 576,
                settings: {
                    draggable: true,
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                // screens greater than >= 992px
                breakpoint: 992,
                settings: {
                    draggable: true,
                    slidesToShow: 3.5,
                    slidesToScroll: 3
                }
            },
            {
                // screens greater than >= 992px
                breakpoint: 1200,
                settings: {
                    draggable: true,
                    slidesToShow: 5,
                    slidesToScroll: 5
                }
            }
        ]
    });
});