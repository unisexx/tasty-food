<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductItemPrice;
use Auth;
use Illuminate\Http\Request;
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

    public function finish(Request $request)
    {
        $requestData = $request->all();

        //  อัพเดท table order ของ member
        $requestData['user_id'] = @Auth::user()->id;
        $requestData['status'] = 'รอการแจ้งโอน';
        $order = Order::create($requestData);

        $carts = Cart::where('user_id', @Auth::user()->id)->get();

        foreach ($carts as $cart) {
            $orderdetail = new OrderDetail;
            $orderdetail->order_id = $order->id;
            $orderdetail->product_item_price_id = $cart->product_item_price_id;
            $orderdetail->qty = $cart->qty;
            $orderdetail->price = @show_price(ProductItemPrice::find($cart->product_item_price_id));
            $orderdetail->total_price = @show_price(ProductItemPrice::find($cart->product_item_price_id)) * $cart->qty;
            $orderdetail->save();
        }

        // ลบข้อมูลในตระกร้าสินค้า
        Cart::where('user_id', @Auth::user()->id)->delete();

        return redirect('member/order');
    }
}
