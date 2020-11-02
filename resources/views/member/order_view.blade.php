@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item"><a href="{{ url('member/order') }}">สถานะการสั่งซื้อ</a></li>
        <li class="breadcrumb-item active" aria-current="page">หมายเลขการสั่งซื้อ {{ sprintf('%08d', $order->id) }}</li>
    </ol>
</nav>
@endpush

@section('content')
<div class="mb-5 about bg-white">
    @include('member.menu')

    <!--########## START checkout ########-->
    <div class="row bg-white p-4">

        <div class="col-12"><strong>หมายเลขการสั่งซื้อ {{ sprintf('%08d', $order->id) }}</strong> <span
                class="badge badge-{{ @order_status($order->status) }}">{{ $order->status }}</span></div>
        <div class="col-12 col-sm-12 col-md-8 cart-area">
            @foreach ($order->orderDetail as $order_detail)
            <div class="cart-header mb-4">
                <div class="cart-sec simpleCart_shelfItem">
                    <div class="cart-item cyc">
                        <img src="{{ url('uploads/product-item/'.@$order_detail->productItemPrice->productItem->productImageFirst->name) }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="cart-item-info pt-4">
                        <h5><a href="{{ url('product-item/'.$order_detail->productItemPrice->productItem->id) }}">{{ $order_detail->productItemPrice->productItem->name }} ({{ $order_detail->productItemPrice->title }})</a>
                        </h5>
                        <ul class="qty disable-select" data-id="{{ $order_detail->productItemPrice->id }}">
                            <li>
                                <p>
                                    จำนวน :
                                    <span class="item-qty">{{ $order_detail->qty }}</span>
                                </p>
                            </li>
                            <li>
                                <p>ราคาต่อชิ้น : <span class="totalprice">{!! number_format($order_detail->productItemPrice->price, 2) !!}</span>.-</p>
                            </li>
                            {{-- <li><i class="fas fa-tags text-danger"></i> โปรโมชั่น : {{ @$order_detail->productItemPrice->productItem->promotion->title }}
                            </li> --}}
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            @endforeach

        </div>


        <div class="col-12 col-sm-12 col-md-4">
            <h4>สรุปรายการสั่งซื้อ</h4>
            <div class="checkout-total mt-4">
                {{-- โชว์รายละเอียดสรุปทั้งหมด --}}
                <ul class="summaryList">
                    @php
                    $sum = 0;
                    @endphp
                    @foreach ($order->orderDetail as $order_detail)
                    @php
                    $sum+= $order_detail->productItemPrice->price * $order_detail->qty;
                    @endphp
                    <li>{{ $order_detail->productItemPrice->productItem->name }} ({{ $order_detail->productItemPrice->title }}) <span class="totalprice">{!!
                            number_format($order_detail->productItemPrice->price * $order_detail->qty, 2) !!} </span>
                    </li>
                    @endforeach
                    <li>ค่าจัดส่ง <span class="totalprice">55.00</span></li>
                    <li class="total-cart">ราคารวม <span class="totalAll">{{ number_format($sum+55.00, 2) }}</span></li>
                </ul>
            </div>
            <a class="col-12 btn btn-warning" href="{{ url('confirm-payment') }}">แจ้งการโอนเงิน</a>
        </div>

        <div class="col-12 mt-5">
            <strong>รายละเอียดการแจ้งโอนเงิน</strong>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>วันที่แจ้ง</th>
                        <th>รายละเอียดการโอน</th>
                        <th>ไฟล์แนบ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->confirmPayment as $confirm_payment)
                    <tr>
                        <td>{{ DBToDate($confirm_payment->created_at,true,true) }} น.</td>
                        <td>
                            <div>วันที่ชำระเงิน : {{ $confirm_payment->payment_date }}</div>
                            <div>เวลา(โดยประมาณ) :
                                {{ $confirm_payment->payment_hour }}:{{ $confirm_payment->payment_minute }}</div>
                            <div>โอนเงินจากธนาคาร  : {{ $confirm_payment->bank_from }}</div>
                            <div>ไปยังบัญชีธนาคาร  : {{ $confirm_payment->bank_to }}</div>
                            <div>จำนวนเงิน : {{ $confirm_payment->payment_amount }}</div>
                            <div>ชื่อผู้แจ้ง : {{ $confirm_payment->name }}</div>
                            <div>อีเมล์ : {{ $confirm_payment->email }}</div>
                            <div>เบอร์มือถือ : {{ $confirm_payment->tel }}</div>
                            <div>ที่อยู่สำหรับการจัดส่ง : {{ $confirm_payment->description }}</div>
                        </td>
                        <td>
                            @if($confirm_payment->payment_attach)
                            <a href="{{ url('uploads/payment-attach/'.$confirm_payment->payment_attach) }}"
                                target="_blank"><i class="fas fa-file-download"></i> download</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-12 mt-5">
            <strong>รายละเอียดการจัดส่งสินค้า</strong>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>วันที่จัดส่งสินค้า</th>
                        <th>Tracking Number</th>
                        <th>ไฟล์แนบ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->tracking_date }}</td>
                        <td>{{ $order->tracking_number }}</td>
                        <td>
                            @if($order->image)
                            <a href="{{ url('uploads/order/'.$order->image) }}" target="_blank"><i
                                    class="fas fa-file-download"></i> download</a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!--########## END checkout ########-->


</div>

<div class="title-page">หมายเลขการสั่งซื้อ {{ sprintf('%08d', $order->id) }}</div>
@endsection
