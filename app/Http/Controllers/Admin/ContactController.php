<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function edit($id)
    {
        $rs = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        $rs = Contact::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return back();
    }
}
