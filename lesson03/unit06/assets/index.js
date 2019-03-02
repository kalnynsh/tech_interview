jQuery(document).ready(function($) {
    let timerId = setTimeout(function() {
        if ($('.one').length) {
            $('.one')
                .addClass('three')
                .html('New one');
        }

        if ($('.two').length) {
            $('.two').addClass('three');
        }
    }, 2000);

    setTimeout(function() {
        $('.three').slideUp();
    }, 3000);
});
