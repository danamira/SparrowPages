function copy(text) {
    var input = document.createElement('input');
    input.setAttribute('value', text);
    document.body.appendChild(input);
    input.select();
    var result = document.execCommand('copy');
    document.body.removeChild(input);
    return result;
}

$(document).ready(function () {

    $('.pop').click(function () {
        $(this).fadeOut()
    });
    setTimeout(function () {
        $('.pop').fadeOut();
    }, 4000);
    $('.question .q').click(function () {
        $(this).parent('.question').children('.a').slideToggle();
    });
    $('#link_edit .section_head').click(function () {
        if ($(this).parent('.section').hasClass('active')) {
            $(this).parent('.section').children('.section_options').hide()
            $(this).parent('.section').removeClass('active');
            return 1;
        }
        $('#link_edit .section_options').hide();
        $('#link_edit .section_options').removeClass('active');
        $(this).parent('.section').children('.section_options').show();
        $(this).parent('.section').addClass('active');
    })
    $('.url_bar .mdi-content-copy').click(function () {
        copy($('#profile_url').text())
        $(this).removeClass('mdi-content-copy');
        alert('لینک پروفایل شما کپی شد !');
        $(this).addClass('mdi-check');
        me = $(this)
        setTimeout(function () {
            me.removeClass('mdi-check');
            me.addClass('mdi-content-copy');
        }, 4000)
    })
    $('.modal_head .mdi-close').click(function () {
        $('.modal').fadeOut()
        $('.modals').fadeOut()
    });

    function openModal(querySelector) {
        $('.modals').fadeIn();
        $('.modal').hide();
        $(querySelector).fadeIn();
    }

    $('#user_promote').click(function () {
        openModal('#user_promote_modal');
    })
    $('#user_depose').click(function () {
        openModal('#user_depose_modal');
    })
    $('#user_ban').click(function () {
        openModal('#user_ban_modal');
    })
    $('#user_delete').click(function () {
        openModal('#user_delete_modal');
    })
    $('.upload_control').each(function () {
        $(this).html('                    <input type="file" name="' + $(this).attr('id') + '">\n' +
            '                    <div class="pending">\n' +
            '                        <i class="mdi mdi-cloud-upload"></i>\n' +
            '                        <span>انتخاب فایل</span>\n' +
            '                    </div>\n' +
            '                    <div class="success">\n' +
            '                        <i class="mdi mdi-check"></i>\n' +
            '                        <span>انتخاب شد</span>\n' +
            '                    </div>\n');
    })
    $('.upload_control input').change(function (event) {
        $(this).parent('.upload_control').children('.pending').hide();
        $(this).parent('.upload_control').children('.success').show();

    })
})
