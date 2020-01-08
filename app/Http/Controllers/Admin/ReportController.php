<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductItem;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report4(Request $request)
    {
        DB::enableQueryLog();

        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        $rs = ProductItem::withCount('productItemCounter');

        if (!empty($start_date) && !empty($end_date)) {
            $rs = $rs->whereHas('productItemCounter', function ($q) use ($start_date, $end_date) {
                $q->whereBetween('created_at', [Date2DB($start_date . ' 00:00:00', 'showtime'), Date2DB($end_date . ' 23:59:59', 'showtime')]);
            });
        }

        $rs = $rs->orderBy('product_item_counter_count', 'desc')->get();

        // dd(DB::getQueryLog());

        return view('admin.report.report4', compact('rs'));
    }
}
