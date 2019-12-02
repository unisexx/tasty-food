<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    function index()
    {
        $infos = Info::where('status', 1)->orderBy('id', 'desc')->paginate(3);
        return view('front.info.index', compact('infos'));
    }

    function view($id)
    {
        $info = Info::findOrFail($id);
        return view('front.info.view', compact('info'));
    }
}
