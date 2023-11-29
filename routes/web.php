<?php

use App\Http\Controllers\PlantDiagnosisController;
use App\Http\Controllers\PlantInformationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(session()->has('user')){
        return view('main');
    } else{
        return view('main', ['page' => 'home']);
    }
});

Route::get('/{page}', function($page){
    return view('main', ['page' => $page]);
});

Route::get('/diagnose/diagnose-result', [PlantDiagnosisController::class, 'index']);

Route::get('/plants/search', [PlantInformationController::class, 'search']);

Route::get('/scan/scan-result/{apiKey}/{q}', [PlantInformationController::class, 'get_plant_info']);
