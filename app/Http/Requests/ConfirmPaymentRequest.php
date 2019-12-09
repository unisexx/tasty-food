<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmPaymentRequest extends FormRequest
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
            'order_id'       => 'sometimes|required',
            'payment_date'   => 'required',
            'payment_hour'   => 'required',
            'payment_minute' => 'required',
            'payment_amount' => 'required',
            'payment_attach' => 'mimes:jpg,jpeg,gif,png,pdf|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'order_id.required'       => 'หมายเลขการสั่งซื้อ ห้ามเป็นค่าว่าง',
            'payment_date.required'   => 'วันที่ชำระเงิน ห้ามเป็นค่าว่าง',
            'payment_hour.required'   => 'เวลา(โดยประมาณ) ห้ามเป็นค่าว่าง',
            'payment_minute.required' => 'เวลา(โดยประมาณ) ห้ามเป็นค่าว่าง',
            'payment_amount.required' => 'จำนวนเงิน ห้ามเป็นค่าว่าง',
            'payment_attach.mimes'    => 'นามสกุลไฟล์ jpg,jpeg,gif,png,pdf เท่านั้น',
            'payment_attach.max'      => 'ขนาดไฟล์ห้ามเกิน 2MB',
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
