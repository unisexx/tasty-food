<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Knowledge;

class KnowledgeController extends Controller
{
    function index()
    {
        $knowledges = Knowledge::where('status', 1)->orderBy('id', 'desc')->paginate(3);
        return view('front.knowledge.index', compact('knowledges'));
    }

    function view($id)
    {
        $knowledge = Knowledge::findOrFail($id);
        return view('front.knowledge.view', compact('knowledge'));
    }
}
