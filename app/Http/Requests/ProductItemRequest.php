<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_category_id' => 'required',
            'brand'               => 'required',
            'name'                => 'required',
            // 'weight'              => 'required|numeric',
            'image'               => 'required_without:old_image',
            'image.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'product_category_id.required' => 'หมวดหมู่สินค้า ห้ามเป็นค่าว่าง',
            'brand.required'               => 'แบรนด์ ห้ามเป็นค่าว่าง',
            'name.required'                => 'ชื่อสินค้า ห้ามเป็นค่าว่าง',
            // 'weight.required'              => 'น้ำหนักสินค้า ห้ามเป็นค่าว่าง',
            // 'weight.numeric'               => 'น้ำหนักสินค้า เป็นตัวเลขเท่านั้น',
            'image.required_without'       => 'รูปสินค้า ห้ามเป็นค่าว่าง',
            'image.*.image'                => 'รูปไฮไลท์ ต้องเป็นไฟล์รูปภาพ',
            'image.*.mimes'                => 'รูปไฮไลท์ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.*.max'                  => 'รูปไฮไลท์ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ];
    }
}
