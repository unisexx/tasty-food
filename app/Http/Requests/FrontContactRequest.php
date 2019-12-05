<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontContactRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ชื่อ ห้ามเป็นค่าว่าง',
            'email.required' => 'อีเมล์ ห้ามเป็นค่าว่าง',
            'email.email' => 'รูปแบบอีเมล์ไม่ถูกต้อง',
            'message.required' => 'ข้อความ ห้ามเป็นค่าว่าง',
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
