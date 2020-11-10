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
            'title'    => 'required',
            'name'     => 'required',
            'tel'      => 'required',
            'address'  => 'required',
            'tumbon'   => 'required',
            'amphoe'   => 'required',
            'province' => 'required',
            'zipcode'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'ชื่อสถานที่ ห้ามเป็นค่าว่าง',
            'name.required'     => 'ชื่อผู้รับสินค้า ห้ามเป็นค่าว่าง',
            'tel.required'      => 'เบอร์โทรศัพท์ที่ติดต่อได้ ห้ามเป็นค่าว่าง',
            'address.required'  => 'ที่อยู่จัดส่ง ห้ามเป็นค่าว่าง',
            'tumbon.required'   => 'ตำบล / แขวง ห้ามเป็นค่าว่าง',
            'amphoe.required'   => 'อำเภอ / เขต ห้ามเป็นค่าว่าง',
            'province.required' => 'จังหวัด ห้ามเป็นค่าว่าง',
            'zipcode.required'  => 'รหัสไปรษณีย์ ห้ามเป็นค่าว่าง',
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
