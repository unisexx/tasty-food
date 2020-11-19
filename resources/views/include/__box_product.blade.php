<div class="col-12 col-sm-6 col-md-3 d-inline-block box-products">
    <a href="{{ url('product-item/'.@$product_item->id) }}">
        <p class="name-product">{{ @$product_item->name }}</p>
        <img class="img-fluid" src="{{ url('uploads/product-item/'.@$product_item->productImageFirst->name) }}">
    </a>
    <div class="link">
        <ul>
            <li>
                <div class="buy add1 item_add" data-id="{{ @$product_item->productItemPriceFirst->id }}" data-qty="1">
                    <img src="{{ url('chc/images/icon-cart.png') }}" alt="" class="icon-buy"> 
                    <span class="text-white">Buy</span> <div class="carousel-control-next-icon i-buy"></div></a>
                </div>
            </li>
            <li> <a class="go-detail" href="{{ url('product-item/'.@$product_item->id) }}"><img src="{{ url('chc/images/icon-go-detail.png') }}" alt=""> Detail</a></li>
        </ul>
    </div>
    <div class="price2">
        ฿{{ @show_price(@$product_item->productItemPriceFirst) }}
        @if(@$product_item->productItemPriceFirst->price_full)
            <div class="original-price">฿{{ @$product_item->productItemPriceFirst->price_full }}</div>
        @endif
    </div>
</div>