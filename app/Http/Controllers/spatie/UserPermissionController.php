<?php

namespace App\Http\Controllers\spatie;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

//use Spatie\Permission\Models\User;

class UserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId )
    {
        //
        $permissions = Permission::all();
        $userPermissions = Role::findById($userId)->permissions;

       if (count($userPermissions) > 0) {
            foreach ($permissions as $permission) {
                $permission->setAttribute('active', false);
                foreach ($userPermissions as $userPermissions) {
                   if ($userPermissions->id == $permission->id) {
                       $permission->active = true;
                   }
               }
           }
       }

        
        return response()->view('medical.users.user-permissions', ['userId' => $userId, 'permissions' => $permissions]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($userId)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId ,$permissionId)
    {
        //
        $validator = Validator($request->all(), [
            'permission_id' => 'required|exists:permissions,id',
        ]);

        if (!$validator->fails()) {
           $user = User::get($userId);
            $permission = Permission::findById($request->get('permission_id'));

            if ($user->hasPermissionTo($permission->id)) {
                $user->revokePermissionTo($permission->id);
            } else {
                $user->givePermissionTo($permission->id);
            }

            return response()->json(['message' => "تم أضافة الصلاحية"], 200);
        } 
        else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId , $permissionId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userId, $permissionId)
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
    public function update(Request $request,$userId, $permissionId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId, $permissionId)
    {
        //
    }
}
