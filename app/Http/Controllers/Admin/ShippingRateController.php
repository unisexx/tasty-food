<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingRate;
use Illuminate\Http\Request;

class ShippingRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs = ShippingRate::select('*');
        $rs = $rs->orderBy('start_weight', 'asc')->get();
        return view('admin.shipping-rate.index', compact('rs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipping-rate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'start_weight' => 'required',
            'end_weight'   => 'required',
            'cost'         => 'required',
        ], [
            'start_weight.required' => 'น้ำหนักเริ่มต้น (กรัม) ห้ามเป็นค่าว่าง',
            'end_weight.required'   => 'น้ำหนักสิ้นสุด (กรัม) ห้ามเป็นค่าว่าง',
            'cost.required'         => 'ค่าจัดส่ง (บาท) ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();

        ShippingRate::create($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/shipping-rate');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rs = ShippingRate::findOrFail($id);
        return view('admin.shipping-rate.edit', compact('rs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'start_weight' => 'required',
            'end_weight'   => 'required',
            'cost'         => 'required',
        ], [
            'start_weight.required' => 'น้ำหนักเริ่มต้น (กรัม) ห้ามเป็นค่าว่าง',
            'end_weight.required'   => 'น้ำหนักสิ้นสุด (กรัม) ห้ามเป็นค่าว่าง',
            'cost.required'         => 'ค่าจัดส่ง (บาท) ห้ามเป็นค่าว่าง',
        ]);

        $requestData = $request->all();
        $rs = ShippingRate::findOrFail($id);
        $rs->update($requestData);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('admin/shipping-rate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShippingRate::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/shipping-rate');
    }
}
