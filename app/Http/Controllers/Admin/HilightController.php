<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hilight;

class HilightController extends Controller
{
    public function index()
    {
        $rs = Hilight::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.hilight.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.hilight.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required' => 'รูปไฮไลท์ ห้ามเป็นค่าว่าง',
            'image.image'    => 'รูปไฮไลท์ ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'    => 'รูปไฮไลท์ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'      => 'รูปไฮไลท์ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();

        // รูปไฮไลท์
        $requestData['image'] = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/hilight'), $requestData['image']);

        Hilight::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/hilight');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Hilight::destroy($id);
        set_notify('error', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/hilight');
    }
}
