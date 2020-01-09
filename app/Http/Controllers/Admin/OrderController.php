<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OrderController extends Controller
{
    public function index()
    {
        $rs = Order::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
        return view('admin.order.index', compact('rs'));
    }

    // public function create()
    // {
    //     return view('admin.order.create');
    // }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'title' => 'required',
    //         'url'   => 'required',
    //     ], [
    //         'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
    //         'url.required'   => 'ลิ้งค์ youtube ห้ามเป็นค่าว่าง',
    //     ]);

    //     $requestData = $request->all();
    //     Order::create($requestData);

    //     set_notify('success', 'บันทึกข้อมูลสำเร็จ');
    //     return redirect('admin/order');
    // }

    public function edit($id)
    {
        $rs = Order::findOrFail($id);
        return view('admin.order.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ], [
            'status.required' => 'สถานะ ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();

        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); //
            $img = Image::make($_FILES['image']['tmp_name']);
            $img->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save('uploads/order/' . $requestData['image']); // save image
        }

        $requestData['tracking_date'] = Date2DB($request->tracking_date);

        $rs = Order::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/order');
    }

    public function destroy($id)
    {
        Order::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/order');
    }
}
