<?php

namespace App\Http\Controllers;

use App\Models\ProblemType;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;

class ProblemTypeController extends Controller
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
        $ProblemTypes = ProblemType::select();


        return DataTables::of($ProblemTypes)
            // ->addColumn('record_select', 'admin.users.data_table.record_select')

            // ->filterColumn('city_id', function ($query, $value) {
            //     $query->whereHas('city', function ($q) use ($value) {
            //         $q->where(DB::raw("CONCAT_WS(' ',title_ar)"), 'like', "%" . $value . "%");
            //     });
            // })

            ->addColumn('problem_title', function (problemType $problemType) {
                return view('problemType.data_table.title', compact('problemType'));
            })
            ->addColumn('problem_description', function (problemType $problemType) {
                return view('problemType.data_table.description', compact('problemType'));
            })

            ->addColumn('active', function (problemType $problemType) {
                return view('problemType.data_table.active', compact('problemType'));
            })
            

            // ->addColumn('gender', function (department $department) {
            //     return view('social.patients.data_table.gender', compact('department'));
            // })

            ->editColumn('created_at', function (problemType $problemType) {
                return $problemType->created_at->format('Y-m-d');
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

           $problemType = new ProblemType();
           $problemType->problem_title = $request->get('problem_title');
           $problemType->problem_description = $request->get('problem_description');
           $problemType->active = $request->get('active');
            $isSaved = $problemType->save();

            return response()->json(['message' => $isSaved ? "تم أضافة القسم بنجاح" : "فشل أضافة القسم"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        //    return response()->json(['message' => "Failed to save"], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProblemType  $problemType
     * @return \Illuminate\Http\Response
     */
    public function show(problemType $problemType)
    {
        //
        $subproblemTypes = $problemType->subProblem ;

        dd($subproblemTypes);

        return response()->json(['subproblemType'=>$subproblemTypes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProblemType  $problemType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProblemType $problemType)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProblemType  $problemType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProblemType $problemType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProblemType  $problemType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProblemType $problemType)
    {
        //
    }
}
