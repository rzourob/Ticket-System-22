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
            'codeDevices' => 'required|string:min=3|regex:/^[a-zA-Z0-9\-]*$/i',
            // 'codeDevices' => ['required','string'],
            'deviceTypes' => 'required|string:min=3',
            'title' => 'required|string|regex:/^[a-zA-Z]*$/i',
            'sn' => 'required|string|regex:/^[a-zA-Z0-9]*$/i',
            'department_id' => 'required|numeric',
            'room' => 'required|string|regex:/^[a-zA-Z0-9\-]*$/i',
            'manufacturer' => 'required|string|regex:/^[a-zA-Z]*$/i',
            'model' => 'required|string|regex:/^[a-zA-Z0-9]*$/i',
            'supplier' => 'required|string|regex:/^[a-zA-Zأ-ي]*$/i',
            'warranty' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'codeDevices.required' => 'الرجاء ادخال الباركود الخاص بالجهاز',
            'codeDevices.min' => 'يجب ان يكون الباركود على ثلاث حروف على الاقل', 
            'codeDevices.regex' => 'صيغة كود الجهاز غير صحيحة',

            'deviceTypes.required' => 'الرجاء تحديد نوع الجهاز',

            'title.required' => 'الرجاء أدخال اسم الجهاز',
            'title.regex' => 'صيغة اسم الجهاز غير صحيحة',

            'sn.required' => 'الرجاء ادخال السيريال نمبر الخاص بالجهاز',
            'sn.unique' => 'الرجاء ادخال اسم الشركة ?????????',

            'department_id.required' => 'الرجاء اختيار القسم',

            'room.required' => 'الرجاء ادخال رقم الغرفة',
            'room.regex' => 'القيمة المدخلة غير صحيحة',

            'manufacturer.required' => 'الرجاء ادخال اسم الشركة المصنعة',
            'manufacturer.regex' => 'أسم الشركة المدخل غير صحيحة',

            'model.required' => 'الرجاء ادخال موديل الجهاز',
            'model.regex' => 'مديل الجهاز المدخل غير صحيحة',

            'supplier.required' => 'الرجاء ادخال اسم الشركة الموردة',
            
            'warranty.required' => 'الرجاء ادخال اسم الشركة الموردة',
            'warranty.numeric' => 'القيمة المدخلة غير صحيحة',
        ];
    }
}
