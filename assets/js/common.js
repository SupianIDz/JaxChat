function RegExUsername(string) {
    var regEx = /^([A-Za-z][A-Za-z0-9]*)+$/;
    if (!regEx.test(string)) {
        //Notify(false, 'Username only A-Z a-z 0-9 Allowed', 'warning');
        return false;
    }
    return true;
}

function RegExEmail(email) {
    var regEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!regEx.test(email)) {
        //Notify(false, 'Email is not valid', 'warning');
        return false;
    }
    return true;
}

function Redirect(uri) {
    window.location = uri;
}

function SendPost(uri, patern, page = false) {
    // clearNotify();
    $.ajax({
        url: uri,
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        data: patern,
        error: function(xhr, sts, err) {
             Notify('error', err);
        },
        success: function(data) {
            if (data.redirect !== false) {
                Notify(data.type, data.message, data.title, data.progress, data.redirect);
                setTimeout(function() {
                    Redirect(data.redirect)
                }, 500);
            } else {
                if (page !== false) {
                    LoadPage(page);
                }
                 Notify(data.type, data.message, data.title, data.progress, data.redirect);
            }
        },
    });
}

function Notify(shortToast = 'success', msg = '', title = 'Notification', progress = false) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": progress,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    var$toast = toastr[shortToast](msg, title);
    return true
}

function clearNotify() {
    toastr.remove();
}


$("html").niceScroll({
    styler: "fb",
    cursorcolor: "#e8403f",
    cursorwidth: '6',
    cursorborderradius: '10px',
    background: '#404040',
    spacebarenabled: false,
    cursorborder: '',
    zindex: '1000'
});

$("div.chat-box,div.box-online").niceScroll({
    styler: "fb",
    cursorcolor: "#e8403f",
    cursorwidth: '6',
    cursorborderradius: '10px',
    background: '#404040',
    spacebarenabled: false,
    cursorborder: '',
    zindex: '4'
});