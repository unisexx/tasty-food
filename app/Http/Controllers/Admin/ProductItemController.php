<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductItemController extends Controller
{
    public function index()
    {
        $rs = ProductItem::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.product-item.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.product-item.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_category_id' => 'required',
            'brand'               => 'required',
            'name'                => 'required',
            'price'               => 'required',
            'image'               => 'required_without:old_image',
            'image.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ], [
            'product_category_id.required' => 'หมวดหมู่สินค้า ห้ามเป็นค่าว่าง',
            'brand.required'               => 'แบรนด์ ห้ามเป็นค่าว่าง',
            'name.required'                => 'ชื่อสินค้า ห้ามเป็นค่าว่าง',
            'price.required'               => 'ราคา ห้ามเป็นค่าว่าง',
            'image.required_without'       => 'รูปสินค้า ห้ามเป็นค่าว่าง',
            'image.*.image'                => 'รูปไฮไลท์ ต้องเป็นไฟล์รูปภาพ',
            'image.*.mimes'                => 'รูปไฮไลท์ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.*.max'                  => 'รูปไฮไลท์ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();
        $rs = ProductItem::create($requestData);

        // ไฟล์แนบหลายไฟล์
        if ($request->hasFile('image')) {
            if ($files = $request->file('image')) {
                foreach ($files as $key => $file) {

                    $name = uniqid() . '.' . $file->extension(); // ชื่อรูป
                    $img = Image::make($file->getRealPath()); // read image from temporary file
                    $img->resize(250, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('uploads/product-item/' . $name); // save image

                    //thumb
                    $img2 = Image::make($file->getRealPath());
                    $img2->resizeCanvas(350, 350, 'center', false, 'FFFFFF');
                    $img2->save('uploads/product-item/thumb/' . $name);

                    $p = new ProductImage;
                    $p->product_item_id = $rs->id;
                    $p->name = $name;
                    $p->save();
                }
            }
        }

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/product-item');
    }

    public function edit($id)
    {
        $rs = ProductItem::findOrFail($id);
        return view('admin.product-item.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_category_id' => 'required',
            'brand'               => 'required',
            'name'                => 'required',
            'price'               => 'required',
            'image'               => 'required_without:old_image',
            'image.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ], [
            'product_category_id.required' => 'หมวดหมู่สินค้า ห้ามเป็นค่าว่าง',
            'brand.required'               => 'แบรนด์ ห้ามเป็นค่าว่าง',
            'name.required'                => 'ชื่อสินค้า ห้ามเป็นค่าว่าง',
            'price.required'               => 'ราคา ห้ามเป็นค่าว่าง',
            'image.required_without'       => 'รูปสินค้า ห้ามเป็นค่าว่าง',
            'image.*.image'                => 'รูปไฮไลท์ ต้องเป็นไฟล์รูปภาพ',
            'image.*.mimes'                => 'รูปไฮไลท์ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.*.max'                  => 'รูปไฮไลท์ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();
        $rs = ProductItem::findOrFail($id);
        $rs->update($requestData);

        // ไฟล์แนบหลายไฟล์
        if ($request->hasFile('image')) {
            if ($files = $request->file('image')) {
                foreach ($files as $key => $file) {

                    $name = uniqid() . '.' . $file->extension(); // ชื่อรูป

                    $img = Image::make($file->getRealPath()); // read image from temporary file
                    $img->resize(null, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('uploads/product-item/' . $name); // save image

                    //thumb
                    $img2 = Image::make($file->getRealPath());
                    $img2->resizeCanvas(350, 350, 'center', false, 'FFFFFF');
                    $img2->save('uploads/product-item/thumb/' . $name);

                    $p = new ProductImage;
                    $p->product_item_id = $rs->id;
                    $p->name = $name;
                    $p->save();
                }
            }
        }

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/product-item');
    }

    public function destroy($id)
    {
        ProductItem::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/product-item');
    }
}
