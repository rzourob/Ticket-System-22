<?php

namespace App\RepositoryInterface\Department;

interface DepartmentInterface{

    public function geDepartment();

    public function data();

    public function StoerDepartment($request);

    public function editDepartment($id);

    public function updateDepartment($request,$id);

    public function destroyDepartment($id);

}