<?php

namespace App\Http\Controllers\Technician\Device_Admin;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;
use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use Carbon\Carbon;

class ViewTechnicianDeviceController extends Controller
{
    const MEDICAL = 1;
    const IT = 2;
    //
    public function index()
    {
        $subdepartments = SubDepartment::get();
        $departments = Department::get();
        $maintenancerequests = MaintenanceRequest::get();
        return view('admin.viewdevice', [
            'subdepartments' => $subdepartments,
            'departments' => $departments,
            'maintenancerequests' => $maintenancerequests
        ]);
    }
    public function data()
    {
        // $patients = Department::with(['nationality:id,title_ar','city:id,title_ar'])->select();
        $devices = Device::get();


        return DataTables::of(Device::query())
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            ->filterColumn('deviceTypes', function ($query, $deviceTypes) {
                $query->where('deviceTypes', $deviceTypes);
            })

            ->filterColumn('sub_department_id', function ($query, $sub_department_id) {
                $query->where('sub_department_id', $sub_department_id);
            })

            ->filterColumn('department_id', function ($query, $department_id) {
                $query->where('department_id', $department_id);
            })

            // ->filterColumn('created_at', function ($query, $value) {
            //     list($from, $to) = explode('#', $value);
            //     // $query->where('created_at', '>=', $from)->where('created_at', '<=', $to);
            //     $query->whereBetween('created_at', [Carbon::parse($from), Carbon::parse($to)]);
            // })


            ->addColumn('title', function (device $device) {
                return view('admin.data_table.titleRequest', compact('device'));
            })
            ->addColumn('description', function (device $device) {
                return view('admin.data_table.description', compact('device'));
            })

            ->addColumn('department_id', function (device $device) {
                return view('admin.data_table.departments', compact('device'));
            })

            ->addColumn('image', function (device $device) {
                return view('admin.data_table.image', compact('device'));
            })

            ->addColumn('sub_department_id', function (device $device) {
                return view('admin.data_table.subdepartments', compact('device'));
            })

            ->addColumn('active', function (device $device) {
                return view('users.data_table.active', compact('device'));
            })

            ->addColumn('deviceTypes', function (device $device) {
                return view('admin.data_table.deviceTypes', compact('device'));
            })

            ->editColumn('created_at', function (device $device) {
                return $device->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data
}
