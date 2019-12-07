@extends('layouts.front')

@section('content')

<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
     <hr class="line2"></hr>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bread justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('product') }}">สินค้า</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('product-category/'.$product_category->parent->id) }}">{{ $product_category->parent->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product_category->name }}</li>
                </ol>
            </nav>

    <!-- END Breadcrump -->
    <div class="title-page">{{ $product_category->name }}</div>

    <div class="row products m-4">
        @foreach($product_items as $product_item)
        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products text-center">
            <p class="name-product">{{ $product_item->name }}</p>
            <img class="img-fluid" src="{{ url('uploads/product-item/'.@$product_item->productImageFirst->name) }}">
            <div class="link">
                <ul>
                    <li>
                        <div class="simpleCart_shelfItem buy">
                            <a class="add1 item_add" href="#"><img src="{{ url('chc/images/icon-cart.png') }}" alt="" class="icon-buy"> Buy
                                <div class="carousel-control-next-icon i-buy"></div>
                            </a>
                        </div>
                    </li>
                    <li> <a class="go-detail" href="{{ url('product-item/'.$product_item->id) }}"><img src="{{ url('chc/images/icon-go-detail.png') }}" alt=""> Detail</a></li>
                </ul>
            </div>
            <p class="price">{{ $product_item->price }}.-</p>
        </div>
        @endforeach
    </div>

    {!! $product_items->appends(@$_GET)->render() !!}

 </div>

</div>
<!--########################## END CONTENT ##########################-->

@endsection
