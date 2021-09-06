<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('welcome');
});

Route::get('create',[App\Http\Controllers\ImageController::class, 'create']);
Route::post('create',[App\Http\Controllers\ImageController::class, 'store']);

Route::get('watermark-image',[App\Http\Controllers\WaterMarkController::class, 'imageWatermark'] );
Route::get('watermark-text',[App\Http\Controllers\WaterMarkController::class, 'textWatermark'] );
