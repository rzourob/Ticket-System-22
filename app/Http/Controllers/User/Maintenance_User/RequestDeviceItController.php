<?php

namespace App\Http\Controllers\User\Maintenance_User;

use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\Department\Department;
use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use  Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RequestDeviceItController extends Controller
{
    public function index()
    {
        //
        // $viewDevice = Auth::user()->department->device;
        $maintenancerequests = MaintenanceRequest::get();
        $subdepartments = SubDepartment::get();
        $departments = Department::get();
        return view('users.request_User.viewRequest_It', [
            'maintenancerequests' => $maintenancerequests,
            'subdepartments' => $subdepartments,
            'departments' => $departments,
            // 'viewDevice' => $viewDevice
        ]);
    }

    public function data()

    {
        // $maintenancerequests = MaintenanceRequest::where('deviceTypes', 1);

        return DataTables::of(MaintenanceRequest::where('department_id', auth()->user()->department_id)->where('deviceTypes', 2))

            // ->addColumn('record_select', 'admin.users.data_table.record_select')tiket_no

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
                return view('view_Request_medical.data_table.tiket_no', compact('maintenancerequest'));
            })

            ->addColumn('title', function (maintenancerequest $maintenancerequest) {
                return view('view_Request_medical.data_table.title', compact('maintenancerequest'));
            })

            ->addColumn('department_id', function (maintenancerequest $maintenancerequest) {
                return view('view_Request_medical.data_table.departments', compact('maintenancerequest'));
            })

            ->addColumn('sub_department_id', function (maintenancerequest $maintenancerequest) {
                return view('view_Request_medical.data_table.subdepartments', compact('maintenancerequest'));
            })

            ->addColumn('status', function (maintenancerequest $maintenancerequest) {
                return view('view_Request_medical.data_table.active', compact('maintenancerequest'));
            })

            ->addColumn('deviceTypes', function (maintenancerequest $maintenancerequest) {
                return view('view_Request_medical.data_table.deviceTypes', compact('maintenancerequest'));
            })

            ->editColumn('created_at', function (maintenancerequest $maintenancerequest) {
                return $maintenancerequest->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'view_Request_medical.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

    public function show($id)
    {
        //
        $maintenancerequests  = MaintenanceRequest::where('id', $id)->first();
        $devices = Device::where('deviceTypes', 2)->get();
        $comments = Comment::where('maintenancerequest_id', $id)->get();

        // $departments = Department::get();

        // $subdepartments = SubDepartment::get();

        return response()->view('maintenances.show', [
            'maintenancerequests' => $maintenancerequests,
            'devices' => $devices,
            'comments' => $comments
        ]);
    }

    public function edit(MaintenanceRequest $maintenancerequest, $id)
    {
        //
        // dd($id);
        $maintenancerequest = MaintenanceRequest::findOrFail($id);
        $departments = Department::where('active', true)->get();
        $devices = Device::where('active', true)->get();
        $subdepartments = SubDepartment::where('active', true)->get();

        return response()->view('maintenances.edit', [
            'maintenancerequest' => $maintenancerequest,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'devices' => $devices
        ]);
    }

    public function update(Request $request, MaintenanceRequest $maintenancerequest, $id)
    {
        //

        $validator = Validator($request->all(), [

            //  'name' => 'required| string',
            //  'sn' => 'required| string|min:3| max:35',
            //  'company' => 'required|string',
            //  'device_type' => 'required|string',
            //  'supplier' => 'required|string'

        ], [

            // 'name.required' =>'الرجاء ادخال اسم الجهاز الطبي',
            // 'sn.required' => 'الرجاء ادخال السيريل نمبر الجهاز',
            // 'company.required' => 'الرجاء ادخال اسم الشركة المصنعة',
            // 'device_type.required' => 'الرجاء ادخال اسنوع الجهاز الطبي',
            // 'supplier.required' => 'الرجاء ادخال الموردة',


        ]);
        if (!$validator->fails()) {


            // dd($request->all());status

            $maintenancerequest = MaintenanceRequest::findOrFail($id);
            $maintenancerequest->title = $request->get('title');
            $maintenancerequest->content = $request->get('content');
            $maintenancerequest->author_name = $request->get('author_name');
            $maintenancerequest->author_email = $request->get('author_email');
            $maintenancerequest->department_id = $request->get('department_id');
            $maintenancerequest->sub_department_id = $request->get('sub_department_id');
            $maintenancerequest->mobile = $request->get('mobile');
            // $maintenancerequest->device_id = $request->get('device_id');
            $maintenancerequest->sn = $request->get('sn');
            $maintenancerequest->model = $request->get('model');
            $maintenancerequest->date = $request->get('date');
            $maintenancerequest->room = $request->get('room');
            $maintenancerequest->deviceTypes = $request->get('deviceTypes');
            $maintenancerequest->status = $request->get('status');
            $maintenancerequest->Created_by  = Auth::user()->name;

            $isSaved = $maintenancerequest->save();

            return response()->json(['message' => $isSaved ? "تم تحديث  البيانات" : "فشل تحديث البيانات"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }
}
