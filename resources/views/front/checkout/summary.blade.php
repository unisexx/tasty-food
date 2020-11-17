<ul class="summaryList">
    @php
        $sum = 0;
        $sum_weight = 0;
    @endphp
    @foreach ($carts as $cart)
    @php
        $sum+= show_price($cart->productItemPrice) * $cart->qty;
        $sum_weight += $cart->productItemPrice->weight * $cart->qty;
    @endphp
    <li>{{ $cart->productItemPrice->productItem->name }} <span class="totalprice">{!! number_format(show_price($cart->productItemPrice) * $cart->qty, 2) !!} </span></li>
    @endforeach
    <li>
        ค่าจัดส่ง ({{ $sum_weight/1000 }} kg)<span class="totalprice">{{ shipping_cost($sum_weight) }}</span>
    </li>
    <li class="total-cart">
        ราคารวม <span class="totalAll">{{ number_format($sum+shipping_cost($sum_weight), 2) }}</span>
    </li>
</ul>