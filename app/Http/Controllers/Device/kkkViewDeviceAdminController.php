<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;

class ViewDeviceAdminController extends Controller
{
    const MEDICAL = 1;
    const IT = 2;
    //
    public function index()
    {
        //

        return view('admin.viewdevice');
    }
    public function data()
    {
        // $patients = Department::with(['nationality:id,title_ar','city:id,title_ar'])->select();
        $devices = Device::get();


        return DataTables::of($devices)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')
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


            // ->addColumn('gender', function (department $department) {
            //     return view('social.patients.data_table.gender', compact('department'));
            // })

            ->editColumn('created_at', function (device $device) {
                return $device->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'users.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data
}
