<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\PurchaseOrder\PurchaseOrder;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('purchaseOrder.index');
    }
    public function data()
    {
        // $patients = Department::with(['nationality:id,title_ar','city:id,title_ar'])->select();
        $purchaseOrders = PurchaseOrder::get();


        return DataTables::of($purchaseOrders)


            ->addColumn('order_No', function (PurchaseOrder $purchaseOrder) {
                return view('PurchaseOrder.data_table.order_No', compact('purchaseOrder'));
            })
            ->addColumn('description', function (PurchaseOrder $purchaseOrder) {
                return view('PurchaseOrder.data_table.description', compact('purchaseOrder+'));
            })

            ->addColumn('department_id', function (PurchaseOrder $purchaseOrder) {
                return view('PurchaseOrder.data_table.departments', compact('device'));
            })

            ->addColumn('budget_No', function (PurchaseOrder $purchaseOrder) {
                return view('PurchaseOrder.data_table.budget_No', compact('device'));
            })

            ->addColumn('active', function (PurchaseOrder $purchaseOrder) {
                return view('PurchaseOrder.data_table.active', compact('device'));
            })


            // ->addColumn('gender', function (department $department) {
            //     return view('social.patients.data_table.gender', compact('department'));
            // })

            ->editColumn('created_at', function (PurchaseOrder $purchaseOrder) {
                return $purchaseOrder->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'PurchaseOrder.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

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
        return response()->view('purchaseOrder.create', [
            'departments' => $departments,
            'subdepartments' => $subdepartments
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
