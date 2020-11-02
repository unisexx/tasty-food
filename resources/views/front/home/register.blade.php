@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">สมัครสมาชิก</li>
    </ol>
</nav>
@endpush

@section('content')
<!--########################### START FORM ###########################-->
<form class="user mt-4 col-12 col-sm-12 col-md-12 mx-auto" method="POST" accept-charset="UTF-8" action="{{ url('front-register') }}" autocomplete="off" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="row mt-4 about">
    <div class="col-md-12">
        <ul id="tabsJustified" class="container nav nav-pills nav-fill tab-product2 tab-register">
            <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link text-uppercase active tablink"
                    style="background-color:transparent;">บุคคลทั่วไป</a></li>
            <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab"
                    class="nav-link text-uppercase tablink" style="background-color:transparent;">สำหรับร้านขายยา</a>
            </li>
        </ul>
        <br>
        <div id="tabsJustifiedContent" class="tab-content bg-white p-3">
            <div id="home1" class="tab-pane fade active show">
                <div id="personalFormHere" class="list-group">
                    {{-- Personal Form Here --}}
                </div>
            </div>
            <div id="profile1" class="tab-pane fade">
                <div class="row pb-2">
                    <div id="storeFormHere" class="col-md-12">
                        {{-- Store Form Here --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
<!--########################### END FORM ###########################-->
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\RegisterRequest') !!}
@endpush

@push('js')
<script>
$(document).ready(function(){
    /*
        คลิกที่แท็บแล้วให้ enable form แท็บปัจจุบัน แล้ว disable form แท็บอื่นๆ
    */
    $(".tablink").click(function() {
        var target = $(this).attr('data-target');
        if(target == '#home1'){
            // $("#home1 :input").prop("disabled", false);
            // $("#profile1 :input").prop("disabled", true);

            // โหลดฟอร์ม Personal
            if( !$.trim( $('#personalFormHere').html() ).length ) {
                $('#personalFormHere').append($('<div>').load('{{ url("load-personal-regis-form") }}'));
                $('#storeFormHere').html('');
            }
        }else{
            // $("#home1 :input").prop("disabled", true);
            // $("#profile1 :input").prop("disabled", false);

            if( !$.trim( $('#storeFormHere').html() ).length ) {
                $('#storeFormHere').append($('<div>').load('{{ url("load-store-regis-form") }}'));
                $('#personalFormHere').html('');
            }
        }
    });
    $(".tablink:first").trigger('click');
});
</script>
@endpush