<?php

namespace App\Http\Controllers\User\Device_User;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;
use Carbon\Carbon;

class ViewDeviceMedicalController extends Controller
{

    const MEDICAL = 1;
    const IT = 2;

    public function index()
    {
        $devices = auth()->user()->department->devicee->where('deviceTypes', $this::MEDICAL);
        $subdepartments = SubDepartment::get();
        $departments = Department::get();
        return view('users.devices_User.viewDeviceMedical', [
            'devices' => $devices,
            'subdepartments' => $subdepartments,
            'departments' => $departments
        ]);
    }
    public function Data()
    {
        $devices = Device::where('deviceTypes', 1)->get();

        // $devices = auth()->user()->department->devicee->where('deviceTypes', $this::MEDICAL);

        return DataTables::of(Device::where('department_id', auth()->user()->department_id)->where('deviceTypes', 1))
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
                return view('users.data_table.title', compact('device'));
            })
            ->addColumn('description', function (device $device) {
                return view('users.data_table.description', compact('device'));
            })

            ->addColumn('department_id', function (device $device) {
                return view('users.data_table.departments', compact('device'));
            })

            ->addColumn('image', function (device $device) {
                return view('users.data_table.image', compact('device'));
            })

            ->addColumn('sub_department_id', function (device $device) {
                return view('users.data_table.subdepartments', compact('device'));
            })

            ->addColumn('active', function (device $device) {
                return view('users.data_table.active', compact('device'));
            })

            ->addColumn('deviceTypes', function (device $device) {
                return view('users.data_table.deviceTypes', compact('device'));
            })

            ->editColumn('created_at', function (device $device) {
                return $device->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'users.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

   
}
