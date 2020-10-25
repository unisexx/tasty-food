@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item"><a href="{{ url('product') }}">สินค้า</a></li>
        <li class="breadcrumb-item"><a href="{{ url('product-category/'.@$product_category->parent->id) }}">{{ @$product_category->parent->name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ @$product_category->name }}</li>
    </ol>
</nav>
@endpush

@section('content')
<img class="img-fluid" src="{{ asset('uploads/product-category/'.@$product_category->parent->image) }}" alt="{{ @$product_category->parent->name }}" class="title-head">
@endsection

@push('fullwidth')
<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
        <div class="row products m-4">
            @foreach($product_items as $product_item)
                @include('include.__box_product', ['product_item' => $product_item])
            @endforeach
        </div>
        {!! $product_items->appends(@$_GET)->render() !!}
    </div>
</div>
<!--########################## END CONTENT ##########################-->
@endpush