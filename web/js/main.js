
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

    $('body').on('submit', '#js-test-subscribe', function(e){
        e.preventDefault();
        var form = $(this);

        subscribeUser();

        var interval = setInterval(function(){
            if(subscrip) {
                clearInterval(interval);
                const p256dh = subscrip.getKey('p256dh');
                const auth = subscrip.getKey('auth');
                $.ajax({
                    url: '/tester/testmanager/',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        action: 'subscribe',
                        form: form.serialize(),
                        subscription: JSON.stringify({
                            endpoint: subscrip.endpoint,
                            p256dh: p256dh ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscrip.getKey('p256dh')))) : null,
                            auth: auth ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscrip.getKey('auth')))) : null
                        })
                    },
                    success: function (result) {
                        console.log(result);
                    }
                });
            }
        }, 1500);
    })
})