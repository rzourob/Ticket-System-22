<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\SubProblem;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;


class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('problemType.index');

        
    }
    public function data()
    {
        // $patients = Department::with(['nationality:id,title_ar','city:id,title_ar'])->select();
        $Problems = Problem::select();


        return DataTables::of($Problems)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            // ->filterColumn('city_id', function ($query, $value) {
            //     $query->whereHas('city', function ($q) use ($value) {
            //         $q->where(DB::raw("CONCAT_WS(' ',title_ar)"), 'like', "%" . $value . "%");
            //     });
            // })

            ->addColumn('title', function (problem $problem) {
                return view('problemType.data_table.title', compact('problem'));
            })
            ->addColumn('description', function (problem $problem) {
                return view('problemType.data_table.description', compact('problem'));
            })

            ->addColumn('active', function (problem $problem) {
                return view('problemType.data_table.active', compact('problem'));
            })
            

            // ->addColumn('gender', function (department $department) {
            //     return view('social.patients.data_table.gender', compact('department'));
            // })

            ->editColumn('created_at', function (problem $problem) {
                return $problem->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'problemType.data_table.actions')
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
        return response()->view('problemType.create');
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

            // 'problem_title' => 'required| string|min:3| max:35',
            // 'title_en' => 'required| string|min:3| max:35',
            // 'active' => 'required|boolean'

        ],[


        //    'problem_title.required' => 'الرجاء ادخال اسم القسم باللغة العربية',
        //    'title_en.required' => 'الرجاء ادخال اسم القسم باللغة الانجيلزية',


        ]);


        if (!$validator->fails()) {

           $problems = new Problem();
           $problems->title = $request->get('title');
           $problems->description = $request->get('description');
           $problems->active = $request->get('active');
            $isSaved = $problems->save();

            return response()->json(['message' => $isSaved ? "تم أضافة القسم بنجاح" : "فشل أضافة القسم"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        //    return response()->json(['message' => "Failed to save"], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show(Problem $problem)
    {
        //
        $subproblems = $problem->subProblems ;

        // dd($subproblems);

        return response()->json(['subproblems'=>$subproblems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $problems = Problem::findOrFail($id);
        return response()->view('problemType.edit', ['problems' => $problems]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem $problem )
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
            $problem->title = $request->get('title');
            $problem->description = $request->get('description');
            $problem->active = $request->get('active');
            $isSaved = $problem->save();

            return response()->json(['message' => $isSaved ? "تم تحديث البيانات  بنجاح" : "فشل تحديث  البيانات"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $problems =Problem::findOrFail($id);

        if( $problems){

        $subProblemsdelete = SubProblem::where('problem_id', $id)->delete();

        }

        $isDeleted = Problem::destroy($id);

        return response()->json(['message' => $isDeleted ? "تم عملية الحذف بنجاح" : "فشل تنفيذ عملية الحذف"], $isDeleted ? 200 : 400);
        // return response()->json(['message' => $isDeleted ? "تم حذف الصلاحية " : "فشل حذف الصلاحية"], $isDeleted ? 200 : 400);
    }
    }

