<?php

namespace App\Http\Controllers\User\Device_IT;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Device\AccessoryMedical;
use App\Models\Device\Device;
use App\Models\Device\DeviceAttachment;
use App\Models\DeviceMovement\DeviceMovement;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;
use Carbon\Carbon;

class Device_ItController extends Controller
{
    //
    const MEDICAL = 1;
        const IT = 2;
    public function index()
    {
        // $devices = Device::where('deviceTypes', 2)->get();
        $devices = auth()->user()->department->devicee->where('deviceTypes', $this::IT);
        $subdepartments = SubDepartment::get();
        $departments = Department::get();
        // $departments = auth()->user()->department->where('department_id',1);
        return view('users.device_It_User.device_it', [
            'devices' => $devices,
            'subdepartments' => $subdepartments,
            'departments' => $departments
            // 'sss' => $sss
        ]);
    }
    public function Data(Request $request)
    {
        // $devices = Device::where('deviceTypes', 2)->get();

        return DataTables::of(Device::where('department_id', auth()->user()->department_id)->where('deviceTypes',2))
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            ->filterColumn('created_at', function ($query, $value) {
                list($from, $to) = explode('#', $value);
                $query->whereBetween('created_at', [Carbon::parse($from), Carbon::parse($to)]);
            })

            ->filterColumn('sub_department_id', function ($query, $sub_department_id) {
                $query->where('sub_department_id', $sub_department_id);
            })

            ->filterColumn('department_id', function ($query, $department_id) {
                $query->where('department_id', $department_id);
            })

            ->addColumn('title', function (device $device) {
                return view('users.device_It_User.data_table.title', compact('device'));
            })
            ->addColumn('description', function (device $device) {
                return view('users.device_It_User.data_table.description', compact('device'));
            })

            ->addColumn('department_id', function (device $device) {
                return view('users.device_It_User.data_table.departments', compact('device'));
            })

            ->addColumn('image', function (device $device) {
                return view('users.device_It_User.data_table.image', compact('device'));
            })

            ->addColumn('sub_department_id', function (device $device) {
                return view('users.device_It_User.data_table.subdepartments', compact('device'));
            })

            ->addColumn('active', function (device $device) {
                return view('users.device_It_User.data_table.active', compact('device'));
            })

            ->addColumn('deviceTypes', function (device $device) {
                return view('users.device_It_User.data_table.deviceTypes', compact('device'));
            })

            ->editColumn('created_at', function (device $device) {
                return $device->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'users.device_It_User.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

    public function show($id)
    {
        //
        $devices  = Device::where('id', $id)->first();

        $departments = Department::get();

        $subdepartments = SubDepartment::get();

        $deviceMovements = DeviceMovement::where('device_id', $id)->get();

        $deviceattachments = DeviceAttachment::where('device_id', $id)->get();

        $accessorymedicals = AccessoryMedical::where('device_id', $id)->get();


        // $maintenancerequests  = MaintenanceRequest::where('device_id', $id)->get();

        return response()->view('users.device_It_User.show', [
            'devices' => $devices,
            // 'maintenancerequests' => $maintenancerequests,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'deviceattachments' => $deviceattachments,
            'deviceMovements' => $deviceMovements,
            'accessorymedicals' => $accessorymedicals

        ]);
    }

    public function Movements_show($id)
    {

        $devices = Device::where('id', $id)->first();
        $deviceMovements = DeviceMovement::where('device_id', $id)->get();

        return response()->view('users.device_It_User.movement', [
        'devices' => $devices, 
        'deviceMovements' => $deviceMovements]);
    }


    public function viewFile($id)

    {

        $deviceattachments  = DeviceAttachment::where('id', $id)->first();
        return response()->view('users.device_It_User.viewFile', [ 'deviceattachments' => $deviceattachments]);
    }
}
