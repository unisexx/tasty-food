<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $rs = User::select('*');
        $rs = $rs->where('is_admin', '!=', 1)->where('type', 2)->orderBy('id', 'desc')->get();

        return view('admin.store.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.store.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        User::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');

        return redirect('admin/store');
    }

    public function edit($id)
    {
        $rs = User::findOrFail($id);

        return view('admin.store.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $rs = User::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');

        return redirect('admin/store');
    }

    public function destroy($id)
    {
        User::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');

        return redirect('admin/store');
    }
}
