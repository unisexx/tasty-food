<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;
use App\Models\ProductItem;

class ProductCategoryController extends Controller
{
    function index($id)
    {
        $product_category = ProductCategory::findOrFail($id);
        $product_items = $product_category->productItem()->paginate(8);
        // $product_items = ProductItem::where('product_category_id', $id)->where('status', 1)->paginate(8);
        // dd($product_items);
        return view('front.product-category.index', compact('product_category', 'product_items'));
    }
}
