<?php

namespace App\Http\Controllers\AccessoryIt;

use App\Http\Controllers\Controller;
use App\Models\AccessoryIt\AccessoryIt;
use App\Models\Device\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccessoryItController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $devices = Device::get();
        return response()->view('admins.devices.it_devices.devices_Accessory.create',[
            'devices' => $devices
        ]);
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
        $validator = Validator($request->all(), [

       
            // 'file_name' => 'required|mimes:pdf',  

        ], [
            // 'file_name.required' => 'لايوجد مرفق',
            // 'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf',
        ]);

        if (!$validator->fails()) {

                   $accessoryIts = new AccessoryIt();
                   $accessoryIts->device_id = $request->get('device_id');  
                   $accessoryIts->title = $request->get('title'); 
                   $accessoryIts->sn = $request->get('sn'); 
                   $accessoryIts->description = $request->get('description');
                //    $accessorymedicals->active = $request->get('active');
                   $accessoryIts->Created_by  = Auth::user()->name;


                   if($request ->hasFile('image')){
                    Storage::disk('public')->delete("accessoryit/$accessoryIts->image");
                    $image = $request->file('image');
                    $imageName = time() . '_' . $accessoryIts->name . '.' . $image->getClientOriginalExtension();
                    $request->file('image')->storePubliclyAs('accessoryit', $imageName , ['disk'=>'public']);
                    $accessoryIts->image = $imageName; 
               }



                    $isSaved = $accessoryIts->save();

          

                 return response()->json(['message' => $isSaved ? "تم أضافة الملحق بنجاح" : "فشل أضافة الملحق"], $isSaved ? 201 : 400);
                } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccessoryIt\AccessoryIt  $accessoryIt
     * @return \Illuminate\Http\Response
     */
    public function show(AccessoryIt $accessoryIt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccessoryIt\AccessoryIt  $accessoryIt
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessoryIt $accessoryIt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccessoryIt\AccessoryIt  $accessoryIt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessoryIt $accessoryIt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccessoryIt\AccessoryIt  $accessoryIt
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessoryIt $accessoryIt ,$id)
    {
        //
        $isDeleted = AccessoryIt::destroy($id);

        // $AccessoryMedical =AccessoryMedical::where('id',$id)->firstOrFail();
        // $AccessoryMedical->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف الملحق " : "فشل حذف الملحق"], $isDeleted ? 200 : 400);
    }
}
