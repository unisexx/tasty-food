<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductItem;

class ProductItemController extends Controller
{
    public function view($id)
    {
        $product_item = ProductItem::findOrFail($id);
        return view('front.product-item.view', compact('product_item'));
    }
}
