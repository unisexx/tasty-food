<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vdo;

class VdoController extends Controller
{
    public function index()
    {
        $rs = Vdo::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.vdo.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.vdo.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'url.required' => 'ลิ้งค์ youtube ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();
        Vdo::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/vdo');
    }

    public function edit($id)
    {
        $rs = Vdo::findOrFail($id);
        return view('admin.vdo.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'url.required' => 'ลิ้งค์ youtube ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();
        $rs = Vdo::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/vdo');
    }

    public function destroy($id)
    {
        Vdo::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/vdo');
    }
}
