@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">เกี่ยวกับเรา</li>
    </ol>
</nav>
@endpush

@section('content')
<!--########################## START CONTENT ##########################-->
<div class="about from-editor-area">
    {!! $page->detail !!}
    <hr class="line4">
    @include('front.vdo.list')
</div>
<!--########################## END CONTENT ##########################-->
@endsection
