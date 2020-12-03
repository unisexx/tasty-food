@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item"><a href="{{ url('product-category/'.$product_item->productCategory->id) }}">{{ $product_item->productCategory->name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $product_item->name }}</li>
    </ol>
</nav>
@endpush

@section('content')
<!--########################### START Product ###########################-->
<div class="row mt-4">
    <div class="col-12 col-sm-12 col-md-7 single-right-left bg-white">
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
                                        <img src="{{ url('uploads/product-item/'.$image->name) }}" class="img-fluid">
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
                                        <img src="{{ url('uploads/product-item/'.$image->name) }}" class="img-fluid">
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
                    <a class="carousel-control-prev" href="#myCarousel3" role="button"
                        data-slide="prev">
                        <img src="{{ url('chc/images/arrow-slide-back.png') }}" alt="">
                    </a>
                    <a class="carousel-control-next" href="#myCarousel3" role="button"
                        data-slide="next">
                        <img src="{{ url('chc/images/arrow-slide-next.png') }}" alt="">
                    </a>
                </div>
                <!--/myCarousel-->
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-5 bg-white pt-2 p-0 pl-2">
        <h3><span class="brand-title-product-detail">{{ $product_item->brand }}</span></h3>
        <h5><span class="title-product-detail">{{ $product_item->name }}</span></h5>
        <div class="col-12 p-0"><img src="{{ asset('images/shopping.png') }}" alt="" class="img-fluid"></div>

        @if(@$product_item->productItemPrice)
            @foreach(@$product_item->productItemPrice as $item)
                <div class="row pt-2">
                    <div class="col-12">
                        <h5><span class="shop-set">{{ $item->title }}</span><h5>
                    </div>
                    <div class="col-7">
                        <div class="price2">฿{{ show_price($item) }}
                            @if($item->price_full)
                            <span class="original-price">฿{{ $item->price_full }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <label class="col-7 col-form-label">จำนวน :</label>
                            <input class="col-5 form-control item_product_qty" type="number" step="1" min="0" value="0" data-id="{{ $item->id }}">
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <input type="button" name="submit" value="Add to cart" class="button add mt-4 mb-4 item_add_set">
        <div class="mt-3">Share on: <div class="sharethis-inline-share-buttons"></div></div>
    </div>
</div>
<!--########################### END Product ###########################-->
@endsection


@push('fullwidth')
<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
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
<!--########################## Related Product ##########################-->
<div class="row m-0">
    <div class="container mt-5">
        <div class="header-gradient-2 mb-4">RELATED PRODUCTS</div>
        <div class="row mx-auto my-auto products">
            @foreach($related_items as $product_item)
                @include('include.__box_product', ['product_item' => $product_item])
            @endforeach
        </div>
    </div>
</div>
<!--########################### END Related Product ###########################-->
@endpush

@push('js')
<script>
// เพิ่มสินค้าลงในตระกร้า
$(document).on('click','.item_add_set',function(){
    $('input.item_product_qty').each(function(){
        var qty = $(this).val();
        if(qty > 0){
            $.ajax({
                method: "GET",
                url: "{{ url('ajaxAddItems') }}",
                data: {
                    product_item_price_id : $(this).data('id'),
                    product_item_qty : qty,
                }
            }).done(function(data) {
                updateCartNumber();
            });
        }
    });

    itemAddAlert();
});
</script>
@endpush