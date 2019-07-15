$('.cards').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow:'<a class=""><img src="http://localhost/Geekword/public/img/left.png" class="slick-ml slick-prev"/></a>',
    nextArrow:'<a class=""><img src="http://localhost/Geekword/public/img/rigth.png" class="slick-mr slick-next"/></a>',
    
});

// $('.evenements-slider-contenu').slick({
//     dots: true,
//     infinite: true,
//     speed: 300,
//     slidesToShow: 1,
//     adaptiveHeight: true
//   });

  $('.evenement-background').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.evenement-contenue'
  });
  
  $('.evenement-contenue').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.evenement-background',
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    prevArrow:'<a class=""><img src="http://localhost/Geekword/public/img/left.png" class="slick-ml slick-prev"/></a>',
    nextArrow:'<a class=""><img src="http://localhost/Geekword/public/img/rigth.png" class="slick-mr slick-next"/></a>',
  });

  $('#navbar_mobile').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true
  });



$('#editor').trumbowyg();