<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductItem;

class ProductController extends Controller
{
    public function index()
    {
        // สินค้าขายดี
        $bestitems = ProductItem::where('status', 1)->where('is_bestseller', 1)->orderBy('id', 'desc')->take(8)->get();

        // หมวดหมู่สินค้า
        $product_category = ProductCategory::orderBy('_lft')->get()->toTree();

        return view('front.product.index', compact('bestitems', 'product_category'));
    }
}
