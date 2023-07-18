<?php

namespace App\Http\Controllers\Admin\Devices;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDevice_It;
use App\Models\AccessoryIt\AccessoryIt;
use App\Models\Device\Device;
use App\Models\DeviceMovement\DeviceMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Device\AccessoryMedical;
use App\Models\Device\DeviceAttachment;
use App\RepositoryInterface\Admins\Device_ItInterface;

class ItController extends Controller
{
    protected $Device;

    public function __construct(Device_ItInterface $Device)
    {
        $this->Device = $Device;
    }

    public function index()
    {
        $subdepartments = $this->Device->getSubdepartments();
        $departments = $this->Device->getDepartments();
        $maintenancerequests = $this->Device->getMaintenanceRequests(); 

        return view('admins.devices.it_devices.index', [
            'subdepartments' => $subdepartments,
            'departments' => $departments,
            'maintenancerequests' => $maintenancerequests
        ]);

    }// end of index

    public function data()
    {
        return $this->Device->data();

    } // end of data


    public function devices_request_show($id)
    {

        $devices = Device :: where('id',$id)->first();
        $subdepartments = $this->Device->getSubdepartments();
        $departments = $this->Device->getDepartments();

        return response()->view('admins.devices.it_devices.create', [
            'devices' => $devices,
            'departments' => $departments,
            'subdepartments' => $subdepartments
        ]);

    }// end of devices_request_show
    

    public function create()
    {
        $subdepartments = $this->Device->getSubdepartments();
        $departments = $this->Device->getDepartments();
        return response()->view('admin.device_It_Admin.create', [
            'departments' => $departments,
            'subdepartments' => $subdepartments
        ]);

    }// end of create

    public function store(StoreDevice_It $request)
    {
        
        return $this->Device->storeDevice_It($request);

    }// end of store

    public function show($id)
    {
        //
        $devices  = $this->Device->getDevice_It($id);
        $subdepartments = $this->Device->getSubdepartments();
        $departments = $this->Device->getDepartments();
        $deviceMovements = DeviceMovement::where('device_id', $id)->get();
        $deviceattachments = DeviceAttachment::where('device_id', $id)->get();

        $accessorymedicals = AccessoryMedical::where('device_id', $id)->get();

        $accessoryits = AccessoryIt::where('device_id', $id)->get();

        return response()->view('admins.devices.it_devices.show', [
            'devices' => $devices,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'deviceattachments' => $deviceattachments,
            'deviceMovements' => $deviceMovements,
            'accessorymedicals'=> $accessorymedicals,
            'accessoryits'=> $accessoryits

        ]);

    }// end of show

    public function edit($id)
    {

        $devices = Device::findOrFail($id);
        $subdepartments = $this->Device->getSubdepartments();
        $departments = $this->Device->getDepartments();
        return response()->view('admins.devices.it_devices.edit', [
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'devices' => $devices,
        ]);

    }// end of edit

    public function Movements_show($id)
    {

        $devices = Device::where('id', $id)->first();
        $deviceMovements = DeviceMovement::where('device_id', $id)->get();

        return response()->view('admins.devices.it_devices.device_movement', ['devices' => $devices, 'deviceMovements' => $deviceMovements]);

    }// end of Movements_show



    public function accessoryit_show($id)
    {

        $devices = Device::where('id', $id)->first();
        
        $accessorymedicals = AccessoryMedical::where('device_id', $id)->get();

        return response()->view('admins.devices.it_devices.devices_Accessory.create', 
        [
            'devices' => $devices, 
            'accessorymedicals' => $accessorymedicals
    ]);

    }// end of Movements_show

    public function update(Request $request, Device $device,$id)
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
            $isSaved = $device->save();
            return response()->json(['message' => $isSaved ? "تم تحديث  البيانات" : "فشل تحديث البيانات"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
            //    return response()->json(['message' => "Failed to save"], 400);
        }

    }// end of update

    public function destroy($id)
    {
        //       
    }// end of destroy

    public function getdetail($id)
    {
        // $patients = DB::table("patients")->where("id_no", $id)->pluck("first_name", "id");
        $devices = DB::table("devices")->where("sn", $id)->get();
        return json_encode($devices);
        
    }// end of getdetail

    public function viewFile($id)

    {

        $deviceattachments  = DeviceAttachment::where('id', $id)->first();
        return response()->view('admins.devices.it_devices.viewFile', [ 'deviceattachments' => $deviceattachments]);

    }// end of viewFile


    public function viewImage($id)

    {

        $deviceAccessory  = AccessoryIt::where('id', $id)->first();
        return response()->view('admins.devices.it_devices.viewImage', [ 'deviceAccessory' => $deviceAccessory]);

    }// end of viewFile
}
