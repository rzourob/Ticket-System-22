<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use App\Http\Traits\UserTrait;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TechnicianController extends Controller
{

    use UserTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $technicians = Technician::where('id','!=',auth('technician')->id())->get();
                $roles = Role::all();
                return response() -> view ('technician.index',['technicians' => $technicians,'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $roles = Role::where('guard_name','=','technician')->get();
        return response()->view('technician.create',['users'=>$users,'roles'=>$roles]);
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

            'name' => 'required| string|min:3| max:35',
            'email' => 'required|email',
            'password' => ['required' ,'confirmed', Password::min(3)],     

        ],[

           'name.required' =>'الرجاء ادخال أسم المستخدم',
           'email.required' => 'الرجاء ادخال البريد الاكتروني',
           'password.confirmed' => 'كلمة المرور غير متطابقة',

        ]);

        if (!$validator->fails()) {
            
            $role = Role::findById($request->input('role_id'), 'technician');

           $technician = new Technician();
           $technician->name = $request->get('name');
           $technician->email = $request->get('email');
           $technician->password = Hash::make($request->get('password'));
           // $user->password_confirm =  Hash::make($request->get("password_confirm"));
        //    $technician->role_id = $request->get('role_id');
           //$user->roles_name = $request->get('roles_name');
           $technician->status = $request->get('status');
           $technician->image = $request->get('image');

           $img_name = $this->saveImg($request, $technician, 'users/$user->image');
           
           $isSaved = $technician->save();
           
                if($isSaved) $technician->assignRole($role);

            return response()->json(['message' => $isSaved ? trans('تم اضافة المستخدم بنجاح') : "فشل عملية اضافة المسنتخدم"], $isSaved ? 201 : 400);
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
