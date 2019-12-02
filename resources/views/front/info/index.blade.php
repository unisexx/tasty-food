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
                <li class="breadcrumb-item active" aria-current="page">ข่าวสาร</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">ข่าวสาร</div>

        @foreach($infos as $info)
        <div class="row mt-4 about">
            <div class="col-12 col-sm-12 col-md-4">
                <img src="{{ url('uploads/info/thumb/'.$info->image) }}" alt="" class="w-100 img-fluid rounded">
            </div>
            <div class="col-12 col-sm-12 col-md-8">
                <p class="title5-km pl-3">{{ $info->title }}</p>
                {!! get_first_paragraph($info->detail) !!}
                <p>{{ DBToDateThai($info->created_at) }}</p>
                <div class="service w-100">
                    <a href="{{ url('info/view/'.$info->id) }}"><input type="submit" value="อ่านต่อ" class="col-4 m-3"></a>
                </div>
            </div>
        </div>
        <hr class="line4">
        @endforeach

        {!! $infos->appends(@$_GET)->render() !!}

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
