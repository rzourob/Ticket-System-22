<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\ProblemType;
use App\Models\SubProblem;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;

class SubProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('subproblems.index');
    }
    public function data()
    {
        // $patients = Department::with(['nationality:id,title_ar','city:id,title_ar'])->select();
        $subproblems = SubProblem::select();


        return DataTables::of($subproblems)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            // ->filterColumn('city_id', function ($query, $value) {
            //     $query->whereHas('city', function ($q) use ($value) {
            //         $q->where(DB::raw("CONCAT_WS(' ',title_ar)"), 'like', "%" . $value . "%");
            //     });
            // })

            ->addColumn('title', function (subproblem $subproblem) {
                return view('subproblems.data_table.title', compact('subproblem'));
            })

            ->addColumn('problem_types_id', function (subproblem $subproblem) {
                return view('subproblems.data_table.department', compact('subproblem'));
            })

            ->addColumn('description', function (subproblem $subproblem) {
                return view('subproblems.data_table.description', compact('subproblem'));
            })

            ->addColumn('active', function (subproblem $subproblem) {
                return view('subproblems.data_table.active', compact('subproblem'));
            })
            

            ->editColumn('created_at', function (subproblem $subproblem) {
                return $subproblem->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'subproblems.data_table.actions')
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
        $problems = Problem::get();
        return response()->view('subproblems.create',['problems' => $problems]);
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

           $subProblems = new SubProblem();
           $subProblems->problem_id = $request->get('problem_id');
           $subProblems->title = $request->get('title');
           $subProblems->description = $request->get('description');
           $subProblems->active = $request->get('active');
            $isSaved = $subProblems->save();

            return response()->json(['message' => $isSaved ? "تم أضافة القسم بنجاح" : "فشل أضافة القسم"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        //    return response()->json(['message' => "Failed to save"], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubProblem  $subProblem
     * @return \Illuminate\Http\Response
     */
    public function show(SubProblem $subProblem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubProblem  $subProblem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subProblems= SubProblem:: findOrFail($id);
        $problems = Problem::get();
        
        return response()->view('subproblems.edit', ['problems' => $problems, 'subProblems' => $subProblems]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubProblem  $subProblem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubProblem $subProblem)
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

           $subProblem->title = $request->get('title');
           $subProblem->problem_id  = $request->get('problem_id');
           $subProblem->description = $request->get('description');
           $subProblem->active = $request->get('active');
           $isSaved = $subProblem->save();

            return response()->json(['message' => $isSaved ? "تم تعديل البيانات  بنجاح" : "فشل تعديل البيانات"], $isSaved ? 201 : 400);
        } else {
           //  return response()->json(['message' => $validator->getMessageBag()->first()], 400);
           return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubProblem  $subProblem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = SubProblem::destroy($id);

        return response()->json(['message' => $isDeleted ? "تم عملية الحذف بنجاح" : "فشل تنفيذ عملية الحذف"], $isDeleted ? 200 : 400);    }
}
