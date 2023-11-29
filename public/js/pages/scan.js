const plant_id_api_key = 'jWTQeulB89P9e3ZTJdd0mrCou0uAEkZtr7vC0hBrAfkFkRnddg';
const plant_id_api_url = 'https://plant.id/api/v3/identification';
const trefle_api_key = 'fAbTGCCda1cuFC8ooIZ3qfLXzMlvkjH71UPjrDXZPv0';

$(document).ready(function () {
    $(".nav-link").css("color", "#555");
    $(".nav-link").removeClass("active");
    $("#scan_tab").css("color", "#fff");
    $("#scan_tab").addClass("active");
    
    $("#file_scan_plant").on("change", function(){
        var spinner = '<div id="spinnerBackground"><img src="img/loading.gif"><h4 class="text-center mt-3">Scanning Plant Species...</h4></div>';
        
        $("#body").html(spinner);

        const imageInput = document.getElementById('file_scan_plant');
        const imageFile = imageInput.files[0];

        if (!imageFile) {
            alert('Please select an image file.');
            return;
        }

        const formData = new FormData();
        formData.append('images', imageFile);

        fetch(plant_id_api_url, {
            method: 'POST',
            body: formData,
            headers: {
                'Api-Key': plant_id_api_key,
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log('Plant identification result:', data);
            var is_plant = data.result.is_plant.binary;
            var results = data.result.classification.suggestions.length;
            if(is_plant && results > 0){
                var plant_name = data.result.classification.suggestions[0].name;

                window.location.href=`/scan/scan-result/${trefle_api_key}/${plant_name}`;
            }
        })
        .catch(error => {
            console.error('Error identifying plant:', error);
        });
    });

    $("#txt_searchbar").keyup(function(){
        var value = $(this).val();
        var spinner = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>';
        $("#plant_list").html(spinner );

        $.ajax({
            method: 'get',
            url: '/plants/search',
            data: {
                q: value
            },
            datatype: 'text',
            success: function(data){
                $("#plant_list").html(data);
            }
        })
    })

    $(".plant-row").click(function(){
        var plant_name = this.id;
        
        var spinner = '<div id="spinnerBackground"><img src="img/loading.gif"></div>';
        
        $("#body").html(spinner);
        window.location.href=`/scan/scan-result/${trefle_api_key}/${plant_name}`;
    });
});