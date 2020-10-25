@extends('layouts.front')

@push('slogan')
<div class="container">
    <div class="row pt-3 pb-3">
        <div class="col-md-5 slogan p-0">จำหน่าย วิตามิน เวชสำอาง อุปกรณ์การแพทย์</div>
        <div class="col-md-7 row justify-content-end">
            <div class="col-md-5 p-0-slogan"><div class="slogan-2 text-center"><img src="images/icon-truck.png" alt=""> ส่งจริง ส่งไว ได้ของชัวร์</div></div>
            <div class="col-md-4"><div class="slogan-3 text-center"><img src="images/icon-call.png" alt=""> 081-1234567</div></div>
            <div class="col-md-2 p-0-slogan"><div class="slogan-3 w-slogan-3 text-center tracking"> ติดตาม สินค้า</div></div>
        </div>
    </div>
</div>
@endpush


@section('content')
<!--########################### START SLIDE ###########################-->
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
<!--########################### END SLIDE ###########################-->
</div>
    <div class="col-sm-12 col-md-3 col-lg-fix2">
    <a href="#" ><img src="images/banner-facebook.jpg" alt="" class="w-100 pb-3 banner1"></a>
    <a href="#" ><img src="images/banner-line.jpg" alt="" class="w-100 pb-3 banner2"></a>
    <iframe src="https://www.youtube.com/embed/wL5Jhpy7gCE" class="banner3" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<!--########################### END SLIDE ###########################-->
@endsection


@push('fullwidth')
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
        <div class="header-gradient-2 mb-4">สินค<sup class="superscript">้</sup>ามาใหม<sup class="superscript">่</sup></div>
        <div class="row mx-auto my-auto products">
            @foreach($newitems as $product_item)
                @include('include.__box_product', ['product_item' => $product_item])
            @endforeach
        </div>
    </div>
</div>
<!--########################### END สินค้ามาใหม่ ###########################-->
<!--########################## START สินค้าขายดี ##########################-->
<div class="row m-0">
    <div class="container mt-5">
        <div class="header-gradient-2 mb-4">สินค<sup class="superscript">้</sup>าขายดี</div>
        <div class="row mx-auto my-auto products">
            @foreach($bestitems as $product_item)
                @include('include.__box_product', ['product_item' => $product_item])
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
<div class="row mt-5 m-0">
    <div class="container mt-4">
        <div class="header-gradient-2"><div style="height: 1.02em;">PROMOTION</div></div>
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
@endpush
