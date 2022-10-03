<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\Maintenance_Admin\RequestMaintenanceMedicalController;
use App\Http\Controllers\Admin\Device_Admin\ViewAdminDeviceController;
use App\Http\Controllers\Admin\Device_IT\Device_ItController;
use App\Http\Controllers\Admin\Device_Medical\Device_Med_MovementController;
use App\Http\Controllers\Admin\Device_Medical\Device_MedicalController;
use App\Http\Controllers\Admin\Maintenance_It\Request_Maintenance_ItController;
use App\Http\Controllers\Admin\Maintenance_Medical\Request_Maintenance_MedicalController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Dashborad\DashbordController;
use App\Http\Controllers\User\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Device\DeviceController;
use App\Http\Controllers\Device\DeviceMovementController;
use App\Http\Controllers\Maintenance\MaintenanceRequestController;
use App\Http\Controllers\PurchaseOrder\PurchaseOrderController;
use App\Http\Controllers\SubDepartment\SubDepartmenController;
use App\Http\Controllers\Technician\TechnicianController;
use App\Mail\TicketEmail;
use App\Mail\WelcomeEmail;



/*
|--------------------------------------------------------------------------
| Route Dashboard
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('dashboard', function () {
        return view('admin.adminLogin.dashboard');



    });



/*
|--------------------------------------------------------------------------
| Route Spatie
|--------------------------------------------------------------------------
*/
    Route::namespace('App\Http\Controllers\spatie')->group(function () {

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('user.permissions', UserPermissionController::class);
        Route::resource('role.permissions', RolePermissionController::class);

        Route::get('AAAAA/admin', [AdminController::class, 'editPassword'])->name('admin.changepassword');

        Route::put('changepassword/admin', [AdminController::class, 'updatePassword'])->name('admin.updatepassword');

        Route::get('/charts/tickets', [DashbordController::class, 'dashboard'])->name('admin.charts.tickets');

    });

/*
|--------------------------------------------------------------------------
| Route Admin
|--------------------------------------------------------------------------
*/
    Route::resource('admin', AdminController::class);


    
/*
|--------------------------------------------------------------------------
| Route Users
|--------------------------------------------------------------------------
*/
    Route::resource('users', UserController::class);

/*
|--------------------------------------------------------------------------
| Route Technicians
|--------------------------------------------------------------------------
*/
    Route::resource('technicians', TechnicianController::class);

/*
|--------------------------------------------------------------------------
| Route Devices It Device
|--------------------------------------------------------------------------
*/

    Route::get('devices', [ViewAdminDeviceController::class, 'index'])->name('admin.viewdevice');

    Route::get('device/data', [ViewAdminDeviceController::class, 'data'])->name('viewdevices.data');

    Route::get('devices_It', [Device_ItController::class, 'index'])->name('admin.DevicesIt');

    Route::get('devices_It/data', [Device_ItController::class, 'data'])->name('DevicesIt.data');

    Route::get('devices_It/create', [Device_ItController::class, 'create'])->name('admin.devices_It.create');

    Route::post('devices_It/store', [Device_ItController::class, 'store'])->name('admin.devices_It.store');

    Route::get('devices_It/{id}/edit', [Device_ItController::class, 'edit'])->name('admin.devices_It.edit');

    Route::put('devices_It/update/{id}', [Device_ItController::class, 'update'])->name('admin.devices_It.update');

    Route::get('devices_It/{id}', [Device_ItController::class, 'show'])->name('admin.devices_It.show');

    Route::get('Movements_It/Movements_show/{id}', [Device_ItController::class, 'Movements_show'])->name('admin.Movements_It.Movements_show');


/*
|--------------------------------------------------------------------------
| Route Devices Medical Device
|--------------------------------------------------------------------------
*/

    Route::get('devices_Medical', [Device_MedicalController::class, 'index'])->name('admin.DevicesMedical');

    Route::get('devices_Medical/data', [Device_MedicalController::class, 'data'])->name('DevicesMedical.data');

    Route::get('devices_Medical/create', [Device_MedicalController::class, 'create'])->name('admin.devices_Medical.create');

    Route::post('devices_Medical/store', [Device_MedicalController::class, 'store'])->name('admin.devices_Medical.store');

    Route::get('devices_Medical/edit/{id}', [Device_MedicalController::class, 'edit'])->name('admin.devices_Medical.edit');

    Route::put('devices_Medical/update/{id}', [Device_MedicalController::class, 'update'])->name('admin.devices_Medical.update');

    Route::get('devices_Medical/{id}', [Device_MedicalController::class, 'show'])->name('admin.devices_Medical.show');

    Route::get('Movements_show/{id}', [Device_MedicalController::class, 'Movements_show'])->name('admin.Movements_show.Movements_show');

    Route::post('device_Movements/store', [Device_Med_MovementController::class, 'store'])->name('admin.device_Movements.store');

/*
|--------------------------------------------------------------------------
| Route Maintenances It Device
|--------------------------------------------------------------------------
*/

    Route::get('maintenances', [RequestMaintenanceMedicalController::class, 'index'])->name('maintenances.viewDeviceMedical');

    Route::get('maintenance/data', [RequestMaintenanceMedicalController::class, 'data'])->name('viewDeviceMedical.data');

    Route::get('maintenances_It',[Request_Maintenance_ItController::class, 'index'])->name('admin.Request_Device_It');

    Route::get('maintenances_It/data',[Request_Maintenance_ItController::class, 'data'])->name('Request_Device_It.data');

    Route::get('maintenances_It/create',[Request_Maintenance_ItController::class, 'create'])->name('admin.Request_Device_It.create');

    Route::post('maintenances_It/store',[Request_Maintenance_ItController::class, 'store'])->name('admin.Request_Device_It.store');

    Route::get('vvvvvvvvv_It/edit/{id}',[Request_Maintenance_ItController::class, 'edit'])->name('admin.Request_Device_It.edit');

    Route::PUT('xxxxxxx/update/{id}',[Request_Maintenance_ItController::class,'update'])->name('admin.Request_Device_It.update');

    Route::get('maintenances_It/{id}', [Request_Maintenance_ItController::class,'show'])->name('admin.Request_Device_It.show');

    Route::get('cmments/{id}', [Request_Maintenance_ItController::class, 'comment_show'])->name('cmmentShow.data');


