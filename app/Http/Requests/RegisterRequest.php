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
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6|confirmed',
            'shop_name'     => 'sometimes|required',
            'shop_license'  => 'sometimes|required',
            'address'       => 'sometimes|required',
            'shop_tumbon'   => 'sometimes|required',
            'shop_amphoe'   => 'sometimes|required',
            'shop_province' => 'sometimes|required',
            'shop_zipcode'  => 'sometimes|required',
            'tel'           => 'sometimes|required',
            'shop_tel'      => 'sometimes|required',
            'sell_license'  => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'pro_license'   => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'ชื่อ - นามสกุล ห้ามเป็นค่าว่าง',
            'email.required'         => 'อีเมล์ ห้ามเป็นค่าว่าง',
            'email.email'            => 'รูปแบบอีเมล์ไม่ถูกต้อง',
            'email.unique'           => 'อีเมล์นี้ไม่สามารถใช้ได้',
            'password.required'      => 'รหัสผ่าน ห้ามเป็นค่าว่าง',
            'password.min'           => 'รหัสผ่าน อย่างน้อย 6 ตัวอักษร',
            'password.confirmed'     => 'ยืนยันรหัสผ่านไม่ตรงกัน',
            'shop_name.required'     => 'ชื่อร้านค้า/คลินิก ห้ามเป็นค่าว่าง',
            'shop_license.required'  => 'เลขใบอนุญาตร้านค้า ห้ามเป็นค่าว่าง',
            'address.required'       => 'ที่อยู่จัดส่ง ห้ามเป็นค่าว่าง',
            'shop_tumbon.required'   => 'ตำบล / แขวง ห้ามเป็นค่าว่าง',
            'shop_amphoe.required'   => 'อำเภอ / เขต ห้ามเป็นค่าว่าง',
            'shop_province.required' => 'จังหวัด ห้ามเป็นค่าว่าง',
            'shop_zipcode.required'  => 'รหัสไปรษณีย์ ห้ามเป็นค่าว่าง',
            'tel.required'           => 'เบอร์โทรศัพท์มือถือ ห้ามเป็นค่าว่าง',
            'shop_tel.required'      => 'เบอร์โทรศัพท์ร้าน ห้ามเป็นค่าว่าง',
            'sell_license.required'  => 'รูปใบอนุญาตขายยา ห้ามเป็นค่าว่าง',
            'sell_license.image'     => 'รูปใบอนุญาตขายยา ต้องเป็นไฟล์รูปภาพเท่านั้น',
            'sell_license.mimes'     => 'รูปใบอนุญาตขายยา ต้องเป็นไฟล์รูปภาพนามสกุล jpeg,png,jpg,gif เท่านั้น',
            'sell_license.max'       => 'รูปใบอนุญาตขายยา ขนาดห้ามเกิน 10MB',
            'pro_license.required'   => 'รูปใบประกอบวิชาชีพ ห้ามเป็นค่าว่าง',
            'pro_license.image'      => 'รูปใบประกอบวิชาชีพ ต้องเป็นไฟล์รูปภาพเท่านั้น',
            'pro_license.mimes'      => 'รูปใบประกอบวิชาชีพ ต้องเป็นไฟล์รูปภาพนามสกุล jpeg,png,jpg,gif เท่านั้น',
            'pro_license.max'        => 'รูปใบประกอบวิชาชีพ ขนาดห้ามเกิน 10MB',
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
