<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $rs = User::select('*');
        $rs = $rs->where('is_admin', 0)->orderBy('id', 'desc')->get();
        return view('admin.user.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url'   => 'required',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'url.required'   => 'ลิ้งค์ youtube ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();
        User::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/user');
    }

    public function edit($id)
    {
        $rs = User::findOrFail($id);
        return view('admin.user.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'url'   => 'required',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'url.required'   => 'ลิ้งค์ youtube ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();
        $rs = User::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/user');
    }

    public function destroy($id)
    {
        User::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/user');
    }
}
