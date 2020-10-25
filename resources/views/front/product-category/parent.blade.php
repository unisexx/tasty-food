@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item"><a href="{{ url('product') }}">สินค้า</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $product_category->name }}</li>
    </ol>
</nav>
@endpush

@section('content')
<img class="img-fluid" src="{{ asset('uploads/product-category/'.$product_category->image) }}" alt="{{ $product_category->name }}" class="title-head">
@endsection

@push('fullwidth')
<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
        <!-- Nav pills -->
        <div class="wrap-tab mt-5">
            <ul class="container nav nav-pills {{ @tabArray($product_category->id) }}">
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
                    @foreach ($children_category->productItem->where('status', 1)->take(8) as $product_item)
                        @include('include.__box_product', ['product_item' => $product_item])
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
@endpush