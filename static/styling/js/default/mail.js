$(function() {
    var form = $('#main_contact_form');
    var formMessages = $('#success_fail_info');
    $(form).submit(function(e) {
        e.preventDefault();
        var formData = $(form).serialize();
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        }).done(function(response) {
            $(formMessages).removeClass('error');
            $(formMessages).addClass('success');
            $(formMessages).text('Thanks! Message has been sent.');
            $('#name').val('');
            $('#email').val('');
            $('#message').val('')
        }).fail(function(data) {
            $(formMessages).removeClass('success');
            $(formMessages).addClass('error');
            if (data.responseText !== '') {
                $(formMessages).text(data.responseText)
            } else {
                $(formMessages).text('Oops! An error occured.')
            }
        })
    })
})