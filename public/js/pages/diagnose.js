$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".nav-link").css("color", "#555");
    $(".nav-link").removeClass("active");
    $("#diagnose_tab").css("color", "#fff");
    $("#diagnose_tab").addClass("active");

    $("#file_diagnose_plant").on("change", function(){
        // const apiKey = 'inuMPoNUMNVJhlb7DZJ4TKmilufLRpA9TkzRclu9iHA8pTCTIH';
        const apiKey = 'jWTQeulB89P9e3ZTJdd0mrCou0uAEkZtr7vC0hBrAfkFkRnddg';
        const apiUrl = 'https://plant.id/api/v3/identification';
        const imageFile = document.getElementById("file_diagnose_plant").files[0];

        if (!imageFile) {
            alert('Please select an image file.');
            return;
        }

        var spinner = '<div class="spinner-border" style="width: 20px; height: 20px;" role="status"><span class="visually-hidden"></span></div> Scanning Plant Health';
        $("#btn_diagnose_plant").prop("for", "");
        $("#btn_diagnose_plant").html(spinner);
        
        const formData = new FormData();
        formData.append('images', imageFile);
        formData.append('health', "only");

        fetch(apiUrl, {
            method: 'POST',
            body: formData,
            headers: {
                'Api-Key': apiKey,
            },
        })
        .then(response => response.json())
        .then(result => {

            $.ajax({
                url: '/diagnose/diagnose-result',
                type: 'GET',
                data: {
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
});