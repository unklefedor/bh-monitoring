
$(document).ready(function() {
    $('body').on('click', '.js-subscribe', function(){
        if ($(this).data('status') == 'no') {
            unsubscribeUser();
        } else {
            initialise();
        };
        $(this).addClass('btn-success');

        var btn = $(this);
        setTimeout(function(){
            btn.removeClass('btn-success');
        }, 500);
    })

    $('body').on('click', '.js-more', function () {
        var pre = $(this).next('.pre');
        if (pre.hasClass('active')) {
            pre.removeClass('active');
        } else {
            pre.addClass('active');
        };
    })
})