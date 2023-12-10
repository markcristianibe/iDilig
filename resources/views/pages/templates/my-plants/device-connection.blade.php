<div id="device_connection" class="container device-container-fade visually-hidden">
    <div class="container device-container">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <a href="#" id="btn-back"><i class="material-icons text-dark">arrow_back</i></a>
                </div>
                <div class="col">
                    <h3 class="mx-2">Device Connections</h3>
                </div>
            </div>
            <hr>
            <h5 class="text-gray555 mb-4">Paired Devices</h5>

            {{-- Paired Devices List --}}

            @php
            use App\Models\Device;
            $devices = Device::where('user_id', '=', auth()->user()->id)
                        ->where('status', '!=', 'idle')->get();
            @endphp

            @if(count($devices) > 0)
                @foreach ($devices as $device)
                    <div class="row my-2">
                        <div class="col">
                            <h3><img src="{{ asset('img/plants/icons/plant_paired.png') }}" width="25px" alt=""> {{$device->serial_no}}</h3>
                        </div>
                        <div class="col-2">
                            <a href="#"><img src="{{ asset('img/plants/icons/info.png') }}" width="20px"></a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center mt-5"><small>No Available Device.</small></p>
            @endif
            <hr class="mt-5">

            <h5 class="text-gray555 mb-4">Available Devices</h5>
            @php
            $devices = Device::where('user_id', '=', auth()->user()->id)
                        ->where('status', '=', 'idle')->get();
            @endphp

            @if(count($devices) > 0)
                @foreach ($devices as $device)
                    <div class="row my-2">
                        <div class="col">
                            <h3><img src="{{ asset('img/plants/icons/plant.png') }}" width="25px" alt=""> {{$device->device_name}}</h3>
                        </div>
                        <div class="col-2">
                            <div class="btn btn-success btn-sm btn_pair_device" id="{{ $device->serial_no }}">Pair</div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center mt-5"><small>No Available Device.</small></p>
            @endif
        </div>
    </div>
</div>

<style>
    .device-container-fade{
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 100%;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
        background-color: #02020296;
        overflow: hidden;
        display: flex;
        z-index: 90;
        padding: 0;
    }

    .device-container{
        position: fixed;
        bottom: 0;
        margin: 0;
        width: 100%;
        height: 80%;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        overflow: hidden;
        display: flex;
        z-index: 90;
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        padding: 20px 10px;
    }
    #btn-back{
        text-decoration: none;
    }
</style>