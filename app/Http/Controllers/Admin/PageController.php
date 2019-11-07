<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

class PageController extends Controller
{
    public function edit($id)
    {
        $rs = Page::findOrFail($id);
        return view('admin.page.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        $rs = Page::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return back();
    }
}
