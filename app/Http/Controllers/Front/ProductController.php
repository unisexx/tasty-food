<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $category = ProductCategory::orderBy('_lft')->get()->toTree();
        return view('front.product.index', compact('category'));
    }
}
