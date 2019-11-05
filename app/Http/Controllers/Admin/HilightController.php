<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hilight;
use Intervention\Image\Facades\Image;

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
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(800, 600); // resize image
            $img->save('uploads/hilight/' . $requestData['image']); // save image
        }

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
        $rs = Hilight::findOrFail($id);
        return view('admin.hilight.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required' => 'รูปไฮไลท์ ห้ามเป็นค่าว่าง',
            'image.image'    => 'รูปไฮไลท์ ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'    => 'รูปไฮไลท์ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'      => 'รูปไฮไลท์ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();

        // รูปไฮไลท์
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(800, 600); // resize image
            $img->save('uploads/hilight/' . $requestData['image']); // save image
        }


        $rs = Hilight::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/hilight');
    }

    public function destroy($id)
    {
        Hilight::destroy($id);
        set_notify('error', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/hilight');
    }
}
