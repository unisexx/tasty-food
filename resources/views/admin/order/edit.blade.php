@extends('adminlte::page')

@section('title', 'ข้อมูลการสั่งซื้อ '.sprintf('%08d', $rs->id))

@section('content_header')
<h1>ข้อมูลการสั่งซื้อ {{ sprintf('%08d', $rs->id) }}</h1>
@stop

@section('content')

@if ($errors->any())
<ul class="alert alert-danger list-unstyled">
    <li><b>ไม่สามารถบันทึกได้เนื่องจาก</b></li>
    @foreach ($errors->all() as $error)
    <li>- {{ $error }}</li>
    @endforeach
</ul>
@endif

{{-- รายละเอียดสินค้า --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">รายละเอียดสินค้า</h3>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>รูป</th>
                    <th>ชื่อสินค้า</th>
                    <th class="text-right">จำนวน</th>
                    <th class="text-right">ราคาต่อหน่วย</th>
                    <th class="text-right">ราคารวม</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sum = 0;
                @endphp
                @foreach ($rs->orderDetail as $order_detail)
                @php
                    $sum+= $order_detail->productItem->price * $order_detail->qty;
                @endphp
                <tr>
                    <td>
                        <img src="{{ url('uploads/product-item/'.@$order_detail->productItem->productImageFirst->name) }}" class="img-fluid" alt="" width="50">
                    </td>
                    <td>{{ $order_detail->productItem->name }}</td>
                    <td class="text-right">{{ $order_detail->qty }}</td>
                    <td class="text-right">{{ $order_detail->productItem->price }}</td>
                    <td class="text-right">{!! number_format($order_detail->productItem->price * $order_detail->qty, 2) !!}</td>
                </tr>
                @endforeach
                <tr class="table-light">
                    <td colspan="3"></td>
                    <td class="text-right">ค่าจัดส่ง</td>
                    <td class="text-right">55.00</td>
                </tr>
                <tr class="table-warning">
                    <td colspan="3"></td>
                    <td class="text-right">รวมทั้งสิ้น</td>
                    <td class="text-right">{{ number_format($sum+55.00, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


{{-- รายละเอียดการแจ้งโอน --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">รายละเอียดการแจ้งโอน</h3>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>วันที่แจ้ง</th>
                    <th>รายละเอียดการโอน</th>
                    <th>ที่อยู่สำหรับการจัดส่ง</th>
                    <th>ไฟล์แนบ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rs->confirmPayment as $confirm_payment)
                <tr>
                    <td>{{ DBToDate($confirm_payment->created_at,true,true) }} น.</td>
                    <td>
                        <div>วันที่ชำระเงิน : {{ $confirm_payment->payment_date }}</div>
                        <div>เวลา(โดยประมาณ) : {{ $confirm_payment->payment_hour }}:{{ $confirm_payment->payment_minute }}</div>
                        <div>จำนวนเงิน : {{ $confirm_payment->payment_amount }}</div>
                        <div>ชื่อผู้แจ้ง : {{ $confirm_payment->name }}</div>
                        <div>อีเมล์ : {{ $confirm_payment->email }}</div>
                        <div>เบอร์มือถือ : {{ $confirm_payment->tel }}</div>
                        <div>ที่อยู่สำหรับการจัดส่ง : {{ $confirm_payment->description }}</div>
                    </td>
                    <td>
                        <textarea class="form-control" cols="50" rows="8">{{ $confirm_payment->name }}&#13;&#10;{{ $confirm_payment->description }}&#13;&#10;โทรศัพท์: {{ $confirm_payment->tel }}</textarea>
                    </td>
                    <td>
                        @if($confirm_payment->payment_attach)
                        <a href="{{ url('uploads/payment-attach/'.$confirm_payment->payment_attach) }}" target="_blank"><i class="fas fa-file-download"></i> download</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


{{-- ฟอร์มเปลี่ยนสถานะ --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
    </div>

    <form method="POST" action="{{ url('admin/order/' . $rs->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        @include ('admin.order.form', ['formMode' => 'edit'])
    </form>
</div>
<!-- /.card -->

@stop
