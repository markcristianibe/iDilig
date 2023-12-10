<script src="{{ asset('js/pages/my-plants.js') }}"></script>

<h3 class="text-light mb-4">Plant Diagnosis</h3>

<div class="activity-container container m-0">
    @foreach ($diagnoses as $diagnose)
        <div id="{{$diagnose->id}}" class="plant_diagnosis tile-container container my-2">
            <p class="text-m_green_dark" style="border-bottom: 1px solid #000">
                <small>{{ date_format($diagnose->created_at, "F d Y, h:i a") }}</small>
            </p>
            <h6 class="text-gray555">Plant Diagnosis</h6>
        </div>
    @endforeach

    <p class="text-center mt-5"><i>No more activity to show.</i></p>
</div>

<label for="file_diagnose_plant" id="btn_add_diagnosis" class="btn">
    <img src="{{ asset('img/plants/icons/add-diagnose.png') }}" alt="">
</label>
<input type="file" id="file_diagnose_plant" accept="image/*" capture="environment" hidden/>

<style>
    #body{
        width: 100%;
        position:fixed;
        left:0px;
        bottom:0px;
        height: 65vh
    }
    .activity-container{
        max-height: 80%;
        overflow-y: auto;
    }
    #btn_add_diagnosis{
        width: 70px;
        height: 70px;
        padding: 10px;
        background: #fff;
        border-radius: 20px;
        position: fixed;
        bottom: 70px;
        right: 10px;
        box-shadow: 1px 1px 1px #000;
    }
    #btn_add_diagnosis img{
        width: 100%;
    }
</style>