<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use App\Http\Traits\UserTrait;
use App\Http\Traits\AdminTrait;
use App\Mail\WelcomeEmail;
use App\Notifications\CreatedAdminNotification;
use App\Notifications\CreateUserNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    use UserTrait;
    use AdminTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $admins = Admin::where('id', '!=', auth('admin')->id())->get();
        $roles = Role::all();
        return response()->view('admin.admin.index', ['admins' => $admins, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $admin = Admin::all();
        // $roles = Role::all();

        $roles = Role::where('guard_name', '=', 'admin')->get();

        return response()->view('admin.admin.create', ['roles' => $roles]);
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
        //dd($request->all());
        $validator = Validator($request->all(), [

            'name' => 'required| string|min:3| max:35',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::min(3)],
            'role'     => 'require|string|exists:roles,id'

        ], [

            'name.required' => 'الرجاء ادخال أسم المستخدم',
            'email.required' => 'الرجاء ادخال البريد الاكتروني',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
            'role'     => 'يرجي تحديد الصلاحيات',

        ]);

        if (!$validator->fails()) {

            $role = Role::findById($request->input('role_id'), 'admin');

            $admin = new Admin();
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->password = Hash::make($request->get('password'));
            // $user->password_confirm =  Hash::make($request->get("password_confirm"));
            //$admin->role_id = $request->get('role_id');
            //$user->roles_name = $request->get('roles_name');
            $admin->status = $request->get('status');
            $admin->image = $request->get('image');

            $img_name = $this->adminImg($request, $admin, 'admins/$admin->image');

            $isSaved = $admin->save();

            if ($isSaved) {

                $admin->assignRole($role);
                
                $admin->notify(new CreatedAdminNotification($admin));

                // Mail::to($admin->email)->send(new WelcomeEmail());
            }

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

        $admin = Admin::find($id);
        $roles = Role::where('guard_name', '=', 'admin')->get();
        $currentRole = $admin->roles[0];
        return view('admin.admin.edit', ['admin' => $admin, 'roles' => $roles, 'currentRole' => $currentRole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        $validator = Validator($request->all(), [

            'name' => 'required| string|min:3| max:35',
            'email' => 'required|email',
            'password' => ['required', Password::min(3)],

        ], [

            'name.required' => 'الرجاء ادخال أسم المستخدم',
            'email.required' => 'الرجاء ادخال البريد الاكتروني',

        ]);
        if (!$validator->fails()) {
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->password = Hash::make($request->get('password'));
            // $admin ->role_id = $request->input('roles');
            $admin->status = $request->get('status');
            $img_name = $this->saveImg($request, $admin, 'users/$user->image');
            $isSaved = $admin->save();
            return response()->json(['message' => $isSaved ? trans('تم تحديث البيانات بنجاح') : "فشل تحديث البيانات "], $isSaved ? 201 : 400);
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

    public function editPassword(Request $request)
    {

        $admins = Admin::findorFail(Auth()->user()->id);

        return response()->view('admin.adminLogin.changepassword', compact('admins'));
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator($request->all(), [

            'password' => 'required|string|current_password:admin',
            'new_password' => 'required|string|min:3|max:15|confirmed',
            'new_password_confirmation' => 'required|string|min:3|max:15',
        ], [

            'password.required' => 'رجاء, أدخل  كلمة المرور القديمة',
            'current_password' => 'كلمة المرور غير صحيحة',
            'email' => 'wwwwwwwwwwwwwwwww',
            'new_password.required' => ' رجاء, أدخل كلمة المرور جديدة',
            'credentials.required' => 'رررررررررررررررررررررر',

        ]);

        if (!$validator->fails()) {

            $admin = auth('admin')->user();
            $admin->password = Hash::make($request->get('new_password'));
            $isSaved = $admin->save();

            return response()->json([
                'message' => $isSaved ? "تمت العملية بنجاح" : "فشلت العملية"
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }
}
