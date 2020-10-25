@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">สินค้า</li>
    </ol>
</nav>
@endpush

@section('content')
<!--########## START BEST SELLERS ########-->
<div class="title-page9 mb-4"><img src="images/icon-pink-star.png" alt="" class="icon-thumbs-up"> BEST SELLERS</div>
<div class="row mx-auto my-auto products">
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel" data-interval="false">
            <div class="carousel-inner" role="listbox">
                @foreach ($bestitems->chunk(4) as $skey=>$chunk)
                    <div class="carousel-item {{ $skey == 0 ? 'active' : '' }}">
                        @foreach($chunk as $product_item)
                            @include('include.__box_product', ['product_item' => $product_item])
                        @endforeach
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                <img src="images/arrow-slide-back.png" alt="">
            </a>
            <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                <img src="images/arrow-slide-next.png" alt="">
            </a>
        </div>
        {{-- <div class="col-12 viewall"><a href="#">ดูทั้งหมด</a></div> --}}
</div>
<!--########## END BEST SELLERS ########-->
@endsection

@push('fullwidth')
<div class="container">
    @foreach ($product_category as $parent_category)
    <!--########## START ผลิตภัณฑ์ดูแลผิวหน้า ผิวกาย ########-->
    <div class="{{ @titleArray($parent_category->id) }} pt-3 mt-4 mb-4"><img src="{{ asset('images/'.@iconArray($parent_category->id)) }}" alt="" class="icon-thumbs-up"> {{ $parent_category->name }}</div>

    <!-- Nav pills -->
    @if(count($parent_category->children) != 0)
    <div class="wrap-tab">
        <ul class="container nav nav-pills {{ @tabArray($parent_category->id) }}">
            @foreach ($parent_category->children as $key=>$sub_category)
                <li class="nav-item">
                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="pill" href="#tab_{{ $sub_category->id }}">{{ $sub_category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Tab panes -->
    <div class="tab-content">
        @foreach ($parent_category->children as $key=>$sub_category)
        <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="tab_{{ $sub_category->id }}">
            <div class="row mx-auto my-auto products">

                <div id="carousel_{{ $sub_category->id }}" class="carousel slide w-100" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" role="listbox">

                        @foreach ($sub_category->productItem->where('status', 1)->take(8)->chunk(4) as $skey=>$chunk)
                            <div class="carousel-item {{ $skey == 0 ? 'active' : '' }}">
                                @foreach($chunk as $product_item)
                                    @include('include.__box_product', ['product_item' => $product_item])
                                @endforeach
                            </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#carousel_{{ $sub_category->id }}" role="button" data-slide="prev">
                        <img src="{{ url('chc/images/arrow-slide-back.png') }}" alt="">
                    </a>
                    <a class="carousel-control-next" href="#carousel_{{ $sub_category->id }}" role="button" data-slide="next">
                        <img src="{{ url('chc/images/arrow-slide-next.png') }}" alt="">
                    </a>
                </div>

            </div>
            <div class="col-12 viewall"><a href="{{ url('product-category/'.$sub_category->id) }}">ดูทั้งหมด</a></div>
        </div>
        @endforeach
    </div>
    <!--*************** END tab ********************* -->
    <!--########## END ผลิตภัณฑ์ดูแลผิวหน้า ผิวกาย ########-->
    @endforeach
</div>
@endpush