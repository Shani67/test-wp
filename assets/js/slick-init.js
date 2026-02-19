jQuery(document).ready(function ($) {

     $('.home-property-slider').slick({
        dots: false,
        arrows:true,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 4000,
        centermode:true,
        slidesToShow: 2,
        slidesToScroll: 1,
        draggable: true,
        touchMove: true,
        swipeToSlide: true,
        swipe: 200,
        pauseOnHover: true,
        cssEase: "ease-in-out",
        responsive: [
            {
            breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
            breakpoint: 993,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
            breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            } 
        ]
    });

    $('.home-working-capital-slider').slick({
        dots: false,
        arrows:true,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 4000,
        centermode:true,
        slidesToShow: 3,
        slidesToScroll: 1,
        draggable: true,
        touchMove: true,
        swipeToSlide: true,
        swipe: 200,
        pauseOnHover: true,
        cssEase: "ease-in-out",
        responsive: [
            {
            breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
            breakpoint: 993,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
            breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            } 
        ]
    });

    $('.home-testimonials-slider').slick({
        dots: false,
        arrows:true,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 4000,
        centermode:true,
        slidesToShow: 3,
        slidesToScroll: 1,
        draggable: true,
        touchMove: true,
        swipeToSlide: true,
        swipe: 200,
        pauseOnHover: true,
        cssEase: "ease-in-out",
        responsive: [
            {
            breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
            breakpoint: 993,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
            breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            } 
        ]
    });

    $('.home-testimonials-slider').on('afterChange init', function() {
        var $slider = $(this);
        $slider.find('.slick-slide').removeClass('first-active');
        $slider.find('.slick-active').first().addClass('first-active');
    });

    var $story_date_slider = $('.story-slider-nav');

    $story_date_slider.slick({
        slidesToShow: 9,
        slidesToScroll: 1,
        infinite: true,
        speed: 1000,
        autoplaySpeed: 4000,
        draggable: true,
        touchMove: true,
        swipeToSlide: true,
        swipe: 200,
        dots:false,
        pauseOnHover: true,
        centerMode: true,
        arrows: false,
        asNavFor: '.story-slider-for', 
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                slidesToShow: 7,
                slidesToScroll: 1,
                infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                slidesToShow: 5,
                slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                slidesToShow: 5,
                slidesToScroll: 1
                }
            }
        ]
    });

    var $story_slider = $('.story-slider-for');

    $story_slider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.story-slider-nav',
        dots:false,
        speed: 1000,
        autoplaySpeed: 4000,
        draggable: true,
        touchMove: true,
        swipeToSlide: true,
        infinite: true,
        swipe: 200,
        pauseOnHover: true,
        focusOnSelect: true,
        centerMode: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1
                }
            }
        ]
    });

  $("#related-blogs-grid").slick({
    dots: false,
    arrows: true,
    prevArrow: $(".blog-prev"),
    nextArrow: $(".blog-next"),
    infinite: false,
    speed: 1000,
    autoplay: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    draggable: true,
    touchMove: true,
    swipeToSlide: true,
    pauseOnHover: true,
    cssEase: "ease-in-out",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 993,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        },
      },
    ],
  });

});
