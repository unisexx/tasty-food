@extends('layouts.front')

@push('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bread">
        <li class="breadcrumb-item"><a href="{{ url('') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">แจ้งการโอนเงิน</li>
    </ol>
</nav>
@endpush

@section('content')
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
            
            <label class="col-12 col-form-label"><strong>โอนเงินจากธนาคาร</strong></label>
            <div class="col-12">
                <select name="bank_from" class="form-control" id="id_select2_example" style="width:100%;">
                    <option value="ธ. กรุงเทพ" data-img_src="{{ asset('images/icon-bank/Bangkok.jpg')}}">ธ. กรุงเทพ</option>
                    <option value="ธ. กรุงไทย" data-img_src="images/icon-bank/KrungThai.jpg">ธ. กรุงไทย</option>
                    <option value="ธ. กรุงศรีอยุธยา" data-img_src="images/icon-bank/Ayudhya.jpg">ธ. กรุงศรีอยุธยา</option>
                    <option value="ธ. กสิกรไทย" data-img_src="images/icon-bank/TFB.jpg">ธ. กสิกรไทย</option>
                    <option value="ธ. เกียรตินาคินภัทร" data-img_src="images/icon-bank/KIATNAKIN.jpg">ธ. เกียรตินาคินภัทร</option>
                    <option value="ธ. ซีไอเอ็มบี ไทย" data-img_src="images/icon-bank/CIMBTHAI.jpg">ธ. ซีไอเอ็มบี ไทย</option>
                    <option value="ธ. ทหารไทย" data-img_src="images/icon-bank/TMB.jpg">ธ. ทหารไทย</option>
                    <option value="ธ. ทิสโก้" data-img_src="images/icon-bank/Tisco.jpg">ธ. ทิสโก้</option>
                    <option value="ธ. ไทยพาณิชย์" data-img_src="images/icon-bank/SCB.jpg">ธ. ไทยพาณิชย์</option>
                    <option value="ธ. ธนชาต" data-img_src="images/icon-bank/Tanachat.jpg">ธ. ธนชาต</option>
                    <option value="ธ. นครหลวงไทย" data-img_src="images/icon-bank/SiamCity.jpg">ธ. นครหลวงไทย</option>
                    <option value="ธ. ยูโอบี" data-img_src="images/icon-bank/UOB.jpg">ธ. ยูโอบี</option>
                    <option value="ธ. สแตนดาร์ดชาร์เตอร์ด (ไทย)" data-img_src="images/icon-bank/STANDARD.jpg">ธ. สแตนดาร์ดชาร์เตอร์ด (ไทย)</option>
                    <option value="ธ. ไอซีบีซี (ไทย)" data-img_src="images/icon-bank/ICBC.gif">ธ. ไอซีบีซี (ไทย)</option>
                </select>
            </div>
            
            <label class="col-12 col-form-label mt-3"><strong>ไปยังบัญชีธนาคาร</strong></label>
            <div class="col-12">
                <select name="bank_to" class="form-control" id="id_select3_example" style="width:100%;">
                    <option value="ธ. กรุงเทพ" data-img_src="{{ asset('images/icon-bank/Bangkok.jpg')}}">ธ. กรุงเทพ</option>
                    <option value="ธ. กรุงไทย" data-img_src="images/icon-bank/KrungThai.jpg">ธ. กรุงไทย</option>
                    <option value="ธ. กรุงศรีอยุธยา" data-img_src="images/icon-bank/Ayudhya.jpg">ธ. กรุงศรีอยุธยา</option>
                    <option value="ธ. กสิกรไทย" data-img_src="images/icon-bank/TFB.jpg">ธ. กสิกรไทย</option>
                    <option value="ธ. เกียรตินาคินภัทร" data-img_src="images/icon-bank/KIATNAKIN.jpg">ธ. เกียรตินาคินภัทร</option>
                    <option value="ธ. ซีไอเอ็มบี ไทย" data-img_src="images/icon-bank/CIMBTHAI.jpg">ธ. ซีไอเอ็มบี ไทย</option>
                    <option value="ธ. ทหารไทย" data-img_src="images/icon-bank/TMB.jpg">ธ. ทหารไทย</option>
                    <option value="ธ. ทิสโก้" data-img_src="images/icon-bank/Tisco.jpg">ธ. ทิสโก้</option>
                    <option value="ธ. ไทยพาณิชย์" data-img_src="images/icon-bank/SCB.jpg">ธ. ไทยพาณิชย์</option>
                    <option value="ธ. ธนชาต" data-img_src="images/icon-bank/Tanachat.jpg">ธ. ธนชาต</option>
                    <option value="ธ. นครหลวงไทย" data-img_src="images/icon-bank/SiamCity.jpg">ธ. นครหลวงไทย</option>
                    <option value="ธ. ยูโอบี" data-img_src="images/icon-bank/UOB.jpg">ธ. ยูโอบี</option>
                    <option value="ธ. สแตนดาร์ดชาร์เตอร์ด (ไทย)" data-img_src="images/icon-bank/STANDARD.jpg">ธ. สแตนดาร์ดชาร์เตอร์ด (ไทย)</option>
                    <option value="ธ. ไอซีบีซี (ไทย)" data-img_src="images/icon-bank/ICBC.gif">ธ. ไอซีบีซี (ไทย)</option>
                </select>
            </div>

            <label class="col-12 col-form-label"><strong>จำนวนเงิน<span class="text-red">*</span> :</strong></label>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script type="text/javascript">
    function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img_src']){
                img_src = data['img_src'];
                template = $("<div><img src=\"" + img_src + "\" style=\"width:30px;height:30px;display:inline-block; margin-right:10px; \"/><span style=\"display:inline-block; text-align:left;\">" + text + "</span></div>");
                return template;
            }
        }
    var options = {
        'templateSelection': custom_template,
        'templateResult': custom_template,
    }
    $('#id_select2_example').select2(options);
    $('.select2-container--default .select2-selection--single').css({'height': '35px'});
    $('#id_select3_example').select2(options);
    $('.select2-container--default .select2-selection--single').css({'height': '35px'});
</script>
@endpush
