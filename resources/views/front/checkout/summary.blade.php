<ul class="summaryList">
    @php
        $sum = 0;
    @endphp
    @foreach ($carts as $cart)
    @php
        $sum+= $cart->productItem->price * $cart->qty;
    @endphp
    <li>{{ $cart->productItem->name }} <span class="totalprice">{!! number_format($cart->productItem->price * $cart->qty, 2) !!} </span></li>
    @endforeach
    <li>ค่าจัดส่ง <span class="totalprice">55.00</span></li>
    <li class="total-cart">ราคารวม <span class="totalAll">{{ number_format($sum+55.00, 2) }}</span></li>
</ul>