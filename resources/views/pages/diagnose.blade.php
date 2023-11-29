@section('pageTitle')Diagnose @endsection

@section('headers')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/diagnose.css') }}">
@endsection

<script src="{{ asset('js/pages/diagnose.js') }}"></script>

<div id="header" class="container bg-m_green_secondary pt-5 pb-5">
    <h2 class="text-light my-3">Diagnose Plant</h2>

    <div id="auto_diagnose_container" class="container">
        <div class="row">
            <div class="col-5">
                <img src="{{ asset('img/4963577.png') }}" width="100%" alt="">
            </div>
            <div class="col-7">
                <p class="text-center align-middle mt-5">Take photos of the plant's sick parts</p>
            </div>
        </div>
        <center>
            <label for="file_diagnose_plant" id="btn_diagnose_plant" class="btn btn-lg my-2">Start Diagnosis</label>
            <input type="file" id="file_diagnose_plant" accept="image/*" capture="environment" hidden/>
        </center>
    </div>
    <br>
</div>

<div id="content" class="container bg-m_green_light">
    <h4 class="mt-2 mb-2">Treat Common Plant Diseases</h4>

    <div class="row mt-4">
        <div class="col-6">
            <div class="container plant-disease-container" style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('img/diseases/foliar.jpg'); background-size: cover;">
                <b id="plant_disease_name" class="text-light">Foliar Diseases</b>
            </div>
        </div>
        <div class="col-6">
            <div class="container plant-disease-container" style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('img/diseases/stem.jpg'); background-size: cover;">
                <b id="plant_disease_name" class="text-light">Stem and Trunk Diseases</b>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <div class="container plant-disease-container"  style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('img/diseases/root.jpg'); background-size: cover;">
                <b id="plant_disease_name" class="text-light">Root and Rhizome Diseases</b>
            </div>
        </div>
        <div class="col-6">
            <div class="container plant-disease-container"  style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('img/diseases/fruit.jpg'); background-size: cover;">
                <b id="plant_disease_name" class="text-light">Fruit and Seed Diseases</b>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <div class="container plant-disease-container"  style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('img/diseases/flower.jpg'); background-size: cover;">
                <b id="plant_disease_name" class="text-light">Flower Diseases</b>
            </div>
        </div>
        <div class="col-6">
            <div class="container plant-disease-container"  style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('img/diseases/vascular.webp'); background-size: cover;">
                <b id="plant_disease_name" class="text-light">Vascular Diseases</b>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <div class="container plant-disease-container"  style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('img/diseases/systematic.webp'); background-size: cover;">
                <b id="plant_disease_name" class="text-light">Systemic Diseases</b>
            </div>
        </div>
        <div class="col-6">
            <div class="container plant-disease-container"  style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('img/diseases/whole-plant.webp'); background-size: cover;">
                <b id="plant_disease_name" class="text-light">Whole Plant Diseases</b>
            </div>
        </div>
    </div>
</div>
