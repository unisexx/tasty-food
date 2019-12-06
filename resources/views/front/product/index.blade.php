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
        <div class="title-page2 mb-4"><img src="images/icon-white-star.png" alt="" class="icon-thumbs-up"> BEST SELLERS
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
                    </div>
                    <div class="carousel-item">
                        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                            <p class="name-product">Vistra Gluta Complex 800 30'S</p>
                            <img class="img-fluid" src="images/products/vistra/vistra_01.png">
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
                    <div class="carousel-item">
                        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                            <p class="name-product">BigJ อาหารเสริมสำหรับผู้ชาย (10 Cap)</p>
                            <img class="img-fluid" src="images/products/men/big_j.png">
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
                            <p class="price">1,140.-</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                            <p class="name-product">Vistra Ginkgo 120 mg 30 cap</p>
                            <img class="img-fluid" src="images/products/vistra/vistra_02.png">
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
                            <p class="price">198.-</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
                            <p class="name-product">name nmame</p>
                            <img class="img-fluid" src="images/210x210.jpg">
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
                            <p class="price">000.-</p>
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
        </div>
        <!--########## END BEST SELLERS ########-->

    </div>

</div>
<!--########################## END CONTENT ##########################-->

@endsection

@push('js')
<script src="{{ url('chc/js/simpleCart.min.js') }}"></script>
<script>
    $('#recipeCarousel').carousel({
        interval: 10000
    })

    $('.carousel .carousel-item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        if (next.next().length > 1) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
</script>
@endpush