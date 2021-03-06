<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/order';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // ใช้กำหนดฟิลด์ที่ใช้ในการ login
    protected function credentials(Request $request)
    {
        // return ['username' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
        return ['email' => $request->email, 'password' => $request->password, 'status' => 1];
    }

    protected function redirectTo()
    {
        if (auth()->user()->isAdmin()) {
            return '/admin/order';
        } else {
            return '/member/profile';
        }
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $cart_id = session('cartID');
        // dump($cart_id);

        $request->session()->regenerate();

        Session::put('cartID', $cart_id);

        // อัพเดทตระกร้าสินค้าใหม่หลังจากที่ user login
        Cart::where('session_id', Session::get('cartID'))->update(['user_id' => auth()->user()->id]);

        // dd(auth()->user()->id);
        // dd(Session::get('cartID'));

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }
}
