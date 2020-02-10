<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index()
    {
        $rs = Banner::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.banner.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required_without:old_image|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'title.required'         => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required_without' => 'รูปแบนเนอร์ ห้ามเป็นค่าว่าง',
            'image.image'            => 'รูปแบนเนอร์ ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'            => 'รูปแบนเนอร์ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'              => 'รูปแบนเนอร์ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();

        // รูปแบนเนอร์
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(1110, 150); // resize image
            $img->save('uploads/banner/' . $requestData['image']); // save image
        }

        Banner::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/banner');
    }

    public function edit($id)
    {
        $rs = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required_without:old_image|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'title.required'         => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required_without' => 'รูปแบนเนอร์ ห้ามเป็นค่าว่าง',
            'image.image'            => 'รูปแบนเนอร์ ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'            => 'รูปแบนเนอร์ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'              => 'รูปแบนเนอร์ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();

        // รูปแบนเนอร์
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(1110, 150); // resize image
            $img->save('uploads/banner/' . $requestData['image']); // save image
        }


        $rs = Banner::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/banner');
    }

    public function destroy($id)
    {
        Banner::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/banner');
    }
}
