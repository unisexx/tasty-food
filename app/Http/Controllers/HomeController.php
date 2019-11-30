<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hilight;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hilights = Hilight::where('status', 1)->orderBy('id', 'desc')->get();
        $product_categories = ProductCategory::whereNull('parent_id')->where('status', 1)->orderBy('_lft')->get();
        return view('home', compact('hilights', 'product_categories'));
    }
}
