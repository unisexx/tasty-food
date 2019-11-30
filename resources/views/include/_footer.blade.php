@php
    $contact = App\Models\Contact::find(1);
@endphp

<!--########################## START ICON CONTACT ##########################-->
<div class="row m-0">
    <div class="container mt-5 icon-contact">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 text-center">
                <img src="{{ url('chc/images/icon-iphone.png') }}" alt=""><br><span class="call">Call us</span><br><span class="number">{{ $contact->tel }}</span>
            </div>
            <div class="col-12 col-sm-4 col-md-4 text-center">
                <img src="{{ url('chc/images/icon-location.png') }}" alt=""><br><span class="call">Location</span><br><span class="location">{{ $contact->address }}</span>
            </div>
            <div class="col-12 col-sm-4 col-md-4 text-center">
                <img src="{{ url('chc/images/icon-mail.png') }}" alt="" style="margin-top:10px;"><br><span class="call">Mail</span><br><br><a href="#"><span class="mail">{{ $contact->email }}</span></a>
            </div>
        </div>
    </div>
</div>
<!--########################## END ICON CONTACT  ##########################-->
<footer class="mt-5">
    <div class="row m-0 bg-footer">
        <div class="container text-footer">
            <div class="row">
            <div class="col-12 col-sm-4 col-md-4">2019 www.chc.com  All rights reserved</div>
            <div class="col-12 col-sm-4 col-md-4 text-center"><a href="#">Terms & Conditions</a><a href="#">Privacy</a> </div>
            <div class="col-12 col-sm-4 col-md-4 text-right a-social">
                <a href="{{ $contact->facebook }}"><img src="{{ url('chc/images/icon-facebook.png') }}" alt="" style="margin-top:-10px;"></a>
                <a href="{{ $contact->twitter }}"><img src="{{ url('chc/images/icon-twitter.png') }}" alt="" class="ml-5" style="margin-top:-10px;"></a>
            </div>
        </div>
        </div>
    </div>
</footer>
