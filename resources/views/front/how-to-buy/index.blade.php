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
                <li class="breadcrumb-item active" aria-current="page">วิธีสั่งซื้อและชำระเงิน</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">วิธีสั่งซื้อและชำระเงิน</div>
        <!--########## START วิธีสั่งซื้อ ########-->
        <div class="title-page7 pt-3 mt-4 mb-4"><i class="fa fa-cart-arrow-down black"></i> วิธีสั่งซื้อ</div>
        {!! $howtobuy->detail !!}
            <!--########## END วิธีสั่งซื้อ ########-->

            <!--########## START วิธีชำระเงิน ########-->
            <div class="title-page7 pt-3 mt-4 mb-4"><i class="fa fa-check-circle black"></i> ชำระเงิน</div>
            <div class="row col-md-12">
                {!! $howtopay->detail !!}
            </div>
            <!--########## END วิธีชำระเงิน ########-->


    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
