<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//CompanyController
use App\Http\Controllers\CompanyController;
//DivisionController
use App\Http\Controllers\DivisionController;
//JobLevelController
use App\Http\Controllers\JobLevelController;
//JobPositionController
use App\Http\Controllers\JobPositionController;
//ShiftController
use App\Http\Controllers\ShiftController;

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

Route::group([ 'middleware' => 'api', 'prefix' => 'auth' ], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    //register
    Route::post('register', [AuthController::class, 'register']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

//prefix company
Route::group([ 'middleware' => 'api', 'prefix' => 'company' ], function ($router) {
    //index
    Route::get('/', [CompanyController::class, 'index']);
    //get 1 data
    Route::get('/{id}', [CompanyController::class, 'show']);
    //edit
    Route::post('/update', [CompanyController::class, 'update']);
    //store
    Route::post('/', [CompanyController::class, 'store']);
    //delete
    Route::delete('/{id}', [CompanyController::class, 'destroy']);
});

//prefix division
Route::group([ 'middleware' => 'api', 'prefix' => 'division' ], function ($router) {
    //index
    Route::get('/', [DivisionController::class, 'index']);
    //get division by company
    Route::get('/company/{id}', [DivisionController::class, 'getByCompany']);
    //get 1 data
    Route::get('/{id}', [DivisionController::class, 'show']);
    //edit
    Route::post('/update', [DivisionController::class, 'update']);
    //store
    Route::post('/', [DivisionController::class, 'store']);
    //delete
    Route::delete('/{id}', [DivisionController::class, 'destroy']);
});
 
//prefix job_level
Route::group([ 'middleware' => 'api', 'prefix' => 'job_level' ], function ($router) {
    //index
    Route::get('/', [JobLevelController::class, 'index']);
    //get job_level by company
    Route::get('/company/{id}', [JobLevelController::class, 'getByCompany']);
    //get 1 data
    Route::get('/{id}', [JobLevelController::class, 'show']);
    //edit
    Route::post('/update', [JobLevelController::class, 'update']);
    //store
    Route::post('/', [JobLevelController::class, 'store']);
    //delete
    Route::delete('/{id}', [JobLevelController::class, 'destroy']);
});

//prefix job_position
Route::group([ 'middleware' => 'api', 'prefix' => 'job_position' ], function ($router) {
    //index
    Route::get('/', [JobPositionController::class, 'index']);
    //get job_position by company
    Route::get('/company/{id}', [JobPositionController::class, 'getByCompany']);
    //get 1 data
    Route::get('/{id}', [JobPositionController::class, 'show']);
    //edit
    Route::post('/update', [JobPositionController::class, 'update']);
    //store
    Route::post('/', [JobPositionController::class, 'store']);
    //delete
    Route::delete('/{id}', [JobPositionController::class, 'destroy']);

});

//prefix shift
Route::group([ 'middleware' => 'api', 'prefix' => 'shift' ], function ($router) {
    //index
    Route::get('/', [ShiftController::class, 'index']);
    //get 1 data
    Route::get('/{id}', [ShiftController::class, 'show']);
    //edit
    Route::post('/update', [ShiftController::class, 'update']);
    //store
    Route::post('/', [ShiftController::class, 'store']);
    //delete
    Route::delete('/{id}', [ShiftController::class, 'destroy']);
});





