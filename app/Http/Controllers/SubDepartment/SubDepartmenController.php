<?php

namespace App\Http\Controllers\SubDepartment;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;

class SubDepartmenController extends Controller
{

    public function __construct(){

        $this->authorizeResource(SubDepartment::class,'subdepartment'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('subdepartments.index');
    }

    public function data()
    {
        // $patients = Department::with(['nationality:id,title_ar','city:id,title_ar'])->select();
        $subdepartments = SubDepartment::get();


        return DataTables::of($subdepartments)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            // ->filterColumn('city_id', function ($query, $value) {
            //     $query->whereHas('city', function ($q) use ($value) {
            //         $q->where(DB::raw("CONCAT_WS(' ',title_ar)"), 'like', "%" . $value . "%");
            //     });
            // })

            ->addColumn('title', function (subdepartment $subdepartment) {
                return view('subdepartments.data_table.title', compact('subdepartment'));
            })

            ->addColumn('department_id', function (subdepartment $subdepartment) {
                return view('subdepartments.data_table.department', compact('subdepartment'));
            })
            ->addColumn('description', function (subdepartment $subdepartment) {
                return view('subdepartments.data_table.description', compact('subdepartment'));
            })

            ->addColumn('active', function (subdepartment $subdepartment) {
                return view('subdepartments.data_table.active', compact('subdepartment'));
            })
            

            // ->addColumn('gender', function (department $department) {
            //     return view('social.patients.data_table.gender', compact('department'));
            // })

            ->editColumn('created_at', function (subdepartment $subdepartment) {
                return $subdepartment->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'subdepartments.data_table.actions')
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
        $departments = Department::get();
        return response()->view('subdepartments.create',['departments' => $departments]);
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

            'title' => 'required| string|min:3| max:35',
            // 'title_en' => 'required| string|min:3| max:35',
            'active' => 'required|boolean'

        ],[


           'title.required' => 'الرجاء ادخال اسم الوحدة باللغة العربية',
        //    'title_en.required' => 'الرجاء ادخال اسم القسم باللغة الانجيلزية',


        ]);


        if (!$validator->fails()) {

           $subdepartments = new SubDepartment();
           // $department->title_ar = $request->get('title_ar');
           // $department->title_en = $request->get('title_en');
           $subdepartments->title = $request->get('title');
           $subdepartments->department_id  = $request->get('department_id');
           $subdepartments->description = $request->get('description');
           $subdepartments->active = $request->get('active');
           $isSaved = $subdepartments->save();

            return response()->json(['message' => $isSaved ? "تم الأضافة الوحدة بنجاح" : "فشل عملية الأضافة"], $isSaved ? 201 : 400);
        } else {
           //  return response()->json(['message' => $validator->getMessageBag()->first()], 400);
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
        $subdepartments= SubDepartment:: findOrFail($id);
        $departments = department::get();
        
        return response()->view('subdepartments.edit', ['departments' => $departments, 'subdepartments' => $subdepartments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SubDepartment $subdepartment)
    {
        //
        $validator = Validator($request->all(), [

            'title' => 'required| string|min:3| max:35',
            // 'title_en' => 'required| string|min:3| max:35',
            'active' => 'required|boolean'

        ],[


           'title.required' => 'الرجاء ادخال اسم القسم باللغة العربية',
        //    'title_en.required' => 'الرجاء ادخال اسم القسم باللغة الانجيلزية',


        ]);


        if (!$validator->fails()) {

           $subdepartment->title = $request->get('title');
           $subdepartment->department_id  = $request->get('department_id');
           $subdepartment->description = $request->get('description');
           $subdepartment->active = $request->get('active');
           $isSaved = $subdepartment->save();

            return response()->json(['message' => $isSaved ? "تم تعديل البيانات  بنجاح" : "فشل تعديل البيانات"], $isSaved ? 201 : 400);
        } else {
           //  return response()->json(['message' => $validator->getMessageBag()->first()], 400);
           return response()->json(['message' => $validator->getMessageBag()->first()], 400);
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
