<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmPaymentRequest;
use App\Models\ConfirmPayment;
use App\Models\Order;
use Auth;

class ConfirmPaymentController extends Controller
{
    public function index()
    {
        return view('front.confirm-payment.index');
    }

    public function save(ConfirmPaymentRequest $request)
    {
        $requestData = $request->all();

        // ไฟล์แนบ
        if ($request->file('payment_attach')) {
            $requestData['payment_attach'] = time() . '.' . $request->payment_attach->extension(); // ชื่อไฟล์
            $request->payment_attach->move(public_path('uploads/payment-attach'), $requestData['payment_attach']);
        }

        $rs = ConfirmPayment::create($requestData);

        if ($rs->order_id !== null) {
            Order::where('id', $rs->order_id)->where('user_id', Auth::user()->id)->update(['status' => 'แจ้งโอนเงินแล้ว']);
        }

        set_notify('success', 'ส่งข้อมูลเรียบร้อย');
        return back();
    }
}
