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
                <li class="breadcrumb-item"><a href="{{ url('product') }}">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product_category->name }}</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">{{ $product_category->name }}</div>

        <!--########## START ผลิตภัณฑ์ดูแลผิวหน้า ผิวกาย ########-->

        <!-- Nav pills -->
        <div class="wrap-tab mt-5">
            <ul class="container nav nav-pills tab-product3">
                @foreach ($product_category->children as $key=>$children_category)
                    <li class="nav-item">
                        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="pill" href="#tab_{{ $key }}">{{ $children_category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content text-center">

            @foreach ($product_category->children as $key=>$children_category)
            <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="tab_{{ $key }}">
                <div class="row mx-auto my-auto products">
                    @foreach ($children_category->productItem->take(8) as $product_item)
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
                                <li>
                                    <a class="go-detail" href="{{ url('product-item/'.$product_item->id) }}"><img src="{{ url('chc/images/icon-go-detail.png') }}" alt=""> Detail</a>
                                </li>
                            </ul>
                        </div>
                        <p class="price">{{ $product_item->prict }}.-</p>
                    </div>
                    @endforeach
                </div>
                <a href="{{ url('product-category/'.$children_category->id) }}" class="btn btn-info mt-5" role="button">ดูเพิ่ม ></a>
            </div>
            @endforeach

        </div>
        <!--*************** END tab ********************* -->
        <!--########## END ผลิตภัณฑ์ดูแลผิวหน้า ผิวกาย ########-->


    </div>

</div>
<!--########################## END CONTENT ##########################-->

@endsection
