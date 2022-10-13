<?php

namespace App\Http\Controllers\Admin\Device_IT;

use App\Http\Controllers\Controller;
use App\Models\DeviceMovement\DeviceMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceMovementController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        // dd($request->all());

        $validator = Validator($request->all(), [

            'title' => 'required| string|min:3| max:35',
            'newLocation' => 'required|string|min:3| max:35',
            'body' => 'required| string|min:3| max:100',

        ], [

               'title.required' => 'الرجاء أدخل عنوان الحركة',
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

    public function show(DeviceMovement $deviceMovement)
    {
        //
    }

    public function edit(DeviceMovement $deviceMovement)
    {
        //
    }

    public function update(Request $request, DeviceMovement $deviceMovement)
    {
        //
    }

    public function destroy(DeviceMovement $deviceMovement)
    {
        //
    }
}
