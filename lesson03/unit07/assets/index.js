jQuery(document).ready(function($) {
  $('button.change-to-red').click(
    function() {
      $('div[name="red"] span').toggleClass('red');
    }
  );
});
