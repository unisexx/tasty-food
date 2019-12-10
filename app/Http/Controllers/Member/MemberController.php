<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Order;
use App\User;
use Auth;
use Hash;

class MemberController extends Controller
{
    public function profile()
    {
        return view('member.profile');
    }

    public function profile_save(ProfileRequest $request, $id)
    {
        $requestData = $request->all();

        $rs = User::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
        return back();
    }

    public function password()
    {
        return view('member.password');
    }

    public function password_save(PasswordRequest $request)
    {
        if (Auth::Check()) {
            if (\Hash::check($request->old_password, Auth::User()->password)) {
                $user = User::find(Auth::user()->id)->update(["password" => bcrypt($request->password)]);
            } else {
                set_notify('error', 'ข้อมูลไม่ถูกต้อง');
                return back();
            }
        }
        set_notify('success', 'เปลี่ยนรหัสผ่านสำเร็จ');
        return back();
    }

    public function order()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('member.order', compact('orders'));
    }

    public function order_view($id)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $id)->firstOrFail();
        return view('member.order_view', compact('order'));
    }

    public function order_delete($id)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $id)->firstOrFail();
        // $order->orderDetail()->delete();
        $order->delete();
        set_notify('success', 'ลบรายการสำเร็จ');
        return back();
    }
}
