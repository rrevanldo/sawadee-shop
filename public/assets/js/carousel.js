$(document).ready(function() {
    var currentSlide = 0;
    var slides = $('.carousel-item');
    var numSlides = slides.length;

    $('.carousel-control-prev').click(function() {
      if (currentSlide > 0) {
        currentSlide--;
      } else {
        currentSlide = numSlides - 1;
      }
      slides.removeClass('active');
      $(slides[currentSlide]).addClass('active');
    });

    $('.carousel-control-next').click(function() {
      if (currentSlide < numSlides - 1) {
        currentSlide++;
      } else {
        currentSlide = 0;
      }
      slides.removeClass('active');
      $(slides[currentSlide]).addClass('active');
    });
  });
