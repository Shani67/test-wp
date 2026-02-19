jQuery(document).ready(function($) {
  // $(".accordion-item").first().addClass("open");

  $(".accordion-item .accordion-head").click(function() {
    var $item = $(this).closest(".accordion-item");

    $(".accordion-item").not($item).removeClass("open");

    $item.toggleClass("open");
  });

  $('.your-phone').on('input', function() {
    var val = $(this).val();
    var cleaned = val.replace(/[^0-9\+]/g, '');
    $(this).val(cleaned);
  });

  $(".service-item-finance .btn-contact-acc").on("click", function () {
      const productContainer = $(this).closest(".service-item-finance");
      const formHTML = productContainer.find(".contact-us-popup .contact-us-form-container .form-inner").html();
      const popupTitle = productContainer.find(".contact-us-popup .contact-us-form-container .title").html();

      if (formHTML) {
          $(".acc-modal .contact-us-popup .form-inner").html(formHTML);
          // $(".acc-modal").fadeIn();
          $(".acc-modal").css("display", "flex").hide().fadeIn(300);
          $(".acc-modal .contact-us-popup .main-title").html(popupTitle);
          $("body").addClass("open-pop"); 

            if (typeof wpcf7 !== "undefined" && typeof wpcf7.init !== "undefined") {
              wpcf7.init($(".acc-modal .contact-us-popup .form-inner form")[0]);
          }

          const productTitle = productContainer.find(".cat-name").text().trim();
          setTimeout(function () {
              $(".acc-modal .contact-us-popup input[name='service-subject']").val(productTitle);
          }, 300);

          $(".your-phone").on("input", function() {
            var val = $(this).val();
            var cleaned = val.replace(/[^0-9\+]/g, '');
            $(this).val(cleaned);
        });
      }
  });
  $(".acc-modal .modal-close").on("click", function () {
    $(".acc-modal").fadeOut();
    $("body").removeClass("open-pop");
  });
  
});

document.addEventListener("DOMContentLoaded", function () {
    // Select all elements to animate
    const scrollElements = document.querySelectorAll(".js-scroll");

    // Check if element is in view
    const elementInView = (el, dividend = 1) => {
        const elementTop = el.getBoundingClientRect().top;
        return elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend;
    };

    // Optional: check if element is out of view (not used here)
    const elementOutOfView = (el) => {
        const elementTop = el.getBoundingClientRect().top;
        return elementTop > (window.innerHeight || document.documentElement.clientHeight);
    };

    // Add class to show element
    const displayScrollElement = (element) => {
        element.classList.add("scrolled");
    };

    // Optional: remove class when element is out of view
    // const hideScrollElement = (element) => {
    //     element.classList.remove("scrolled");
    // };

    // Loop through elements and apply animation if in view
    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el, 1.25)) {
                displayScrollElement(el);
            }
            // else if (elementOutOfView(el)) {
            //     hideScrollElement(el)
            // }
        });
    };

    // Run once on page load
    handleScrollAnimation();

    // Run on scroll
    window.addEventListener("scroll", handleScrollAnimation);
});