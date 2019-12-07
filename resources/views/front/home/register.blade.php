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
                <li class="breadcrumb-item active" aria-current="page">สมัครสมาชิก</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">สมัครสมาชิก</div>
        <div class="row mt-4 about bg-white p-5">
            <form class="user mt-4 col-12 col-sm-12 col-md-4 mx-auto" method="POST" accept-charset="UTF-8" action="{{ url('doregister') }}">
            {{ csrf_field() }}
                    <div class="form-group">
                        <input name="name" type="text" class="form-control form-control-user" placeholder="ชื่อ - นามสกุล">
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control form-control-user" placeholder="อีเมล">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control form-control-user" placeholder="รหัสผ่าน">
                    </div>
                    <div class="form-group">
                        <input name="password_confirmation" type="password" class="form-control form-control-user" placeholder="ยืนยันรหัสผ่าน">
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block mt-4">ลงทะเบียน</button>
                    <div class="col-sm-6 mt-4 pl-0"><a href="{{ url('password/reset') }}"><strong>ลืมรหัสผ่าน ?</strong></a></div>

                <hr>
            </form>
        </div>
    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\RegisterRequest') !!}
@endpush