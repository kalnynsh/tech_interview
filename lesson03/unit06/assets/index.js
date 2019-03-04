jQuery(document).ready(function($) {
  setTimeout(function() {
    $('.one')
      .addClass('three')
      .html('New one');

    $('.two').addClass('three');
  }, 2000);

  setTimeout(function() {
    $('.three').slideUp();
  }, 3000);
});
