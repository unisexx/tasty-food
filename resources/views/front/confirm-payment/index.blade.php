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
                <li class="breadcrumb-item active" aria-current="page">แจ้งการโอนเงิน</li>
            </ol>
        </nav>

        <!-- END Breadcrump -->
        <div class="title-page">แจ้งยืนยันการโอนเงิน</div>

        <!--########## START แจ้งการโอนเงิน ########-->
        <form method="POST" action="{{ url('confirm-payment/save') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="bg-white p-3">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="title-page6 pt-3 m-3 text-left">กรอกข้อมูลเพื่อแจ้งยืนยันการโอนเงิน</div>

                    @auth
                        @php
                            $orders = App\Models\Order::where('user_id', Auth::user()->id)->where('status','รอการแจ้งโอน')->orderBy('id', 'asc')->get();
                        @endphp
                        <label class="col-12 col-form-label"><strong>หมายเลขการสั่งซื้อ<span class="text-red">*</span> :</strong></label>
                        <div class="col-12">
                            <select name="order_id" class="form-control">
                                    <option value="">--- เลือกหมายเลขการสั่งซื้อ ---</option>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}">{{ sprintf('%08d', $order->id) }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endauth

                    <label class="col-12 col-form-label"><strong>วันที่ชำระเงิน<span class="text-red">*</span>
                            :</strong></label>
                    <div class="col-12">
                        <input name="payment_date" type="text" class="form-control">
                    </div>
                    <label class="col-12 col-form-label"><strong>เวลา(โดยประมาณ)<span class="text-red">*</span>
                            :</strong></label>
                    <div class="col-12 form-group row">
                        <div class="col-4">
                            <select name="payment_hour" class="form-control" name="hour">
                                <option value="">- ชม. -</option>
                                @for($x = 0; $x <= 23; $x++)
                                <option value="{{ sprintf('%02d', $x) }}">{{ sprintf('%02d', $x) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="payment_minute" class="form-control" name="min">
                                <option value="">- นาที -</option>
                                @for($x = 0; $x <= 59; $x++)
                                <option value="{{ sprintf('%02d', $x) }}">{{ sprintf('%02d', $x) }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <label class="col-12 col-form-label"><strong>จำนวนเงิน<span class="text-red">*</span>
                            :</strong></label>
                    <div class="col-12">
                        <input name="payment_amount" type="text" class="form-control">
                    </div>
                    <label class="col-12 col-form-label"><strong>บาท</strong></label>

                    <label class="col-12 col-form-label"><strong>หลักฐานการโอน :</strong></label>
                    <div class="col-12">
                        <div class="input-group image-preview" data-original-title="" title="">
                            <input type="file" class="custom-file-input" id="customFile" name="payment_attach">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <p class="text-green p-3">[ ไฟล์ jpg,gif,png,pdf ไม่เกิน2MB]
                        การแนบหลักฐานจะช่วยทำให้ตรวจสอบได้เร็วขึ้น</p>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="title-page6 pt-3 m-3 text-left">รายละเอียดผู้แจ้งชำระเงิน</div>
                    <label class="col-12 col-form-label"><strong>ชื่อผู้แจ้ง :</strong></label>
                    <div class="col-12">
                        <input name="name" type="text" class="form-control" value="{{ @Auth::user()->name }}">
                    </div>
                    <label class="col-12 col-form-label"><strong>อีเมล :</strong></label>
                    <div class="col-12">
                        <input name="email" type="text" class="form-control" value="{{ @Auth::user()->email }}">
                    </div>
                    <label class="col-12 col-form-label"><strong>เบอร์มือถือ :</strong></label>
                    <div class="col-12">
                        <input name="tel" type="text" class="form-control" value="{{ @Auth::user()->tel }}">
                    </div>
                    <label class="col-12 col-form-label"><strong>ที่อยู่สำหรับการจัดส่ง :</strong></label>
                    <div class="col-12">
                        <textarea class="form-control" name="description" cols="30" rows="7" placeholder="ที่อยู่สำหรับการจัดส่ง">{{ @Auth::user()->address }}</textarea>
                    </div>
                </div>
                <div class="justify-content-end text-center w-100">
                    <button type="submit" class="col-6 mt-2 mb-5  btn btn-success display-block">Send</button>
                </div>
            </div>
        </form>
        <!--########## END แจ้งการโอนเงิน ########-->

    </div>
</div>
<!--########################## END CONTENT ##########################-->

@endsection

@push('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ConfirmPaymentRequest') !!}

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush
