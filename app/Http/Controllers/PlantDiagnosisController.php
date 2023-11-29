<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantDiagnosisController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = $request->jsonResult;
            $jsonData = json_encode($data);
            $jsonData = json_decode($jsonData);

            return view('main', ['page' => 'diagnose-result', 'jsonData' => $jsonData]);
        }
    }
}
