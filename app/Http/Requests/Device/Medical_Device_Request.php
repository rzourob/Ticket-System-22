<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class Medical_Device_Request extends FormRequest
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

            'codeDevices.min' => 'يجب ان يكون الباركود على ثلاث حروف على الاقل', 

            'codeDevices.regex' => 'صيغة كود الجهاز غير صحيحة',

            'deviceTypes.required' => 'الرجاء تحديد نوع الجهاز',

            'title.required' => 'الرجاء أدخال اسم الجهاز',

            'title.string' => 'صيغة اسم الجهاز غير صحيحة',

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
