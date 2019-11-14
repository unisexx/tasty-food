<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
	public function index(){
		$rs = ProductCategory::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();
		return view('admin.product-category.index', compact('rs'));
	}
}
