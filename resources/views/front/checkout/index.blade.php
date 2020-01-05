@extends('layouts.front')

@section('content')

{{-- {{ dd($carts) }} --}}
<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
        <hr class="line2">
        </hr>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bread justify-content-end">
                <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">ตะกร้าสินค้า</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">ตะกร้าสินค้า</div>
        <!--########## START checkout ########-->
        <div class="row bg-white p-4">
            <div class="col-12 col-sm-12 col-md-8 cart-area">

                @foreach ($carts as $cart)
                    <div class="cart-header mb-4">
                        <div class="close1"> </div>
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc">
                                <img src="{{ url('uploads/product-item/'.@$cart->productItem->productImageFirst->name) }}" class="img-fluid" alt="">
                            </div>
                            <div class="cart-item-info pt-4">
                                <h5><a href="{{ url('product-item/'.$cart->productItem->id) }}">{{ $cart->productItem->name }}</a></h5>
                                <ul class="qty disable-select" data-id="{{ $cart->productItem->id }}">
                                    <li>
                                        <p>
                                            จำนวน : 
                                            <i class="fas fa-minus-circle text-danger pointer decrease"></i>
                                            <span class="item-qty">{{ $cart->qty }}</span>
                                            <i class="fas fa-plus-circle text-danger pointer increase"></i>
                                        </p>
                                    </li>
                                    <li>
                                        <p>ราคาต่อชิ้น : <span class="totalprice">{!! number_format(show_price($cart->productItem), 2) !!}</span>.-</p>
                                    </li>
                                    <li><i class="fas fa-tags text-danger"></i> โปรโมชั่น : {{ $cart->productItem->promotion->title }}</li>
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
                <a class="col-12 btn btn-success" href="{{ url('checkout/finish') }}">checkout</a>
            </div>

        </div>

        <!--########## END checkout ########-->

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection

@push('js')
<script>
$(document).ready(function () {
    ajaxUpdateSummary();

    $(document).on('click', ".close1", function () {
        var $this = $(this);
        var productItemID = $this.parent().find('.qty').data('id');
        $.ajax({
            method: "GET",
            url: "{{ url('ajaxDeleteProductItem') }}",
            data: {
                product_item_id : productItemID
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
        var productItemID = $(this).closest('.qty').data('id');

        clickTimeout = setTimeout(function(){
            ajaxUpdateQty(productItemID,newItemQty);
        }, 500);
    });

    // กดปุ่มลบจำนวน
    $(document).on('click', ".decrease", function () {
        clearTimeout(clickTimeout);

        var itemqty = $(this).closest('.qty').find('.item-qty').text();
        if(itemqty > 1){
            $(this).closest('.qty').find('.item-qty').text( parseInt(itemqty)-1 );
            var newItemQty = parseInt(itemqty)-1;
            var productItemID = $(this).closest('.qty').data('id');

            clickTimeout = setTimeout(function(){
                ajaxUpdateQty(productItemID,newItemQty);
            }, 500);
        }
    });

});

function ajaxUpdateQty(product_item_id, qty){
    $.ajax({
        method: "GET",
        url: "{{ url('ajaxUpdateQty') }}",
        data: {
            product_item_id : product_item_id,
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

</script>
@endpush