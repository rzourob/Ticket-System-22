<?php

namespace App\Http\Controllers\spatie;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($roleId)
    {
        //
        $permissions = Permission::all();
        $rolePermissions = Role::findById($roleId)->permissions;

        if (count($rolePermissions) > 0) {
            foreach ($permissions as $permission) {
                $permission->setAttribute('active', false);
                foreach ($rolePermissions as $rolePermission) {
                    if ($rolePermission->id == $permission->id) {
                        $permission->active = true;
                    }
                }
            }
        }

        return response()->view('roles.role-permissions', ['roleId' => $roleId, 'permissions' => $permissions]);
    }
    //{
        //
       //$permissions = ModelsPermission::all();
       // return response() -> view('professions_system.spatie.roles.role-permissions',['permissions'=> $permissions]);
   // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Role $role)
    {
        //
        $validator = Validator($request->all(), [
            'permission_id' => 'required|integer|exists:permissions,id',
        ]);

        if (!$validator->fails()) {
            // $role = Role::findById($roleId);
            // $permission = Permission::findById($request->get('permission_id'));
            $permission = Permission::findOrFail($request->input('permission_id'));

            if ($role->hasPermissionTo($permission)) {
                $role->revokePermissionTo($permission);
            } else {
                $role->givePermissionTo($permission);
            }

            return response()->json(['message' => "تم أضافة الصلاحية"], 200);
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
