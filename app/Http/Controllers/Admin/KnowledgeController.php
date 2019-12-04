<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Knowledge;
use Intervention\Image\Facades\Image;

class KnowledgeController extends Controller
{
    public function index()
    {
        $rs = Knowledge::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.knowledge.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.knowledge.create');
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

        // รูปอัพโหลด
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป

            // thumb
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(340, 208); // resize image
            $img->save('uploads/knowledge/thumb/' . $requestData['image']); // save image

            // full-image
            $img2 = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img2->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img2->save('uploads/knowledge/' . $requestData['image']); // save image
        }

        Knowledge::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/knowledge');
    }

    public function edit($id)
    {
        $rs = Knowledge::findOrFail($id);
        return view('admin.knowledge.edit', compact('rs'));
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

        // รูปอัพโหลด
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป

            // thumb
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(340, 208); // resize image
            $img->save('uploads/knowledge/thumb/' . $requestData['image']); // save image

            // full-image
            $img2 = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img2->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img2->save('uploads/knowledge/' . $requestData['image']); // save image
        }


        $rs = Knowledge::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/knowledge');
    }

    public function destroy($id)
    {
        Knowledge::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/knowledge');
    }
}
