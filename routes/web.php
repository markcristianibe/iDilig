<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PlantDiagnosisController;
use App\Http\Controllers\PlantInformationController;
use App\Http\Controllers\UserController;
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
    if(auth()->user() != ''){
        return redirect('/home');
    } else{
        return view('sign-in');
    }
});

Route::post('/login', [UserController::class, 'login']);

Route::get('/user/logout', [UserController::class, 'logout']);

Route::get('/{page}', [AppController::class, 'index']);

Route::get('/user/device-scan', function(){
    if(auth()->user() != ''){
        return view('pages.templates.qr-code-scanner.scan-device');
    }
    else{
        return redirect('/');
    }
});

Route::get('/user/register-device', [UserController::class, 'register_user_device']);

Route::get('/diagnose/diagnose-result', [PlantDiagnosisController::class, 'index']);

Route::get('/plants/search', [PlantInformationController::class, 'search']);

Route::get('/scan/scan-result/{apiKey}/{q}', [PlantInformationController::class, 'get_plant_info']);

Route::get('/users/plants/add-plant', [UserController::class, 'add_user_plant']);

Route::get('/my-plants/search', [UserController::class, 'search_user_plant']);

Route::get('/user/plants/{id}', [UserController::class, 'get_user_plant_info']);

Route::get('/user/plant/monitoring', [UserController::class, 'get_device_params']);

Route::get('/user/plant/activities', [UserController::class, 'get_user_plant_activities']);

Route::get('/user/plant/diagnosis', [UserController::class, 'get_user_plant_diagnosis']);

Route::get('/my-plant/diagnose/diagnose-result', [PlantDiagnosisController::class, 'get_user_plant_diagnosis']);

Route::get('/user/diagnose-history', [UserController::class, 'get_diagnosis_result']);

Route::get('/user/plants/remove/{id}', [UserController::class, 'remove_user_plant']);

Route::get('/user/pair-device', [UserController::class, 'pair_user_device']);

Route::get('/user/unpair-device', [UserController::class, 'unpair_user_device']);

Route::get('/user/remove-device', [UserController::class, 'remove_device']);

Route::get('/user/force-remove-device', [UserController::class, 'force_remove_device']);