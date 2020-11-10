@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">ตะกร้าสินค้า</li>
    </ol>
</nav>
@endpush

@section('content')
<form class="user col-12 col-sm-12 col-md-12 mx-auto" method="POST"
        action="{{ url('checkout/finish') }}" accept-charset="UTF-8">
        {{ csrf_field() }}


<!--########## START checkout ########-->
<div class="title-page7 mb-4"><i class="fa fa-edit black"></i> รายการสินค้า</div>
<div class="row bg-white mb-5">
    <div class="col-12 col-sm-12 col-md-8 cart-area">
        @foreach ($carts as $cart)
            <div class="cart-header mb-4">
                <div class="close1"> </div>
                <div class="cart-sec simpleCart_shelfItem">
                    <div class="cart-item cyc">
                        <img src="{{ url('uploads/product-item/'.@$cart->productItemPrice->productItem->productImageFirst->name) }}" class="img-fluid" alt="">
                    </div>
                    <div class="cart-item-info pt-4">
                        <h5><a href="{{ url('product-item/'.$cart->productItemPrice->productItem->id) }}">{{ $cart->productItemPrice->productItem->name }} ({{ $cart->productItemPrice->title }})</a></h5>
                        <ul class="qty disable-select" data-id="{{ $cart->productItemPrice->id }}">
                            <li>
                                <p>
                                    จำนวน : 
                                    <i class="fas fa-minus-circle text-danger pointer decrease"></i>
                                    <span class="item-qty">{{ $cart->qty }}</span>
                                    <i class="fas fa-plus-circle text-danger pointer increase"></i>
                                </p>
                            </li>
                            <li>
                                <p>ราคาต่อชิ้น : <span class="totalprice">{!! number_format(show_price($cart->productItemPrice), 2) !!}</span>.-</p>
                            </li>
                            {{-- <li><i class="fas fa-tags text-danger"></i> โปรโมชั่น : {{ $cart->productItemPrice->productItem->promotion->title }}</li> --}}
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        @endforeach
        <div class="simpleCart_items"></div>
    </div>
    <div class="col-12 col-sm-12 col-md-4">
        <a class="col-12 btn btn-warning" href="{{ url('product') }}">เลือกซื้อสินค้าต่อ</a>
        <div class="checkout-total mt-4">
            {{-- โชว์รายละเอียดสรุปทั้งหมด --}}
        </div>
        {{-- <a class="col-12 btn btn-success" href="{{ url('checkout/finish') }}">checkout</a> --}}
    </div>
</div>

