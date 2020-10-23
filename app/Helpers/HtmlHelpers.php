<?php
if (!function_exists('get_first_paragraph')) {
    function get_first_paragraph($text)
    {
        $p = substr($text, strpos($text, "<p"), strpos($text, "</p>") + 4);

        return $p;
    }
}

if (!function_exists('order_status')) {
    function order_status($status)
    {
        $statusArray = ['รอการแจ้งโอน' => 'info', 'แจ้งโอนเงินแล้ว' => 'warning', 'จัดส่งสินค้าแล้ว' => 'success'];

        return $statusArray[$status];
    }
}

if (!function_exists('remove_commars')) {
    function remove_commars($number)
    {
        return str_replace(',', '', $number);
    }
}

if (!function_exists('show_price')) {
    function show_price($productItemId)
    {
        if (@Auth::user()->is_vip == 1) {
            $price = $productItemId->productItemPriceFirst->price_vip;
        } else {
            $price = $productItemId->productItemPriceFirst->price;
        }

        return $price;
    }
}

if (!function_exists('shipping_cost')) {
    function shipping_cost($weight)
    {
        $shipping_cost = \App\Models\ShippingRate::where('start_weight', '<=', $weight)
            ->where('end_weight', '>=', $weight)
            ->first()->cost;

        return $shipping_cost;
    }
}
