@extends('layouts.front')

@section('content')

<!--########################## START CONTENT ##########################-->
<div class="row wrap-content">
    <div class="container">
     <hr class="line2"></hr>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bread justify-content-end">
                    <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">เกี่ยวกับเรา</li>
                </ol>
            </nav>

    <!-- END Breadcrump -->
    <div class="title-page">เกี่ยวกับเรา</div>
        <div class="row mt-4 about from-editor-area">

           {!! $page->detail !!}

        </div>
        <hr class="line4">

        @include('front.vdo.list')

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
