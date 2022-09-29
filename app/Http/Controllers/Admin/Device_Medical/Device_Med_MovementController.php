<?php
namespace App\Http\Controllers\Admin\Device_Medical;

use App\Http\Controllers\Controller;
use App\Models\DeviceMovement\DeviceMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Device_Med_MovementController extends Controller
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

            // 'title' => 'required| string|min:3| max:35',
            // 'title_en' => 'required| string|min:3| max:35',
            // 'active' => 'required|boolean'

        ], [


            //    'title.required' => 'الرجاء ادخال اسم القسم باللغة العربية',
            //    'title_en.required' => 'الرجاء ادخال اسم القسم باللغة الانجيلزية',


        ]);


        if (!$validator->fails()) {

            $deviceMovements = new DeviceMovement();
            $deviceMovements->title = $request->get('title');
            $deviceMovements->body = $request->get('body');
            $deviceMovements->device_id = $request->get('device_id');
            $deviceMovements->newLocation = $request->get('newLocation');
            $deviceMovements->Created_by  = Auth::user()->name;
            $isSaved = $deviceMovements->save();

            return response()->json(['message' => $isSaved ? "تم أضافة القسم بنجاح" : "فشل أضافة القسم"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
            //    return response()->json(['message' => "Failed to save"], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeviceMovement\DeviceMovement  $deviceMovement
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceMovement $deviceMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeviceMovement\DeviceMovement  $deviceMovement
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceMovement $deviceMovement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeviceMovement\DeviceMovement  $deviceMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeviceMovement $deviceMovement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeviceMovement\DeviceMovement  $deviceMovement
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceMovement $deviceMovement)
    {
        //
    }
}
