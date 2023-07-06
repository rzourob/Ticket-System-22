<?php

namespace App\Http\Controllers\Admin\Devices;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;

class ALL_DeviceController extends Controller
{

    const MEDICAL = 1;
    const IT = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subdepartments = SubDepartment::get();
        $departments = Department::get();
        $maintenancerequests = MaintenanceRequest::get();
        return view('admins.devices.all_devices.index', [
            'subdepartments' => $subdepartments,
            'departments' => $departments,
            'maintenancerequests' => $maintenancerequests
        ]);
    }
    public function data()
    {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
