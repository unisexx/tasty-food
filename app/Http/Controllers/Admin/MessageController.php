<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $rs = Message::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.message.index', compact('rs'));
    }

    public function destroy($id)
    {
        Message::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/message');
    }
}
