<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;
use Intervention\Image\Facades\Image;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $category = ProductCategory::select('*');
        $category = $category->orderBy('_lft')->get()->toTree();
        return view('admin.product-category.index', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'ชื่อหมวดหมู่ ห้ามเป็นค่าว่าง',
        ]);

        // รูป
        if ($request->file('image')) {
            $image_name = time() . '.' . $request->image->extension(); // ชื่อรูป
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(1168, 236); // resize image
            $img->save('uploads/product-category/' . $image_name); // save image
        }

        ProductCategory::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'parent_id' => $request->parent_id,
                'name'      => $request->name,
                'image'     => $image_name ?? $request->old_image_name,
                'status'    => $request->status,
            ]
        );

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return back();
    }

    public function destroy($id)
    {
        ProductCategory::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return back();
    }
}
