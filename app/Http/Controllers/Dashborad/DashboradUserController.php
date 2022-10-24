<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use Illuminate\Http\Request;

class DashboradUserController extends Controller
{
    public function dashboard()
    {

        // $devices =Device::query()->where('deviceTypes', 2)->count();

        $devicesMedical = Device::where('department_id', auth()->user()->department_id)->where('deviceTypes', 1)->count();

        $devicesIt = Device::where('department_id', auth()->user()->department_id)->where('deviceTypes', 2)->count();

        $maintenanceRequestMedical = MaintenanceRequest::where('department_id', auth()->user()->department_id)->where('deviceTypes', 1)->count();

        $maintenanceRequestIT = MaintenanceRequest::where('department_id', auth()->user()->department_id)->where('deviceTypes', 2)->count();


        // dd($devices);

        return view('userLogin.dashboard',['devicesMedical'=> $devicesMedical,
        'devicesIt'=> $devicesIt,
        'maintenanceRequestIT'=>$maintenanceRequestIT,
        'maintenanceRequestMedical'=>$maintenanceRequestMedical,
    ]);
    }

}
