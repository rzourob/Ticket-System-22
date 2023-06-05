<?php


namespace App\RepositoryInterface\Admins;
use Illuminate\Http\Request;

interface Device_ItInterface{

//تستخدم لجلب أجهزة تكنولوجيا المعلومات
    public function getDevice_It($id);

//تستخدم لجلب الاقسام الرئيسية
    public function getDepartments();

//تستخدم لجلب الاقسام الفرعية
    public function getSubdepartments();

//تستخدم لجلب طلبات الصيانة
    public function getMaintenanceRequests(); 










public function data();





public function storeDevice_It($request);

public function show_Devic_IT($id);



}