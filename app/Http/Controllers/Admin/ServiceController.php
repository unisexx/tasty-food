<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index()
    {
        $rs = Service::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.service.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.service.create');
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
            $img->fit(449, 347); // resize image
            $img->save('uploads/service/' . $requestData['image']); // save image
        }

        Service::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/service');
    }

    public function edit($id)
    {
        $rs = Service::findOrFail($id);
        return view('admin.service.edit', compact('rs'));
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
            $img->fit(449, 347); // resize image
            $img->save('uploads/service/' . $requestData['image']); // save image
        }


        $rs = Service::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/service');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/service');
    }
}
