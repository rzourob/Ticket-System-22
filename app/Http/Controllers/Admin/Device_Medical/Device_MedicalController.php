<?php

namespace App\Http\Controllers\Admin\Device_Medical;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Device\Device;
use App\Models\Device\DeviceAttachment;
use App\Models\DeviceMovement\DeviceMovement;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Device_MedicalController extends Controller
{
    //
    const MEDICAL = 1;
    const IT = 2;
    //
    public function index()
    {
        $subdepartments = SubDepartment::get();
        $departments = Department::get();
        $maintenancerequests = MaintenanceRequest::get();
        return view('admin.device_Medical_Admin.device_Medical', [
            'subdepartments' => $subdepartments,
            'departments' => $departments,
            'maintenancerequests' => $maintenancerequests
        ]);
    }
    public function data()
    {
        $devices =  Device::where('deviceTypes', 1);


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

            ->addColumn('title', function (device $device) {
                return view('admin.device_Medical_Admin.data_table.titleRequest', compact('device'));
            })
            ->addColumn('description', function (device $device) {
                return view('admin.device_Medical_Admin.data_table.description', compact('device'));
            })

            ->addColumn('department_id', function (device $device) {
                return view('admin.device_Medical_Admin.data_table.departments', compact('device'));
            })

            ->addColumn('image', function (device $device) {
                return view('admin.device_Medical_Admin.data_table.image', compact('device'));
            })

            ->addColumn('sub_department_id', function (device $device) {
                return view('admin.device_Medical_Admin.data_table.subdepartments', compact('device'));
            })

            ->addColumn('active', function (device $device) {
                return view('admin.device_Medical_Admin.data_table.active', compact('device'));
            })

            ->addColumn('deviceTypes', function (device $device) {
                return view('admin.device_Medical_Admin.data_table.deviceTypes', compact('device'));
            })

            ->editColumn('created_at', function (device $device) {
                return $device->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.device_Medical_Admin.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

    public function create()
    {
        $departments = Department::where('active', true)->get();
        $subdepartments = SubDepartment::where('active', true)->get();
        return response()->view('admin.device_Medical_Admin.create', [
            'departments' => $departments,
            'subdepartments' => $subdepartments
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator($request->all(), [

            'codeDevices' => 'required| string',
            'deviceTypes' => 'required| string',
            'title' => 'required|string',
            'sn' => 'required|string',
            'department_id' => 'required|string',
            'room' => 'required|string',
            'manufacturer' => 'required|string',
            'model' => 'required|string',
            'supplier' => 'required|string',
            'warranty' => 'required|string',
          

        ], [
            'codeDevices.required' => '???????????? ?????????? ???????????????? ?????????? ??????????????',
            'deviceTypes.required' => '???????????? ?????????? ?????? ????????????',
            'title.required' => '???????????? ?????????? ?????? ????????????',
            'sn.required' => '???????????? ?????????? ???????????????? ???????? ?????????? ??????????????',
            'department_id.required' => '???????????? ???????????? ??????????',
            'room.required' => '???????????? ?????????? ?????? ????????????',
            'manufacturer.required' => '???????????? ?????????? ?????? ???????????? ??????????????',
            'model.required' => '???????????? ?????????? ?????????? ????????????',
            'supplier.required' => '???????????? ?????????? ?????? ???????????? ??????????????',
            'warranty.required' => '???????????? ?????????? ?????? ???????????? ??????????????',
        ]);


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
            // $device->image = $request->get('image');
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

            return response()->json(['message' => $isSaved ? "???? ?????????? ???????????? ??????????" : "?????? ?????????? ????????????"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
            //    return response()->json(['message' => "Failed to save"], 400);
        }
    }

    public function show($id)
    {
        //
        $devices  = Device::where('id', $id)->first();
        $departments = Department::get();
        $subdepartments = SubDepartment::get();
        $deviceMovements = DeviceMovement::where('device_id', $id)->get();

        $deviceattachments = DeviceAttachment::where('device_id', $id)->get();


        return response()->view('admin.device_Medical_Admin.show', [
            'devices' => $devices,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'deviceattachments' => $deviceattachments,
            'deviceMovements' => $deviceMovements

        ]);
    }

    public function edit($id,Device $device)
    {
        $devices = Device::findOrFail($id);
        $departments = Department::where('active', true)->get();
        $subdepartments = SubDepartment::where('active', true)->get();
        return response()->view('admin.device_Medical_Admin.edit', [
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'devices' => $devices,

        ]);
    }

    public function update(Request $request,Device $device,$id)
    {
        $validator = Validator($request->all(), [

            // 'title' => 'required| string',
            // 'sn' => 'required| string|min:3| max:35',
            // 'manufacturer' => 'required|string',
            // 'model' => 'required|string',
            // 'supplier' => 'required|string'
        ], [
            //    'name.required' =>'???????????? ?????????? ?????? ???????????? ??????????',
            //    'sn.required' => '???????????? ?????????? ?????????????? ???????? ????????????',
            //    'manufacturer.required' => '???????????? ?????????? ?????? ???????????? ??????????????',
            //    'model.required' => '???????????? ?????????? ?????????? ???????????? ??????????',
            //    'supplier.required' => '???????????? ?????????? ??????????????',
        ]);

        if (!$validator->fails()) {


            $device = Device::findOrFail($id);

            $device->codeDevices = $request->get('codeDevices');
            $device->title = $request->get('title');
            $device->deviceTypes = $request->get('deviceTypes');
            $device->manufacturer = $request->get('manufacturer');
            $device->model = $request->get('model');
            $device->sn = $request->get('sn');
            $device->supplier = $request->get('supplier');
            $device->warranty = $request->get('warranty');
            // $device->image = $request->get('image');
            $device->description = $request->get('description');
            $device->department_id = $request->get('department_id');;
            $device->sub_department_id = $request->get('sub_department_id');
            $device->active = $request->get('active');
            $device->room = $request->get('room');
            $device->Created_by  = Auth::user()->name;

                  if($request ->hasFile('image')){
                    Storage::disk('public')->delete("devices/$device->image");
                    $image = $request->file('image');
                    $imageName = time() . '_' . $device->name . '.' . $image->getClientOriginalExtension();
                    $request->file('image')->storePubliclyAs('devices', $imageName , ['disk'=>'public']);
                    $device->image = $imageName; 
               }
            //     // $devicedetail->image = $file_name;


            $isSaved = $device->save();

            return response()->json(['message' => $isSaved ? "???? ??????????  ????????????????" : "?????? ?????????? ????????????????"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
            //    return response()->json(['message' => "Failed to save"], 400);
        }
    }

    public function destroy($id)
    {
        //
    }

    public function getdetail($id)
    {
        // $patients = DB::table("patients")->where("id_no", $id)->pluck("first_name", "id");
        $devices = DB::table("devices")->where("sn", $id)->get();
        return json_encode($devices);
    }

    public function Movements_show($id)
    {

        $devices = Device::where('id', $id)->first();
        $deviceMovements = DeviceMovement::where('device_id', $id)->get();
        return response()->view('admin.device_Medical_Admin.device_movement', ['devices' => $devices, 'deviceMovements' => $deviceMovements]);
    }
}