<hr>
<div class="bg-white mt-5">
    <div class="title-page7 mb-4"><i class="fa fa-edit black"></i> ที่อยู่จัดส่ง</div>
    @if(Auth::check())
        @php
            $userAddress = App\Models\UserAddress::where('user_id', Auth::user()->id)->get();
        @endphp
    @endif
    <div class="form-row">
        @if(@count($userAddress))
        <div class="col-md-12 mb-3">
            <label for="s-title">ชื่อสถานที่</label>
            <select id="userAddressId" class="form-control">
                @foreach($userAddress as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="col-md-8 mb-3">
            <label for="s-name">ชื่อผู้รับสินค้า</label>
            <input id="s-name" name="addr_name" type="text" class="form-control" placeholder="ชื่อผู้รับสินค้า" value="{{ @$rs->name }}" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="s-tel">เบอร์โทรศัพท์ที่ติดต่อได้</label>
            <input id="s-tel" name="addr_tel" type="text" class="form-control" placeholder="เบอร์โทรศัพท์ที่ติดต่อได้" value="{{ @$rs->tel }}" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label for="s-address">ที่อยู่จัดส่ง</label>
            <input id="s-address" name="addr_address" type="text" class="form-control" placeholder="ที่อยู่จัดส่ง" value="{{ @$rs->address }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="tumbon">ตำบล / แขวง</label>
            <input class="form-control" type="text" id="tumbon" placeholder="ตำบล" name="addr_tumbon" value="{{ @$rs->tumbon }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="amphoe">อำเภอ / เขต</label>
            <input class="form-control" type="text" id="amphoe" placeholder="อำเภอ" name="addr_amphoe" value="{{ @$rs->amphoe }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="province">จังหวัด</label>
            <input class="form-control" type="text" id="province" placeholder="จังหวัด" name="addr_province" value="{{ @$rs->province }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="zipcode">รหัสไปรษณีย์</label>
            <input class="form-control" type="text" id="zipcode" placeholder="รหัสไปรษณีย์" name="addr_zipcode" value="{{ @$rs->zipcode }}" required>
        </div>
    </div>
</div>
<!--########## END checkout ########-->

<button type="submit" class="col-12 btn btn-lg btn-success mt-5">ยืนยันการสั่งซื้อสินค้า</button>

</form>
@endsection

@push('js')
<script>
$(document).ready(function () {
    ajaxUpdateSummary();

    $(document).on('click', ".close1", function () {
        var $this = $(this);
        var productItemPriceID = $this.parent().find('.qty').data('id');
        $.ajax({
            method: "GET",
            url: "{{ url('ajaxDeleteProductItem') }}",
            data: {
                product_item_price_id : productItemPriceID
            }
        }).done(function(data) {
            $this.parent().fadeOut('slow', function () {
                $this.remove();
                ajaxUpdateSummary();
                updateCartNumber();
            });
        });
    });


    var clickTimeout;
    // กดปุ่มเพิ่มจำนวน
    $(document).on('click', ".increase", function () {
        clearTimeout(clickTimeout);

        var itemqty = $(this).closest('.qty').find('.item-qty').text();
        $(this).closest('.qty').find('.item-qty').text( parseInt(itemqty)+1 );
        var newItemQty = parseInt(itemqty)+1;
        var productItemPriceID = $(this).closest('.qty').data('id');

        clickTimeout = setTimeout(function(){
            ajaxUpdateQty(productItemPriceID,newItemQty);
        }, 500);
    });

    // กดปุ่มลบจำนวน
    $(document).on('click', ".decrease", function () {
        clearTimeout(clickTimeout);

        var itemqty = $(this).closest('.qty').find('.item-qty').text();
        if(itemqty > 1){
            $(this).closest('.qty').find('.item-qty').text( parseInt(itemqty)-1 );
            var newItemQty = parseInt(itemqty)-1;
            var productItemPriceID = $(this).closest('.qty').data('id');

            clickTimeout = setTimeout(function(){
                ajaxUpdateQty(productItemPriceID,newItemQty);
            }, 500);
        }
    });

    // โหลดที่อยู่จัดส่ง
    ajaxLoadUserAddress();
    $(document).on('change', "#userAddressId", function () {
        ajaxLoadUserAddress();
    });

});

function ajaxUpdateQty(product_item_price_id, qty){
    $.ajax({
        method: "GET",
        url: "{{ url('ajaxUpdateQty') }}",
        data: {
            product_item_price_id : product_item_price_id,
            qty : qty,
        }
    }).done(function(data) {
        ajaxUpdateSummary();
        updateCartNumber();
    });
}

function ajaxUpdateSummary(){
    $(".checkout-total").LoadingOverlay("show", {
        background  : "rgba(255, 255, 255, 0.8)"
    });
    $(".checkout-total").LoadingOverlay("show");

    $.ajax({
        method: "GET",
        url: "{{ url('ajaxUpdateSummary') }}"
    }).done(function(data) {
        $('.checkout-total').html(data);
        $(".checkout-total").LoadingOverlay("hide", true);
    });
}

function ajaxLoadUserAddress(){
    var id = $( "#userAddressId option:selected" ).val();
    $.ajax({
        method: "GET",
        url: "{{ url('ajaxGetUserAddressData') }}",
        data: {
            id : id,
        }
    }).done(function(data) {
        console.log(data);
        $("input[name='addr_name']").val(data.name);
        $("input[name='addr_tel']").val(data.tel);
        $("input[name='addr_address']").val(data.address);
        $("input[name='addr_tumbon']").val(data.tumbon);
        $("input[name='addr_amphoe']").val(data.amphoe);
        $("input[name='addr_province']").val(data.province);
        $("input[name='addr_zipcode']").val(data.zipcode);
    });
}
</script>
@endpush