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
    <form class="user mt-4 col-12 col-sm-12 col-md-12 mx-auto" method="POST"
        action="{{ url('member/profile_save/'.Auth::user()->id) }}" accept-charset="UTF-8">
        {{ csrf_field() }}

        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="s-title">ชื่อสถานที่</label>
                <input id="s-title" name="title" type="text" class="form-control" placeholder="บ้าน, ที่ทำงาน" value="{{ @$rs->title }}" required>
            </div>
            <div class="col-md-8 mb-3">
                <label for="s-name">ชื่อผู้รับสินค้า</label>
                <input id="s-name" name="name" type="text" class="form-control" placeholder="ชื่อผู้รับสินค้า" value="{{ @$rs->name }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="s-tel">เบอร์โทรศัพท์ที่ติดต่อได้</label>
                <input id="s-tel" name="tel" type="text" class="form-control" placeholder="เบอร์โทรศัพท์ที่ติดต่อได้" value="{{ @$rs->tel }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="s-address">ที่อยู่จัดส่ง</label>
                <input id="s-address" name="address" type="text" class="form-control" placeholder="ที่อยู่จัดส่ง" value="{{ @$rs->address }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="tumbon">ตำบล / แขวง</label>
                <input class="form-control" type="text" id="tumbon" placeholder="ตำบล" name="tumbon" value="{{ @$rs->tumbon }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="amphoe">อำเภอ / เขต</label>
                <input class="form-control" type="text" id="amphoe" placeholder="อำเภอ" name="amphoe" value="{{ @$rs->amphoe }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="province">จังหวัด</label>
                <input class="form-control" type="text" id="province" placeholder="จังหวัด" name="province" value="{{ @$rs->province }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="zipcode">รหัสไปรษณีย์</label>
                <input class="form-control" type="text" id="zipcode" placeholder="รหัสไปรษณีย์" name="zipcode" value="{{ @$rs->zipcode }}" required>
            </div>
        </div>
        <input type="hidden" name="id" value="{{ @$rs->id }}">
        <button type="submit" class="col-6 mt-5 mb-5 btn btn-primary btn-lg pl-4 pr-4 mx-auto d-block mt-4">บันทึกที่อยู่จัดส่งสินค้า</button>
    </form>
</div>
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProfileRequest') !!}

<script>
$(document).ready(function(){
    $.Thailand({
        $district: $('#tumbon'), // input ของตำบล
        $amphoe: $('#amphoe'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });
});
</script>
@endpush
