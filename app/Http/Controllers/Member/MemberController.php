<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Order;
use App\Models\UserAddress;
use App\User;
use Auth;
use Hash;

class MemberController extends Controller
{
    public function profile()
    {
        $rs = UserAddress::where('user_id', Auth::user()->id)->get();

        return view('member.profile', compact('rs'));
    }

    public function profile_form()
    {
        $rs = UserAddress::where('user_id', Auth::user()->id)->where('id', @$_GET['id'])->first();

        return view('member.profile_form', compact('rs'));
    }

    public function profile_save(ProfileRequest $request, $id)
    {
        UserAddress::updateOrCreate(
            [
                'id'      => @$request->id,
                'user_id' => @Auth::user()->id,
            ],
            [
                'title'    => @$request->title,
                'name'     => @$request->name,
                'address'  => @$request->address,
                'tumbon'   => @$request->tumbon,
                'amphoe'   => @$request->amphoe,
                'province' => @$request->province,
                'zipcode'  => @$request->zipcode,
                'tel'      => @$request->tel,
            ]
        );
        set_notify('success', 'บันทึกข้อมูลเรียบร้อย');

        return redirect('member/profile');
    }

    public function profile_delete($id)
    {
        $rs = UserAddress::where('user_id', Auth::user()->id)->where('id', $id)->delete();
        set_notify('success', 'ลบข้อมูลเรียบร้อย');

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
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

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
