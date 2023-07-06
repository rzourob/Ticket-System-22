<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\RepositoryInterface\Department\DepartmentInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Departments;

class DepartmentController extends Controller
{

    // public function __construct(){
    //     $this -> authorizeResource( Department::class,'department'); 
    // }

     protected $Department;

     public function __construct(DepartmentInterface $Department)
     {
        $this->authorizeResource( Department::class,'department'); 

        return $this->Department = $Department;

     }


    public function index()
    {
        $departments = $this->Department->geDepartment();
        return view('departments.index',['departments'=>$departments]);
    }
    
    public function data()
    {
       return $this->Department->data();

    }// end of data

    public function create()
    {
        return response()->view('departments.create');
    }

    public function store(Departments $request)
    {
      return $this->Department->StoerDepartment($request);
    }


    public function show(department $department)
    {
        $subDepartments =$department->subDepartment;
        return response()->json(['subDepartment'=>$subDepartments]);
    }

    public function edit($id)
    {
        $departments =  $this->Department->editDepartment($id);
        return response()->view('departments.edit', ['departments' => $departments]);
    }

    public function update(Request $request,$id)
    {
        return $this->Department->updateDepartment($request,$id);
    }

    public function destroy($id)
    {
       return $this-> Department->destroyDepartment($id);
    }


    
}
