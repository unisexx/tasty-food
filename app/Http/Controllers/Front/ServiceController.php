<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    function index()
    {
        $services = Service::where('status', 1)->orderBy('id', 'desc')->paginate(3);
        return view('front.service.index', compact('services'));
    }

    function view($id)
    {
        $service = Service::findOrFail($id);
        return view('front.service.view', compact('service'));
    }
}
