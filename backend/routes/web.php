<?php

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
Route::get('/', function(){
    $params = [
        'name' => 'truong',
        'password' => '123456',
        'email123' => 'abc@gmail',
        'status' => '1'
    ];
    $user = new \App\Models\User();
    $user->fill($params);
    dd($user);
});

Route::post('/drive', [\App\Http\Controllers\DriveController::class,'index']);
Route::get('/list', [\App\Http\Controllers\DriveController::class,'list']);

Route::get('/create', [\App\Http\Controllers\TestController::class,'folder']);
Route::post('/upload', [\App\Http\Controllers\TestController::class,'upload']);

Route::get('/album', [\App\Http\Controllers\PhotoController::class,'album']);
Route::get('/change-title', [\App\Http\Controllers\PhotoController::class,'changeAlbumTitle']);
Route::get('/upload', [\App\Http\Controllers\PhotoController::class,'upload']);