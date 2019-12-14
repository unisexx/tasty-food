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
                <li class="breadcrumb-item active" aria-current="page">เข้าสู่ระบบ</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">เข้าสู่ระบบ</div>
        <div class="row mt-4 about bg-white p-5">
            <div class="col-xs-12 col-md-4 mx-auto">
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
                </form>
                <hr>

                {{-- FB Login --}}
                <div class="text-center forget mb-3">
                    <a href="{{url('/redirect')}}" class="btn btn-social btn-facebook">
                        <i class="fab fa-facebook-f"></i> Sign in with Facebook
                    </a>
                </div>
                {{-- FB Login --}}

                <div class="text-center forget">
                    <a href="{{ url('password/reset') }}"><strong>ลืมรหัสผ่าน?</strong></a>
                </div>
                <div class="text-center forget">
                    <a href="{{ url('f-register') }}"><strong>สมัครสมาชิกใหม่</strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection
