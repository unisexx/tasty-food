<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'    => 'required',
            'tel'     => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'ชื่อ ห้ามเป็นค่าว่าง',
            'tel.required'     => 'เบอร์โทรศัพท์ ห้ามเป็นค่าว่าง',
            'address.required' => 'ที่อยู่สำหรับการจัดส่ง ห้ามเป็นค่าว่าง',
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
