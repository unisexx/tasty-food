<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class HowToBuyController extends Controller
{
    public function index()
    {
        $howtobuy = Page::find(3);
        $howtopay = Page::find(4);
        return view('front.how-to-buy.index', compact('howtobuy', 'howtopay'));
    }
}
