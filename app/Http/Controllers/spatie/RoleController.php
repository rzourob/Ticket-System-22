<?php

namespace App\Http\Controllers\spatie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::withCount('permissions')->get();
        return response() -> view ('spatie.roles.index',['roles'=> $roles]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('spatie.roles.create');
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

            'guard_name' => 'required|string|in:web,admin,technician,customer',
            'name' => 'required|string|max:100',
            
        ], [

            'name.required' => 'الرجاء ادخال الاسم  Roles',
            'guard_name.required' => 'الرجاء ادخال الاسم  Guard',
            

        ]);
        if (!$validator->fails()) {
            $role = new Role();
            $role->name = $request->get('name');
            $role->guard_name = $request->get('guard_name');
            $isSaved = $role-> save();
            return response()->json(['message' => $isSaved ? "تم أضافة المسؤولية بنجاح" : "فشل أضافة مسؤولية"], $isSaved ? 201 : 400);
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
    public function show(Role $role)
    {
        //
        // $role = Role::findById($id);
        // $permissions =Permission::all();
        $permissions = Permission::where('guard_name', '=' , $role->guard_name)->get();
        $rolePermissions = $role ->permissions;

        foreach ($permissions as $permission) {
            $permission->setAttribute('active', false);
            foreach ($rolePermissions as $rolePermission) {
                if ($rolePermission->id == $permission->id) {
                    $permission->active = true;
                }
            }
        }
        return response()->view('spatie.roles.role-permissions', ['permissions' => $permissions,'role' => $role]);
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
        // dd($id);
        //$role = ModelsRole::withCount('permissions') ->get();
        // $role = Role::where ('guard_name','=' ,'admin')->get();
       $role = Role::findOrFail($id);
        return response()->view('spatie.roles.edit', ['role' => $role]);
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
            'name' => 'required|string|max:100',
            'guard_name' => 'required|string|in:web,admin,technician,customer',
        ]);

        if (!$validator->fails()) {
            $role = Role::findById($id); 
            $role->name = $request->get('name');
            $role->guard_name = $request->get('guard_name');
            $isSaved = $role->save();
            return response()->json(['message' => $isSaved ? "تم تعديل البيانات بنجاح" : "فشل تعديل البيانات"], $isSaved ? 201 : 400);
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
        $isDeleted = Role::destroy($id);
        return response()->json(['message' => $isDeleted ? "تم عملية الحذف بنجاح" : "فشل تنفيذ عملية الحذف"], $isDeleted ? 200 : 400);
    }
}
