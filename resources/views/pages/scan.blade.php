@section('pageTitle')Scan @endsection

@section('headers')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/scan.css') }}">
@endsection

<script src="{{ asset('js/pages/scan.js') }}"></script>

<div id="header" class="container bg-m_green_secondary">
    <div id="snapshot_container" class="container mb-5">
        <center>
            <img src="{{ asset('img/scan-plant.png') }}" class="mt-2" width="50%" alt="">
            <p>Snap and Identify with Ease!</p>
            <label for="file_scan_plant" id="btn_scan_plant" class="btn btn-lg mb-2">Take Snapshot</label>
            
            <form id="scan_plant_form" method="post">
                <input type="file" id="file_scan_plant" accept="image/*" capture="camera" hidden/>
            </form>
        </center>
    </div>
</div>

<div id="body" class="container bg-m_green_light">
    <h5 class="text-center">Plant Database</h5>
    <input type="search" class="form-control" name="search" id="txt_searchbar" placeholder="🔍 Search plant species . . .">

    <div class="row mt-2">
        <div class="col"><hr></div>
        <div class="col-5">
            <p class="text-center mt-1"><small> Top 20 plant species </small></p>
        </div>
        <div class="col"><hr></div>
    </div>


    <div id="plant_list">
        <hr>
        <?php
        $databaseDir = "plant-database-master/json/";
        $plants = scandir($databaseDir);

        for($i = 2; $i < 20; $i++){
            try{
                $jsonString = file_get_contents($databaseDir . "$plants[$i]");
                $jsonData = json_decode($jsonString, true);
                if($jsonData){
                    ?>
                    <div id="<?php echo $jsonData["pid"]; ?>" class="row plant-row">
                        <div class="col-2">
                            <img src="<?php echo $jsonData["image"]; ?>" alt="" width="100%" class="circle">
                        </div>
                        <div class="col-10">
                            <p class="mt-2"><b class="text-gray555"><?php echo ucwords($jsonData["display_pid"]);?></b></p>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
            }
            catch(Exception $e){}
        }
        ?>
    </div>
</div>