<?php

namespace App\Http\Controllers\ItDevice;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\ItDevice\ItDevice;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;

class ItDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('itdevices.index');
    }
    public function data()
    {
        // $patients = Department::with(['nationality:id,title_ar','city:id,title_ar'])->select();
        $itdevices = ItDevice::select();


        return DataTables::of($itdevices)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            // ->filterColumn('city_id', function ($query, $value) {
            //     $query->whereHas('city', function ($q) use ($value) {
            //         $q->where(DB::raw("CONCAT_WS(' ',title_ar)"), 'like', "%" . $value . "%");
            //     });
            // })

            ->addColumn('title', function (itdevice $itdevice) {
                return view('itdevices.data_table.title', compact('itdevice'));
            })
            ->addColumn('description', function (itdevice $itdevice) {
                return view('itdevices.data_table.description', compact('itdevice'));
            })

            ->addColumn('active', function (itdevice $itdevice) {
                return view('itdevices.data_table.active', compact('itdevice'));
            })
            

            // ->addColumn('gender', function (department $department) {
            //     return view('social.patients.data_table.gender', compact('department'));
            // })

            ->editColumn('created_at', function (itdevice $itdevice) {
                return $itdevice->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'itdevices.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();

    }// end of data

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $departments = Department::where('active', true)->get();
        $subdepartments = SubDepartment::where('active', true)->get();
         return response() -> view ('itdevices.create',[
             'departments' =>$departments,
             'subdepartments' =>$subdepartments
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

            // 'title' => 'required| string',
            // 'sn' => 'required| string|min:3| max:35',
            // 'manufacturer' => 'required|string',
            // 'model' => 'required|string',
            // 'supplier' => 'required|string'
       ],[
        //    'name.required' =>'الرجاء ادخال اسم الجهاز الطبي',
        //    'sn.required' => 'الرجاء ادخال السيريل نمبر الجهاز',
        //    'manufacturer.required' => 'الرجاء ادخال اسم الشركة المصنعة',
        //    'model.required' => 'الرجاء ادخال اسنوع الجهاز الطبي',
        //    'supplier.required' => 'الرجاء ادخال الموردة',
       ]);


       if (!$validator->fails()) {

          $itdevices = new ItDevice();
          $itdevices->title = $request->get('title');
          $itdevices->deviceTypes = $request->get('deviceTypes');
          $itdevices->manufacturer = $request->get('manufacturer');
          $itdevices->model = $request->get('model');
          $itdevices->sn = $request->get('sn');
          $itdevices->supplier = $request->get('supplier');
          $itdevices->warranty = $request->get('warranty');
          $itdevices->image = $request->get('image');
          $itdevices->description = $request->get('description');
          $itdevices->department_id = $request->get('department_id');;
          $itdevices->sub_department_id = $request->get('sub_department_id');
    //       if($request ->hasFile('image')){
    //         Storage::disk('public')->delete("devices/$devicedetail->image");
    //         $image = $request->file('image');
    //         $imageName = time() . '_' . $devicedetail->name . '.' . $image->getClientOriginalExtension();
    //         $request->file('image')->storePubliclyAs('devices', $imageName , ['disk'=>'public']);
    //         $devicedetail->image = $imageName; 
    //    }
    //     // $devicedetail->image = $file_name;


          $isSaved = $itdevices->save();

          return response()->json(['message' => $isSaved ? "تم أضافة القسم بنجاح" : "فشل أضافة القسم"], $isSaved ? 201 : 400);
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
    public function destroy($id)
    {
        //
    }
}
