<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

Route::get('/products/search/{name}', [ProductController::class,'search']);
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::apiResource('/products', ProductController::class)->except('index','show');
    Route::post('/logout',[AuthController::class,'logout']);

});

