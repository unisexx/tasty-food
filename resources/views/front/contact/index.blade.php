@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">ติดต่อเรา</li>
    </ol>
</nav>
@endpush

@section('content')
<!--########################## START CONTENT ##########################-->
<div class="row">
    {!! $contact->map !!}
    <div class="col-12 title-page8 pt-3 pb-3 text-left">ส่งข้อความถึงเรา</div>
    <form method="POST" action="{{ url('contact/save') }}" accept-charset="UTF-8" class="col-12">
    {{ csrf_field() }}
        <div class="row w-100 contact">
            <div class="col-12 col-sm-6 col-md-6">
                <input name="name" type="text" class="form-control" placeholder="ชื่อ">
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <input name="email" type="text" class="form-control" placeholder="อีเมล">
            </div>
            <div class="col-12 mt-4 mb-4">
                <textarea name="message" rows="6" class="col-12 from-control" placeholder="ข้อความ"></textarea>
            </div>
            <input type="submit" value="SEND" class="col-2 m-3">
        </div>
    </form>
</div>
<!--########################## END CONTENT ##########################-->
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\FrontContactRequest') !!}
@endpush
