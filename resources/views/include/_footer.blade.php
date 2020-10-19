@php
    $contact = App\Models\Contact::find(1);
@endphp
<!--########################## START ICON LOGO payment ##########################-->
<div class="row m-0">
    <div class="container mt-5 icon-contact">
        <hr>
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4">
                <p class="call">วิธีการชำระเงิน</p>
                    <img src="{{ url('images/icon-payment-1.png') }}" alt="" class="mr-3"> 
                    <img src="{{ url('images/icon-payment-2.png') }}" alt="" class="mr-3"> 
                    <img src="{{ url('images/icon-payment-3.png') }}" alt="" class="mr-3"> 
                    <img src="{{ url('images/icon-payment-4.png') }}" alt="">
                <p><a href="#"><span class="mail mr-3">โอน</span></a> | <a href="#"><span class="ml-3 mail">ชำระเงินปลายทาง</span></a></p>
            </div>
            <div class="col-12 col-sm-5 col-md-4">
                <p class="call">Delivery Services</p>
                <img src="{{ url('images/icon-delivery-001.png') }}" alt="" class="mr-3"> 
                <img src="{{ url('images/icon-delivery-002.png') }}" alt="" class="mr-3"> 
                <img src="{{ url('images/icon-delivery-003.png') }}" alt="" class="mr-3"> 
                <img src="{{ url('images/icon-delivery-004.png') }}" alt="" class="mr-3"> 
                <img src="{{ url('images/icon-delivery-005.png') }}" alt="">
            </div>
            <div class="col-12 col-sm-3 col-md-4 pt-4 text-center">
                <div class="col-12 row p-0 m-0">
                    <div class="col-4"><img src="{{ url('images/logo-chulalak-footer.png') }}" alt=""></div>
                    <div class="col-8"><h4>ศูนย์รวมข้อมูลสุขภาพ และสินค้าคุณภาพ</h4></div>
                </div>
            </div>
        </div>
    </div>
</div>          
<!--########################## END ICON LOGO payment  ##########################-->
<footer class="mt-5">
    <div class="row m-0 bg-footer">
        <div class="container text-footer">
            <div class="row">
            <div class="col-12 col-sm-4 col-md-4">2019 www.chc.com  All rights reserved</div>
            <div class="col-12 col-sm-4 col-md-4 text-center"><a href="#">Terms & Conditions</a><a href="#">Privacy</a> </div>
            <div class="col-12 col-sm-4 col-md-4 text-right a-social">
                <a href="{{ $contact->facebook }}"><img src="{{ url('images/icon-facebook.png') }}" alt="" style="margin-top:-10px;"></a>
                <a href="{{ $contact->twitter }}"><img src="{{ url('images/icon-twitter.png') }}" alt="" class="ml-5" style="margin-top:-10px;"></a>
            </div>
        </div>
        </div>
    </div>
</footer>
