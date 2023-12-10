@section('pageTitle')Home @endsection

@section('headers')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/home.css') }}">
@endsection

<script src="{{ asset('js/pages/home.js') }}"></script>

<div id="header" class="container bg-m_green_secondary pt-5 pb-5">
    <input type="search" class="form-control" name="search" id="txt_searchbar" placeholder="🔍 Search plants . . .">

    <div id="weather_container" class="container bg-m_green_light mt-4 mb-5">
        <div class="row">
            <div class="col-7">
                <img src="{{ asset('img/icons/icons8-location-50.png') }}" alt="" width="18px">
                <small><b id="txt_city">City, Country</b></small>
                <h2><strong id="txt_temperature">26°C</strong></h2>
                
            </div>
            <div class="col-5">
                <center>
                    <small><b id="txt_weatherDescription">Weather Description</b></small>
                    <div id="icon"><img id="wicon" src="{{ asset('img/icons/Weather/02d.png') }}" alt="Weather icon" width="80%"></div>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="container weather-param-container bg-m_green_dark" id="cloud_container">
                    <img src="{{ asset('img/icons/icons8-cloud-50.png') }}" alt="" width="13px">
                    <small id="txt_cloudiness" class="float-end">cloudiness</small>
                </div>
            </div>
            <div class="col-4">
                <div class="container weather-param-container bg-m_green_dark" id="cloud_container">
                    <img src="{{ asset('img/icons/icons8-water-50.png') }}" alt="" width="13px">
                    <small id="txt_humidity" class="float-end">humidity</small>
                </div>
            </div>
            <div class="col-4">
                <div class="container weather-param-container bg-m_green_dark" id="cloud_container">
                    <img src="{{ asset('img/icons/icons8-wind-50.png') }}" alt="" width="13px">
                    <small id="txt_windSpeed" class="float-end">wind speed</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="body" class="container bg-m_green_light">
    <div id="reminder_container" class="container bg-light">
        <small><b>Reminders</b></small>
        <div class="row ">
            <div class="col-5">
                <div id="calendar_container" class="container pb-3">
                    <b id="txt_day" class="text-danger">
                        {{ date("l") }}
                    </b>
                    <div class="row">
                        <div class="col-7">
                            <p class="text-start"><small id="txt_month">{{ date("F") }}</small></p>
                        </div>
                    </div>
                    <h3 style="margin-top: -20px; text-align: right"><b id="txt_date">{{ date("d") }}</b></h3>
                </div>
            </div>
        </div>
    </div>

    <h5 class="text-m_green_dark mt-4">
        <b>Paired Devices</b>
    </h5>

    <div id="devices_container" class="container my-3">
        
        @foreach($devices as $device)
            <div class="container device-container my-3">
                <div class="row">
                    <div class="col-3">
                        @if($device->status == 'idle')
                            <img src="{{ asset('img/plants/icons/plant.png') }}" width="100%" alt="">
                        @else
                            <img src="{{ asset('img/plants/icons/plant_paired.png') }}" width="100%" alt="">
                        @endif
                    </div>
                    <div class="col">
                        <h5 class="mt-4">
                            @if($device->status == 'active')
                                <img src="{{ asset('img/plants/icons/active.png') }}" alt="" width="10px"> 
                            @elseif($device->status == 'offline')
                                <img src="{{ asset('img/plants/icons/inactive.png') }}" alt="" width="15px"> 
                            @endif
                            {{$device->serial_no}}
                        </h5>
                    </div>
                    <div class="col-2 pt-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#remove_device_modal"><img src="{{ asset('img/plants/icons/trash.png') }}" width="100%" alt=""></a>
                    </div>
                </div>
            </div>
            @include('modals.remove-device-modal', ['device_id' => $device->serial_no])
            @include('modals.force-remove-device-modal', ['device_id' => $device->serial_no])
        @endforeach

        <center>
        <small>When user adds a device, it appears here.</small>
        </center>
    </div>

    <center>
        <button id="btn_addDevice" class="btn btn-success my-5" onclick="window.location.href='/user/device-scan'">+ Add device</button>
    </center>
</div>