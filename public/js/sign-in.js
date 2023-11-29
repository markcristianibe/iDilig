
$(document).ready(function(){
    $(".login-textbox").on({
        click: function () { 
            $("#login_label_bg").css("margin-top", -200);
            $("#login_label_bg h4 b").css("color", "#274e13");
        },
        mouseleave: function () { 
            $("#login_label_bg").css("margin-top", -50);
            $("#login_label_bg h4 b").css("color", "#274e13");
        }
    })
})