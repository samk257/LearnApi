<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::apiResource('/todo', TodoController::class)->except('update','store','destroy');
Route::apiResource('/todo/category', CategoryController::class)->except('update','store','destroy');



Route::get('/products/search/{name}', [ProductController::class,'search']);

    Route::group(['middleware'=>['auth:sanctum']],function(){

        Route::apiResource('/products', ProductController::class)->except('index','show');
        Route::post('/logout',[AuthController::class,'logout']);

        // Todo

        Route::apiResource('/todo', TodoController::class)->except('index','show');
        Route::apiResource('/todo/category', CategoryController::class)->except('index','show');

    });

