<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ContactsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')
        ->prefix('posts')
        ->group(function(){
            Route::get('/',[PostController::class, 'index']);
            Route::get('/type',[PostController::class, 'getTypes']);
            Route::get('/{slug}',[PostController::class, 'getPostDetail']);
        });

Route::namespace('Api')
        ->prefix('contacts')
        ->group(function(){
            Route::post('/mail',[ContactsController::class, 'sendMail']);
        });
