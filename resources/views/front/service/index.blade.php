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

        @foreach($services as $service)
            {{-- สลับรูปซ้ายขวา --}}
            @if($loop->iteration % 2 == 0)
                 <div class="row mt-4 about">
                    <div class="col-12 col-sm-12 col-md-6 pt-4 p-service">
                        <span class="title4-about-detail pl-3">{{ $service->title }}</span>
                        {!! $service->detail_1 !!}
                        <div class="list-style03">

                        </div>
                        <div class="service w-100">
                            <input type="submit" value="รายละเอียด" class="col-6 col-sm-6 col-md-5 m-3"
                                onclick="window.location.href='{{ url('service/view/'.$service->id) }}';">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 pic2-service tv">
                        <img src="{{ url('uploads/service/'.$service->image) }}" alt="" class="img-fluid">
                    </div>

                </div>
                <hr class="line4">
            @else
                <div class="row mt-4 about">
                    <div class="col-12 col-sm-12 col-md-6 pic-service tv">
                        <img src="{{ url('uploads/service/'.$service->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 pt-4 p-service">
                        <span class="title4-about-detail pl-3">{{ $service->title }}</span>
                        {!! $service->detail_1 !!}
                        <div class="service w-100">
                            <input type="submit" value="รายละเอียด" class="col-6 col-sm-6 col-md-5 m-3"
                                onclick="window.location.href='{{ url('service/view/'.$service->id) }}';">
                        </div>
                    </div>
                </div>
                <hr class="line4">
            @endif
        @endforeach

        {!! $services->appends(@$_GET)->render() !!}

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
