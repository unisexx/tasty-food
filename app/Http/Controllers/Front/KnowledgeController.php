<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Knowledge;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    public function index(Request $request)
    {
        $knowledge_category_id = $request->get('category');

        $knowledges = Knowledge::where('status', 1);

        if (!empty($knowledge_category_id)) {
            $knowledges = $knowledges->where('knowledge_category_id', $knowledge_category_id);
        }

        $knowledges = $knowledges->orderBy('id', 'desc')->paginate(5);

        return view('front.knowledge.index', compact('knowledges'));
    }

    public function view($id)
    {
        $knowledge = Knowledge::findOrFail($id);

        return view('front.knowledge.view', compact('knowledge'));
    }
}
