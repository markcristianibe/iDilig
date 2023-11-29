<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class PlantInformationController extends Controller
{
    public function get_plant_info(Request $request){
        if(!is_null($request->apiKey) && !is_null($request->q)){
            $apiKey = $request->apiKey;
            $plant = $request->q;
            $url = "https://trefle.io/api/v1/plants/search?q=" . urlencode($plant) . "&token=" . $apiKey;

            $result = file_get_contents($url);
            $data = json_decode($result);
            $common_name = "";
            if($data->data){
                if($data->data[0]->common_name){
                    $common_name = $data->data[0]->common_name;
                }
                else{
                    $common_name = $plant;
                }
            }
            else{
                $common_name = $plant;
            }

            $plant_info = array(); 

            $databaseDir = "plant-database-master/json/";
            $plants = scandir($databaseDir);

            for($i = 2; $i < count($plants); $i++){
                try{
                    $jsonString = file_get_contents($databaseDir . "$plants[$i]");
                    $jsonData = json_decode($jsonString, true);
                    if($jsonData){
                        if(ucwords($jsonData["pid"]) == ucwords($plant)){
                            $plant_info =  $jsonData;
                            break;
                        }
                    }
                }
                catch(Exception){
                    return 'error';
                }
            }

            $plant_info['common_name'] = $common_name;

            
            if(array_key_exists('pid', $plant_info)){
                return view('main', ['page' => 'plant-info', 'plant_info' => $plant_info]);
            }
            else{
                return view('error', [
                    'title' => 'Plant Not Found.',
                    'content' => 'Sorry, ' . $plant_info['common_name'] . 'is not yet registered on our database.',
                    'note' => 'You can create a customized plant care for unidentified species.',
                    'redirect' => '/scan',
                    'action' => 'Okay'
                ]);
            }
        }
        else{
            return redirect('/scan');
        }
    }

    public function search(Request $request){
        if(!is_null($request->q)){
            $query = $request->q;

            $databaseDir = "plant-database-master/json/";
            $plants = scandir($databaseDir);

            $hasResult = false;
            $results = 0;
            for($i = 2; $i < count($plants); $i++){
                if($results < 20){
                    if(str_contains(strtolower($plants[$i]), strtolower($query))){
                        try{
                            $jsonString = file_get_contents($databaseDir . "$plants[$i]");
                            $jsonData = json_decode($jsonString, true);
                            if($jsonData){
                                $hasResult = true;
                                $results++;
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
                        catch(Exception $e){
                            $hasResult = false;
                        }
                    }
                    else{
                        $hasResult = false;
                    }
                }
                else{
                    break;
                }
            }

            if(!$hasResult){
                ?>
                <p class="mt-5 text-center text-gray555">No More Results Found.</p>
                <?php
            }
        }
        else{
            ?>
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
        }

        ?>
        <script>
            $(".plant-row").click(function(){
                var plant_name = this.id;

                const apiKey = 'fAbTGCCda1cuFC8ooIZ3qfLXzMlvkjH71UPjrDXZPv0';
                
                var spinner = '<div id="spinnerBackground"><img src="img/loading.gif"></div>';
                
                $("#body").html(spinner);

                window.location.href=`/scan/scan-result/${trefle_api_key}/${plant_name}`;
            });
        </script>
        <?php
    }
}
