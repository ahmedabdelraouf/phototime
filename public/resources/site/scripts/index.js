$(document).ready(function () {
  $(".navbar-light .dmenu").hover(
    function () {
      $(this).find(".sm-menu").first().stop(true, true).slideDown(150);
    },
    function () {
      $(this).find(".sm-menu").first().stop(true, true).slideUp(105);
    }
  );
  $(function () {
    $('a[href="#search"]').on("click", function (event) {
      event.preventDefault();
      $("#search").addClass("open");
      $('#search > form > input[type="search"]').focus();
    });
  
    $("#search, #search button.close").on("click keyup", function (event) {
      if (
        event.target == this ||
        event.target.className == "close" ||
        event.keyCode == 27
      ) {
        $(this).removeClass("open");
      }
    });
  });
  
  
    
});
$('.partners').slick({
  dots: true,
  arrows: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]

});
