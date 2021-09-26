<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\SocialAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'api', 'prefix' => 'v1/auth', 'namespace' => 'api'], function (){
    Route::get('{provider}/url', [SocialAuthController::class,'url']);
    Route::get('{provider}/callback', [SocialAuthController::class,'callback']);
});

Route::group(['middleware' => ['api','auth:api'], 'prefix' => 'v1/auth', 'namespace' => 'api'], function (){
    Route::get('me', [SocialAuthController::class,'me']);
    Route::get('logout', [SocialAuthController::class,'logout']);
});


