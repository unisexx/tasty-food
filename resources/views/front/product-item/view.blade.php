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
                <li class="breadcrumb-item"><a href="{{ url('product-category/'.$product_item->productCategory->id) }}">{{ $product_item->productCategory->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product_item->name }}</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">{{ $product_item->name }}</div>
        <div class="row mt-4">
            <div class="col-12 col-sm-12 col-md-6 single-right-left bg-white">

                <div id="main_area">

                    <div class="row">
                        <div id="slider">
                            <!-- Top part of the slider -->
                            <div class="row">
                                <div id="carousel-bounding-box">
                                    <div class="carousel slide" id="myCarousel">
                                        <!-- Carousel items -->
                                        <div class="carousel-inner slides flex-viewport">
                                            @foreach($product_item->productImage as $key=>$image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-slide-number="{{ $key }}">
                                                <img src="{{ url('uploads/product-item/'.$image->name) }}">
                                            </div>
                                            @endforeach
                                        </div><!-- Carousel nav -->
                                        <a class="carousel-control-prev" href="#myCarousel" role="button"data-slide="prev">
                                            <img src="{{ url('chc/images/arrow-slide-back.png') }}" alt="">
                                        </a>
                                        <a class="carousel-control-next" href="#myCarousel" role="button"data-slide="next">
                                            <img src="{{ url('chc/images/arrow-slide-next.png') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Slider-->
                    </div>

                    <div class="">
                        <div id="myCarousel3" class="carousel slide" data-interval="false">
                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                @foreach($product_item->productImage->chunk(3) as $key=>$chunk)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="row-fluid">
                                        <div class="row-center flex-control-nav flex-control-thumbs size-thumb">
                                            @foreach($chunk as $skey=>$image)
                                            <a class="thumbnail cursor thumbnail-modifier" id="carousel-selector-{{ $skey }}">
                                                <img src="{{ url('uploads/product-item/thumb/'.$image->name) }}">
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!--/row-fluid-->
                                </div>
                                <!--/item-->
                                @endforeach

                            </div>
                            <!--/carousel-inner-->
                            <a class="carousel-control-prev" href="#myCarousel3" role="button" data-slide="prev">
                                <img src="{{ url('chc/images/arrow-slide-back.png') }}" alt="">
                            </a>
                            <a class="carousel-control-next" href="#myCarousel3" role="button" data-slide="next">
                                <img src="{{ url('chc/images/arrow-slide-next.png') }}" alt="">
                            </a>

                        </div>
                        <!--/myCarousel-->

                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-6 bg-white p-4">
                <h3><span class="brand-title-product-detail">{{ $product_item->brand }}</span></h3>
                <h4><span class="title-product-detail">{{ $product_item->name }}</span></h4>
                <div class="price2">฿ {{ show_price($product_item) }}</div>
                <div class="row">
                    <label class="col-4 col-sm-3 col-md-3 col-form-label">
                        <h5>จำนวน :</h5>
                    </label>
                    <input class="col-2 form-control item_product_qty" type="number" step="1" min="1" value="1">
                </div>
                <input type="button" name="submit" value="Add to cart" class="button add mt-4 mb-4 item_add" data-id="{{ $product_item->id }}" data-qty="1">
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
                </ul>
            </div>
        </div>
        <!-- START DESCRIPTION -->
        <div class="title-page7 pt-3 mt-4 mb-4"><i class="fa fa-edit black"></i> รายละเอียดสินค้า</div>
        <div class="row p-detail from-editor-area">
            {!! $product_item->description !!}
        </div>
        <!-- END DESCRIPTION -->

        <!--########## START COMMENT ########-->
        <div class="title-page7 pt-3 mt-4 mb-4"><i class="fa fa-commenting-o black"></i> ความคิดเห็น</div>
        <div class="row">
            <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10"></div>
        </div>
        <!--########## END COMMENT ########-->

    </div>
</div>
<!--########################## END CONTENT ##########################-->


<!--########## START RELATED ########-->
<div class="container mt-4">
    <div class="col-sm-12 mb-4 mt-4">
        <h4 class="title-page7">RELATED PRODUCTS</h4>
        <div class="col-12 viewall" style="margin-top:-40px;"><a href="{{ url('product-category/'.$product_item->productCategory->id) }}">ดูทั้งหมด</a></div>
    </div>
    <div class="row mx-auto my-auto products">
        <div id="carouselRelated" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner" role="listbox">

                @foreach ($related_items->chunk(4) as $skey=>$chunk)
                <div class="carousel-item {{ $skey == 0 ? 'active' : '' }}">
                    <div class="row p-0 m-0">
                        @foreach($chunk as $related_product_item)
                        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products2">
                            <p class="name-product">{{ $related_product_item->name }}</p>
                            <img class="img-fluid" src="{{ url('uploads/product-item/'.@$related_product_item->productImageFirst->name) }}">
                            <div class="link">
                                <ul>
                                    <li>
                                        <div class="buy add1 item_add" data-id="{{ $related_product_item->id }}" data-qty="1">
                                            <img src="{{ url('chc/images/icon-cart.png') }}" alt="" class="icon-buy"> <span class="text-white">Buy</span> <div class="carousel-control-next-icon i-buy"></div></a>
                                        </div>
                                    </li>
                                    <li> <a class="go-detail" href="{{ url('product-item/'.$related_product_item->id) }}"><img src="{{ url('chc/images/icon-go-detail.png') }}" alt=""> Detail</a></li>
                                </ul>
                            </div>
                            <p class="price">{{ show_price($related_product_item) }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselRelated" role="button" data-slide="prev">
                <img src="{{ url('chc/images/arrow-slide-back.png') }}" alt="">
            </a>
            <a class="carousel-control-next" href="#carouselRelated" role="button" data-slide="next">
                <img src="{{ url('chc/images/arrow-slide-next.png') }}" alt="">
            </a>
        </div>
    </div>
</div>
<!--########## END RELATED ########-->
@endsection
