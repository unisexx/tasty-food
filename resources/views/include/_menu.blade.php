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
                <a href="{{ url('product') }}">สินค้า<i class="fa fa-angle-right" style="margin-left:5px; font-size:20px; float:right;"></i></a>
                <ul>
                    @foreach ($product_category_menu as $parent_cat)
                    <li>
                        <a href="{{ url('product-category/'.$parent_cat->id) }}">{{ $parent_cat->name }} <i class="fa fa-angle-right"
                                style="margin-left:5px; font-size:20px"></i></a>
                        @if(count($parent_cat->children))
                        <ul>
                            @foreach($parent_cat->children as $cat)
                            <li><a href="{{ url('product-category/'.$cat->id) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ url('promotion') }}">โปรโมชั่น</a></li>
            <li>
                <a href="{{ url('knowledge') }}">ข้อมูลสุขภาพ<i class="fa fa-angle-right"
                        style="margin-left:5px; font-size:20px; float:right;"></i></a>
                <ul>
                    @foreach ($knowledge_category_menu as $item)
                        <li>
                            <a href="{{ url('knowledge-category/'.$item->id) }}">{{ $item->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ url('how-to-buy') }}">วิธีสั่งซื้อและชำระเงิน</a></li>
            <li><a href="{{ url('confirm-payment') }}">แจ้งการโอนเงิน</a></li>
            <li><a href="{{ url('contact') }}">ติดต่อเรา</a></li>
        </ul>
    </div>
</nav>
<!--########################### END MENU ###########################-->