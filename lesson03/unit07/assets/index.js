jQuery(document).ready(function($) {
    let timerId = setTimeout(function() {
        if ($('div[name="red"] span').length) {
            $('div[name="red"] span')
                .addClass('red');
        }

    }, 2000);
});
