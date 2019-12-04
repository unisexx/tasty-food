<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function index()
    {
        $contact = Contact::findOrFail(1);
        return view('front.contact.index', compact('contact'));
    }
}
