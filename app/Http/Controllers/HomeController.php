<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Hilight;
use App\Models\ProductCategory;
use App\Models\ProductItem;
use App\Models\Promotion;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

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

        // สินค้าใหม่
        $newitems = ProductItem::where('status', 1)->orderBy('id', 'desc')->take(8)->get();

        // สินค้าขายดี
        $sql = "SELECT
                    product_items.id,
                    -- product_items.brand,
                    -- product_items.`name`,
                    -- product_items.price,
                    -- product_items.vip_price,
                    -- Sum(order_details.price) AS total_price,
                    Sum(order_details.qty) AS total_qty
                    FROM
                        orders
                    INNER JOIN order_details ON orders.id = order_details.order_id
                    INNER JOIN product_items ON product_items.id = order_details.product_item_id
                    WHERE
                        orders.`status` = 'จัดส่งสินค้าแล้ว'
                    GROUP BY
                        product_item_id
                    ORDER BY
                        total_qty DESC
                    LIMIT 8";
        $rs = DB::select($sql);

        $list_id = [];
        foreach($rs as $key => $value)
        {
            $list_id[] = $value->id;
        }

        $bestitems = ProductItem::whereIn('id', $list_id)->get();

        // โปรโมชั่น
        $promotions = Promotion::where('status', 1)->inRandomOrder()->take(3)->get();

        return view('home', compact('hilights', 'product_categories', 'promotions', 'newitems', 'bestitems'));
    }

    public function flogin()
    {
        return view('front.home.login');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
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

    public function search(Request $request)
    {
        $keyword = $request->get('search');

        $product_items = ProductItem::select('*');

        if (!empty($keyword)) {
            $rs = $rs->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('brand', 'LIKE', "%$keyword%");
            });
        }

        $product_items = $product_items->where('status', 1)->paginate(8);

        return view('front.home.search', compact('product_items'));
    }
}
