<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Departments extends FormRequest
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
            'title' => 'required| string|min:3| max:35',
            // 'active' => 'required|boolean'
        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'يرجي أدخال اسم القسم',

            
        ];
    }
}
