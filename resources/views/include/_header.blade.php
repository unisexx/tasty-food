<!--########################### START HEADER ###########################-->
<div class="bg-white p-2 m-0">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-3 d-block align-items-center">
                <a href="{{ url('') }}"><img src="{{ asset('images/logo-chulalak.png') }}" alt="" class="logo img-fluid"></a>
            </div>


            {{-- <form class="search pull-right w-75" method="GET" action="{{ url('search') }}" accept-charset="UTF-8" role="search">
                <input class="form-control search-input" type="text" placeholder="Search Products..." aria-label="Search" name="searchtxt" value="{{ request('searchtxt') }}">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form> --}}


                <form class="col-xs-12 col-md-4 pt-3 align-items-center" method="GET" action="{{ url('search') }}" accept-charset="UTF-8" role="search">
                    <div class="input-group pl-0 search w-100">
                        <input class="form-control search-input" type="text" placeholder="ค้นหาสินค้า / ค้นหาข้อมูลในเว็บไซต์" aria-label="Search" name="searchtxt" value="{{ request('searchtxt') }}">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text magnify-search" style="height: 38px; margin-top: 0px;"><i class="fa fa-search mx-auto" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>


            <div class="col-xs-12 col-md-3 pt-3 align-items-center justify-content-end text-right login">
                <img src="{{ asset('images/user-login.png') }}" alt="" class="pr-2"> 
                @auth
                    <a href="{{ url('member/profile') }}">
                        <span>{{ Auth::user()->name }}
                            @if( Auth::user()->is_vip == 1 )
                                <span class="badge bg-warning" style="color:black;">
                                    <small><i class="fas fa-crown"></i> VIP</small>
                                </span>
                            @endif
                        </span>
                    </a>
                    | <a href="{{ url('f-logout') }}">ออกจากระบบ</a>
                @else
                    <a href="{{ url('f-login') }}">เข้าสู่ระบบ</a>
                    <span class="pl-2 pr-2">|</span>
                    <a href="{{ url('f-register') }}">ลงทะเบียน</a>
                @endauth
            </div>
            <div class="col-xs-12 col-md-2">
                <!--########################### START CART ###########################-->
                <div class="cart">
                    <a href="checkout.html">
                        <div class="total">
                            <a href="javascript:;" class="simpleCart_empty">Empty Cart</a>
                            <span class="simpleCart_total">{{ Session::get('cartTotalPrice') }}</span>
                        </div>
                        <a href="{{ url('checkout') }}">
                            <div class="position-relative">
                                <div class="cart-total"><span id="simpleCart_quantity" class="simpleCart_quantity">{{ Session::get('cartNumber') }}</span></div>
                                <img src="{{ asset('images/icon-cart2.png') }}" alt="" class="img-cart">
                            </div>
                        </a>
                    </a>
                    <div class="clearfix"> </div>
                </div>
                <!--########################### END CART ###########################-->
            </div>
        </div>
    </div>
</div>
<!--########################### END HEADER ###########################-->