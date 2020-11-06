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
    <div class="social-nav model-3d-0 social mt-4 mb-4 pl-0">Share on: <div class="sharethis-inline-share-buttons"></div></div>
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
    @if(@$knowledge->knowledgeProductItem)
        @foreach(@$knowledge->knowledgeProductItem as $item)
            @include('include.__box_product', ['product_item' => $item->productItem]);
        @endforeach
    @endif
</div>
<!--########## END สินค้าแนะนำ ########-->
</div>

<div class="col-xs-12 col-sm-12 col-md-3 col-lg-fix2">
    <!--########## START banner right ########-->
    <div class="banner-knowleage mt-5">
        @if(@$knowledge->knowledgeBanner)
            @foreach(@$knowledge->knowledgeBanner as $item)
                @if($item->banner->position == 2)
                    <a href="{{ @$item->banner->url }}">
                        <img src="{{ asset('uploads/banner/'.@$item->banner->image) }}" alt="{{ @$item->banner->title }}" class="pt-4 img-fluid rounded d-block mx-auto">
                    </a>
                @endif
            @endforeach
        @endif
    </div>
    <!--########## END banner right ########-->
</div>
<!--########## END ข้อมูลสุขภาพ ########-->

<!--########## START LINK BANNER ########-->
<div class="row w-100 mt-5">
    <div class="col-12">
        @if(@$knowledge->knowledgeBanner)
            @foreach(@$knowledge->knowledgeBanner as $item)
                @if($item->banner->position == 3)
                    <a href="{{ @$item->banner->url }}">
                        <img src="{{ asset('uploads/banner/'.@$item->banner->image) }}" alt="{{ @$item->banner->title }}" width="100%" class="rounded banner-km img-fluid">
                    </a>
                @endif
            @endforeach
        @endif
    </div>
</div>
<!--########## END LINK BANNER ########-->

@endsection
