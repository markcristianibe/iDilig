$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".nav-link").css("color", "#555");
    $(".nav-link").removeClass("active");
    $("#account_tab").css("color", "#fff");
    $("#account_tab").addClass("active");

    $("#logout_btn").click(function(){
        window.location.href = "/user/logout";
    });
})