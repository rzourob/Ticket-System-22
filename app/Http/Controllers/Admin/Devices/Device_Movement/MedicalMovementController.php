<?php

namespace App\Http\Controllers\Admin\Devices\Device_Movement;

use App\Http\Controllers\Controller;
use App\Models\Device\AccessoryMedical;
use App\Models\Device\Device;
use App\Models\DeviceMovement\DeviceMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalMovementController extends Controller
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
        
        // dd($request->all());

        $validator = Validator($request->all(), [

            'title' => 'required| string|min:3| max:35',
            'newLocation' => 'required|string|min:3| max:35',
            'body' => 'required| string|min:3| max:100',
        ], [

               'title.required' => 'الرجاء أدخل عنوان للحركة',
               'newLocation.required' => 'الرجاء تحديد موقع الجهاز',
               'body.required' => 'الرجاء ادخال تعليق مختصر لعملية النقل',
        ]);


        if (!$validator->fails()) {

            $deviceMovements = new DeviceMovement();
            $deviceMovements->title = $request->get('title');
            $deviceMovements->body = $request->get('body');
            $deviceMovements->device_id = $request->get('device_id');
            $deviceMovements->newLocation = $request->get('newLocation');
            $deviceMovements->Created_by  = Auth::user()->name;
            $isSaved = $deviceMovements->save();

            return response()->json(['message' => $isSaved ? "تم أضافة الحركة بنجاح" : "فشل أضافة الحركة"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
            //    return response()->json(['message' => "Failed to save"], 400);
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
        $deviceMovements = DeviceMovement::findOrFail($id);

     $devices = Device::where('id', $id)->first();

    //  $deviceMovements = DeviceMovement::where('device_id', $id)->get();

     return response()->view('admins.devices.medical_devices.devices_Movements.edit', ['devices' => $devices, 'deviceMovements' => $deviceMovements]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DeviceMovement $deviceMovements, $id)
    {
        //
        $validator = Validator($request->all(), [

            'title' => 'required| string|min:3| max:35',
            'newLocation' => 'required|string|min:3| max:35',
            'body' => 'required| string|min:3| max:100',
        ], [

               'title.required' => 'الرجاء أدخل عنوان للحركة',
               'newLocation.required' => 'الرجاء تحديد موقع الجهاز',
               'body.required' => 'الرجاء ادخال تعليق مختصر لعملية النقل',
        ]);


        if (!$validator->fails()) {
            $deviceMovements = DeviceMovement::findOrFail($id);
            $deviceMovements->title = $request->get('title');
            $deviceMovements->body = $request->get('body');
            $deviceMovements->device_id = $request->get('device_id');
            $deviceMovements->movement_type = $request->get('movement_type');
            $deviceMovements->newLocation = $request->get('newLocation');
            $deviceMovements->Created_by  = Auth::user()->name;
            $isSaved = $deviceMovements->save();

            return response()->json(['message' => $isSaved ? "تم أضافة الحركة بنجاح" : "فشل أضافة الحركة"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
            //    return response()->json(['message' => "Failed to save"], 400);
        }
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
