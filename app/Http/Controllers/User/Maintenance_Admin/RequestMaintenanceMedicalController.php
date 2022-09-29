<?php

namespace App\Http\Controllers\Admin\Maintenance_Admin;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;
use Carbon\Carbon;

class RequestMaintenanceMedicalController extends Controller
{
    const MEDICAL = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenancerequests = MaintenanceRequest::get();
        $subdepartments = SubDepartment::get();
        $departments = Department::get();
        return view('admin.view_Request_Devices', [
            'maintenancerequests' => $maintenancerequests,
            'subdepartments' => $subdepartments,
            'departments' => $departments
        ]);
    }

    public function data()

    {
        return DataTables::of(MaintenanceRequest::query())

            // ->addColumn('record_select', 'admin.users.data_table.record_select')tiket_no


            ->filterColumn('deviceTypes', function ($query, $deviceTypes) {
                $query->where('deviceTypes', $deviceTypes);
            })

            ->filterColumn('sub_department_id', function ($query, $sub_department_id) {
                $query->where('sub_department_id', $sub_department_id);
            })

            ->filterColumn('department_id', function ($query, $department_id) {
                $query->where('department_id', $department_id);
            })

            ->filterColumn('created_at', function ($query, $value) {
                list($from, $to) = explode('#', $value);
                // $query->where('created_at', '>=', $from)->where('created_at', '<=', $to);
                $query->whereBetween('created_at', [Carbon::parse($from), Carbon::parse($to)]);
            })

            ->addColumn('tiket_no', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.tiket_no', compact('maintenancerequest'));
            })

            ->addColumn('title', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.subject', compact('maintenancerequest'));
            })

            ->addColumn('department_id', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.departments', compact('maintenancerequest'));
            })

            ->addColumn('sub_department_id', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.subdepartments', compact('maintenancerequest'));
            })

            ->addColumn('status', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.active', compact('maintenancerequest'));
            })

            ->addColumn('deviceTypes', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.deviceTypes', compact('maintenancerequest'));
            })

            ->editColumn('created_at', function (maintenancerequest $maintenancerequest) {
                return $maintenancerequest->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'maintenances.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

    public function getdeviceit()

    {

        $maintenancerequests = MaintenanceRequest::where('deviceTypes', 2)->get();
        $subdepartments = SubDepartment::get();
        $departments = Department::get();

        return response()->view('maintenances.getdeviceit', [
            'maintenancerequests' => $maintenancerequests,
            'subdepartments' => $subdepartments,
            'departments' => $departments,

        ]);
    }

    public function iTRequest(Request $request)

    {
        return DataTables::of(MaintenanceRequest::where('department_id', auth()->user()->department_id)->where('deviceTypes', 2))

            ->filterColumn('status', function ($query, $status) {
                $query->where('status', $status);
            })

            ->filterColumn('sub_department_id', function ($query, $sub_department_id) {
                $query->where('sub_department_id', $sub_department_id);
            })

            ->filterColumn('department_id', function ($query, $department_id) {
                $query->where('department_id', $department_id);
            })

            ->filterColumn('created_at', function ($query, $value) {
                list($from, $to) = explode('#', $value);
                // $query->where('created_at', '>=', $from)->where('created_at', '<=', $to);
                $query->whereBetween('created_at', [Carbon::parse($from), Carbon::parse($to)]);
            })


            ->addColumn('tiket_no', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.tiket_no', compact('maintenancerequest'));
            })

            ->addColumn('title', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.subject', compact('maintenancerequest'));
            })

            ->addColumn('department_id', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.departments', compact('maintenancerequest'));
            })

            ->addColumn('sub_department_id', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.subdepartments', compact('maintenancerequest'));
            })

            ->addColumn('status', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.active', compact('maintenancerequest'));
            })

            ->addColumn('deviceTypes', function (maintenancerequest $maintenancerequest) {
                return view('maintenances.data_table.deviceTypes', compact('maintenancerequest'));
            })

            ->editColumn('created_at', function (maintenancerequest $maintenancerequest) {
                return $maintenancerequest->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'maintenances.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data


}
