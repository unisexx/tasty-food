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
                                                <img src="{{ url('uploads/product-item/'.$image->name) }}">
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
                <div class="price2">฿ {{ $product_item->price }}</div>
                <div class="row">
                    <label class="col-4 col-sm-3 col-md-3 col-form-label">
                        <h5>จำนวน :</h5>
                    </label>
                    <input class="col-2 form-control" type="number" name="count" step="1" min="1" value="1">
                </div>
                <input type="submit" name="submit" value="Add to cart" class="button add mt-4 mb-4">
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


        </div>
        <!--########## END COMMENT ########-->

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
