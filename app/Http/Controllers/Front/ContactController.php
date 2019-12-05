<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontContactRequest;
use App\Models\Contact;
use App\Models\Message;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::findOrFail(1);
        return view('front.contact.index', compact('contact'));
    }

    public function save(FrontContactRequest $request)
    {
        $requestData = $request->all();
        Message::create($requestData);

        set_notify('success', 'ส่งข้อความเรียบร้อย');
        return back();
    }
}
