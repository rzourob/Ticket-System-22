<?php

namespace App\Repository\Department;

use App\Models\Department\Department;
use App\Models\SubDepartment\SubDepartment;
use App\RepositoryInterface\Department\DepartmentInterface;
use  Yajra\DataTables\DataTables;

class DepartmentRepository implements DepartmentInterface
{

    public function geDepartment()
    {
        return Department::get();

    }

    public function data()
    {
        $departments = Department::select();

        return DataTables::of($departments)

            ->addColumn('title', function (department $department) {
                return view('departments.data_table.title', compact('department'));
            })
            ->addColumn('description', function (department $department) {
                return view('departments.data_table.description', compact('department'));
            })

            ->addColumn('active', function (department $department) {
                return view('departments.data_table.active', compact('department'));
            })

            ->editColumn('created_at', function (department $department) {
                return $department->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'departments.data_table.actions')
            ->rawColumns(['actions'])
            ->toJson();
    }

    public function StoerDepartment($request)
    {

          //
          $validator = Validator($request->all());
        if (!$validator->fails()) {

           $department = new Department();
           $department->title = $request->get('title');
           $department->description = $request->get('description');
           $department->active = $request->get('active');
            $isSaved = $department->save();

            return response()->json(['message' => $isSaved ? "تم أضافة القسم بنجاح" : "فشل أضافة القسم"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        //    return response()->json(['message' => "Failed to save"], 400);
        }
    }

    public function editDepartment($id)
    {
       return Department::findOrFail($id);
    }

    public function updateDepartment($request,$id)
    {

        $validator = Validator($request->all());


        if (!$validator->fails()) {
            $department = Department::findOrFail($id);
            $department->title = $request->get('title');
            $department->description = $request->get('description');
            $department->active = $request->get('active');
            $isSaved = $department->save();

            return response()->json(['message' => $isSaved ? "تم تحديث البيانات  بنجاح" : "فشل تحديث  البيانات"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }

    public function destroyDepartment($id)
    {
        $departments =Department::findOrFail($id);

        if( $departments){

        $subDepartmentsdelete = SubDepartment::where('department_id', $id)->delete();

        }

        $isDeleted = Department::destroy($id);

        return response()->json(['message' => $isDeleted ? "تم عملية الحذف بنجاح" : "فشل تنفيذ عملية الحذف"], $isDeleted ? 200 : 400);
        // return response()->json(['message' => $isDeleted ? "تم حذف الصلاحية " : "فشل حذف الصلاحية"], $isDeleted ? 200 : 400);
    }
}
