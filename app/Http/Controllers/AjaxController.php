<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Auth;
use DB;
use Session;

class AjaxController extends Controller
{
    public function ajaxSwitchStatus()
    {
        $statusArray = array("true" => "1", "false" => "0");
        $status = $statusArray[$_GET['status']];

        DB::table($_GET['table'])
            ->where('id', $_GET['id'])
            ->update(['status' => $status]);

        // ถ้า $_GET['table'] = product_items ให้ลบข้อมูลในตระกร้าออกด้วย
        if ($_GET['table'] == 'product_items') {
            DB::table('carts')
                ->where('product_item_id', $_GET['id'])
                ->delete();
        }
    }

    public function ajaxRebuildTree()
    {
        // dd($_GET);
        $categories = $_GET['sort'];
        // dump($categories);

        if (is_array($categories)) {
            foreach ($categories as $cat) {
                if (isset($cat['id'])) {
                    $node = ProductCategory::find($cat['id']);
                    $node->parent_id = $cat['parent_id'] ?? null;
                    $node->_lft = $cat['left'];
                    $node->_rgt = $cat['right'];
                    $node->save();
                }
            }
        }
    }

    public function ajaxLoadProductCategoryForm()
    {
        $rs = ProductCategory::findOrFail($_GET['id']);

        return view('admin.product-category.form', compact('rs'));
    }

    public function ajaxUpdateOrderProductImage()
    {
        // dd($_GET);
        $sort = $_GET['id'];
        // dump($sort);
        if (is_array($sort)) {
            foreach ($sort as $key => $imgID) {
                $node = ProductImage::find($imgID);
                $node->order = $key;
                $node->save();
            }
        }
    }

    public function ajaxDeleteProductImage()
    {
        ProductImage::destroy($_GET['id']);
    }

    public function ajaxAddItems()
    {
        if (Auth::check()) {
            $cart = Cart::where('product_item_price_id', $_GET['product_item_price_id'])->where('user_id', @Auth::user()->id)->first();
        } else {
            $cart = Cart::where('product_item_price_id', $_GET['product_item_price_id'])->where('session_id', session()->getId())->first();
        }

        Session::put('cartID', session()->getId());

        if ($cart) {
            $cart->update(['qty' => DB::raw('qty+' . $_GET['product_item_qty'])]);
        } else {
            $newcart = new Cart;
            $newcart->user_id = @Auth::user()->id;
            $newcart->session_id = Session::get('cartID');
            // $newcart->product_item_id = $_GET['product_item_id'];
            $newcart->product_item_price_id = $_GET['product_item_price_id'];
            $newcart->qty = $_GET['product_item_qty'] ?? 1;
            $newcart->save();
        }
    }

    public function updateCartNumber()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', @Auth::user()->id)->get();
        } else {
            $carts = Cart::where('session_id', session()->getId())->get();
        }

        // จำนวนสินค้า
        $data['count'] = $carts->count();
        Session::put('cartNumber', $data['count']);

        // มูลค่าสินค้า
        $sum = 0;
        foreach ($carts as $cart) {
            $sum += show_price($cart->productItemPrice) * $cart->qty;
        }
        $data['total'] = '฿' . number_format($sum, 2);
        Session::put('cartTotalPrice', $data['total']);

        return $data;
    }

    public function ajaxUpdateQty()
    {
        if (Auth::check()) {
            $cart = Cart::where('product_item_price_id', $_GET['product_item_price_id'])->where('user_id', @Auth::user()->id)->first();
        } else {
            $cart = Cart::where('product_item_price_id', $_GET['product_item_price_id'])->where('session_id', session()->getId())->first();
        }

        // อัพเดท cart สินค้า
        if ($cart) {
            $cart->update(['qty' => $_GET['qty']]);
        }
    }

    public function ajaxUpdateSummary()
    {
        // สรุปรายการสั่งซื้อต่อ
        if (Auth::check()) {
            $carts = Cart::where('user_id', @Auth::user()->id)->get();
        } else {
            $carts = Cart::where('session_id', session()->getId())->get();
        }

        return view('front.checkout.summary', compact('carts'));
    }

    public function ajaxEmptyCart()
    {
        if (Auth::check()) {
            Cart::where('user_id', @Auth::user()->id)->delete();
        } else {
            Cart::where('session_id', session()->getId())->delete();
        }
    }

    public function ajaxDeleteProductItem()
    {
        if (Auth::check()) {
            Cart::where('product_item_price_id', $_GET['product_item_price_id'])->where('user_id', @Auth::user()->id)->delete();
        } else {
            Cart::where('product_item_price_id', $_GET['product_item_price_id'])->where('session_id', session()->getId())->delete();
        }
    }
}
