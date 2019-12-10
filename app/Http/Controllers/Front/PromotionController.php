<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::where('status', 1)->orderBy('id', 'desc')->paginate(3);
        return view('front.promotion.index', compact('promotions'));
    }

    public function view($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('front.promotion.view', compact('promotion'));
    }
}
