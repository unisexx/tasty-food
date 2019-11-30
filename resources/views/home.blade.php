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
<!--########################## START BANNER PRODUCT ##########################-->
<div class="row m-0">
    <div class="container mt-5 banner-product">
        <div class="title-banner"><img src="{{ url('chc/images/icon-thumbs-up.png') }}" alt="" class="icon-thumbs-up"> OUR PRODUCTS</div>
        @foreach($product_categories as $product_category)
            <a href="{{ url('product-category/'.$product_category->id) }}"><img src="{{ url('uploads/product-category/'.$product_category->image) }}" alt="{{ $product_category->name }}" class="img-fluid mb-5"></a>
        @endforeach
    </div>
</div>
<!--########################### END BANNER PRODUCT ###########################-->
<!--########################## START BANNER PROMOTION ##########################-->
<div class="row m-0">
    <div class="container mt-4">
        <div class="title-promotion"><span class="bg-title-promotion"><img src="{{ url('chc/images/icon-black-star.png') }}" alt="" class="icon-black-star"> PROMOTION</span></div>
        <hr class="line1">
        <div class="row mt-5 banner-promotion">
            <div class="col-12 col-sm-4 col-md-4">
                <a href="#"><img src="images/banner-ad01.jpg" alt="" class="w-100 img-fluid mb-5"></a>
            </div>
            <div class="col-12 col-sm-4 col-md-4">
                <a href="#"><img src="images/banner-ad02.jpg" alt="" class="w-100 img-fluid mb-5"></a>
            </div>
            <div class="col-12 col-sm-4 col-md-4">
                <a href="#"><img src="images/banner-ad03.jpg" alt="" class="w-100 img-fluid mb-5"></a>
            </div>
        </div>
    </div>
</div>
<!--########################## END BANNER PROMOTION ##########################-->

@endsection
