<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Vdo;

class AboutController extends Controller
{
    public function index()
    {
        $page = Page::findOrFail(1);
        $vdos = Vdo::where('status', 1)->where('position', 2)->get();

        return view('front.about.index', compact('page', 'vdos'));
    }
}
