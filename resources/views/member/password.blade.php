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
                <li class="breadcrumb-item active" aria-current="page">ข้อมูลส่วนตัว</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">เปลี่ยนรหัสผ่าน</div>
        <div class="mt-4 mb-5 p-5 about bg-white">
            @include('member.menu')
            <form class="user mt-4 col-12 col-sm-12 col-md-8 mx-auto" method="POST" action="{{ url('member/password_save/'.Auth::user()->id) }}" accept-charset="UTF-8">
            {{ csrf_field() }}
                <div class="form-group">
                    <input name="email" type="email" class="form-control form-control-user" placeholder="อีเมล์" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="form-group">
                    <input name="old_password" type="password" class="form-control form-control-user" placeholder="รหัสผ่านเดิม">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control form-control-user" placeholder="รหัสผ่านใหม่">
                </div>
                <div class="form-group">
                    <input name="password_confirmation" type="password" class="form-control form-control-user" placeholder="ยืนยันรหัสผ่าน">
                </div>
                <div class="justify-content-end text-center w-100">
                    <button type="submit" class="btn btn-success btn-user btn-block mt-4 col-12">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection

@push('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\PasswordRequest') !!}
@endpush
