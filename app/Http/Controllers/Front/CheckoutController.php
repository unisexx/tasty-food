<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductItemPrice;
use Auth;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', @Auth::user()->id)->get();
        } else {
            $carts = Cart::where('session_id', session()->getId())->get();
        }

        return view('front.checkout.index', compact('carts'));
    }

    public function finish()
    {
        $carts = Cart::where('user_id', @Auth::user()->id)->get();

        //  อัพเดท table order ของ member
        $order = new Order;
        $order->user_id = @Auth::user()->id;
        $order->status = 'รอการแจ้งโอน';
        $order->save();

        foreach ($carts as $cart) {
            $orderdetail = new OrderDetail;
            $orderdetail->order_id = $order->id;
            $orderdetail->product_item_price_id = $cart->product_item_price_id;
            $orderdetail->qty = $cart->qty;
            $orderdetail->price = (show_price(ProductItemPrice::find($cart->product_item_price_id)) * $cart->qty);
            $orderdetail->save();
        }

        // ลบข้อมูลในตระกร้าสินค้า
        Cart::where('user_id', @Auth::user()->id)->delete();

        return redirect('member/order');
    }
}
