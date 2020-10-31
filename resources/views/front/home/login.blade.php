@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">เข้าสู่ระบบ</li>
    </ol>
</nav>
@endpush

@section('content')
<div class="row mt-4 about">
    <div class="col-xs-12 col-md-8 mx-auto">
        <form class="col-12" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                    aria-describedby="emailHelp" placeholder="ระบุชื่อผู้ใช้">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="ระบุรหัสผ่าน">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">จำรหัสผ่าน</label>
                </div>
            </div>
            <div class="justify-content-end text-center w-100">
                <button type="submit" class="btn btn-success btn-user btn-block">เข้าสู่ระบบ</button>
            </div>

            <hr>
            {{-- FB Login --}}
            {{-- <a href="{{url('/redirect')}}" class="btn btn-social btn-facebook btn-block text-center mt-3 mb-3">
                <i class="fab fa-facebook-f"></i> Login in with Facebook
            </a> --}}
            {{-- FB Login --}}
        </form>

        <div class="text-center forget">
            <a href="{{ url('password/reset') }}">ลืมรหัสผ่าน?</a>
        </div>
        <div class="text-center forget">
            <a href="{{ url('f-register') }}">สมัครสมาชิกใหม่</a>
        </div>
    </div>
</div>
@endsection
