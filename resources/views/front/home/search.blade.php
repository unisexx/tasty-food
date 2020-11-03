@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active">สินค้า</li>
    </ol>
</nav>
@endpush

@section('content')
<h3>ผลการค้นหา "{{ request('searchtxt') }}"</h3>


{{-- สินค้า --}}
<div class="w-100 title6-km pl-3 bg-lightgreen mb-2">สินค้า</div>
<div class="row products m-4">
    @foreach($product_items as $product_item)
        @include('include.__box_product', ['product_item' => $product_item])
    @endforeach
</div>


{{-- ข้อมูลสุขภาพ --}}
<div class="w-100 title6-km pl-3 bg-lightgreen mb-4">ข้อมูลสุขภาพ</div>
@foreach($knowledges as $knowledge)
    @include('include.__box_knowledge', ['knowledge' => $knowledge])
@endforeach
@endsection