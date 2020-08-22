$(function(){
    window.onscroll = function() {toggleNavbar()};

    var navbar = document.getElementById("navbar");

    function toggleNavbar() {
        if (window.pageYOffset > 0) {
        navbar.classList.add("sticky-navbar")
        } else {
        navbar.classList.remove("sticky-navbar");
        }
    }
})
$(function(){

    $("#auth-modal").iziModal({
        overlayColor: 'rgba(0, 0, 0, 0.6)',
        zindex:'9999',
    });

    $("#auth-modal").on('click', 'header a', function(event) {
        event.preventDefault();
        var index = $(this).index();
        $(this).addClass('active').siblings('a').removeClass('active');
        $(this).parents("div").find("section").eq(index).removeClass('hide').siblings('section').addClass('hide');

    });

})

$(function(){
    $("#sidenav").iziModal({
        zindex:'9999',
    });
})
$(function(){
    $('input[type="checkbox"]').on('change', function() {
        if ($(this).is(':checked')) {
          $(this).attr('value', 'true');
        } else {
          $(this).attr('value', 'false');
        }
    });
})
$(document).ready(function() {
    $("#login_submit").click(function(e) {
        var errors = 0;
        if(!$('#login_email').val()){
            errors++;
        }
        if(!$('#login_password').val()){
            errors++;
        }
        if(errors > 0){
            printErrorMsg(["Veuillez remplir tous les champs"])
            return false;
        }
        $('#login_submit').addClass('submit_active')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var email = $("#login_email").val();
        var password = $("#login_password").val();
        var remember = $("#login_remember").val();

        $.ajax({
            url: window.location.origin+'/ajax/login',
            type: 'POST',
            data: {
                email: email,
                password: password,
                remember: remember
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $("#login_error").html('');
                    $("#login_error").removeClass('error-active')
                    $("#login_error").addClass('error-notactive')
                    $("#login_success").removeClass('success-notactive')
                    $("#login_success").addClass('success-active')
                    setTimeout(function(){window.location.href=window.location.origin+'/dashboard/'},1000)
                } else {
                    printErrorMsg(data.error);
                    $('#login_submit').removeClass('submit_active')
                }
            }
        });

    });

    function printErrorMsg(msg) {
        $("#login_error").html('');
        $("#login_error").removeClass('error-notactive')
        $("#login_error").addClass('error-active')
        $.each(msg, function(key, value) {
            $("#login_error").append(value);
        });
    }
})
$(document).ready(function() {
    $("#register_submit").click(function(e) {
        var errors = 0;
        if(!$('#register_firstname').val()){
            errors++;
        }
        if(!$('#register_lastname').val()){
            errors++;
        }
        if(!$('#register_email').val()){
            errors++;
        }
        if(!$('#register_password_confirmation').val()){
            errors++;
        }
        if(!$('#register_password').val()){
            errors++;
        }
        if(errors > 0){
            printErrorMsg(["Veuillez remplir tous les champs"])
            return false;
        }
        $('#register_submit').addClass('submit_active')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var firstname = $("#register_firstname").val();
        var lastname = $("#register_lastname").val();
        var email = $("#register_email").val();
        var password = $("#register_password").val();
        var password_confirmation = $("#register_password_confirmation").val();
        var cgu = $("#register_cgu").val();

        $.ajax({
            url: window.location.origin+'/ajax/register',
            type: 'POST',
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                password: password,
                password_confirmation: password_confirmation,
                cgu: cgu,
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $("#register_error").html('');
                    $("#register_error").removeClass('error-active')
                    $("#register_error").addClass('error-notactive')
                    $("#register_success").removeClass('success-notactive')
                    $("#register_success").addClass('success-active')
                    setTimeout(function(){window.location.href=window.location.origin+'/dashboard/'},1000)
                } else {
                    printErrorMsg(data.error)
                    $('#register_submit').removeClass('submit_active')
                }
            }
        });

    });

    function printErrorMsg(msg) {
        $("#register_error").html('');
        $("#register_error").removeClass('error-notactive')
        $("#register_error").addClass('error-active')
        $.each(msg, function(key, value) {
            $("#register_error").append(value);
        });
    }
})
$(function(){
    $("#reset-modal").iziModal({
        overlayColor: 'rgba(0, 0, 0, 0.6)',
        zindex:'9999',
    });
    $("#reset-success").iziModal({
        title: "Un email pour changer votre mot de passe vous a été envoyé. ",
        icon: 'icon-check',
        headerColor: '#00af66',
        width: 600,
        timeout: 7000,
        timeoutProgressbar: true,
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOutDown',
        bottom: 0,
        loop: true,
        zindex:'9999',
    })

})
$(document).ready(function() {
    $("#reset_submit").click(function(e) {
        var errors = 0;
        if(!$('#reset_email').val()){
            errors++;
        }
        if(errors > 0){
            printErrorMsg(["Veuillez saisir votre email."])
            return false;
        }
        $('#reset_submit').addClass('submit_active')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var email = $("#reset_email").val();

        $.ajax({
            url: window.location.origin+'/ajax/password/reset',
            type: 'POST',
            data: {
                email: email
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $("#reset_error").html('');
                    $("#reset_error").removeClass('error-active')
                    $("#reset_error").addClass('error-notactive')
                    $('#reset_submit').removeClass('submit_active')
                    $('#reset-success').iziModal('open');
                } else {
                    printErrorMsg(data.error)
                    $('#reset_submit').removeClass('submit_active')
                }
            }
        });

    });

    function printErrorMsg(msg) {
        $("#reset_error").html('');
        $("#reset_error").removeClass('error-notactive')
        $("#reset_error").addClass('error-active')
        $.each(msg, function(key, value) {
            $("#reset_error").append(value);
        });
    }
})
$(document).ready(function(){
    $("#OpenSideNav").click(function(e){
        $("#Sidenav").css("transform","scaleX(1)")
    })
    $("#CloseSideNav").click(function(e){
        $("#Sidenav").css("transform","scale(0)")
    })
})
