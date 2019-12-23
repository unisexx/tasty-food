<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductItem;

class ProductItemController extends Controller
{
    public function view($id)
    {
        $product_item = ProductItem::findOrFail($id);
        $related_items = ProductItem::where('id', '!=', $product_item->id)->where('product_category_id', $product_item->product_category_id)->where('status', 1)->take(8)->get();
        return view('front.product-item.view', compact('product_item', 'related_items'));
    }
}
