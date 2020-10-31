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
    function show_price($productItemPrice)
    {
        if (@Auth::user()->is_vip == 1) {
            $price = $productItemPrice->price_vip;
        } else {
            $price = $productItemPrice->price;
        }

        return $price;
    }
}

if (!function_exists('shipping_cost')) {
    function shipping_cost($weight)
    {
        $shipping_cost = \App\Models\ShippingRate::where(function ($query) use ($weight) {
            $query->where('start_weight', '<=', $weight);
            $query->where('end_weight', '>=', $weight);
        })->first()->cost;

        return $shipping_cost;
    }
}

if (!function_exists('iconArray')) {
    function iconArray($product_category_id)
    {
        $iconArray = ['26' => 'icon-heart.png', '27' => 'icon-leaf.png', '21' => 'icon-face.png', '22' => 'icon-doctor.png'];

        return $iconArray[$product_category_id];
    }
}

if (!function_exists('titleArray')) {
    function titleArray($product_category_id)
    {
        $titleArray = ['26' => 'title-page3', '27' => 'title-page4', '21' => 'title-page5', '22' => 'title-page6'];

        return $titleArray[$product_category_id];
    }
}

if (!function_exists('tabArray')) {
    function tabArray($product_category_id)
    {
        $tabArray = ['26' => 'tab-product', '27' => 'tab-product2', '21' => 'tab-product3', '22' => 'tab-product4'];

        return $tabArray[$product_category_id];
    }
}
