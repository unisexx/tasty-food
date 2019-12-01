<!--########################### START HEADER ###########################-->
<div class="row bg-header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 mt-4 login">
                <a href="#">Log in</a>   or  <a href="#">Register</a>
                <img src="{{ url('chc/images/icon-account.png') }}" alt="" class="icon-account"> <a href="#"><span>My Account</span></a>
            </div>
            <div class="col-12 col-sm-4 col-md-4 text-center"> <img src="{{ url('chc/images/logo.png') }}" alt="" class="logo img-fluid"> </div>
            <div class="col-12 col-sm-4 col-md-4 mt-3">
             <form class="search pull-right w-75">
               <input class="form-control search-input" type="text" placeholder="Search Products..." aria-label="Search">
               <button type="button"><i class="fa fa-search"></i></button>
             </form>
           </div>
        </div>
<!--########################### START CART ###########################-->
        <div class="cart box_1">
                <a href="checkout.html">
                <h3>
                <div class="total">
                    <a href="javascript:;" class="simpleCart_empty">Empty Cart</a>
                    <span class="simpleCart_total">$0.00</span> <div class="cart-total"><span id="simpleCart_quantity" class="simpleCart_quantity">0</span></div>
                </div>
                    <img src="{{ url('chc/images/icon-cart1.png') }}" alt="">
                </h3>
                </a>
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
                                <a class="nav-link" href="{{ url('/') }}"><img src="{{ url('chc/images/icon-home.png') }}" alt=""></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="about.html">เกี่ยวกับเรา</a></li>
                            <li class="nav-item"><a class="nav-link" href="service.html">บริการของเรา</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="menu-product" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false"
                                    onclick="window.location.href='products.html';">
                                    สินค้า
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu-product">
                                    <li class="dropdown-submenu" >
                                        <a class="dropdown-item dropdown-toggle" href="#">ผลิตภัณฑ์อาหารเสริมเพื่อสุขภาพ</a>
                                        <ul class="dropdown-menu" aria-labelledby="menu-ordinance">
                                            <li><a class="dropdown-item" href="#">อาหารเสริมผู้ชาย</a></li>
                                            <li><a class="dropdown-item" href="#">อาหารเสริมผู้หญิง</a></li>
                                            <li><a class="dropdown-item" href="#">อาหารเสริมของเด็ก</a></li>
                                            <li><a class="dropdown-item" href="#">อาหารเสริมอื่นๆ</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu" >
                                        <a class="dropdown-item dropdown-toggle" href="#">ผลิตภัณฑ์สมุนไพร</a>
                                        <ul class="dropdown-menu" aria-labelledby="menu-ordinance">
                                            <li><a class="dropdown-item" href="#">ผลิตภัณฑ์สมุนไพรแบบรับประทาน</a></li>
                                            <li><a class="dropdown-item" href="#">ผลิตภัณฑ์สมุนไพรใช้ภายนอก</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu" >
                                        <a class="dropdown-item dropdown-toggle" href="#">ผลิตภัณฑ์ดูแลผิวหน้า ผิวกาย</a>
                                        <ul class="dropdown-menu" aria-labelledby="menu-ordinance">
                                            <li><a class="dropdown-item" href="#">ผลิตภัณฑ์ดูแลผิวหน้า</a></li>
                                            <li><a class="dropdown-item" href="#">ผลิตภัณฑ์ดูแลผิวกาย</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu" >
                                        <a class="dropdown-item dropdown-toggle" href="#">ผลิตภัณฑ์เครื่องมือแพทย์</a>
                                        <ul class="dropdown-menu" aria-labelledby="menu-ordinance">
                                            <li><a class="dropdown-item" href="#">อาหารเสริมทางการแพทย์</a></li>
                                            <li><a class="dropdown-item" href="#">อุปกรณ์การแพทย์</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="promotion.html">โปรโมชั่น</a></li>
                            <li class="nav-item"><a class="nav-link" href="news.html">ข่าวสาร</a></li>
                            <li class="nav-item"><a class="nav-link" href="knowledge.html">ความรู้น่ารู้</a></li>
                            <li class="nav-item"><a class="nav-link" href="how2pay.html">วิธีสั่งซื้อและชำระเงิน</a></li>
                            <li class="nav-item"><a class="nav-link" href="confirm.html">แจ้งการโอนเงิน</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">ติดต่อเรา</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--########################### END HEADER ###########################-->
