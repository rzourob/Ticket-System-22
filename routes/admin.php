<?php

use App\Http\Controllers\AccessoryIt\AccessoryItController;
use App\Http\Controllers\AccessoryMedical\AccessoryMedicalController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Maintenance_Admin\RequestMaintenanceMedicalController;
use App\Http\Controllers\Admin\Devices\ALL_DeviceController;
use App\Http\Controllers\Admin\Devices\Device_Movement\ItMovementController;
use App\Http\Controllers\Admin\Devices\Device_Movement\MedicalMovementController;
use App\Http\Controllers\Admin\Devices\ItController;
use App\Http\Controllers\Admin\Devices\MedicalController;
use App\Http\Controllers\Admin\Maintenance_Medical\Request_Maintenance_MedicalController;
use App\Http\Controllers\Admin\RequestMaintrnance\ItController as RequestMaintrnanceItController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Dashborad\DashbordController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Device\DeviceAttachmentController;
use App\Http\Controllers\Device\DeviceController;
use App\Http\Controllers\Device\DeviceMovementController;
use App\Http\Controllers\Problem\ProblemController;
use App\Http\Controllers\PurchaseOrder\PurchaseOrderController;
use App\Http\Controllers\SubDepartment\SubDepartmenController;
use App\Http\Controllers\SubProblem\SubProblemController;
use App\Http\Controllers\Technician\TechnicianController;
use App\Mail\WelcomeEmail;



/*
|--------------------------------------------------------------------------
| Route Dashboard
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    // Route::get('dashboard', function () {
    //     return view('admin.adminLogin.dashboard');

       


    // });
    Route::get('dashboard', [DashbordController::class,'dashboard'] );



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

        Route::get('admin_profil', [AdminController::class, 'editPassword'])->name('admin.changepassword');

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

    Route::get('devices', [ALL_DeviceController::class, 'index'])->name('admin.viewdevice');

    Route::get('device/data', [ALL_DeviceController::class, 'data'])->name('viewdevices.data');

/*----------------------------------------------------------------------------------------------------------   */

    Route::get('devices_It', [ItController::class, 'index'])->name('admin.DevicesIt');

    Route::get('devices_It/data', [ItController::class, 'data'])->name('DevicesIt.data');

    Route::get('devices_It/create', [ItController::class, 'create'])->name('admin.devices_It.create');

    Route::post('devices_It/store', [ItController::class, 'store'])->name('admin.devices_It.store');

    Route::get('devices_It/{id}/edit', [ItController::class, 'edit'])->name('admin.devices_It.edit');

    Route::put('devices_It/update/{id}', [ItController::class, 'update'])->name('admin.devices_It.update');

    Route::get('devices_It/{id}', [ItController::class, 'show'])->name('admin.devices_It.show');

    Route::delete('devices_IT/{id}', [ItController::class, 'destroy'])->name('admin.devices_IT.destroy');


    Route::get('View_file_Admin/{id}', [ItController::class, 'viewFile'])->name('View_file_Admin_pdf');

    Route::get('View_Image_it_Admin/{id}', [ItController::class, 'viewImage'])->name('View_Image_it_Admin');

    /*----------------------------------------------------------------------------------------------------------   */

    Route::get('Accessory_It/{id}', [ItController::class ,'accessoryit_show'])->name('admin.devices_It.accessoryit_show');

    Route::get('Movements_It/{id}', [ItController::class, 'Movements_show'])->name('admin.Movements_It.Movements_show');


    /*----------------------------------------------------------------------------------------------------------   */

    Route::post('Accessory_It/store', [AccessoryItController::class, 'store'])->name('admin.accessoryit.store');

    Route::delete('Accessory_destroy/{id}', [AccessoryItController::class, 'destroy'])->name('admin.accessoryit.destroy');

    /*----------------------------------------------------------------------------------------------------------   */


        Route::post('Movements/store', [ItMovementController::class, 'store'])->name('admin.Request_Device_It_Movements.store');

        // Route::resource('View_Image', AccessoryMedicalController::class);

        Route::get('Movements_It/{id}/edit', [ItMovementController::class, 'edit'])->name('admin.Movements_it.edit');

        Route::put('Movements_It/update/{id}', [ItMovementController::class, 'update'])->name('admin.Movements_it.update');
    
        Route::delete('Movements_It/destroy/{id}', [ItMovementController::class, 'destroy'])->name('admin.Movements_it.destroy');

     /*----------------------------------------------------------------------------------------------------------   */

    Route::resource('Attachment', DeviceAttachmentController::class);

    Route::get('DeviceItAttachment/{id}', [ItController::class, 'devicesItAttachment_show'])->name('admin.devicesItAttachment_show');

    Route::get('Attachment_medical/create', [DeviceAttachmentController::class, 'create'])->name('admin.Attachment_medical.create');

    Route::post('Attachment_medical/store', [DeviceAttachmentController::class, 'store'])->name('admin.Attachment_medical.store');


    /*----------------------------------------------------------------------------------------------------------   */

    Route::get('DeviceMedMovements/{id}', [MedicalController::class, 'MovementsMedical_show'])->name('admin.MovementsMedical_show');

    Route::get('Movements_Medicl/{id}/edit', [MedicalMovementController::class, 'edit'])->name('admin.Movements_medical.edit');

    Route::put('Movements_Medicl/update/{id}', [MedicalMovementController::class, 'update'])->name('admin.Movements_medical.update');

    Route::delete('Movements_Medicl/destroy/{id}', [MedicalMovementController::class, 'destroy'])->name('admin.Movements_Medicl.destroy');


