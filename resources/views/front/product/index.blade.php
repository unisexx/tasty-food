@extends('layouts.front')

@section('content')

<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
        <hr class="line2">
        </hr>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bread justify-content-end">
                <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">สินค้า</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">สินค้า</div>

        <!--########## START BEST SELLERS ########-->
        {{-- <div class="title-page2 mb-4"><img src="images/icon-white-star.png" alt="" class="icon-thumbs-up"> BEST SELLERS
        </div>
        <div class="row mx-auto my-auto products">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel" data-interval="false">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                            <p class="name-product">Blackmores Marine Q10 60’S</p>
                            <img class="img-fluid" src="images/products/blackmores/blackmores_01.png">
                            <div class="link">
                                <ul>
                                    <li>
                                        <div class="simpleCart_shelfItem buy">
                                            <a class="add1 item_add" href="#"><img src="images/icon-cart.png" alt=""
                                                    class="icon-buy"> Buy
                                                <div class="carousel-control-next-icon i-buy"></div>
                                            </a>
                                        </div>
                                    </li>
                                    <li> <a class="go-detail" href="product_detail.html"><img
                                                src="images/icon-go-detail.png" alt=""> Detail</a></li>
                                </ul>
                            </div>
                            <p class="price">450.-</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                            <p class="name-product">Blackmores Marine Q10 60’S</p>
                            <img class="img-fluid" src="images/products/blackmores/blackmores_01.png">
                            <div class="link">
                                <ul>
                                    <li>
                                        <div class="simpleCart_shelfItem buy">
                                            <a class="add1 item_add" href="#"><img src="images/icon-cart.png" alt=""
                                                    class="icon-buy"> Buy
                                                <div class="carousel-control-next-icon i-buy"></div>
                                            </a>
                                        </div>
                                    </li>
                                    <li> <a class="go-detail" href="product_detail.html"><img
                                                src="images/icon-go-detail.png" alt=""> Detail</a></li>
                                </ul>
                            </div>
                            <p class="price">450.-</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                            <p class="name-product">Blackmores Marine Q10 60’S</p>
                            <img class="img-fluid" src="images/products/blackmores/blackmores_01.png">
                            <div class="link">
                                <ul>
                                    <li>
                                        <div class="simpleCart_shelfItem buy">
                                            <a class="add1 item_add" href="#"><img src="images/icon-cart.png" alt=""
                                                    class="icon-buy"> Buy
                                                <div class="carousel-control-next-icon i-buy"></div>
                                            </a>
                                        </div>
                                    </li>
                                    <li> <a class="go-detail" href="product_detail.html"><img
                                                src="images/icon-go-detail.png" alt=""> Detail</a></li>
                                </ul>
                            </div>
                            <p class="price">450.-</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                            <p class="name-product">Blackmores Marine Q10 60’S</p>
                            <img class="img-fluid" src="images/products/blackmores/blackmores_01.png">
                            <div class="link">
                                <ul>
                                    <li>
                                        <div class="simpleCart_shelfItem buy">
                                            <a class="add1 item_add" href="#"><img src="images/icon-cart.png" alt=""
                                                    class="icon-buy"> Buy
                                                <div class="carousel-control-next-icon i-buy"></div>
                                            </a>
                                        </div>
                                    </li>
                                    <li> <a class="go-detail" href="product_detail.html"><img
                                                src="images/icon-go-detail.png" alt=""> Detail</a></li>
                                </ul>
                            </div>
                            <p class="price">450.-</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                    <img src="images/arrow-slide-back.png" alt="">
                </a>
                <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                    <img src="images/arrow-slide-next.png" alt="">
                </a>
            </div>
            <div class="col-12 viewall"><a href="#">ดูทั้งหมด</a></div>
        </div> --}}
        <!--########## END BEST SELLERS ########-->




        @foreach ($product_category as $parent_category)
        <!--########## START ผลิตภัณฑ์ดูแลผิวหน้า ผิวกาย ########-->
        <div class="title-page5 pt-3 mt-4 mb-4"><img src="images/icon-face.png" alt="" class="icon-thumbs-up"> {{ $parent_category->name }}</div>

        <!-- Nav pills -->
        @if(count($parent_category->children) != 0)
        <div class="wrap-tab">
            <ul class="container nav nav-pills tab-product3">
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

                            @foreach ($sub_category->productItem->take(8)->chunk(4) as $skey=>$chunk)
                                <div class="carousel-item {{ $skey == 0 ? 'active' : '' }}">
                                    @foreach($chunk as $product_item)
                                    <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products simpleCart_shelfItem">
                                        <p class="name-product item_name">{{ $product_item->name }}</p>
                                        <img class="img-fluid item_image" src="{{ url('uploads/product-item/'.@$product_item->productImageFirst->name) }}">
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
                                        <p class="price item_price">{{ $product_item->price }}.-</p>
                                    </div>
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
</div>
<!--########################## END CONTENT ##########################-->

@endsection