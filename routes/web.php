<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menuController;
use App\Http\Controllers\doctorsController;
use App\Http\Controllers\addressesController;
use App\Http\Controllers\drugsController;
use App\Http\Controllers\patientsController;
use App\Http\Controllers\prescriptionsController;
use App\Http\Controllers\prescdrugController;
use App\Http\Controllers\roomsController;
use App\Http\Controllers\visitsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('menu');
});
Route::resource('/', menuController::class);


Route::resource('doctors', doctorsController::class);
Route::resource('addresses', addressesController::class);
Route::resource('drugs', drugsController::class);
Route::resource('patients', patientsController::class);
Route::resource('prescriptions', prescriptionsController::class);
Route::resource('presc_drugs', prescdrugController::class);
Route::resource('rooms', roomsController::class);
Route::resource('visits', visitsController::class);

