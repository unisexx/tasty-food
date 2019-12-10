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
                <li class="breadcrumb-item active" aria-current="page">โปรโมชั่น</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">โปรโมชั่น</div>

        @foreach($promotions as $promotion)
        <div class="row mt-4 about">
            <div class="col-12 col-sm-6 col-md-6 text-center mx-auto">
                <img src="{{ url('uploads/promotion/'.$promotion->image) }}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-sm-6 col-md-6 pt-4 mx-auto">
                <span class="title4-about-detail pl-3">{{ $promotion->title }}</span>
                <p>{{ $promotion->productItem->name }}</p>
                <div class="list-style01">
                    {!! $promotion->detail !!}
                </div>
                <div class="w-100">
                    <input type="button" value="Add to cart" class="button add col-6 col-sm-6 col-md-5 m-3 item_add" data-id="{{ $promotion->productItem->id }}">
                </div>
            </div>
        </div>
        <hr class="line4">
        @endforeach

        {!! $promotions->appends(@$_GET)->render() !!}
    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection