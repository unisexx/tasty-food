@extends('layouts.front')

@section('content')

<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
        <hr class="line2">
        </hr>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bread justify-content-end">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{ url('knowledge') }}">ข่าวสาร</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $knowledge->title }}</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">{{ $knowledge->title }}</div>
        <div class="row mt-4 about mb-5">
            <span class="pl-3">({{ DBToDateThai($knowledge->created_at) }})</span>
            <div class="col-12 col-sm-12 col-md-6 mx-auto mt-5">

                <img src="{{ url('uploads/knowledge/'.$knowledge->image) }}" alt="" class="w-100 img-fluid rounded">
            </div>
            <div class="col-12 col-sm-12 col-md-12 mt-5">
                {!! $knowledge->detail !!}
            </div>
        </div>

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
