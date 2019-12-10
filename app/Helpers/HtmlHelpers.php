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
