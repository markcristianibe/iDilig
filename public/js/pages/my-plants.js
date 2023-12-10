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

    $("#plant_activities").click(function(){
        $.ajax({
            url: '/user/plant/activities',
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

    $("#plant_diagnosis").click(function(){
        $.ajax({
            url: '/user/plant/diagnosis',
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

    $("#btn_show_devices, #show_devices").click(function () {  
        $("#device_connection").removeClass('visually-hidden')
    })

    $("#btn-back").click(function(){
        $("#device_connection").addClass('visually-hidden')
    })

    $(".btn_pair_device").click(function(){
        $(this).html('Pairing....')
        $.ajax({
            url: '/user/pair-device',
            method: 'get',
            data: {
                device_id: this.id,
                plant_id: plant_id
            },
            datatype: 'text',
            success: function(){
                alert('Device Paired Successfully!');
                window.location.reload();
            }
        })
    })

    $("#btn_unpair_device").click(function(){
        $.ajax({
            url: '/user/unpair-device',
            method: 'get',
            data: {
                plant_id: plant_id
            },
            datatype: 'text',
            success: function(){
                alert('Device Unpaired Successfully!');
                window.location.reload();
            }
        })
    })

    $("#file_diagnose_plant").on("change", function(){
        const apiKey = 'inuMPoNUMNVJhlb7DZJ4TKmilufLRpA9TkzRclu9iHA8pTCTIH';
        // const apiKey = 'jWTQeulB89P9e3ZTJdd0mrCou0uAEkZtr7vC0hBrAfkFkRnddg';
        const apiUrl = 'https://plant.id/api/v3/identification';
        const imageFile = document.getElementById("file_diagnose_plant").files[0];

        if (!imageFile) {
            alert('Please select an image file.');
            return;
        }

        var spinner = '<div id="spinnerBackground"><img src="../../img/loading.gif"></div>';
        $("#body").html(spinner);
        
        const formData = new FormData();
        formData.append('images', imageFile);
        formData.append('health', "all");

        fetch(apiUrl, {
            method: 'POST',
            body: formData,
            headers: {
                'Api-Key': apiKey,
            },
        })
        .then(response => response.json())
        .then(result => {
            console.log(result)
            $.ajax({
                url: '/my-plant/diagnose/diagnose-result',
                type: 'GET',
                data: {
                    plant_id: plant_id,
                    jsonResult: result
                },
                datatype: 'text',
                success: function(data){
                    $("body").html(data);
                }
            })
        })
        .catch(error => {
            console.error('Error identifying plant:', error);
        });
    })

    $(".plant_diagnosis").click(function () {  
        $.ajax({
            url: '/user/diagnose-history',
            type: 'GET',
            data: {
                id: this.id
            },
            datatype: 'text',
            success: function(data){
                $("body").html(data);
            }
        })
    })
})