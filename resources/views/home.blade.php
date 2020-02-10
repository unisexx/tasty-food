@extends('layouts.front')

@section('content')

<!--########################### START SLIDE ###########################-->
<div class="row m-0">
    <div class="container mt-4">
        <div id="slide" class="carousel slide" data-ride="carousel" data-interval="false">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                @foreach($hilights as $key => $hilight)
                <li data-target="#slide" data-slide-to="{{ $key }}" class="@if($key == 0) active @endif"></li>
                @endforeach
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner" style="position: relative;">
                @foreach($hilights as $key => $hilight)
                <div class="carousel-item @if($key == 0) active @endif">
                    <img src="{{ url('uploads/hilight/'.$hilight->image) }}" class="img-fluid"
                        alt="{{ $hilight->title }}">
                </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#slide" data-slide="prev">
                <img src="{{ url('chc/images/arrow-products-slide-back.png') }}" alt="">
            </a>
            <a class="carousel-control-next" href="#slide" data-slide="next">
                <img src="{{ url('chc/images/arrow-products-slide-next.png') }}" alt="">
            </a>

        </div>
    </div>
</div>
<!--########################### END SLIDE ###########################-->
<!--########################## START WELCOME ##########################-->
<div class="row m-0">
    <div class="container mt-5">
        <div class="title-welcome-home">ยินดีต้อนรับสู่ ร้าน CHC</div>
        <div class="text-center"><img class="img-fluid" src="{{ url('chc/images/line-white.jpg') }}" alt=""></div>
        <p class="title2-welcome-home">ทางร้านจำหน่ายสินค้าอาหารเสริม วิตามิน เวชสำอางราคาถูก ทั้งปลีกและส่ง ทุกรายการสินค้าเป็นของแท้แน่นอน</p>
        @foreach($banners as $banner)
            @if($banner->url) <a href="{{ $banner->url }}" target="_blank"> @endif
            <img class="img-fluid mt-2 mb-2" src="{{ url('uploads/banner/'.@$banner->image) }}">
            @if($banner->url) </a> @endif
        @endforeach
        <p class="title3-welcome-home">ทางร้านจัดส่งสินค้าทุกวัน...<br>
            และแจ้งเลขพัสดุให้ทุกท่านก่อนเวลา...</p>
    <div class="text-center">
        <img src="{{ url('chc/images/icon-van.png') }}" alt="" class="pr-2"><span class="title5-welcome-home">ส่งจริง ส่งไว ได้ของชัวร์</span>
        <img src="{{ url('chc/images/icon-phone.png') }}" alt="" class="pl-4 pr-2"><span class="title6-welcome-home">081-1234567</span>
        <img src="{{ url('chc/images/icon-line.png') }}" alt="" class="pl-4 pr-2"><span class="title6-welcome-home">@chc</span>
    </div>

    </div>
</div>
<!--########################### END WELCOME ###########################-->
<!--########################## START สินค้ามาใหม่ ##########################-->
<div class="row m-0">
    <div class="container mt-5">
        <div class="title4-welcome-home">สินค้ามาใหม่</div>
        <div class="row mx-auto my-auto products">

        @foreach($newitems as $product_item)
            <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                <p class="name-product">{{ $product_item->name }}</p>
            <img class="img-fluid" src="{{ url('uploads/product-item/'.@$product_item->productImageFirst->name) }}">
                <div class="link">
                    <ul>
                        <li>
                            <div class="buy add1 item_add" data-id="{{ $product_item->id }}" data-qty="1">
                                <img src="{{ url('chc/images/icon-cart.png') }}" alt="" class="icon-buy"> <span class="text-white">Buy</span> <div class="carousel-control-next-icon i-buy"></div></a>
                            </div>
                        </li>
                        <li> <a class="go-detail" href="{{ url('product-item/'.$product_item->id) }}"><img src="{{ url('chc/images/icon-go-detail.png') }}" alt=""> Detail</a></li>
                    </ul>
                </div>
                <p class="price">{{ show_price($product_item) }}.-</p>
            </div>
        @endforeach
        
    </div>

    </div>
</div>
<!--########################### END สินค้ามาใหม่ ###########################-->
<!--########################## START สินค้าขายดี ##########################-->
<div class="row m-0">
    <div class="container mt-5">
        <div class="title4-welcome-home">สินค้าขายดี</div>
        <div class="row mx-auto my-auto products">

            @foreach($bestitems as $product_item)
                <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                    <p class="name-product">{{ $product_item->name }}</p>
                <img class="img-fluid" src="{{ url('uploads/product-item/'.@$product_item->productImageFirst->name) }}">
                    <div class="link">
                        <ul>
                            <li>
                                <div class="buy add1 item_add" data-id="{{ $product_item->id }}" data-qty="1">
                                    <img src="{{ url('chc/images/icon-cart.png') }}" alt="" class="icon-buy"> <span class="text-white">Buy</span> <div class="carousel-control-next-icon i-buy"></div></a>
                                </div>
                            </li>
                            <li> <a class="go-detail" href="{{ url('product-item/'.$product_item->id) }}"><img src="{{ url('chc/images/icon-go-detail.png') }}" alt=""> Detail</a></li>
                        </ul>
                    </div>
                    <p class="price">{{ show_price($product_item) }}.-</p>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!--########################### END สินค้าขายดี ###########################-->
<!--########################## START BANNER PRODUCT ##########################-->
{{-- <div class="row m-0">
    <div class="container mt-5 banner-product">
        <div class="title-banner"><img src="{{ url('chc/images/icon-thumbs-up.png') }}" alt="" class="icon-thumbs-up"> OUR PRODUCTS</div>
        @foreach($product_categories as $product_category)
            <a href="{{ url('product-category/'.$product_category->id) }}"><img src="{{ url('uploads/product-category/'.$product_category->image) }}" alt="{{ $product_category->name }}" class="img-fluid mb-5"></a>
        @endforeach
    </div>
</div> --}}
<!--########################### END BANNER PRODUCT ###########################-->
<!--########################## START BANNER PROMOTION ##########################-->
<div class="row mt-5">
    <div class="container mt-4">
        <div class="title-promotion"><span class="bg-title-promotion"><img src="{{ url('chc/images/icon-black-star.png') }}" alt="" class="icon-black-star"> PROMOTION</span></div>
        <hr class="line1">
        <div class="row mt-5 banner-promotion">
            @foreach ($promotions as $promotion)
                <div class="col-12 col-sm-4 col-md-4">
                    <a href="{{ url('promotion') }}"><img src="{{ url('uploads/promotion/'.$promotion->image) }}" alt="" class="w-100 img-fluid mb-5"></a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--########################## END BANNER PROMOTION ##########################-->

@endsection
