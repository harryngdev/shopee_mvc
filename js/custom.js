/* ================================== */
$('.banners-slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true,
  autoplay: true,
  autoplaySpeed: 2000,
});

/* ================================== */
$('.carousel-arrow--next').click(function () {
  $('.category-list-wrapper ul').css('transform', 'translateX(-360px)');
  $('.carousel-arrow--prev').css('visibility', 'visible');
  $('.carousel-arrow--prev').css('opacity', '1');
  $('.carousel-arrow--next').css('visibility', 'hidden');
  $('.carousel-arrow--next').css('opacity', '0');
});

/* ================================== */
$('.carousel-arrow--prev').click(function () {
  $('.category-list-wrapper ul').css('transform', 'translateX(0)');
  $('.carousel-arrow--next').css('visibility', 'visible');
  $('.carousel-arrow--next').css('opacity', '1');
  $('.carousel-arrow--prev').css('visibility', 'hidden');
  $('.carousel-arrow--prev').css('opacity', '0');
});

/* ================================== */
$(window).scroll(function() {
  if ($(this).scrollTop() >= 1520) {
    $('.main-title').addClass('fixed');
    $('.main-list-wrapper').addClass('p-t-8');
  } else {
    $('.main-title').removeClass('fixed');
    $('.main-list-wrapper').removeClass('p-t-8');
  }
});

/* ================================== */
$('.briefing-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.briefing-slider-nav'
});

$('.briefing-slider-nav').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: '.briefing-slider',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});

/* ================================== */
$(function () {
	$('#my-account-profile-link').click(function (e) {
		$("#my-account-profile").delay(100).fadeIn(100);
		$("#change-password").fadeOut(100);
		$('#change-password-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#change-password-link').click(function (e) {
		$("#change-password").delay(100).fadeIn(100);
		$("#my-account-profile").fadeOut(100);
		$('#my-account-profile-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

  $('#login-form-link').click(function (e) {
		$("#login-form").delay(100).fadeIn(100);
		$("#register-form").fadeOut(100);
		e.preventDefault();
	});
	$('#register-form-link').click(function (e) {
		$("#register-form").delay(100).fadeIn(100);
		$("#login-form").fadeOut(100);
		e.preventDefault();
	});
});