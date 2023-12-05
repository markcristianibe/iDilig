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
        return view('main', ['page' => 'home']);
    } else{
        return view('sign-in');
    }
});

Route::post('/login', [UserController::class, 'login']);
Route::get('/user/logout', [UserController::class, 'logout']);

Route::get('/{page}', [AppController::class, 'index']);

Route::get('/diagnose/diagnose-result', [PlantDiagnosisController::class, 'index']);

Route::get('/plants/search', [PlantInformationController::class, 'search']);

Route::get('/scan/scan-result/{apiKey}/{q}', [PlantInformationController::class, 'get_plant_info']);

Route::get('/users/plants/add-plant', [UserController::class, 'add_user_plant']);

Route::get('/my-plants/search', [UserController::class, 'search_user_plant']);

Route::get('/user/plants/{id}', [UserController::class, 'get_user_plant_info']);