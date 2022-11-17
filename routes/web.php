<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\Dashborad\DashboradUserController;
use App\Http\Controllers\Dashborad\DashbordController;
use App\Http\Controllers\Device\DeviceAttachmentController;
use App\Http\Controllers\User\Device_IT\Device_ItController;
use App\Http\Controllers\User\Device_Medical\Device_MedicalController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\Maintenance_It\Request_Maintenance_ItController;
use App\Http\Controllers\User\Maintenance_Medical\Request_Maintenance_MedicalController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Mail\TicketEmail;

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

Route::get('/', [DashbordController::class, 'index'])->name('selection');

Route::group(['namespace'=>'user'],function () {

    Route::get('/login/{type}', [UserLoginController::class, 'showLogin'])->middleware('guest')->name('show.login');

    Route::post('/login', [UserLoginController::class, 'login'])->name('login');

    Route::get('/logout/{type}', [UserLoginController::class, 'logout'])->name('admin.logout');


    });

//     Auth::routes();

Route::prefix('user')->middleware('auth')->group(function () {

    // Route::get('dashboard', [DashbordController::class, 'dashboard'])->name('dashboard');

    Route::get('dashboard', [DashboradUserController::class, 'dashboard'])->name('dashboard');


    Route::put('changepassword/user', [UserController::class, 'updatePassword'])->name('user.updatepassword');

    Route::get('user_profil', [UserController::class, 'editPassword'])->name('user.changepassword');

    // Route::put('changepassword/admin', [AdminController::class, 'updatePassword'])->name('admin.updatepassword');


});

Route::group(['prefix' =>'user','middleware'=>['auth']],function() {

    // Route::get('Devices', [ViewDeviceMedicalController::class,'index'])->name('medicalDevicesView');

    // Route::get('Device/data', [ViewDeviceMedicalController::class, 'data'])->name('viewDevicesMedical.data');
    
    Route::get('Devices', [Device_ItController::class,'index'])->name('user.DevicesIt');

    Route::get('Device_It/data', [Device_ItController::class, 'data'])->name('user.DevicesIt.data');

    Route::get('devices_It/{id}', [Device_ItController::class, 'show'])->name('user.devices_It.show');

    Route::get('Movements_It/{id}', [Device_ItController::class, 'Movements_show'])->name('user.Movements_It');

    Route::resource('Attachments', DeviceAttachmentController::class);

    Route::get('View_file/{id}', [Device_ItController::class, 'viewFile'])->name('View_file_pdf');




    Route::get('Devices_Medical', [Device_MedicalController::class,'index'])->name('user.DevicesMedical');

    Route::get('Device_Medical/data', [Device_MedicalController::class, 'data'])->name('user.DevicesMedical.data');

    Route::get('devices_Medical/{id}', [Device_MedicalController::class, 'show'])->name('user.devices_Medical.show');

    Route::get('Movements_Medical/{id}', [Device_MedicalController::class, 'Movements_show'])->name('user.Movements_Medical');



    Route::get('Maintenances_It', [Request_Maintenance_ItController::class,'index'])->name('user.View_Request_IT'); 

    Route::get('Maintenances_It/data', [Request_Maintenance_ItController::class, 'data'])->name('user.View_Request_IT.data');

    Route::get('detail/{id}', [Request_Maintenance_ItController::class, 'show'])->name('user.Details_IT.show');

    Route::get('Maintenances_It/{id}', [Request_Maintenance_ItController::class, 'edit'])->name('user.Request_IT.edit');

    Route::PUT('xxxxxxx/update/{id}',[Request_Maintenance_ItController::class,'update'])->name('user.Request_Device_It.update');

    Route::get('Maintenance/create',[Request_Maintenance_ItController::class, 'create'])->name('user.Device_It.create');

    Route::post('maintenances_It/store',[Request_Maintenance_ItController::class, 'store'])->name('user.Request_Device_It.store');

    Route::get('cmments/{id}', [Request_Maintenance_ItController::class, 'comment_show'])->name('user.cmmentShowIt.data');

    Route::post('cmments/store', [CommentController::class, 'store'])->name('user.Request_Device_It_cmments.store');


    
    



    Route::get('Maintenances_Medical', [Request_Maintenance_MedicalController::class,'index'])->name('user.View_Request_Medical'); 

    Route::get('Maintenances_Medical/data', [Request_Maintenance_MedicalController::class, 'data'])->name('user.View_Request_Medical.data');

    Route::get('details/{id}', [Request_Maintenance_MedicalController::class, 'show'])->name('user.Details_Medical.show');

    Route::get('Maintenances_Medical/{id}', [Request_Maintenance_MedicalController::class, 'edit'])->name('user.Request_Medical.edit');

    Route::PUT('xxxxxxx/update/{id}',[Request_Maintenance_ItController::class,'update'])->name('user.Request_Device_It.update');

    Route::get('Maintenance_Medical/create',[Request_Maintenance_MedicalController::class, 'create'])->name('user.Device_Medical.create');

    Route::post('maintenances_Medical/store',[Request_Maintenance_MedicalController::class, 'store'])->name('user.Request_Device_Medical.store');

    Route::get('cmment/{id}', [Request_Maintenance_MedicalController::class, 'comment_show'])->name('user.cmmentShowMed.data');

    // Route::post('cmments/store', [CommentController::class, 'store'])->name('user.Request_Device_Medical_cmments.store');
    
    Route::get('/getdetails/{id}', [DeviceController::class, 'getdetail']);



   



    // Route::get('DevicesMedical', [ViewDeviceMedicalController::class,'index'])->name('medicalDevicesView');

    // Route::get('DevicesMedical/data', [ViewDeviceMedicalController::class, 'data'])->name('viewDevicesMedical.data');

    // Route::get('maintenances', [MaintenanceRequestUsersController::class,'create']);

    // Route::get('AAAAA', [UserLoginController::class, 'editPassword'])->name('auth.changepassword');

    // Route::put('changepassword', [UserLoginController::class, 'updatePassword'])->name('update-password');
   


});

// Route::group(['prefix' =>'user','middleware'=>['auth:web']],function() {

//     Route::get('Request_Medical', [RequestDeviceMedicalController::class,'index'])->name('View_Request_Medical'); 

//     Route::get('Request_Medical/data', [RequestDeviceMedicalController::class, 'data'])->name('Request_Medical.data');

//     Route::get('Request_It', [RequestDeviceItController::class,'index'])->name('View_Request_It'); 

//     Route::get('Request_It/data', [RequestDeviceItController::class, 'data'])->name('Request_It.data');

//     Route::get('details/{id}', [RequestDeviceItController::class, 'show'])->name('Showdetails');

//     Route::get('Request_It/{id}', [RequestDeviceItController::class, 'edit'])->name('ShowRequest_It');

//     Route::put('UpdateRequestIt/{id}', [RequestDeviceItController::class, 'update'])->name('UpdateRequestIt');

// });


Route::get('aaa', function () {
    return new TicketEmail();
});
