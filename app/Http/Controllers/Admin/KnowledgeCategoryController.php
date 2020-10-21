<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KnowledgeCategory;
use Illuminate\Http\Request;

class KnowledgeCategoryController extends Controller
{
    public function index()
    {
        $rs = KnowledgeCategory::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();

        return view('admin.knowledge-category.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.knowledge-category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();

        KnowledgeCategory::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');

        return redirect('admin/knowledge-category');
    }

    public function edit($id)
    {
        $rs = KnowledgeCategory::findOrFail($id);

        return view('admin.knowledge-category.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();

        $rs = KnowledgeCategory::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');

        return redirect('admin/knowledge-category');
    }

    public function destroy($id)
    {
        KnowledgeCategory::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');

        return redirect('admin/knowledge-category');
    }
}
