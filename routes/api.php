<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;

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


Route::get('/projects', [ProjectController::class, 'index']);

// rotta per la show del singolo progetto
Route::get('/projects/{slug}', [ProjectController::class,'show']);

// creo la rotta che riceve i dati dal form front-end e memorizza nel db
Route::post('/new-contact', [ContactController::class, 'store']);
