<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\EspeceController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\CategoryController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function() {

});


Route::apiResource("categories", CategoryController::class);
Route::apiResource("formes", FormeController::class);
Route::apiResource("genres", GenreController::class);
Route::apiResource("especes", EspeceController::class);
Route::apiResource("familles", FamilleController::class);
