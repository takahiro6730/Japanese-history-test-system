var btn = $('#back-to-top');
var footer_logo = $('#back-to-top');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
})
footer_logo.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
})