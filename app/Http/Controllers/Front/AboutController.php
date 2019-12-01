<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AboutController extends Controller
{
    function index()
    {
        $page = Page::findOrFail(1);
        return view('front.about.index', compact('page'));
    }
}
