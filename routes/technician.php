<?php

use App\Http\Controllers\Technician\Maintenance_Technician\RequestMaintenanceTeMedicalController;
use App\Http\Controllers\User\Maintenance_User\RequestDeviceItController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| TechnicianRoutes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route :: group(
//     [
//         'Middleware'=>['auth:technician']

//     ] , function(){

//         Route::get ('/technician/dashboard', function(){

//             return view ('technician.technicianLogin.dashboard');
//         });

//     });

Route::prefix('technician')->middleware('auth:technician')->group(function () {

    Route::get('dashboard', function () {

        return view('technician.technicianLogin.dashboard');
    });
});


Route::group(['prefix' =>'technician','middleware'=>['auth:admin,web,technician']],function() {

    Route::get('Request_Medical', [RequestMaintenanceTeMedicalController::class,'index'])->name('View_Request_Medical'); 

    Route::get('Request_Medical/data', [RequestMaintenanceTeMedicalController::class, 'data'])->name('Request_Medical.data');

    Route::get('Request_It', [RequestDeviceItController::class,'index'])->name('View_Request_It'); 

    Route::get('Request_It/data', [RequestDeviceItController::class, 'data'])->name('Request_It.data');

    Route::get('details/{id}', [RequestDeviceItController::class, 'show'])->name('Showdetails');

    Route::get('Request_It/{id}', [RequestDeviceItController::class, 'edit'])->name('ShowRequest_It');

    Route::put('UpdateRequestIt/{id}', [RequestDeviceItController::class, 'update'])->name('UpdateRequestIt');

});

