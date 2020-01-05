@php
$product_category_menu = App\Models\ProductCategory::where('status',1)->orderBy('_lft')->get()->toTree();
@endphp

<!--########################### START HEADER ###########################-->
<div class="row bg-header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 mt-4 login">
                @auth
                    <img src="{{ url('chc/images/icon-account.png') }}" alt="" class="icon-account"> <a href="{{ url('member/profile') }}"><span>{{ Auth::user()->name }} <span class="badge bg-warning" style="color:black;"><small><i class="fas fa-crown"></i> VIP</small></span></span></a>
                    | <a href="{{ url('f-logout') }}">ออกจากระบบ</a>
                @else
                    <a href="{{ url('f-login') }}">เข้าสู่ระบบ</a> | <a href="{{ url('f-register') }}">ลงทะเบียน</a>
                @endauth
            </div>
            <div class="col-12 col-sm-4 col-md-4 text-center"> <img src="{{ url('chc/images/logo.png') }}" alt=""
                    class="logo img-fluid"> </div>
            <div class="col-12 col-sm-4 col-md-4 mt-3">
                <form class="search pull-right w-75" method="GET" action="{{ url('search') }}" accept-charset="UTF-8" role="search">
                    <input class="form-control search-input" type="text" placeholder="Search Products..." aria-label="Search" name="searchtxt" value="{{ request('searchtxt') }}">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <!--########################### START CART ###########################-->
        <div class="cart box_1">
                <h3>
                    <div class="total">
                        <a href="javascript:;" class="simpleCart_empty">Empty Cart</a>
                        <span class="simpleCart_total">{{ Session::get('cartTotalPrice') }}</span>
                        <div class="cart-total"><span id="simpleCart_quantity" class="simpleCart_quantity">{{ Session::get('cartNumber') }}</span></div>
                    </div>
                    <a href="{{ url('checkout') }}"><img src="{{ url('chc/images/icon-cart1.png') }}" alt=""></a>
                </h3>
            <div class="clearfix"> </div>
        </div>
        <!--########################### END CART ###########################-->
        <div class="row mt-5">
            <div class="menu">
                <nav class="navbar navbar-expand-lg navbar-light bg-faded nopadding">
                    <!-- links toggle -->
                    <button class="navbar-toggler tog" type="button" data-toggle="collapse" data-target="#topmenu"
                        aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line" style="margin-bottom: 0;"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="topmenu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}"><img
                                        src="{{ url('chc/images/icon-home.png') }}" alt=""></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">เกี่ยวกับเรา</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('service') }}">บริการของเรา</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="menu-product" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false"
                                    onclick="window.location.href='{{ url('product') }}';">
                                    สินค้า
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu-product">
                                    @foreach ($product_category_menu as $parent_cat)
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item @if(count($parent_cat->children)) dropdown-toggle @endif"
                                            href="{{ url('product-category/'.$parent_cat->id) }}">{{ $parent_cat->name }}</a>
                                        @if(count($parent_cat->children))
                                        <ul class="dropdown-menu" aria-labelledby="menu-ordinance">
                                            @foreach($parent_cat->children as $cat)
                                            <li><a class="dropdown-item"
                                                    href="{{ url('product-category/'.$cat->id) }}">{{ $cat->name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('promotion') }}">โปรโมชั่น</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('info') }}">ข่าวสาร</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('knowledge') }}">ความรู้น่ารู้</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('how-to-buy') }}">วิธีสั่งซื้อและชำระเงิน</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('confirm-payment') }}">แจ้งการโอนเงิน</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">ติดต่อเรา</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--########################### END HEADER ###########################-->