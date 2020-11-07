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
    <p class="title3-about-detail">วีดีโอ</p>
    <div class="row">
        @foreach($vdos as $vdo)
        <div class="col-12 col-sm-12 col-md-4">
                <iframe width="100%" height="315" src="{{ youtube_url_to_embed($vdo->url) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        @endforeach
    </div>
</div>
<!--########################## END CONTENT ##########################-->
@endsection
