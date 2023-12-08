@section('headers')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/diagnose-result.css') }}">
@endsection

<script src="{{ asset('js/pages/diagnose.js') }}"></script>

<div id="header" class="container mb-5">
    <div class="row mt-5">
        <div class="col-2">
            <button class="btn" onclick="window.location.reload()"><i class="material-icons">arrow_back</i></button>
        </div>
        <div class="col">
            <h4 class="text-center text-m_green_primary mt-1"><b>Diagnosis Result</b></h4>
        </div>
        <div class="col-2"></div>
    </div>

    <center class="mb-5">
        <img src="{{ $jsonData->input->images[0] }}" id="image" alt="">
    </center>
    
</div>

<div id="body" class="container bg-m_green_light">
    <h5 class="text-center text-m_green_dark"><b>Plant Health:</b></h5>
    @php
        $probability = $jsonData->result->is_healthy->probability;
        $probability = number_format($probability * 100, 2);
    @endphp
    @if($probability < 30)
        <h1 id="txt_plant_health" class="text-end text-danger">
            {{$probability}}%
        </h1>
        <span class="badge text-bg-danger float-end px-3" style="border: 2px solid #fff; border-radius: 20px">
            UNHEALTHY
        </span>
    @elseif($probability < 70)
        <h1 id="txt_plant_health" class="text-end text-warning">
            {{$probability}}%
        </h1>
        <span class="badge text-bg-warning float-end px-3" style="border: 2px solid #fff; border-radius: 20px">
            UNHEALTHY
        </span>
    @else
        <h1 id="txt_plant_health" class="text-end text-success">
            {{$probability}}%
        </h1>
        <span class="badge text-bg-success float-end px-3" style="border: 2px solid #fff; border-radius: 20px">
            HEALTHY
        </span>
    @endif

    <h6 class="text-success mt-4">Diseases:</h6>

    <?php
        $diseaseCount = count($jsonData->result->disease->suggestions);
        
        if($diseaseCount > 0){
            for($i = 0; $i < $diseaseCount; $i++){
                ?>
                <div id="disease_container" class="container bg-light">
                    <div class="row">
                        <div class="col-8">
                            <b class="text-gray555"><?php echo ucwords($jsonData->result->disease->suggestions[$i]->name); ?></b>
                        </div>
                        <div class="col-4">
                            <small><p class="text-end">Probability</p></small>
                            <h2 class="text-end" style="margin-top: -10px">
                                <b>
                                    <?php 
                                        $prob = $jsonData->result->disease->suggestions[$i]->probability; 
                                        $prob = $prob * 100;
                                        echo number_format($prob, 1) . "%";
                                    ?>
                                </b>
                            </h2>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        else{

        }
    ?>
</div>
