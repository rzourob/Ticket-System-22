<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\UserTrait;
use App\Models\Admin;
use App\Models\Department\Department;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
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
        //
        // $users = User::all();
        // $viewDevice =Auth('guard_name')->department->device;

        $users = User::where('id','!=',auth('web')->id())->get();
        $admins = Admin::where('id','!=',auth('admin')->id())->get();
                $roles = Role::all();
                return response() -> view ('users.index',['users' => $users,'roles' => $roles ,'admins' => $admins]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $users = User::all();
        $departments = Department::get();
        $roles = Role::where('guard_name','=','web')->get();
        return response()->view('users.create',['roles'=>$roles,'departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //  dd($request->all());
        $validator = Validator($request->all(), [

            'name' => 'required| string|min:3| max:35',
            'email' => 'required|email',
            'password' => ['required' ,'confirmed', Password::min(3)],  
            'role'     => 'require|string|exists:roles,id'   

        ],[

           'name.required' =>'???????????? ?????????? ?????? ????????????????',
           'email.required' => '???????????? ?????????? ???????????? ??????????????????',
           'password.confirmed' => '???????? ???????????? ?????? ??????????????',
           'role'     => '???????? ?????????? ??????????????????',

        ]);

        if (!$validator->fails()) {

            $role = Role::findById($request->input('role_id'), 'web');


           $user = new User();
           $user->name = $request->get('name');
           $user->email = $request->get('email');
           $user->password = Hash::make($request->get('password'));
           // $user->password_confirm =  Hash::make($request->get("password_confirm"));
        //    $user->role_id = $request->get('role_id');
           //$user->roles_name = $request->get('roles_name');
           $user->department_id = $request->get('department_id');
           $user->status = $request->get('status');
           $user->image = $request->get('image');

           $img_name = $this->saveImg($request, $user, 'users/$user->image');
           
           $isSaved = $user->save();

           if($isSaved) $user->assignRole($role);

            return response()->json(['message' => $isSaved ? trans('???? ?????????? ???????????????? ??????????') : "?????? ?????????? ?????????? ??????????????????"], $isSaved ? 201 : 400);
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
        $user = User::findOrFail($id);
        $roles = Role::where('guard_name', '=', 'web')->get();
        $currentRole = $user->roles[0];
        return view('users.edit', ['user'=>$user ,'roles'=>$roles , 'currentRole' => $currentRole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        //
        $validator = Validator($request->all(), [

            'name' => 'required| string|min:3| max:35',
            'email' => 'required|email',
            'password' => ['required' , Password::min(3)],

        ], [

            'name.required' => '???????????? ?????????? ?????? ????????????????',
            'email.required' => '???????????? ?????????? ???????????? ??????????????????',

        ]);
        if (!$validator->fails()) {
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            // $user->role_id = $request->get('role_id');
            $user->status = $request->get('status');
            $img_name = $this->saveImg($request, $user, 'users/$user->image');
            $isSaved = $user->save();
            return response()->json(['message' => $isSaved ? trans('???? ?????????? ???????????? ???????????????? ??????????') : "?????? ?????????? ???????????? ????????????????"], $isSaved ? 201 : 400);
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
    public function destroy(User $user , Request $request)
    {
        //
        $usersImages = ("users/$user->image");
        $isDeleted = $user->delete();
        if ($isDeleted){           
            $userDeleted = Storage:: disk('public')->delete($usersImages);
        }
        return response()->json(['message' => $isDeleted ?
            " ???? ?????? ???????????????? ??????????" : "?????? ?????? ????????????????"], $isDeleted ? 200 : 400);
    }

    public function editPassword(Request $request)
    {

        $users = User::findorFail(Auth()->user()->id);

        return response()->view('userLogin.changepassword', compact('users'));
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator($request->all(), [

            'password' => 'required|string|current_password:web',
            'new_password' => 'required|string|min:3|max:15|confirmed',
            'new_password_confirmation' => 'required|string|min:3|max:15',
        ], [

            'password.required' => '????????, ????????  ???????? ???????????? ??????????????',
            'current_password' => '???????? ???????????? ?????? ??????????',
            'email' => 'wwwwwwwwwwwwwwwww',
            'new_password.required' => ' ????????, ???????? ???????? ???????????? ??????????',
            'credentials.required' => '????????????????????????????????????????????',

        ]);


        if (!$validator->fails()) {

            $user = auth('web')->user();
            $user->password = Hash::make($request->get('new_password'));
            $isSaved = $user->save();

            return response()->json([
                'message' => $isSaved ? "?????? ?????????????? ??????????" : "???????? ??????????????"
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }
}