/*
|--------------------------------------------------------------------------
| Route Maintenances Medical Device
|--------------------------------------------------------------------------
*/

    Route::get('maintenance_Medical', [Request_Maintenance_MedicalController::class, 'index'])->name('admin.Request_Device_Medical');

    Route::get('maintenance_Medical/data', [Request_Maintenance_MedicalController::class, 'data'])->name('Request_Device_Medical.data');

    Route::get('maintenance_Medical/create', [Request_Maintenance_MedicalController::class, 'create'])->name('admin.Request_Device_Medical.create');

    Route::post('maintenance_Medical/store', [Request_Maintenance_MedicalController::class, 'store'])->name('admin.Request_Device_Medical.store');

    Route::get('maintenance_Medical/edit/{id}', [Request_Maintenance_MedicalController::class, 'edit'])->name('admin.Request_Device_Medical.edit');

    Route::PUT('maintenance_Medical/update/{id}', [Request_Maintenance_MedicalController::class, 'update'])->name('admin.Request_Device_Medical.update');

    Route::get('maintenance_Medical/{id}', [Request_Maintenance_MedicalController::class,'show'])->name('admin.Request_Device_Medicals.show');

    Route::get('cmments/{id}', [Request_Maintenance_MedicalController::class, 'comment_show'])->name('cmmentShow.data');


});

Route::get('email', function () {
    return new WelcomeEmail();
});

Route::get('aaa', function () {
    return new TicketEmail();
});

Route::group(['middleware' => ['auth:admin,web']], function () {

    // Route::resource('devices', DeviceController::class);

    // Route::get('device/data', [DeviceController::class, 'data'])->name('devices.data');


    // Route::get('medicalDevices', [DeviceController::class, 'medicalDep'])->name('medicalDevices');

    // Route::get('medicalDevice/medicalDevicee', [DeviceController::class, 'medicalDevicee'])->name('medicalDevices.medicalDevicee');

    // Route::get('movementsShow/{id}', [DeviceController::class, 'deviceMovements_show'])->name('movementShow.data');

    Route::get('/getdetails/{id}', [DeviceController::class, 'getdetail']);

    // Route::get('deviceMedical/devicesData', [DeviceController::class, 'devicesData'])->name('devices.medical');

    // Route::get('deviceMedical', [DeviceController::class, 'getdeviceMedical'])->name('deviceMedical');

    // Route::get('deviceIt/devicesData', [DeviceController::class, 'itData'])->name('devices.it');

    // Route::get('deviceIt', [DeviceController::class, 'getdeviceIt'])->name('deviceIt');

    Route::namespace('App\Http\Controllers\Department')->group(function () {

        Route::resource('departments', DepartmentController::class);
        Route::get('department/data', [DepartmentController::class, 'data'])->name('departments.data');

        // Route::get('getsubDepartment', [DepartmentController::class ,'getsubDepartment'])->name('getsubDepartments');
    });

    Route::namespace('App\Http\Controllers\SubDepartment')->group(function () {

        Route::resource('subdepartments', SubDepartmenController::class);
        Route::get('subdepartment/data', [SubDepartmenController::class, 'data'])->name('subdepartments.data');
    });
});

Route::group(['prefix' => 'Request', 'middleware' => ['auth:admin,web']], function () {

    // Route::get('email',function(){
    //     return new WelcomeEmail();
    // });

    // Route::resource('maintenances', MaintenanceRequestController::class);

    // Route::get('maintenance/data', [MaintenanceRequestController::class, 'data'])->name('maintenances.data');

    // Route::get('cmmentsShow/{id}', [MaintenanceRequestController::class, 'comment_show'])->name('cmmentShow.data');

    // Route::get('aaaa/devicesW', [MaintenanceRequestController::class, 'iTRequest'])->name('wwwwwww');

    // Route::get('deviceit', [MaintenanceRequestController::class, 'getdeviceit'])->name('ticket.devices_it');

    // Route::get('qqq/devicesW', [MaintenanceRequestController::class, 'MedicalRequest'])->name('qqqq');

    // Route::get('device_Medical', [MaintenanceRequestController::class, 'getdeviceMedical'])->name('ticket.device_Medical');

    // Route::get('getsubDepartment', [DepartmentController::class ,'getsubDepartment'])->name('getsubDepartments');

});

// Route::group(['prefix' =>'Request','middleware'=>['auth:admin,web']],function() { 

//     Route::resource('maintenances', RequestDeviceMedicalController::class); 

//     Route::get('maintenance/data', [RequestDeviceMedicalController::class, 'data'])->name('Requestmaintenances.data');
// });

Route::group(['prefix' => 'Request', 'middleware' => ['auth:admin,web']], function () {

    Route::resource('comments', CommentController::class);
});

Route::group(['prefix' => 'devices', 'middleware' => ['auth:admin,web']], function () {

    Route::resource('Device_Movements', DeviceMovementController::class);
});

Route::group(['prefix' => 'financial', 'middleware' => ['auth:admin,web']], function () {

    Route::resource('purchaseOrder', PurchaseOrderController::class);
});
