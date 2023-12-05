@section('headers')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/my-plant-info.css') }}">
@endsection

<script src="{{ asset('js/pages/my-plants.js') }}"></script>

<button id="btn_back" class="bg-light" onclick="window.location.href='/my-plants'">
    <i class="material-icons">arrow_back</i>
</button>

<div class="header mt-5 ">
    <center>
        <img src="{{ asset('img/PLANTS_icon_bg.jpg') }}" alt="" class="plant-img">
    </center>
    <div class="header-container container">
        <h3 class="text-center">Helianthus Anuus <a href="">🖊️</a></h3>
        <hr>
        <p id="txt_category" class="text-center"><i>"Compositae, Helianthus"</i></p>
        <p id="txt_date" class="text-center"><small><i>Plant added at September 28, 2023</i></small></p>
    </div>
</div>

<div id="body" class="bg-m_green_tertiary mt-3">
    <div id="plant_info" class="tile-container container">
        <h4 class="text-m_green_dark mt-2">Plant Info</h4>
        <hr>
        <div class="row">
            <div class="col">
                <p class="mx-3">
                    <b>Origin: </b><i>North America</i><br>
                    <b>Species: </b><i>Helianthus Annuus</i><br>
                    <b>Colors: </b><i>yellow, red, orange</i>
                </p>
            </div>
            <div class="col-3">
                <img src="{{ asset('img/plants/icons/plant.png') }}" alt="" width="100%">
            </div>
        </div>
    </div>
    <div id="plant_controls" class="tile-container container mt-3">
        <h4 class="text-m_green_dark mt-2">Plant Monitoring & Controls</h4>
        <hr>
        <div class="row">
            <div class="col-4">
                <div class="tile container" style="background: #ffdd85">
                    <center>
                        <img src="{{ asset('img/plants/icons/sun.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>100,000 lux</b></small>
                    </center>
                </div>
            </div>
            <div class="col-4">
                <div class="tile container" style="background: #87D1FB">
                    <center>
                        <img src="{{ asset('img/plants/icons/water lvl.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>85%</b></small>
                    </center>
                </div>
            </div>
            <div class="col-4">
                <div class="tile container" style="background: #FB8762">
                    <center>
                        <img src="{{ asset('img/icons/Maintenance/icons8-temperature-96.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>70%</b></small>
                    </center>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-4">
                <div class="tile container" style="background: #B0F4F0">
                    <center>
                        <img src="{{ asset('img/plants/icons/humidity.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>35%</b></small>
                    </center>
                </div>
            </div>
            <div class="col-4">
                <div class="tile container" style="background: #AC7A4C">
                    <center>
                        <img src="{{ asset('img/plants/icons/soil moisture.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>30%</b></small>
                    </center>
                </div>
            </div>
            <div class="col-4">
                <div class="tile container" style="background: #50E95F">
                    <center>
                        <img src="{{ asset('img/plants/icons/fert.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>70%</b></small>
                    </center>
                </div>
            </div>
        </div>
        <br>
        <i>👆🏾 Tap here for more info</i>
    </div>

    <div id="plant_activities" class="tile-container container mt-3">
        <h4 class="text-m_green_dark mt-2">Activities & Notifications</h4>
        <hr>
        <div class="row mb-2">
            <div class="col-4">
                <div class="tile container" style="background: #A4F3E0">
                    <center>
                        <img src="{{ asset('img/plants/icons/activity.png') }}" alt="" class="tile-img">
                        <small class="text-light"><b>Activities</b></small>
                    </center>
                </div>
            </div>
            <div class="col-4">
                <div class="tile container" style="background: #C2F3A4">
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
        <div class="row mb-2">
            <div class="col-3">
                <div class="tile container" style="background: #ACFF85">
                    <center>
                        <img src="{{ asset('img/plants/icons/paired.png') }}" alt="" class="tile-img">
                    </center>
                </div>
            </div>
            <div class="col">
            </div>
            <div class="col-3">
                <div class="tile container" style="background: #FF4E27">
                    <center>
                        <img src="{{ asset('img/plants/icons/trash.png') }}" alt="" class="tile-img">
                    </center>
                </div>
            </div>
        </div>
    </div>

    <button id="btn_remove_plant" class="btn btn-danger btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#remove_plant_modal">Remove from my Plants</button>
</div>

@include('modals.remove-plant-modal')