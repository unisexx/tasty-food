<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'ชื่อ - นามสกุล ห้ามเป็นค่าว่าง',
            'email.required'     => 'อีเมล์ ห้ามเป็นค่าว่าง',
            'email.email'        => 'รูปแบบอีเมล์ไม่ถูกต้อง',
            'email.unique'       => 'อีเมล์นี้ไม่สามารถใช้ได้',
            'password.required'  => 'รหัสผ่าน ห้ามเป็นค่าว่าง',
            'password.min'       => 'รหัสผ่าน อย่างน้อย 6 ตัวอักษร',
            'password.confirmed' => 'ยืนยันรหัสผ่านไม่ตรงกัน',
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
