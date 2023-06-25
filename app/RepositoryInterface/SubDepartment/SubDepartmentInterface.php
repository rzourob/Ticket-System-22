<?php

namespace App\RepositoryInterface\SubDepartment;

interface SubDepartmentInterface{

    public function geSubDepartment();

    public function data();

    public function StoerSubDepartment($request);

    public function editSubDepartment($id);

    public function updateSubDepartment($request,$id);

    public function destroySubDepartment($id);

}