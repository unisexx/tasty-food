<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductItem;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        DB::enableQueryLog();
    }

    # รายงานสรุปยอดขาย
    public function report1(Request $request)
    {
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        if (!empty($start_date) && !empty($end_date)) {
            $condition = " and (orders.updated_at BETWEEN '" . Date2DB($start_date . ' 00:00:00', 'showtime') . "' AND '" . Date2DB($end_date . ' 23:59:59', 'showtime') . "') ";
        }

        if (!empty($start_date) && empty($end_date)) {
            $condition = " and (orders.updated_at > '" . Date2DB($start_date . ' 00:00:00', 'showtime') . "' ";
        }

        if (empty($start_date) && !empty($end_date)) {
            $condition = " and (orders.updated_at < '" . Date2DB($end_date . ' 00:00:00', 'showtime') . "' ";
        }

        $sql = "SELECT
                    DATE(orders.updated_at) AS updated_at,
                    SUM(qty) AS total_qty,
                    SUM(price) AS total_price
                    FROM
                    orders
                    INNER JOIN order_details ON orders.id = order_details.order_id
                    WHERE orders.`status` = 'จัดส่งสินค้าแล้ว' " . @$condition . "
                    GROUP BY updated_at
                    ORDER BY updated_at DESC";
        $rs = DB::select($sql);

        return view('admin.report.report1', compact('rs'));
    }

    # รายงานสินค้าขายดี
    public function report2(Request $request)
    {
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        if (!empty($start_date) && !empty($end_date)) {
            $condition = " and (orders.updated_at BETWEEN '" . Date2DB($start_date . ' 00:00:00', 'showtime') . "' AND '" . Date2DB($end_date . ' 23:59:59', 'showtime') . "') ";
        }

        if (!empty($start_date) && empty($end_date)) {
            $condition = " and (orders.updated_at > '" . Date2DB($start_date . ' 00:00:00', 'showtime') . "' ";
        }

        if (empty($start_date) && !empty($end_date)) {
            $condition = " and (orders.updated_at < '" . Date2DB($end_date . ' 00:00:00', 'showtime') . "' ";
        }

        $sql = "SELECT
                    product_items.brand,
                    product_items.`name`,
                    product_item_prices.title,
                    Sum( order_details.qty ) AS total_qty,
                    Sum( order_details.price ) AS total_price
                FROM
                    orders
                    INNER JOIN order_details ON orders.id = order_details.order_id
                    INNER JOIN product_item_prices ON product_item_prices.id = order_details.product_item_price_id
                    INNER JOIN product_items ON product_items.id = product_item_prices.product_item_id
                WHERE
                    orders.status = 'จัดส่งสินค้าแล้ว'  " . @$condition . "
                GROUP BY
                    product_item_price_id
                ORDER BY
                    total_price DESC";

        $rs = DB::select($sql);

        return view('admin.report.report2', compact('rs'));
    }

    # รายงานลูกค้าชั้นยอด
    public function report3(Request $request)
    {
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        if (!empty($start_date) && !empty($end_date)) {
            $condition = " and (orders.updated_at BETWEEN '" . Date2DB($start_date . ' 00:00:00', 'showtime') . "' AND '" . Date2DB($end_date . ' 23:59:59', 'showtime') . "') ";
        }

        if (!empty($start_date) && empty($end_date)) {
            $condition = " and (orders.updated_at > '" . Date2DB($start_date . ' 00:00:00', 'showtime') . "' ";
        }

        if (empty($start_date) && !empty($end_date)) {
            $condition = " and (orders.updated_at < '" . Date2DB($end_date . ' 00:00:00', 'showtime') . "' ";
        }

        $sql = "SELECT
                    users.`name`,
                    users.email,
                    users.is_vip,
                    SUM(price) as total_price
                    FROM
                    users
                    INNER JOIN orders ON users.id = orders.user_id
                    INNER JOIN order_details ON orders.id = order_details.order_id
                    WHERE orders.status = 'จัดส่งสินค้าแล้ว' " . @$condition . "
                    GROUP BY email
                    ORDER BY total_price DESC";
        $rs = DB::select($sql);

        return view('admin.report.report3', compact('rs'));
    }

    # รายงานการเข้าชมสินค้า
    public function report4(Request $request)
    {
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        $rs = ProductItem::withCount('productItemCounter');

        if (!empty($start_date) && !empty($end_date)) {
            $rs = $rs->whereHas('productItemCounter', function ($q) use ($start_date, $end_date) {
                $q->whereBetween('created_at', [Date2DB($start_date . ' 00:00:00', 'showtime'), Date2DB($end_date . ' 23:59:59', 'showtime')]);
            });
        }

        if (!empty($start_date) && empty($end_date)) {
            $rs = $rs->whereHas('productItemCounter', function ($q) use ($start_date) {
                $q->where('created_at', '>', Date2DB($start_date . ' 00:00:00', 'showtime'));
            });
        }

        if (empty($start_date) && !empty($end_date)) {
            $rs = $rs->whereHas('productItemCounter', function ($q) use ($end_date) {
                $q->where('created_at', '<', Date2DB($end_date . ' 00:00:00', 'showtime'));
            });
        }

        $rs = $rs->orderBy('product_item_counter_count', 'desc')->get();

        // dd(DB::getQueryLog());

        return view('admin.report.report4', compact('rs'));
    }
}
