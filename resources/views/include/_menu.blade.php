
@php
$product_category_menu = App\Models\ProductCategory::where('status',1)->orderBy('_lft')->get()->toTree();
@endphp

<!--########################### START MENU ###########################-->
<nav class="navbar-expand-md bg-faded p-0">
    <!-- links toggle -->
    <button class="navbar-toggler tog" type="button" data-toggle="collapse" data-target="#leftmenu"
        aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line" style="margin-bottom: 0;"></span>
    </button>

    <div class="dynamic-part collapse navbar-collapse" id="leftmenu">
        <ul>
            <li class="nav-item shop"><a class="nav-link" href="{{ url('') }}">ร้าน CHULALAK</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">เกี่ยวกับเรา</a></li>
            <li>
                <a href="products.html">สินค้า<i class="fa fa-angle-right"
                        style="margin-left:5px; font-size:20px; float:right;"></i></a>
                <ul>
                    <li>
                        <a href="#">ผลิตภัณฑ์อาหารเสริมเพื่อสุขภาพ <i class="fa fa-angle-right"
                                style="margin-left:1px; font-size:20px"></i></a>
                        <ul>
                            <li><a href="#">อาหารเสริมผู้ชาย</a></li>
                            <li><a href="#">อาหารเสริมผู้หญิง</a></li>
                            <li><a href="#">อาหารเสริมของเด็ก</a></li>
                            <li><a href="#">อาหารเสริมอื่นๆ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">ผลิตภัณฑ์สมุนไพร <i class="fa fa-angle-right"
                                style="margin-left:5px; font-size:20px"></i></a>
                        <ul>
                            <li><a href="#">ผลิตภัณฑ์สมุนไพรแบบรับประทาน</a></li>
                            <li><a href="#">ผลิตภัณฑ์สมุนไพรใช้ภายนอก</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">ผลิตภัณฑ์ดูแลผิวหน้า ผิวกาย <i class="fa fa-angle-right"
                                style="margin-left:5px; font-size:20px"></i></a>
                        <ul>
                            <li><a href="#">ผลิตภัณฑ์ดูแลผิวหน้า</a></li>
                            <li><a href="#">ผลิตภัณฑ์ดูแลผิวกาย</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">ผลิตภัณฑ์เครื่องมือแพทย์ <i class="fa fa-angle-right"
                                style="margin-left:5px; font-size:20px"></i></a>
                        <ul>
                            <li><a href="#">อาหารเสริมทางการแพทย์</a></li>
                            <li><a href="#">อุปกรณ์การแพทย์</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="{{ url('promotion') }}">โปรโมชั่น</a></li>
            <li>
                <a href="{{ url('knowledge') }}">ข้อมูลสุขภาพ<i class="fa fa-angle-right"
                        style="margin-left:5px; font-size:20px; float:right;"></i></a>
                <ul>
                    <li>
                        <a href="#">วิตามิน</a>
                    </li>
                    <li>
                        <a href="#">สมุนไพร</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{ url('how-to-buy') }}">วิธีสั่งซื้อและชำระเงิน</a></li>
            <li><a href="{{ url('confirm-payment') }}">แจ้งการโอนเงิน</a></li>
            <li><a href="{{ url('contact') }}">ติดต่อเรา</a></li>
        </ul>
    </div>
</nav>
<!--########################### END MENU ###########################-->