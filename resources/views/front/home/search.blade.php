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
                <li class="breadcrumb-item active">สินค้า</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">ผลการค้นหาสินค้า "{{ request('searchtxt') }}"</div>

        <div class="row products m-4">
            @foreach($product_items as $product_item)
            <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products text-center simpleCart_shelfItem">
                <p class="name-product item_name">{{ $product_item->name }}</p>
                <img class="img-fluid item_image"
                    src="{{ url('uploads/product-item/'.@$product_item->productImageFirst->name) }}">
                <div class="link">
                    <ul>
                        <li>
                            <div class="buy add1 item_add" data-id="{{ $product_item->id }}" data-qty="1">
                                <img src="{{ url('chc/images/icon-cart.png') }}" alt="" class="icon-buy"> <span
                                    class="text-white">Buy</span>
                                <div class="carousel-control-next-icon i-buy"></div></a>
                            </div>
                        </li>
                        <li> <a class="go-detail" href="{{ url('product-item/'.$product_item->id) }}"><img
                                    src="{{ url('chc/images/icon-go-detail.png') }}" alt=""> Detail</a></li>
                    </ul>
                </div>
                <p class="price item_price">{{ $product_item->price }}.-</p>
                <div class="item_id invisible">{{ $product_item->id }}</div>
            </div>
            @endforeach
        </div>

        {!! $product_items->appends(@$_GET)->render() !!}

    </div>

</div>
<!--########################## END CONTENT ##########################-->

@endsection