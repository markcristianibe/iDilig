$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".nav-link").css("color", "#555");
    $(".nav-link").removeClass("active");
    $("#plants_tab").css("color", "#fff");
    $("#plants_tab").addClass("active");

    $("#txt_searchbar").keyup(function(){
        var val = $(this).val()

        $.ajax({
            method: 'get',
            url: '/my-plants/search',
            data: {
                q: val
            },
            datatype: 'text',
            success: function(data){
                $("#my_plants_container").html(data)
            }
        })
    });

    $(".my-plant-row").click(function(){
        window.location.href = "/user/plants/" + this.id;
    })

    $("#plant_controls").click(function () { 
        $.ajax({
            url: '/user/plant/monitoring',
            method: 'get',
            data: {
                plant_id: plant_id
            },
            datatype: 'text',
            success: function(data){
                $("#body").html(data);
            }
        })
    })

    $("#btn_remove_plant").click(function(){
        window.location.href = '/user/plants/remove/' + plant_id;
    })
})