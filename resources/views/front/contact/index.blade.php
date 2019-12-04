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
                <li class="breadcrumb-item active" aria-current="page">ติดต่อเรา</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">ติดต่อเรา</div>
        <div class="row">
            {!! $contact->map !!}
            <div class="col-12 title-page8 pt-3 pb-3 text-left">ส่งข้อความถึงเรา</div>
            <form method="POST" action="{{ url('contact') }}" accept-charset="UTF-8" class="col-12">
            {{ csrf_field() }}
                <div class="row w-100 contact">
                    <div class="col-12 col-sm-6 col-md-6">
                        <input name="name" type="text" class="form-control" placeholder="ชื่อ">
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <input name="email" type="text" class="form-control" placeholder="อีเมล">
                    </div>
                    <div class="col-12 mt-4 mb-4">
                        <textarea name="message" required="" rows="6" class="col-12 from-control" placeholder="ข้อความ"></textarea>
                    </div>
                    <input type="submit" value="SEND" class="col-2 m-3">
                </div>
            </form>
        </div>

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
