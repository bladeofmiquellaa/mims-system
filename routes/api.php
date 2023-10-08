<?php

use App\Http\Controllers\CcaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('image/remove',[CcaseController::class, 'remove_image']);
Route::post('subcategory',[CcaseController::class, 'subcategorie']);
Route::post('cases',[CcaseController::class, 'allcases']);
Route::post('comments',[CcaseController::class, 'send_comments']);
