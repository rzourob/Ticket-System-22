<?php

namespace App\Http\Controllers\User\Maintenance_Medical;

use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\Department\Department;
use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use App\Models\SubDepartment\SubDepartment;
use Illuminate\Http\Request;
use  Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketEmail;
use App\Notifications\NewRequestMedicalNotification;

class Request_Maintenance_MedicalController extends Controller
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
        return view('users.request_maintenances_Medical.Request_Devices_Medical', [
            'maintenancerequests' => $maintenancerequests,
            'subdepartments' => $subdepartments,
            'departments' => $departments
        ]);
    }

    public function data()

    {
        return DataTables::of(MaintenanceRequest::where('department_id', auth()->user()->department_id)->where('deviceTypes', 1))
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
                return view('users.request_maintenances_Medical.data_table.tiket_no', compact('maintenancerequest'));
            })

            ->addColumn('title', function (maintenancerequest $maintenancerequest) {
                return view('users.request_maintenances_Medical.data_table.subject', compact('maintenancerequest'));
            })

            ->addColumn('department_id', function (maintenancerequest $maintenancerequest) {
                return view('users.request_maintenances_Medical.data_table.departments', compact('maintenancerequest'));
            })

            ->addColumn('sub_department_id', function (maintenancerequest $maintenancerequest) {
                return view('users.request_maintenances_Medical.data_table.subdepartments', compact('maintenancerequest'));
            })

            ->addColumn('status', function (maintenancerequest $maintenancerequest) {
                return view('users.request_maintenances_Medical.data_table.active', compact('maintenancerequest'));
            })

            ->addColumn('deviceTypes', function (maintenancerequest $maintenancerequest) {
                return view('users.request_maintenances_Medical.data_table.deviceTypes', compact('maintenancerequest'));
            })

            ->editColumn('created_at', function (maintenancerequest $maintenancerequest) {
                return $maintenancerequest->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'users.request_maintenances_Medical.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    } // end of data

    public function create()
    {
        //
        $subdepartments = SubDepartment::where('active', true)->get();
        $departments = Department::where('active', true)->get();
        $devices = Device::where('active', true)->get();
        return response()->view('users.request_maintenances_Medical.create', ['subdepartments' => $subdepartments, 'departments' => $departments, 'devices' => $devices]);
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
        $year = Carbon::now()->format('Y');
        $number = 1;
        $lastRecord = MaintenanceRequest::latest()->first();
        if ($lastRecord) {
            $lastRecord = explode('-', $lastRecord->tiket_no);
            $lastRecordFileNo = $lastRecord[2];
            if ($lastRecord[1] !== Carbon::now()->format('Y')) {
                $number = 1;
            } else {
                $number = $lastRecordFileNo + 1;
            }
        }

        $tiket_no = 'HBK-' . $year . '-' . $number;

        $validator = Validator($request->all(), [

            'author_name'  => 'required| string',
            'author_email' => 'required| email|',
            'mobile'       => 'required| string',
            'deviceTypes'  => 'required',
            'sn'           => 'required| string',
            'title'        => 'required| string',
            'content'      => 'required| string',
            // 'department'=> 'required', 

        ], [

            'author_name.required'  => 'الرجاء أدخال اسم المرسل   ',
            'author_email.required' => 'الرجاء أضافة البريد الاكتروني',
            'mobile.required'                => 'الرجاء ادخل رقم الموبايل',
            'deviceTypes.required'  => 'الرجاء أختار نوع الجهاز   ',
            'sn.required'                    => 'الرجاء ادخل السيريال نمبر الخاص بالجهاز',
            'title.required'        =>'الرجاء أضافة عنوان للمشكلة',
            'content.required'      => 'الرجاء أضافة وصف مختصر للمشكلة',
            // 'department.required' => 'الرجاء أختار القسم ',


        ]);
        if (!$validator->fails()) {

            $maintenancerequests = new maintenancerequest();

            $maintenancerequests->tiket_no = $tiket_no;
            $maintenancerequests->title = $request->get('title');
            $maintenancerequests->content = $request->get('content');
            $maintenancerequests->author_name = $request->get('author_name');
            $maintenancerequests->author_email = $request->get('author_email');
            $maintenancerequests->department_id = $request->get('department_id');
            $maintenancerequests->sub_department_id = $request->get('sub_department_id');
            $maintenancerequests->mobile = $request->get('mobile');
            // $maintenancerequests->device_id = $request->get('device_id');
            $maintenancerequests->sn = $request->get('sn');
            $maintenancerequests->model = $request->get('model');
            $maintenancerequests->date = $request->get('date');
            $maintenancerequests->room = $request->get('room');
            $maintenancerequests->deviceTypes = $request->get('deviceTypes');
            $maintenancerequests->Created_by  = Auth::user()->name;

            $isSaved = $maintenancerequests->save();

            if ($isSaved) {
                // Mail::to($maintenancerequests->author_email)->send(new TicketEmail());
                // Mail::to($maintenancerequests->author_email)->send(new TicketEmail($maintenancerequests));
                auth()->user()->notify(new NewRequestMedicalNotification($maintenancerequests));

                

                // $users =User :: all();

            //     $admins = Admin::all();
            //     foreach ($admins as $admin) {
            //         Mail::to($admin->email)->send(new TicketEmail());
            //     }
            }

            return response()->json(['message' => $isSaved ? "تم أضافة الطلب بنجاح" : "فشل أضافة الطلب"], $isSaved ? 201 : 400);
        } else {
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
        $maintenancerequests  = MaintenanceRequest::where('id', $id)->first();
        $devices = Device::where('deviceTypes', 2)->get();
        $comments = Comment::where('maintenancerequest_id', $id)->get();

        // $departments = Department::get();

        // $subdepartments = SubDepartment::get();

        return response()->view('users.request_maintenances_Medical.show', [
            'maintenancerequests' => $maintenancerequests,
            'devices' => $devices,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        // dd($id);
        $maintenancerequest = MaintenanceRequest::findOrFail($id);
        $departments = Department::where('active', true)->get();
        $devices = Device::where('active', true)->get();
        $subdepartments = SubDepartment::where('active', true)->get();

        return response()->view('users.request_maintenances_Medical.edit', [
            'maintenancerequest' => $maintenancerequest,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'devices' => $devices
        ]);
    }

    public function comment_show($id)
    {

        $maintenancerequests = MaintenanceRequest::where('id', $id)->first();
        $comments = Comment::where('maintenancerequest_id', $id)->get();

        return response()->view('users.request_maintenances_Medical.cmment', ['maintenancerequests' => $maintenancerequests, 'comments' => $comments]);
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
