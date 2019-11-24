<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $rs = ProductCategory::select('*');
        $rs = $rs->orderBy('_lft')->get()->toTree();
        return view('admin.product-category.index', compact('rs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'ชื่อหมวดหมู่ ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();

        // ProductCategory::create($requestData);

        ProductCategory::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'parent_id' => $request->parent_id,
                'name' => $request->name
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
