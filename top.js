$(document).ready(function(){
    $('.menu-icon').click (function () {
        if($('.menu-mordal').hasClass('.open')) {
            $('.menu-mordal').removeClass('.open');
            $('.menu-mordal').fadeIn(500);
        } else {
            $('.menu-mordal').addClass('.open');
            $('.menu-mordal').fadeOut(500);
        }
    });
    
    $('.mordal-container li').click(function () {
        $('.menu-mordal').fadeOut();
        $('.menu-mordal').addClass('.open');
    });

    $('.about').click(function () {
        var id = $(this).attr('href');
        var position = $(id).offset().top;
        $('html,body').animate({'scrollTop':position}, 700);
    });
    $('.works').click(function () {
        var id = $(this).attr('href');
        var position = $(id).offset().top;
        $('html,body').animate({'scrollTop':position}, 700);
    });
    $('.contact').click(function () {
        var id = $(this).attr('href');
        var position = $(id).offset().top;
        $('html,body').animate({'scrollTop':position}, 700);
    });
    $('#submit').submit(function () {
        var namevalue = $('#name').val();
        var emailvalue = $('#email').val();
        var messagevalue = $('#message').val();

        if(namevalue =='') {
            $('#error-message1').text('名前を入力してください');
        } else {
            $('#error-message1').text('');
        }
        if(emailvalue =='') {
            $('#error-message2').text('メールアドレスを入力してください');
        } else {
            $('#error-message2').text('');
        }
        if(messagevalue =='') {
            $('#error-message3').text('メッセージを入力してください');
        } else {
            $('#error-message3').text('');
        }
    
    });
    
});
