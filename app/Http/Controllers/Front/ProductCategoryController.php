<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductItem;

class ProductCategoryController extends Controller
{
    public function index($id)
    {
        $product_category = ProductCategory::findOrFail($id);
        $product_items = $product_category->productItem()->paginate(8);
        return view('front.product-category.index', compact('product_category', 'product_items'));
    }
}
