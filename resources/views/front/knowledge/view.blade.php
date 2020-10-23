@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item"><a href="{{ url('knowledge') }}">ข้อมูลสุขภาพ</a></li>
        <li class="breadcrumb-item"><a href="{{ url('knowledge?category='.@$knowledge->knowledgeCategory->id) }}">{{ @$knowledge->knowledgeCategory->title }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ @$knowledge->title }}</li>
    </ol>
</nav>
@endpush

@section('content')

<!--########## START ข้อมูลสุขภาพ ########-->
<div class="mt-4 about">

    <div class="w-100 title6-km pl-3 bg-lightgreen">ข้อมูลสุขภาพ
        <div class="row float-right">
            <div class="col-md-6">
                <a href="{{ $contact->line }}"><img src="{{ asset('images/line-add-friend.png') }}" alt=""
                        class="float-right"></a>
            </div>
            <div class="col-md-6">
                <a href="{{ $contact->facebook }}"><img src="{{ asset('images/facebook-add-friend.png') }}" alt=""></a>
            </div>
        </div>
    </div>
    <div class="mt-2 mb-4 border-title">{{ @$knowledge->title }}</div>
    <img src="{{ asset('uploads/knowledge/'.$knowledge->image) }}" alt="" class="img-fluid rounded">
    <ul class="social-nav model-3d-0 social mt-4 mb-4 pl-0">
        <li class="share">Share On : </li>
        <li>
            <a href="#" class="facebook">
                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
            </a>
        </li>
        <li>
            <a href="#" class="twitter">
                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
            </a>
        </li>
        <li>
            <a href="#" class="line">
                <div class="front"><i class="fa fa-line" aria-hidden="true"></i></div>
                <div class="back"><i class="fa fa-line2" aria-hidden="true"></i></div>
            </a>
        </li>
        <li>
            <a href="#" class="instagram">
                <div class="front"><i class="fa fa-instagram" style="font-size:16px; margin-top:2px;"
                        aria-hidden="true"></i></div>
                <div class="back"><i class="fa fa-instagram" style="font-size:16px; margin-top:2px;"
                        aria-hidden="true"></i></div>
            </a>
        </li>
    </ul>
    {!! $knowledge->detail !!}
</div>

<hr class="line4">
<div class="title2-about-detail pt-2">แท็กที่เกี่ยวข้อง</div>
@php
    $tags = explode(",", $knowledge->tags);
@endphp
@foreach ($tags as $item)
    <a href="#" class="btn btn-secondary btn-sm mb-2" role="button" aria-disabled="true">{{ $item }}</a>
@endforeach
<hr class="line4 ">

<!--########## START สินค้าแนะนำ ########-->
<div class="mb-4 header-gradient"> สินค้าแนะนำ</div>

<div class="row mx-auto my-auto products">
    <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products_recommended">
        <p class="name-product">ปรอทวัดไข้ อัตโนมัติ</p>
        <img class="img-fluid height_recommended" src="images/products/medical_instruments/medical_instruments_04.png">
        <div class="link">
            <ul>
                <li>
                    <div class="simpleCart_shelfItem buy">
                        <a class="add1 item_add" href="#"><img src="images/icon-cart.png" alt="" class="icon-buy"> Buy
                            <div class="carousel-control-next-icon i-buy"></div>
                        </a>
                    </div>
                </li>
                <li> <a class="go-detail" href="product_detail.html"><img src="images/icon-go-detail.png" alt="">
                        Detail</a></li>
            </ul>
        </div>
        <p class="price">775.-</p>
    </div>
    <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products_recommended">
        <p class="name-product">name nmame</p>
        <img class="img-fluid height_recommended" src="images/210x210.jpg">
        <div class="link">
            <ul>
                <li>
                    <div class="simpleCart_shelfItem buy">
                        <a class="add1 item_add" href="#"><img src="images/icon-cart.png" alt="" class="icon-buy"> Buy
                            <div class="carousel-control-next-icon i-buy"></div>
                        </a>
                    </div>
                </li>
                <li> <a class="go-detail" href="product_detail.html"><img src="images/icon-go-detail.png" alt="">
                        Detail</a></li>
            </ul>
        </div>
        <p class="price">000.-</p>
    </div>
    <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products_recommended">
        <p class="name-product">name nmame</p>
        <img class="img-fluid height_recommended" src="images/210x210.jpg">
        <div class="link">
            <ul>
                <li>
                    <div class="simpleCart_shelfItem buy">
                        <a class="add1 item_add" href="#"><img src="images/icon-cart.png" alt="" class="icon-buy"> Buy
                            <div class="carousel-control-next-icon i-buy"></div>
                        </a>
                    </div>
                </li>
                <li> <a class="go-detail" href="product_detail.html"><img src="images/icon-go-detail.png" alt="">
                        Detail</a></li>
            </ul>
        </div>
        <p class="price">000.-</p>
    </div>
    <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products_recommended">
        <p class="name-product">name nmame</p>
        <img class="img-fluid height_recommended" src="images/210x210.jpg">
        <div class="link">
            <ul>
                <li>
                    <div class="simpleCart_shelfItem buy">
                        <a class="add1 item_add" href="#"><img src="images/icon-cart.png" alt="" class="icon-buy"> Buy
                            <div class="carousel-control-next-icon i-buy"></div>
                        </a>
                    </div>
                </li>
                <li> <a class="go-detail" href="product_detail.html"><img src="images/icon-go-detail.png" alt="">
                        Detail</a></li>
            </ul>
        </div>
        <p class="price">000.-</p>
    </div>
</div>
<!--########## END สินค้าแนะนำ ########-->
</div>

<div class="col-xs-12 col-sm-12 col-md-3 col-lg-fix2">
    <!--########## START banner right ########-->
    <div class="banner-knowleage mt-5">
        <a href="#"><img src="{{ asset('images/banner_knowledge_004.jpg') }}" alt=""
                class="pt-4 img-fluid rounded d-block mx-auto"></a>
        <a href="#"><img src="{{ asset('images/banner_knowledge_005.jpg') }}" alt=""
                class="pt-4 img-fluid rounded d-block mx-auto"></a>
        <a href="#"><img src="{{ asset('images/banner_knowledge_006.jpg') }}" alt=""
                class="pt-4 img-fluid rounded d-block mx-auto"></a>
        <a href="#"><img src="{{ asset('images/banner_knowledge_007.jpg') }}" alt=""
                class="pt-4 img-fluid rounded d-block mx-auto"></a>
    </div>
    <!--########## END banner right ########-->
</div>
<!--########## END ข้อมูลสุขภาพ ########-->

<!--########## START LINK BANNER ########-->
<div class="row w-100 mt-5">
    <div class="col-12">
        <a href="#"><img src="http://placehold.it/1048x150" width="100%" class="rounded banner-km img-fluid"></a>
    </div>
</div>
<!--########## END LINK BANNER ########-->

@endsection
