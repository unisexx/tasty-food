@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">ข้อมูลส่วนตัว</li>
    </ol>
</nav>
@endpush

@section('content')
<div class="mb-5 about bg-white">
    @include('member.menu')
    <form class="user mt-4 col-12 col-sm-12 col-md-8 mx-auto" method="POST" action="{{ url('member/profile_save/'.Auth::user()->id) }}" accept-charset="UTF-8">
    {{ csrf_field() }}
        <div class="form-group">
            <input name="name" type="text" class="form-control form-control-user bg-fields" placeholder="ชื่อ" value="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
            <input name="tel" type="text" class="form-control form-control-user bg-fields" placeholder="เบอร์โทรศัพท์" value="{{ Auth::user()->tel }}">
        </div>
        <div class="form-group">
            <textarea name="address" class="form-control" cols="30" rows="5" placeholder="ที่อยู่สำหรับจัดส่งสินค้า">{{ Auth::user()->address }}</textarea>
        </div>
        <div class="justify-content-end text-center w-100">
            <button type="submit" class="btn btn-success btn-user btn-block mt-4 col-12">บันทึก</button>
        </div>
    </form>
</div>
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProfileRequest') !!}
@endpush
