<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Device\AccessoryMedical;
use App\Models\Device\Device;
use App\Models\DeviceMovement\DeviceMovement;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeviceController extends Controller
{

    const MEDICAL = 1;
    const IT = 2;

    public function medicalDep()
    {
        //
        $devices = Device::where('deviceTypes', 1)->get();
        return view('devices.medicalDevice',[
            'devices'=>$devices
        ]);
    }
    public function medicalDevicee()
    {
        // $patients = Department::with(['nationality:id,title_ar','city:id,title_ar'])->select();
        $devices = Device::where('deviceTypes', 1)->get();


        return DataTables::of($devices)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            // ->filterColumn('city_id', function ($query, $value) {
            //     $query->whereHas('city', function ($q) use ($value) {
            //         $q->where(DB::raw("CONCAT_WS(' ',title_ar)"), 'like', "%" . $value . "%");
            //     });
            // })

            ->addColumn('title', function (device $device) {
                return view('devices.data_table.title', compact('device'));
            })
            ->addColumn('description', function (device $device) {
                return view('devices.data_table.description', compact('device'));
            })

            ->addColumn('department_id', function (device $device) {
                return view('devices.data_table.departments', compact('device'));
            })

            ->addColumn('image', function (device $device) {
                return view('devices.data_table.image', compact('device'));
            })

            ->addColumn('sub_department_id', function (device $device) {
                return view('devices.data_table.subdepartments', compact('device'));
            })

            ->addColumn('active', function (device $device) {
                return view('devices.data_table.active', compact('device'));
            })

            ->addColumn('deviceTypes', function (device $device) {
                return view('devices.data_table.deviceTypes', compact('device'));
            })


            // ->addColumn('gender', function (department $department) {
            //     return view('social.patients.data_table.gender', compact('department'));
            // })

            ->editColumn('created_at', function (device $device) {
                return $device->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'devices.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

        public function getdeviceMedical(Request $request)
    {
        //

        $devices = Device::where('deviceTypes', 1)->get();
        return view('devices.getdeviceMedical', [
            'devices' => $devices,
        ]);
    }
    public function devicesData(Request $request)
    {

        $devices = auth()->user()->department->devicee->where('deviceTypes', $this::MEDICAL);

        return DataTables::of($devices)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            ->addColumn('title', function (device $device) {
                return view('devices.data_table.title', compact('device'));
            })
            ->addColumn('description', function (device $device) {
                return view('devices.data_table.description', compact('device'));
            })

            ->addColumn('department_id', function (device $device) {
                return view('devices.data_table.departments', compact('device'));
            })

            ->addColumn('image', function (device $device) {
                return view('devices.data_table.image', compact('device'));
            })

            ->addColumn('sub_department_id', function (device $device) {
                return view('devices.data_table.subdepartments', compact('device'));
            })

            ->addColumn('active', function (device $device) {
                return view('devices.data_table.active', compact('device'));
            })

            ->addColumn('deviceTypes', function (device $device) {
                return view('devices.data_table.deviceTypes', compact('device'));
            })

            ->editColumn('created_at', function (device $device) {
                return $device->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'devices.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data


    public function getdeviceIt(Request $request)
    {
        //
        $devices = Device::where(['deviceTypes',2])->select();

        $sss = $request->user('web')->department->devicee;

        return view('devices.getdeviceit', [
            'devices' => $devices,
            'sss' => $sss
            
        ]);
    }
    public function iTData(Request $request)
    {

        $devices = auth()->user()->department->devicee ->where('deviceTypes',$this::IT);

        return DataTables::of($devices)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            ->addColumn('title', function (device $device) {
                return view('devices.data_table.title', compact('device'));
            })
            ->addColumn('description', function (device $device) {
                return view('devices.data_table.description', compact('device'));
            })

            ->addColumn('department_id', function (device $device) {
                return view('devices.data_table.departments', compact('device'));
            })

            ->addColumn('image', function (device $device) {
                return view('devices.data_table.image', compact('device'));
            })

            ->addColumn('sub_department_id', function (device $device) {
                return view('devices.data_table.subdepartments', compact('device'));
            })

            ->addColumn('active', function (device $device) {
                return view('devices.data_table.active', compact('device'));
            })

            ->addColumn('deviceTypes', function (device $device) {
                return view('devices.data_table.deviceTypes', compact('device'));
            })

            ->editColumn('created_at', function (device $device) {
                return $device->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'devices.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

    public function create()
    {
        //

        $departments = Department::where('active', true)->get();
        $subdepartments = SubDepartment::where('active', true)->get();
        return response()->view('devices.create', [
            'departments' => $departments,
            'subdepartments' => $subdepartments
        ]);
    }

    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [

            // 'title' => 'required| string',
            // 'sn' => 'required| string|min:3| max:35',
            // 'manufacturer' => 'required|string',
            // 'model' => 'required|string',
            // 'supplier' => 'required|string'
        ], [
            //    'name.required' =>'الرجاء ادخال اسم الجهاز الطبي',
            //    'sn.required' => 'الرجاء ادخال السيريل نمبر الجهاز',
            //    'manufacturer.required' => 'الرجاء ادخال اسم الشركة المصنعة',
            //    'model.required' => 'الرجاء ادخال اسنوع الجهاز الطبي',
            //    'supplier.required' => 'الرجاء ادخال الموردة',
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

            return response()->json(['message' => $isSaved ? "تم أضافة الجهاز بنجاح" : "فشل أضافة الجهاز"], $isSaved ? 201 : 400);
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

        $accessorymedicals = AccessoryMedical::where('device_id', $id)->get();

        return response()->view('devices.show', [
            'devices' => $devices,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'deviceMovements' => $deviceMovements,
            'accessorymedicals'=> $accessorymedicals

        ]);
        
    }

    public function edit($id)
    {
        //
        // $devices = Device::findOrFail($id);
        $devices = Device::findOrFail($id);
        $departments = Department::where('active', true)->get();
        $subdepartments = SubDepartment::where('active', true)->get();
        return response()->view('devices.edit', [
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'devices' => $devices,

        ]);
    }

    public function deviceMovements_show($id)
    {

        $devices = Device::where('id', $id)->first();
        $deviceMovements = DeviceMovement::where('device_id', $id)->get();

        return response()->view('devices.device_movement', ['devices' => $devices, 'deviceMovements' => $deviceMovements]);
    }

    public function update(Request $request, Device $device)
    {
        //
        $validator = Validator($request->all(), [

            // 'title' => 'required| string',
            // 'sn' => 'required| string|min:3| max:35',
            // 'manufacturer' => 'required|string',
            // 'model' => 'required|string',
            // 'supplier' => 'required|string'
        ], [
            //    'name.required' =>'الرجاء ادخال اسم الجهاز الطبي',
            //    'sn.required' => 'الرجاء ادخال السيريل نمبر الجهاز',
            //    'manufacturer.required' => 'الرجاء ادخال اسم الشركة المصنعة',
            //    'model.required' => 'الرجاء ادخال اسنوع الجهاز الطبي',
            //    'supplier.required' => 'الرجاء ادخال الموردة',
        ]);


        if (!$validator->fails()) {

            $device->codeDevices = $request->get('codeDevices');
            $device->title = $request->get('title');
            $device->deviceTypes = $request->get('deviceTypes');
            $device->manufacturer = $request->get('manufacturer');
            $device->model = $request->get('model');
            $device->sn = $request->get('sn');
            $device->supplier = $request->get('supplier');
            $device->warranty = $request->get('warranty');
            $device->description = $request->get('description');
            $device->department_id = $request->get('department_id');;
            $device->sub_department_id = $request->get('sub_department_id');
            $device->active = $request->get('active');
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

            return response()->json(['message' => $isSaved ? "تم تحديث  البيانات" : "فشل تحديث البيانات"], $isSaved ? 201 : 400);
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
        $devices = DB::table("devices")->where("sn", $id)->get();
        return json_encode($devices);
    }
}
