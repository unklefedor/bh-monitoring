
$(document).ready(function() {
    $('body').on('click', '.js-subscribe', function(){
        if ($(this).data('status') == 'no') {
            unsubscribeUser();
        } else {
            initialise();
        };
        $(this).addClass('btn-success');
    })

    $('body').on('click', '.more', function () {
        var container = $(this).closest('.log_container');
        var pre = container.find('div.pre');
        if (pre.hasClass('active')) {
            pre.removeClass('active')
        } else {
            pre.addClass('active')
        }
    })
})