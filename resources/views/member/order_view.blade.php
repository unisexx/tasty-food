@extends('layouts.front')

@section('content')

<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
        <hr class="line2">
        </hr>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bread justify-content-end">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{ url('member/order') }}">สถานะการสั่งซื้อ</a></li>
                <li class="breadcrumb-item active" aria-current="page">หมายเลขการสั่งซื้อ {{ sprintf('%08d', $order->id) }}</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">หมายเลขการสั่งซื้อ {{ sprintf('%08d', $order->id) }}</div>

        <!--########## START checkout ########-->
        <div class="row bg-white p-4">
            <div class="col-12 col-sm-12 col-md-8 cart-area">

                @foreach ($order->orderDetail as $order_detail)
                    <div class="cart-header mb-4">
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc">
                                <img src="{{ url('uploads/product-item/'.@$order_detail->productItem->productImageFirst->name) }}" class="img-fluid" alt="">
                            </div>
                            <div class="cart-item-info pt-4">
                                <h5><a href="{{ url('product-item/'.$order_detail->productItem->id) }}">{{ $order_detail->productItem->name }}</a></h5>
                                <ul class="qty disable-select" data-id="{{ $order_detail->productItem->id }}">
                                    <li>
                                        <p>
                                            จำนวน : 
                                            <span class="item-qty">{{ $order_detail->qty }}</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>ราคาต่อชิ้น : <span class="totalprice">{!! number_format($order_detail->productItem->price, 2) !!}</span>.-</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach

                <div class="simpleCart_items"></div>

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
                            $sum+= $order_detail->productItem->price * $order_detail->qty;
                        @endphp
                        <li>{{ $order_detail->productItem->name }} <span class="totalprice">{!! number_format($order_detail->productItem->price * $order_detail->qty, 2) !!} </span></li>
                        @endforeach
                        <li>ค่าจัดส่ง <span class="totalprice">55.00</span></li>
                        <li class="total-cart">ราคารวม <span class="totalAll">{{ number_format($sum+55.00, 2) }}</span></li>
                    </ul>
                </div>
                <a class="col-12 btn btn-warning" href="{{ url('confirm-payment') }}">แจ้งการโอนเงิน</a>
            </div>

        </div>
        <!--########## END checkout ########-->

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
