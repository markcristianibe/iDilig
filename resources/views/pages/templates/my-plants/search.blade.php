        @foreach($data as $plant)

        @php
            $jsonString = file_get_contents('plant-database-master/json/' . $plant->plant_name . '.json');
            $plant_info = json_decode($jsonString, true);
        @endphp

        <div id="my_plant_container" class="container my-3">
            <div class="row">
                <div class="col-3">
                    <img class="my-3 mx-2" id="plant_avatar" src="{{ $plant_info['image'] }}" alt="">
                </div>
                <div class="col-9">
                    <small>
                        <h3>{{ $plant['label'] }}</h3>
                        <i>"{{ $plant_info['basic']['category'] }}"</i>
                    </small>
                    <div class="row">
                        <div class="col-7">
                            <img class="maintenance-img" src="{{ asset('img/icons/Maintenance/icons8-soil-96.png') }}" alt="">
                            <small>{{ $plant_info["parameter"]["min_soil_moist"] }} - {{ $plant_info["parameter"]["max_soil_moist"] }}%</small>
                        </div>
                        <div class="col-5">
                            <img class="maintenance-img" src="{{ asset('img/icons/Maintenance/icons8-humidity-96.png') }}" alt="">
                            <small>{{ $plant_info["parameter"]["min_env_humid"] }} - {{ $plant_info["parameter"]["max_env_humid"] }}%</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <img class="maintenance-img" src="{{ asset('img/icons/Maintenance/icons8-sunlight-96.png') }}" alt="">
                            <small>{{ number_format($plant_info["parameter"]["min_light_lux"]) }} - {{ number_format($plant_info["parameter"]["max_light_lux"]) }} lx</small>
                        </div>
                        <div class="col-5">
                            <img class="maintenance-img" src="{{ asset('img/icons/Maintenance/icons8-temperature-96.png') }}" alt="">
                            <small>{{ $plant_info["parameter"]["min_temp"] }} - {{ $plant_info["parameter"]["max_temp"] }}°C</small>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="plant-date"><i>Plant added at {{ date_format($plant['created_at'], "F d, Y") }}</i></p>
        </div>
        @endforeach

        <center>
            <small><i>No more plants to show</i></small>
        </center>