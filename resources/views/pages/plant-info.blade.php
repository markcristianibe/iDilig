@section('pageTitle'){{ $plant_info['common_name'] }} @endsection

@section('headers')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/plant-info.css') }}">
@endsection

<script src="{{ asset('js/pages/scan.js') }}"></script>

@isset($plant_info['image'])
    <div id="header" class="container m-0 p-0" style="width: 100%;
        height: 300px;
        background-image: url('{{ $plant_info['image'] }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;">
    </div>
@endisset

<button id="btn_back" class="bg-light" onclick="window.location.href='/scan'">
    <i class="material-icons">arrow_back</i>
</button>

<div id="body" class="container bg-m_green_light">
    <p><b style="font-size: x-large">{{ ucwords($plant_info['common_name']) }}</b> <span class="text-gray555">a species of</span> <b>{{ $plant_info["basic"]["category"] }}</b></p>
    
    <div class="row">
        <div class="col-3">
            <span class="text-gray555">Botanical: </span>
        </div>
        <div class="col">
            <b><i>{{ $plant_info["display_pid"] }}</i></b>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <span class="text-gray555">Origin: </span>
        </div>
        <div class="col">
            <b><i>{{ $plant_info["basic"]["origin"] }}</i></b>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <span class="text-gray555">Production: </span>
        </div>
        <div class="col">
            <b><i>{{ $plant_info["basic"]["production"] }}</i></b>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <span class="text-gray555">Blooming: </span>
        </div>
        <div class="col">
            <b><i>{{ $plant_info["basic"]["blooming"] }}.</i></b>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <span class="text-gray555">Color: </span>
        </div>
        <div class="col">
            <b><i>{{ $plant_info["basic"]["color"] }}.</i></b>
        </div>
    </div>

    @if($plant_info["basic"]["floral_language"] != "")
        <center>
            <button class="btn btn-outline-success my-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFloralLanguage" aria-expanded="false" aria-controls="collapseExample">
                Floral Language
            </button> 
        </center>
        <div class="collapse" id="collapseFloralLanguage">
            <div class="card card-body">
                <p><small>{{ $plant_info["basic"]["floral_language"] }}</small></p>
            </div>
        </div>
    @endif

    <hr>

    <h2>Plant Care</h2>

    <div class="container mb-3 maintenance-container">
        <h4>Size</h4>
        <div class="row">
            <div class="col-3">
                <img class="maintenance-icon" src="{{ asset('img/icons/Maintenance/icons8-potted-plant-96.png') }}">
            </div>
            <div class="col">
                <small>
                    {{ $plant_info["maintenance"]["size"]  }}
                </small>
            </div>
        </div>
    </div>

    <div class="container mb-3 maintenance-container">
        <h4>Sunlight</h4>
        <div class="row">
            <div class="col-3">
                <img class="maintenance-icon" src="{{ asset('img/icons/Maintenance/icons8-sunlight-96.png') }}">
            </div>
            <div class="col">
                <small>
                    {{ $plant_info["maintenance"]["sunlight"]  }}
                </small>
            </div>
        </div>
    </div>

    <div class="container mb-3 maintenance-container">
        <h4>Watering</h4>
        <div class="row">
            <div class="col-3">
                <img class="maintenance-icon" src="{{ asset('img/icons/Maintenance/icons8-watering-96.png') }}">
            </div>
            <div class="col">
                <small>
                    {{ $plant_info["maintenance"]["watering"]  }}
                </small>
            </div>
        </div>
    </div>

    <div class="container mb-3 maintenance-container">
        <h4>Soil</h4>
        <div class="row">
            <div class="col-3">
                <img class="maintenance-icon" src="{{ asset('img/icons/Maintenance/icons8-soil-96.png') }}">
            </div>
            <div class="col">
                <small>
                    {{ $plant_info["maintenance"]["soil"]  }}
                </small>
            </div>
        </div>
    </div>

    <div class="container mb-3 maintenance-container">
        <h4>Fertilization</h4>
        <div class="row">
            <div class="col-3">
                <img class="maintenance-icon" src="{{ asset('img/icons/Maintenance/icons8-solid-fertilizer-96.png') }}">
            </div>
            <div class="col">
                <small>
                    {{ $plant_info["maintenance"]["fertilization"]  }}
                </small>
            </div>
        </div>
    </div>

    <div class="container mb-3 maintenance-container">
        <h4>Pruning</h4>
        <div class="row">
            <div class="col-3">
                <img class="maintenance-icon" src="{{ asset('img/icons/Maintenance/icons8-cutting-96.png') }}">
            </div>
            <div class="col">
                <small>
                    {{ $plant_info["maintenance"]["pruning"]  }}
                </small>
            </div>
        </div>
    </div>
    
    <center>
        <button id="btn_add_to_my_plants" class="btn">
            <div class="row mt-1">
                <div class="col-2">
                    <i class="material-icons">favorite_border</i>
                </div>
                <div class="col">
                    <b>Add to my plants</b>
                </div>
            </div>
        </button>
    </center>
</div>