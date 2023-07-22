<?php

namespace App\Http\Controllers\AccessoryMedical;

use App\Http\Controllers\Controller;
use App\Models\Device\AccessoryMedical;
use App\Models\Device\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

class AccessoryMedicalController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
        $devices = Device::get();
        return response()->view('admin.device_It_Admin.addAccessory',[
            'devices' => $devices
        ]);

    }

    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [

       
            // 'file_name' => 'required|mimes:pdf',  

        ], [
            // 'file_name.required' => 'لايوجد مرفق',
            // 'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf',
        ]);

        if (!$validator->fails()) {

                   $accessorymedicals = new AccessoryMedical();
                   $accessorymedicals->device_id = $request->get('device_id');  
                   $accessorymedicals->title = $request->get('title'); 
                   $accessorymedicals->sn = $request->get('sn'); 
                   $accessorymedicals->description = $request->get('description');
                //    $accessorymedicals->active = $request->get('active');
                   $accessorymedicals->Created_by  = Auth::user()->name;


                   if($request ->hasFile('image')){
                    Storage::disk('public')->delete("accessorymedicals/$accessorymedicals->image");
                    $image = $request->file('image');
                    $imageName =  $image->getClientOriginalName();
                    // $imageName = time() . '_' . $accessorymedicals->name . '.' . $image->getClientOriginalExtension();
                    $request->file('image')->storePubliclyAs('accessorymedicals', $imageName , ['disk'=>'public']);
                    $accessorymedicals->image = $imageName; 
               }



                    $isSaved = $accessorymedicals->save();

          

                 return response()->json(['message' => $isSaved ? "تم أضافة الملحق بنجاح" : "فشل أضافة الملحق"], $isSaved ? 201 : 400);
                } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }

    public function show(AccessoryMedical $accessoryMedical)
    {
        //
    }

    public function edit(AccessoryMedical $accessoryMedical)
    {
        //
    }

    public function update(Request $request, AccessoryMedical $accessoryMedical)
    {
        //
    }

    public function destroy($id,AccessoryMedical $accessoryMedical)
    {

        $device = Device::where('id', $id)->first();

        $accessorymedicals = AccessoryMedical::where('id', $id)->first();

        if ($accessorymedicals) {

          $PatientAttachmentDeleted = Storage::disk('public')->delete("accessorymedicals/$accessorymedicals->image");
    
        }

        $isDeleted = AccessoryMedical::destroy($id);


        // $AccessoryMedical =AccessoryMedical::where('id',$id)->firstOrFail();
        // $AccessoryMedical->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف الملحق " : "فشل حذف الملحق"], $isDeleted ? 200 : 400);
    }
    }
 








    




