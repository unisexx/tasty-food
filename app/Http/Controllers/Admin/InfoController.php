<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class InfoController extends Controller
{
    public function index()
    {
        $rs = Info::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.info.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.info.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required' => 'รูปประกอบข่าว ห้ามเป็นค่าว่าง',
            'image.image'    => 'รูปประกอบข่าว ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'    => 'รูปประกอบข่าว ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'      => 'รูปประกอบข่าว ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();

        // รูปประกอบข่าว
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป

            // thumb
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(290, 190); // resize image
            $img->save('uploads/info/thumb/' . $requestData['image']); // save image

            // full-image
            $img2 = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img2->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img2->save('uploads/info/' . $requestData['image']); // save image
        }

        Info::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/info');
    }

    public function edit($id)
    {
        $rs = Info::findOrFail($id);
        return view('admin.info.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required' => 'รูปประกอบข่าว ห้ามเป็นค่าว่าง',
            'image.image'    => 'รูปประกอบข่าว ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'    => 'รูปประกอบข่าว ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'      => 'รูปประกอบข่าว ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();

        // รูปประกอบข่าว
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป

            // thumb
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(290, 190); // resize image
            $img->save('uploads/info/thumb/' . $requestData['image']); // save image

            // full-image
            $img2 = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img2->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img2->save('uploads/info/' . $requestData['image']); // save image
        }

        $rs = Info::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/info');
    }

    public function destroy($id)
    {
        Info::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/info');
    }
}
