<?php

namespace App\Repository\Admins;

use App\Http\Requests\StoreDevice_It;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketEmail;
use App\Models\Department\Department;
use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use App\RepositoryInterface\Admins\Device_ItInterface;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class Device_ItRepository implements Device_ItInterface{

    const MEDICAL = 1;
    const IT = 2;
// 

//تستخدم لجلب أجهزة تكنلوجيا المعلومات
    public function getDevice_It($id)
    {
        return  Device::where('id', $id)->first();
        
    }

//تستخدم لجلب الاقسام الرئيسية
    public function getDepartments()
    {
        return Department::where('active', true)->get();
    }

//تستخدم لجلب الاقسام الفرعية
    public function getSubdepartments()
    {
        return SubDepartment::where('active', true)->get();
    }


//تستخدم لجلب طلبات الصيانة
    public function getMaintenanceRequests()
    {
        return MaintenanceRequest::get();
    }

// public function getAllDevice_It()
// {
//     $subdepartments = SubDepartment::get();
//     $departments = Department::get();
//     $maintenancerequests = MaintenanceRequest::get();
//     return view('admin.device_It_Admin.device_It', [
//         'subdepartments' => $subdepartments,
//         'departments' => $departments,
//         'maintenancerequests' => $maintenancerequests
//     ]);
// }

public function data()
    {
        $devices =  Device::where('deviceTypes', 2);


        return DataTables::of($devices)
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

            ->filterColumn('created_at', function ($query, $value) {
                list($from, $to) = explode('#', $value);
                $query->whereBetween('created_at', [Carbon::parse($from), Carbon::parse($to)]);
            })

            ->addColumn('title', function (device $device) {
                return view('admins.devices.it_devices.data_table.titleRequest', compact('device'));
            })
            ->addColumn('description', function (device $device) {
                return view('admins.devices.it_devices.data_table.description', compact('device'));
            })

            ->addColumn('department_id', function (device $device) {
                return view('admins.devices.it_devices.data_table.departments', compact('device'));
            })

            ->addColumn('image', function (device $device) {
                return view('admins.devices.it_devices.data_table.image', compact('device'));
            })

            ->addColumn('sub_department_id', function (device $device) {
                return view('admins.devices.it_devices.data_table.subdepartments', compact('device'));
            })

            ->addColumn('active', function (device $device) {
                return view('admins.devices.it_devices.data_table.active', compact('device'));
            })

            ->addColumn('deviceTypes', function (device $device) {
                return view('admins.devices.it_devices.data_table.deviceTypes', compact('device'));
            })

            ->editColumn('created_at', function (device $device) {
                return $device->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admins.devices.it_devices.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

    public function storeDevice_It($request)
    {

        $validator = Validator($request->all());

        if (!$validator->fails()) {

            $device = new Device();
            $device->codeDevices = $request->get('codeDevices');
            $device->title = $request->get('title');
            $device->deviceTypes = $request->get('deviceTypes');
            $device->manufacturer = $request->get('manufacturer');
            $device->model = $request->get('model');
            $device->sn = $request->get('sn');
            $device->supplier = $request->get('supplier');
            $device->warranty = $request->get('warranty');
            $device->room = $request->get('room'); 
            $device->description = $request->get('description');
            $device->department_id = $request->get('department_id');;
            $device->sub_department_id = $request->get('sub_department_id');
            $device->Created_by  = Auth::user()->name;

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete("devices/$device->image");
                $image = $request->file('image');
                $imageName = time() . '_' . $device->name . '.' . $image->getClientOriginalExtension();
                $request->file('image')->storePubliclyAs('devices', $imageName, ['disk' => 'public']);
                $device->image = $imageName;
            }
            // $devicedetail->image = $file_name;

            $isSaved = $device->save();
            // if ($isSaved) {

            //     Mail::to( Auth::user()->email)->send(new TicketEmail());
           
            // Mail::to(  Device::where('department_id', auth()->user()->email)->where('department_id',1))->send(new DeviceEmail($device));
            // }

            return response()->json(['message' => $isSaved ? "تم أضافة الجهاز بنجاح" : "فشل أضافة الجهاز"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
            //    return response()->json(['message' => "Failed to save"], 400);
        }
    }

    public function show_Devic_IT($id)
    {
        
    }


}