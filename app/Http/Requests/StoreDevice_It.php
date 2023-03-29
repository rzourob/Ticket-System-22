<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDevice_It extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'codeDevices' => 'required| string',
            'deviceTypes' => 'required| string',
            'title' => 'required|string',
            'sn' => 'required|string',
            'department_id' => 'required|string',
            'room' => 'required|string',
            'manufacturer' => 'required|string',
            'model' => 'required|string',
            'supplier' => 'required|string',
            'warranty' => 'required|string',
        ];
    }

    public function messages()
    {
        return[
            'codeDevices.required' => 'الرجاء ادخال الباركود الخاص بالجهاز',
            'deviceTypes.required' => 'الرجاء تحديد نوع الجهاز',
            'title.required' => 'الرجاء أدخال اسم الجهاز',
            'sn.required' => 'الرجاء ادخال السيريال نمبر الخاص بالجهاز',
            'sn.unique' => 'الرجاء ادخال اسم الشركة ?????????',
            'department_id.required' => 'الرجاء اختيار القسم',
            'room.required' => 'الرجاء ادخال رقم الغرفة',
            'manufacturer.required' => 'الرجاء ادخال اسم الشركة المصنعة',
            'model.required' => 'الرجاء ادخال موديل الجهاز',
            'supplier.required' => 'الرجاء ادخال اسم الشركة الموردة',
            'warranty.required' => 'الرجاء ادخال اسم الشركة الموردة',
        ];
    }
}
