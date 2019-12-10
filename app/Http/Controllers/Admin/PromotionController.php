<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PromotionController extends Controller
{
    public function index()
    {
        $rs = Promotion::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.promotion.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.promotion.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'           => 'required',
            'image'           => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'product_item_id' => 'required',
        ], [
            'title.required'           => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required'           => 'รูปภาพ ห้ามเป็นค่าว่าง',
            'image.image'              => 'รูปภาพ ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'              => 'รูปภาพ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'                => 'รูปภาพ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
            'product_item_id.required' => 'สินค้าโปรโมชั่น ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();

        // รูปภาพ
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(335, 330); // resize image
            $img->save('uploads/promotion/' . $requestData['image']); // save image
        }

        Promotion::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/promotion');
    }

    public function edit($id)
    {
        $rs = Promotion::findOrFail($id);
        return view('admin.promotion.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'           => 'required',
            'image'           => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:10240',
            'product_item_id' => 'required',
        ], [
            'title.required'           => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required'           => 'รูปภาพ ห้ามเป็นค่าว่าง',
            'image.image'              => 'รูปภาพ ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'              => 'รูปภาพ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'                => 'รูปภาพ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
            'product_item_id.required' => 'สินค้าโปรโมชั่น ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();

        // รูปภาพ
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(335, 330); // resize image
            $img->save('uploads/promotion/' . $requestData['image']); // save image
        }

        $rs = Promotion::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/promotion');
    }

    public function destroy($id)
    {
        Promotion::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/promotion');
    }
}
