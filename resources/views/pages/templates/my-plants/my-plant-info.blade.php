@section('pageTitle'){{ ucwords($data[0]->label) }} @endsection

@section('headers')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/my-plant-info.css') }}">
@endsection

@php
    $jsonString = file_get_contents('plant-database-master/json/' . $data[0]->plant_name . '.json');
    $plant_info = json_decode($jsonString, true);
@endphp

<script>
    var plant_id = {{ $data[0]->plant_id }};
</script>

<script src="{{ asset('js/pages/my-plants.js') }}"></script>

<button id="btn_back" class="bg-light" onclick="window.location.href='/my-plants'">
    <i class="material-icons">arrow_back</i>
</button>

<div class="header mt-5 ">
    <center>
        <img src="{{ $plant_info['image'] }}" alt="" class="plant-img">
    </center>
    <div class="header-container container">
        <h3 class="text-center">{{ ucwords($data[0]->label) }} <a href="">🖊️</a></h3>
        <hr>
        <p id="txt_category" class="text-center"><i>"{{ ucwords($plant_info['basic']['category']) }}"</i></p>
        <p id="txt_date" class="text-center"><small><i>Plant added at {{ date_format($data[0]->created_at, "F d, Y") }}</i></small></p>
    </div>
</div>

<div id="body" class="bg-m_green_tertiary mt-3">
    <div id="plant_info" class="tile-container container">
        <h4 class="text-m_green_dark mt-2">Plant Info</h4>
        <hr>
        <div class="row">
            <div class="col">
                <p class="mx-3">
                    <b>Origin: </b><i>{{ $plant_info['basic']['origin'] }}</i><br>
                    <b>Species: </b><i>{{ $plant_info['display_pid'] }}</i><br>
                    <b>Colors: </b><i>{{ $plant_info['basic']['color'] }}</i>
                </p>
            </div>
            <div class="col-3">
                <img src="{{ asset('img/plants/icons/plant.png') }}" alt="" width="100%">
            </div>
        </div>
    </div>

    @if(count($device) != 0)
        <div id="plant_controls" class="tile-container container mt-3">
            <img src="@if($device[0]->status == "active") {{ asset('img/plants/icons/active.png') }} @else {{ asset('img/plants/icons/inactive.png') }} @endif" width="10px" style="float: right; margin-top: 13px" alt="">
            <h4 class="text-m_green_dark mt-2">Plant Monitoring & Controls</h4>
            
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="tile container" style="background: #ffdd85">
                        <center>
                            <img src="{{ asset('img/plants/icons/sun.png') }}" alt="" class="tile-img">
                            <small class="text-light"><b>{{ $device[0]->light_intensity }} lx</b></small>
                        </center>
                    </div>
                </div>
                <div class="col-4">
                    <div class="tile container" style="background: #87D1FB">
                        <center>
                            <img src="{{ asset('img/plants/icons/water lvl.png') }}" alt="" class="tile-img">
                            <small class="text-light"><b>{{ $device[0]->water_level_1 }}%</b></small>
                        </center>
                    </div>
                </div>
                <div class="col-4">
                    <div class="tile container" style="background: #FB8762">
                        <center>
                            <img src="{{ asset('img/icons/Maintenance/icons8-temperature-96.png') }}" alt="" class="tile-img">
                            <small class="text-light"><b>{{ $device[0]->temperature }}%</b></small>
                        </center>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">
                    <div class="tile container" style="background: #B0F4F0">
                        <center>
                            <img src="{{ asset('img/plants/icons/humidity.png') }}" alt="" class="tile-img">
                            <small class="text-light"><b>{{ $device[0]->humidity }}%</b></small>
                        </center>
                    </div>
                </div>
                <div class="col-4">
                    <div class="tile container" style="background: #AC7A4C">
                        <center>
                            <img src="{{ asset('img/plants/icons/soil moisture.png') }}" alt="" class="tile-img">
                            <small class="text-light"><b>{{ $device[0]->soil_moisture }}%</b></small>
                        </center>
                    </div>
                </div>
                <div class="col-4">
                    <div class="tile container" style="background: #50E95F">
                        <center>
                            <img src="{{ asset('img/plants/icons/fert.png') }}" alt="" class="tile-img">
                            <small class="text-light"><b>{{ $device[0]->water_level_2 }}%</b></small>
                        </center>
                    </div>
                </div>
            </div>
            <br>
            <i><img src="{{ asset('img/plants/icons/tap.png') }}" alt="" width="20"> Tap here for more info</i>
        </div>
    @endif

    <div class="tile-container container mt-3">
        <h4 class="text-m_green_dark mt-2">Activities & Notifications</h4>
        <hr>
        <div class="row mb-2">
            <div class="col-4">
                <div id="plant_activities" class="tile container" style="background: #A4F3E0">
                    <center>
                        <img src="{{ asset('img/plants/icons/activity.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>Activities</b></small>
                    </center>
                </div>
            </div>
            <div class="col-4">
                <div id="plant_diagnosis" class="tile container" style="background: #C2F3A4">
                    <center>
                        <img src="{{ asset('img/plants/icons/diagnose.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>Diagnose</b></small>
                    </center>
                </div>
            </div>
            <div class="col-4">
                <div class="tile container" style="background: #F3EBA4">
                    <center>
                        <img src="{{ asset('img/plants/icons/reminder.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>Reminder</b></small>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <div id="device_option" class="tile-container container mt-3">
        <h4 class="text-m_green_dark mt-2">Device Options</h4>
        <hr>
        @if(count($device) != 0)
            <div class="row mb-2">
                <div class="col-3">
                    <div id="show_devices" class="tile container" style="background: #ACFF85">
                        <center>
                            <img src="{{ asset('img/plants/icons/plant_paired.png') }}" alt="" class="tile-img">
                        </center>
                    </div>
                </div>
                <div class="col">
                    <h5 class="mt-3">{{$device[0]->serial_no}}</h5>
                </div>
                <div class="col-3">
                    <div class="tile container" style="background: #FF4E27">
                        <center>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#unpair_device_modal">
                                <img src="{{ asset('img/plants/icons/trash.png') }}" alt="" class="tile-img">
                            </a>
                            @include('modals.unpair-device-modal')
                        </center>
                    </div>
                </div>
            </div>
        @else
            <h5 class="text-center p-3">No Paired Device</h5>
            <center>
                <button id="btn_show_devices" class="btn btn-secondary mb-3">Show Available Devices</button>
            </center>
        @endif
    </div>

    <button id="btn-remove-plant" class="btn btn-danger btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#remove_plant_modal">Remove from my Plants</button>
</div>

@include('pages.templates.my-plants.device-connection')

@include('modals.remove-plant-modal')