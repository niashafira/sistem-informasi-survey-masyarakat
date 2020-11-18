<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurveyController;
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

//langsung mengarah ke view
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {
 
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::post('/dashboard/filter', [HomeController::class, 'filter']);

    Route::get('/survey', [SurveyController::class, 'index'])->name('survey');
    Route::post('/survey/create', [SurveyController::class, 'create']);
    Route::post('/survey/edit', [SurveyController::class, 'edit']);
    Route::post('/survey/update', [SurveyController::class, 'update']);
    Route::post('/survey/delete', [SurveyController::class, 'destroy']);
    Route::post('/survey/verifikasi', [SurveyController::class, 'verifikasi']);

    Route::get('/logout', [AuthController::class, 'logout']);
 
});


