<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('departments.index');
    }
    public function data()
    {
        // $patients = Department::with(['nationality:id,title_ar','city:id,title_ar'])->select();
        $departments = Department::select();


        return DataTables::of($departments)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            // ->filterColumn('city_id', function ($query, $value) {
            //     $query->whereHas('city', function ($q) use ($value) {
            //         $q->where(DB::raw("CONCAT_WS(' ',title_ar)"), 'like', "%" . $value . "%");
            //     });
            // })

            ->addColumn('title', function (department $department) {
                return view('departments.data_table.title', compact('department'));
            })
            ->addColumn('description', function (department $department) {
                return view('departments.data_table.description', compact('department'));
            })

            ->addColumn('active', function (department $department) {
                return view('departments.data_table.active', compact('department'));
            })
            

            // ->addColumn('gender', function (department $department) {
            //     return view('social.patients.data_table.gender', compact('department'));
            // })

            ->editColumn('created_at', function (department $department) {
                return $department->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'departments.data_table.actions')
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
        return response()->view('departments.create');
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


           'title.required' => 'الرجاء ادخال اسم القسم باللغة العربية',
        //    'title_en.required' => 'الرجاء ادخال اسم القسم باللغة الانجيلزية',


        ]);


        if (!$validator->fails()) {

           $department = new Department();
           $department->title = $request->get('title');
           $department->description = $request->get('description');
           $department->active = $request->get('active');
            $isSaved = $department->save();

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
    public function show(department $department)
    {
        //

        $subDepartments =$department->subDepartment;

    
        return response()->json(['subDepartment'=>$subDepartments]);
    
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
        $departments = department::findOrFail($id);
        return response()->view('departments.edit', ['departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
        $validator = Validator($request->all(), [

            'title' => 'required| string|min:3| max:35',
            // 'title_en' => 'required| string|min:3| max:35',
            'active' => 'required|boolean'

        ], [


            'title.required' => 'الرجاء ادخال اسم القسم باللغة العربية',
            // 'title_en.required' => 'الرجاء ادخال اسم القسم باللغة الانجيلزية',


        ]);


        if (!$validator->fails()) {

            // $department->title_ar = $request->get('title_ar');
            // $department->title_en = $request->get('title_en');
            $department->title = $request->get('title');
            $department->description = $request->get('description');
            $department->active = $request->get('active');
            $isSaved = $department->save();

            return response()->json(['message' => $isSaved ? "تم التعديل  بنجاح" : "Failed to save"], $isSaved ? 201 : 400);
        } else {
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
