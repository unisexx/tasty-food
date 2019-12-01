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
                <li class="breadcrumb-item active" aria-current="page">บริการของเรา</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">บริการของเรา</div>
        <div class="row mt-4 about">
            <div class="col-12 col-sm-12 col-md-6 pic-service tv">
                <img src="{{ url('uploads/service/'.$service->image) }}" alt="{{ $service->title }}" class="img-fluid">
            </div>
            <div class="col-12 col-sm-12 col-md-6 pt-4 p-service">
                <span class="title4-about-detail pl-3">{{ $service->title }}</span>
                {!! $service->detail_1 !!}

            </div>
            {!! $service->detail_2 !!}
        </div>
        <hr class="line4">

        @include('front.vdo.list')

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
