<?php

use App\Http\Controllers\Api\ExcelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\User\UsersController;
use App\Http\Controllers\API\Workers\WorkersController;
use App\Http\Controllers\API\Evaluation\EvaluationsController;

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

Route::controller(LoginController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


Route::controller(UsersController::class)->group(function (){
    Route::get('admins', 'getAdmins');
    Route::get('areaManager', 'getAreaManagers');
    Route::get('businessManager', 'getBusinessManagers');
    Route::get('role/{id}', 'role');
    Route::get('area/{id}', 'getArea');
    Route::get('stats', 'getStats');
});

Route::controller(WorkersController::class)->group(function (){
    Route::get('workers', 'getWorkers');
    Route::get('worker/company/{id}', 'getWorkersByCompany');
    Route::get('worker/{id}', 'getWorker');
    Route::get('workers/area/{id}', 'getWorkersByArea');
});
Route::controller(EvaluationsController::class)->group(function (){
    Route::get('evaluations/worker/{id}', 'getEvaluationsByWorker');
});


