@extends('layouts.front')

@section('content')

<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
     <hr class="line2"></hr>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bread justify-content-end">
                    <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
                    <li class="breadcrumb-item">สินค้า</li>
                    <li class="breadcrumb-item">ผลิตภัณฑ์อาหารเสริมเพื่อสุขภาพ</li>
                    <li class="breadcrumb-item active" aria-current="page">อาหารเสริมผู้ชาย</li>
                </ol>
            </nav>

    <!-- END Breadcrump -->
    <div class="title-page">อาหารเสริมผู้ชาย</div>

    <div class="row products m-4">
        @foreach($product_items as $row)
        <div class="col-12 col-sm-6 col-md-3 d-inline-block box-products text-center">
            <p class="name-product">STAND UP อาหารเสริมท่านชาย</p>
            <img class="img-fluid" src="images/products/men/stan_up.png">
            <div class="link">
                <ul>
                    <li>
                        <div class="simpleCart_shelfItem buy">
                            <a class="add1 item_add" href="#"><img src="images/icon-cart.png" alt="" class="icon-buy"> Buy
                                <div class="carousel-control-next-icon i-buy"></div>
                            </a>
                        </div>
                    </li>
                    <li> <a class="go-detail" href="product_detail.html"><img src="images/icon-go-detail.png" alt=""> Detail</a></li>
                </ul>
            </div>
            <p class="price">387.-</p>
        </div>
        @endforeach
    </div>
    <div class="col-md-12 centered">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

 </div>

</div>
<!--########################## END CONTENT ##########################-->

@endsection