/*
|--------------------------------------------------------------------------
| Route Devices Medical Device
|--------------------------------------------------------------------------
*/

    Route::get('devices_Medical', [MedicalController::class, 'index'])->name('admin.DevicesMedical');

    Route::get('devices_Medical/data', [MedicalController::class, 'data'])->name('DevicesMedical.data');

    Route::get('devices_Medical/create', [MedicalController::class, 'create'])->name('admin.devices_Medical.create');

    Route::post('devices_Medical/store', [MedicalController::class, 'store'])->name('admin.devices_Medical.store');

    Route::get('devices_Medical/edit/{id}', [MedicalController::class, 'edit'])->name('admin.devices_Medical.edit');

    Route::put('devices_Medical/update/{id}', [MedicalController::class, 'update'])->name('admin.devices_Medical.update');

    Route::get('devices_Medical/{id}', [MedicalController::class, 'show'])->name('admin.devices_Medical.show');

    Route::delete('devices_Medical/{id}', [MedicalController::class, 'destroy'])->name('admin.devices_Medical.destroy');


    Route::get('Movements_show/{id}', [MedicalController::class, 'MovementsMedical_show'])->name('admin.Movements_show.Movements_show');

    Route::get('DeviceMedAttachment/{id}', [MedicalController::class, 'devicesMedicalAttachment_show'])->name('admin.DeviceMedAttachment');

    Route::delete('accessoryAttachment/destroy/{id}', [DeviceAttachmentController::class, 'destroy'])->name('admin.accessorymedicalsff.destroy');


    Route::post('device_Movements/store', [MedicalMovementController::class, 'store'])->name('admin.device_Movements.store');


    Route::get('Accessory_Med/{id}', [MedicalController::class ,'accessorymedicals_show'])->name('admin.device_Medical_Admin.accessorymedicals_show');

    Route::post('Accessory_Medi/store', [AccessoryMedicalController::class, 'store'])->name('admin.accessorymedicals.store');
    
    Route::delete('Accessory_Medi/destroy/{id}', [AccessoryMedicalController::class, 'destroy'])->name('admin.accessorymedicals.destroy');


    Route::get('View_Image_Admin/{id}', [MedicalController::class, 'viewImage'])->name('View_Image_Admin');

/*
|--------------------------------------------------------------------------
| Route Maintenances It Device
|--------------------------------------------------------------------------
*/

    Route::get('maintenances', [RequestMaintenanceMedicalController::class, 'index'])->name('maintenances.viewDeviceMedical');

    Route::get('maintenance/data', [RequestMaintenanceMedicalController::class, 'data'])->name('viewDeviceMedical.data');

    Route::get('maintenances_It',[RequestMaintrnanceItController::class, 'index'])->name('admin.Request_Device_It');

    Route::get('maintenances_It/data',[RequestMaintrnanceItController::class, 'data'])->name('Request_Device_It.data');

    Route::get('maintenances_It/create',[RequestMaintrnanceItController::class, 'create'])->name('admin.Request_Device_It.create');

    Route::post('maintenances_It/store',[RequestMaintrnanceItController::class, 'store'])->name('admin.Request_Device_It.store');

    Route::get('vvvvvvvvv_It/edit/{id}',[RequestMaintrnanceItController::class, 'edit'])->name('admin.Request_Device_It.edit');

    Route::PUT('xxxxxxx/update/{id}',[RequestMaintrnanceItController::class,'update'])->name('admin.Request_Device_It.update');

    Route::get('maintenances_It/{id}', [RequestMaintrnanceItController::class,'show'])->name('admin.Request_Device_It.show');

    Route::get('cmments/{id}', [RequestMaintrnanceItController::class, 'comment_show'])->name('cmmentShow.data');

    Route::delete('maintenances_It/{id}', [RequestMaintrnanceItController::class, 'destroy'])->name('admin.maintenances_It.destroy');


    // Route::post('Movements/store', [Device_ITDeviceMovementController::class, 'store'])->name('admin.Request_Device_It_Movements.store');



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

// Route::get('aaa', function () {
//     return new TicketEmail();
// });

Route::group(['prefix' => 'admin','middleware' => ['auth:admin,web']], function () {


    Route::get('/getdetails/{id}', [DeviceController::class, 'getdetail']);

    Route::namespace('App\Http\Controllers\Department')->group(function () {

        Route::resource('departments', DepartmentController::class);
        Route::get('department/data', [DepartmentController::class, 'data'])->name('departments.data');

    });

    Route::namespace('App\Http\Controllers\SubDepartment')->group(function () {

        Route::resource('subdepartments', SubDepartmenController::class);
        Route::get('subdepartment/data', [SubDepartmenController::class, 'data'])->name('subdepartments.data');
    });


    Route::namespace('App\Http\Controllers\Problem')->group(function () {

        Route::resource('problems', ProblemController::class);
        Route::get('problem/data', [ProblemController::class, 'data'])->name('problem.data');

    });

    Route::namespace('App\Http\Controllers\SubProblem')->group(function () {

        Route::resource('subproblems', SubProblemController::class);
        Route::get('subproblem/data', [SubProblemController::class, 'data'])->name('subProblems.data');
    });
});

Route::group(['prefix' => 'Request', 'middleware' => ['auth:admin,web']], function () {


});


Route::group(['prefix' => 'Request', 'middleware' => ['auth:admin,web']], function () {

    Route::resource('comments', CommentController::class);
});

Route::group(['prefix' => 'devices', 'middleware' => ['auth:admin,web']], function () {

    Route::resource('Device_Movements', DeviceMovementController::class);
});

Route::group(['prefix' => 'financial', 'middleware' => ['auth:admin,web']], function () {

    Route::resource('purchaseOrder', PurchaseOrderController::class);
});
