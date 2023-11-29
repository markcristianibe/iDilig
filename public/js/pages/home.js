
$(document).ready(function () {
    const weatherAPIKey = "56cfa971bed0fd5d7f3fdc0f6120a8b1";
    const weatherAPIURL = "https://api.openweathermap.org/data/2.5/weather?lat={lat}&lon={lon}&units=metric&appid={API key}";

    $(".nav-link").css("color", "#555");
    $(".nav-link").removeClass("active");
    $("#home_tab").css("color", "#fff");
    $("#home_tab").addClass("active");

    navigator.geolocation.getCurrentPosition( position => {
        let latitude = position.coords.latitude;
        let longitude = position.coords.longitude;
        
        let url = weatherAPIURL
            .replace("{lat}", latitude)
            .replace("{lon}", longitude)
            .replace("{API key}", weatherAPIKey);
        fetch(url)
            .then(response => response.json())
            .then(data => {
                var city = data.name;
                var country = data.sys.country;
                var weatherDescription = data.weather[0].description;
                var weatherIconCode = data.weather[0].icon;
                var cloudiness = data.clouds.all;
                var humidity = data.main.humidity;
                var windSpeed = data.wind.speed;
                var temp = data.main.temp;
                temp = temp.toFixed();
                windSpeed = windSpeed * 3.6;
                windSpeed = windSpeed.toFixed(2);

                let location;
                $.getJSON("includes/countries.json", data,
                    function (data) {
                        for(let i = 0; i < data.length; i++){
                            if(country == data[i].code){
                                $("#txt_city").text(city + ", " + data[i].name);
                            }
                        }
                    }
                );


                const words = weatherDescription.split(" ");

                for (let i = 0; i < words.length; i++) {
                    words[i] = words[i][0].toUpperCase() + words[i].substr(1);
                }

                words.join(" ");

                var word = "";
                for(let i = 0; i < words.length; i++){
                    word += words[i] + " ";
                }
                
                var iconurl = "img/icons/Weather/" + weatherIconCode + ".png";

                $("#txt_weatherDescription").text(word);
                $('#wicon').attr('src', iconurl);
                $("#txt_temperature").text(temp + "°C");
                $("#txt_cloudiness").text(cloudiness + "%");
                $("#txt_humidity").text(humidity + "%");
                $("#txt_windSpeed").text(windSpeed + " km/h");
            });
    });
});
