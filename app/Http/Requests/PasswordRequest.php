<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'old_password' => 'required|min:6',
            'password'     => 'required|min:6|confirmed|different:old_password',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'รหัสผ่านเดิม ห้ามเป็นค่าว่าง',
            'old_password.min'      => 'รหัสผ่านเดิม อย่างน้อย 6 ตัวอักษร',
            'password.required'     => 'รหัสผ่านใหม่ ห้ามเป็นค่าว่าง',
            'password.min'          => 'รหัสผ่านใหม่ อย่างน้อย 6 ตัวอักษร',
            'password.different'    => 'รหัสผ่านใหม่ ห้ามเหมือนรหัสผ่านเดิม',
            'password.confirmed'    => 'ยืนยันรหัสผ่านไม่ตรงกับรหัสผ่านใหม่',
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
