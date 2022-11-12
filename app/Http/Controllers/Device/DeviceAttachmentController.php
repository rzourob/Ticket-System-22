<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use App\Models\Device\DeviceAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;


class DeviceAttachmentController extends Controller
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

            'file_name' => 'mimes:pdf,jpeg,png,jpg',  

        ], [
            'file_name.required' => 'لايوجد مرفق',
            'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        ]);

        if (!$validator->fails()) {

                   $deviceattachments = new DeviceAttachment();
                   $deviceattachments->device_id = $request->get('device_id');  
                   $deviceattachments->Created_by  = Auth::user()->name;

                    // if ($request->hasFile('file_name')) {
                    //     Storage::disk('public')->delete("patientattachments/$patientattachments->file_name");
                    //     $file_name = $request->file('file_name');
                    //     $fileName = time() . '_' . $patientattachments->name . '.' . $file_name->getClientOriginalExtension();
                    //     $request->file('file_name')->storePubliclyAs('patientattachments', $fileName, ['disk' => 'public']);
                    //     $patientattachments->file_name = $fileName;
                    // }
                    if($request ->hasFile('file_name')){
                        Storage::disk('public')->delete("deviceattachments/$deviceattachments->file_name");
                        $file_name = $request->file('file_name');
                        $fileName = time() . '_' . $deviceattachments->name . '.' . $file_name->getClientOriginalExtension();
                        $request->file('file_name')->storePubliclyAs('deviceattachments', $fileName , ['disk'=>'public']);
                        $deviceattachments->file_name = $fileName; 
                   }

                    $isSaved = $deviceattachments->save();

                 return response()->json(['message' => $isSaved ? "تم أضافة المرفق بنجاح" : "فشل أضافة المرفق"], $isSaved ? 201 : 400);
                } else {
                //    return response()->json(['message' => "Failed to save"], 400);
                return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
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
    public function destroy(DeviceAttachment $deviceattachments, $id)
    {
          //
          $device = Device::where('id', $id)->first();
          $deviceattachments = DeviceAttachment::where('id', $id)->first();
  
          $isDeleted = $deviceattachments->delete();
  
           if ($isDeleted) {
              // $PatientAttachmentDeleted = Storage::delete($patientattachments->file_name);
            //   $deviceattachments = Storage::delete($deviceattachments->file_name);
            $PatientAttachmentDeleted = Storage::disk('public')->delete("deviceattachments/$deviceattachments->file_name");

          }

         

          return response()->json(['message' => $isDeleted ?
              " تم حذف المرفق بنجاح" : "فشل حذف المرفق"], $isDeleted ? 200 : 400);
    }
}
