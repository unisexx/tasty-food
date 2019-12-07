<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Hilight;
use App\Models\ProductCategory;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $hilights = Hilight::where('status', 1)->orderBy('id', 'desc')->get();
        $product_categories = ProductCategory::whereNull('parent_id')->where('status', 1)->orderBy('_lft')->get();
        return view('home', compact('hilights', 'product_categories'));
    }

    public function flogin()
    {
        return view('front.home.login');
    }

    public function fdologin()
    {
        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     // Authentication passed...
        //     return redirect()->intended('dashboard');
        // }
    }

    public function fregister()
    {
        return view('front.home.register');
    }

    public function fdoregister(RegisterRequest $request)
    {
        $requestData = $request->all();

        if ($requestData['password']) {
            $requestData['password'] = bcrypt($request->password);
        }

        $requestData['is_admin'] = 0;
        $user = User::create($requestData);

        auth()->login($user);
        return redirect()->to('/');
    }

    public function flogout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
