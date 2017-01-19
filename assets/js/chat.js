function Signin() {
    var username = $('#username').val().trim();
    var password = $('#password').val().trim();
    if (username === '' || password === '') {
        Notify('warning', 'Please fill out all form.');
        return false;
    }
    if (!RegExUsername(username)) {
        Notify('warning', 'Username only A-Z a-z 0-9 allowed.');
        return false;
    }
    var uri = 'action/userSignin.php';
    var patern = 'username=' + username + '&password=' + password;
    SendPost(uri, patern);
}

function Signup() {
    var username = $('#username2').val().trim();
    var password = $('#password2').val().trim();
    var email = $('#email').val().trim();
    if (username === '' || password === '') {
        Notify('warning', 'Please fill out all form.');
        return false;
    }
    if (!RegExUsername(username)) {
        Notify('warning', 'Username only A-Z a-z 0-9 allowed.');
        return false;
    }

    if (!RegExEmail(email)) {
        Notify('warning', 'Email is not valid.');
        return false;
    }

    var uri = 'action/userSignup.php';
    var patern = 'username=' + username + '&password=' + password + '&email=' + email;
    SendPost(uri, patern);
}

function getCheckOnline() {
    $('div.box-online2').load("action/checkStatOnline.php?checkOnline=1");
    var a = $('div.box-online2').html();
    if(a === 0 || a === '0'){
        Redirect('index.php');
    }
}

$("#chat-form").submit(function() {
    sendChat();
});

$('#chat-send').click(function() {
    sendChat();
});


$("#emoticons").popover({
    html: true,
    content: function() {
        var img = '';
        var i;

        for (i = 49 - 1; i >= 1; i--) {
            if (i < 10) {
                i = '0' + i;
            }
            img = "<img src='assets/images/emoticons/%23" + i + ".png' class=\"img-emoticons\" onClick=\"addEmoticons('#" + i + "')\">" + img;
        }
        return img;
    }
});

function addEmoticons(id) {
    var chat = $("#chat-text");
    chat.val(chat.val().trim() + " " + id);
}

function sendChat() {
    var chat = $("#chat-text").val().trim();
    $.ajax({
        url: 'action/sendChat.php',
        type: 'POST',
        data: 'chat=' + chat,
        success: function(chat) {
            var audio = document.getElementById("sound");
            audio.play();
            if (chat == 'Success') {
                $("#chat-text").val('');
                goDown();
            } else {
                return false;
            }
        },
    });
    return false;
}

function goDown(x) {
    var nol = $(x)[0].scrollHeight;
    $(x).animate({
        scrollTop: nol
    }, 'slow');
}

function goTop(x) {
    $(x).animate({
        scrollTop: 0
    }, 'slow');
}

function getOnline() {
    $('div.box-online').load("action/getOnline.php?getOnline=1");
}


function Edit(id) {
    $('#edit-send').show();
    $('#chat-send').hide();
    $("#id").val(id);
    $.ajax({
        url: 'action/editChat.php',
        type: 'POST',
        data: 'id=' + id + '&getText=0',
        success: function(chat) {
            $('#chat-text').val(chat);
        },
    });
}

$('#edit-send').click(function() {
    var chat = $("#chat-text").val().trim();
    var edit_id = parseInt($("#id").val().trim());
    $.ajax({
        url: 'action/editChat.php',
        type: 'POST',
        data: 'chat=' + chat + '&id=' + edit_id + '&editText=0',
        success: function(chat) {
            var audio = document.getElementById("sound");
            audio.play();
            if (chat == 'Success') {
                Notify('success', 'Chat has been edited.');
                $("#chat-text").val('');
                $('#chat-send').show();
                $('#edit-send').hide();
                $("#id").val();
                getChat();
                goDown();
            } else {
                return false;
            }
        },
    });
    return false;
});

function Delete(id) {
    $.ajax({
        url: 'action/deleteChat.php',
        type: 'POST',
        data: 'id=' + id,
        success: function(chat) {
            if (chat == 'Success') {
                Notify('success', 'Chat has been deleted.');
                getChat();
                goDown();
            } else {
                return false;
            }
        },
    });
    return false;
}