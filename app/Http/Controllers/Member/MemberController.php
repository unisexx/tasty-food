<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
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
}
