
<div class="row">
    <div class="col">
        <h3 class="text-light">Plant Monitoring & Controls</h3>
    </div>
    <div class="col-3">
        <small class="text-m_green_dark">offline</small>
        <img src="{{ asset('img/plants/icons/inactive.png') }}" alt="" width="10px">
    </div>
</div>

<div class="mt-3 tile-container container p-3">
    <div class="plant-param-container container" style="background: #FFDD85">
        <div class="row">
            <div class="col-3" style="border-right: 2px solid #fff">
                <img src="{{ asset('img/plants/icons/sun.png') }}" width="100%">
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-4">
                        <h6 class="text-light">Sunlight</h6>
                    </div>
                    <div class="col text-end">
                        <small class="text-light">{{ number_format($plant_info["parameter"]["min_light_lux"]) }} - {{ number_format($plant_info["parameter"]["max_light_lux"]) }} lx</small>
                    </div>
                </div>
                @if($device[0]->light_intensity < $plant_info["parameter"]["min_light_lux"] || $device[0]->light_intensity > $plant_info["parameter"]["max_light_lux"])
                <h2 class="text-danger">{{ $device[0]->light_intensity }} lux</h2>
                @else
                <h2 class="text-light">{{ $device[0]->light_intensity }} lux</h2>
                @endif
            </div>
        </div>
    </div>

    <div class="plant-param-container container mt-3" style="background: #FB8762">
        <div class="row">
            <div class="col-3" style="border-right: 2px solid #fff">
                <img src="{{ asset('img/icons/Maintenance/icons8-temperature-96.png') }}" width="100%">
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h6 class="text-light">Air Temperature</h6>
                    </div>
                    <div class="col-4 text-end">
                        <small class="text-light">{{ number_format($plant_info["parameter"]["min_temp"]) }} - {{ number_format($plant_info["parameter"]["max_temp"]) }} °C</small>
                    </div>
                </div>
                @if($device[0]->temperature < $plant_info["parameter"]["min_temp"] || $device[0]->temperature > $plant_info["parameter"]["max_temp"])
                <h2 class="text-danger">{{ $device[0]->temperature }} °C</h2>
                @else
                <h2 class="text-light">{{ $device[0]->temperature }} °C</h2>
                @endif
            </div>
        </div>
    </div>

    <div class="plant-param-container container mt-3" style="background: #B0F4F0">
        <div class="row">
            <div class="col-3" style="border-right: 2px solid #fff">
                <img src="{{ asset('img/plants/icons/humidity.png') }}" width="100%">
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h6 class="text-light">Humidity</h6>
                    </div>
                    <div class="col-4 text-end">
                        <small class="text-light">{{ number_format($plant_info["parameter"]["min_env_humid"]) }} - {{ number_format($plant_info["parameter"]["max_env_humid"]) }}%</small>
                    </div>
                </div>
                @if($device[0]->temperature < $plant_info["parameter"]["min_env_humid"] || $device[0]->humidity > $plant_info["parameter"]["max_env_humid"])
                <h2 class="text-danger">{{ $device[0]->humidity }}%</h2>
                @else
                <h2 class="text-light">{{ $device[0]->humidity }}%</h2>
                @endif
            </div>
        </div>
    </div>

    <div class="plant-param-container container mt-3" style="background: #AC7A4C">
        <div class="row">
            <div class="col-3" style="border-right: 2px solid #fff">
                <img src="{{ asset('img/plants/icons/soil moisture.png') }}" width="100%">
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h6 class="text-light">Soil Moisture</h6>
                    </div>
                    <div class="col-4 text-end">
                        <small class="text-light">{{ number_format($plant_info["parameter"]["min_soil_moist"]) }} - {{ number_format($plant_info["parameter"]["max_soil_moist"]) }}%</small>
                    </div>
                </div>
                @if($device[0]->soil_moisture < $plant_info["parameter"]["min_soil_moist"] || $device[0]->soil_moisture > $plant_info["parameter"]["max_soil_moist"])
                <h2 class="text-danger">{{ $device[0]->soil_moisture }}%</h2>
                @else
                <h2 class="text-light">{{ $device[0]->soil_moisture }}%</h2>
                @endif
            </div>
        </div>
    </div>

    <div class="plant-param-container container mt-3" style="background: #87D1FB">
        <div class="row">
            <div class="col-3" style="border-right: 2px solid #fff">
                <img src="{{ asset('img/plants/icons/water lvl.png') }}" width="100%">
            </div>
            <div class="col">
                <h6 class="text-light">Water Level</h6>
                <div class="row">
                    <div class="col-4">
                        @if($device[0]->water_level_1 < 20)
                            <h2 class="text-danger">{{ $device[0]->water_level_1 }}%</h2>
                        @else
                            <h2 class="text-light">{{ $device[0]->water_level_1 }}%</h2>
                        @endif
                    </div>
                    <div class="col text-end pt-3">
                        <small class="text-dark">
                            <img src="{{ asset('img/plants/icons/tap.png') }}" alt="" width="12px">
                             <i>Tap to Spray Water</i>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="plant-param-container container mt-3" style="background: #50E95F">
        <div class="row">
            <div class="col-3" style="border-right: 2px solid #fff">
                <img src="{{ asset('img/plants/icons/fert.png') }}" width="100%">
            </div>
            <div class="col">
                <h6 class="text-light">Fertilizer Level</h6>
                <div class="row">
                    <div class="col-4">
                        @if($device[0]->water_level_2 < 20)
                            <h2 class="text-danger">{{ $device[0]->water_level_2 }}%</h2>
                        @else
                            <h2 class="text-light">{{ $device[0]->water_level_2 }}%</h2>
                        @endif
                    </div>
                    <div class="col text-end pt-3">
                        <small class="text-dark">
                            <img src="{{ asset('img/plants/icons/tap.png') }}" alt="" width="12px">
                             <i>Tap to Spray Water</i>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="plant-param-container container mt-3" style="background: #BE2DE2">
        <div class="row">
            <div class="col-3" style="border-right: 2px solid #fff">
                <img src="{{ asset('img/plants/icons/pest.png') }}" width="100%">
            </div>
            <div class="col">
                <h6 class="text-light">Pesticide Level</h6>
                <div class="row">
                    <div class="col-4">
                        @if($device[0]->water_level_3 < 20)
                            <h2 class="text-danger">{{ $device[0]->water_level_3 }}%</h2>
                        @else
                            <h2 class="text-light">{{ $device[0]->water_level_3 }}%</h2>
                        @endif
                    </div>
                    <div class="col text-end pt-3">
                        <small class="text-dark">
                            <img src="{{ asset('img/plants/icons/tap.png') }}" alt="" width="12px">
                             <i>Tap to Spray Water</i>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>