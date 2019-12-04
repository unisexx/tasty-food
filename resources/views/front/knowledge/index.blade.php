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
                <li class="breadcrumb-item active" aria-current="page">ความรู้น่ารู้</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">ความรู้น่ารู้</div>

        @foreach($knowledges as $knowledge)
        <div class="row mt-4 about">
            <div class="col-12 col-sm-12 col-md-4">
                <img src="{{ url('uploads/knowledge/thumb/'.$knowledge->image) }}" alt="" class="w-100 img-fluid rounded">
            </div>
            <div class="col-12 col-sm-12 col-md-8">
                <p class="title5-km pl-3">{{ $knowledge->title }}</p>
                {!! get_first_paragraph($knowledge->detail) !!}
                <div class="service w-100">
                     <a href="{{ url('knowledge/view/'.$knowledge->id) }}"><input type="submit" value="อ่านต่อ" class="col-4 m-3"></a>
                </div>
            </div>
        </div>
        <hr class="line4">
        @endforeach


        {!! $knowledges->appends(@$_GET)->render() !!}

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
