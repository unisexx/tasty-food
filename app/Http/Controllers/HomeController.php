<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Banner;
use App\Models\Hilight;
use App\Models\Knowledge;
use App\Models\ProductItem;
use App\Models\Promotion;
use App\Models\Vdo;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        $banners = Banner::where('status', 1)->where('position', 1)->orderBy('id', 'desc')->get();
        $banner_hilights = Banner::where('status', 1)->where('position', 4)->orderBy('id', 'desc')->get();
        $vdo_hilights = Vdo::where('status', 1)->where('position', 1)->orderBy('id', 'desc')->get();
        // $product_categories = ProductCategory::whereNull('parent_id')->where('status', 1)->orderBy('_lft')->get();

        // สินค้าใหม่
        $newitems = ProductItem::where('status', 1)->where('is_new', 1)->orderBy('id', 'desc')->take(8)->get();

        // สินค้าขายดี
        // $sql = "SELECT
        //             product_items.id,
        //             -- product_items.brand,
        //             -- product_items.`name`,
        //             -- product_items.price,
        //             -- product_items.vip_price,
        //             -- Sum(order_details.price) AS total_price,
        //             Sum(order_details.qty) AS total_qty
        //             FROM
        //                 orders
        //             INNER JOIN order_details ON orders.id = order_details.order_id
        //             INNER JOIN product_items ON product_items.id = order_details.product_item_id
        //             WHERE
        //                 orders.`status` = 'จัดส่งสินค้าแล้ว'
        //             GROUP BY
        //                 product_item_id
        //             ORDER BY
        //                 total_qty DESC
        //             LIMIT 8";
        // $rs = DB::select($sql);

        // $list_id = [];
        // foreach($rs as $key => $value)
        // {
        //     $list_id[] = $value->id;
        // }

        // $bestitems = ProductItem::whereIn('id', $list_id)->get();
        $bestitems = ProductItem::where('status', 1)->where('is_bestseller', 1)->orderBy('id', 'desc')->take(8)->get();

        // โปรโมชั่น
        $promotions = Promotion::where('status', 1)->inRandomOrder()->take(3)->get();

        return view('home', compact('hilights', 'banners', 'banner_hilights', 'vdo_hilights', 'promotions', 'newitems', 'bestitems'));
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
        echo "5555";
        // $requestData = $request->all();

        // if ($requestData['password']) {
        //     $requestData['password'] = bcrypt($request->password);
        // }

        // $requestData['is_admin'] = 0;
        // $user = User::create($requestData);

        // auth()->login($user);

        // return redirect()->to('/');
    }

    public function flogout()
    {
        Auth::logout();

        return redirect()->to('/');
    }

    public function search(Request $request)
    {
        $keyword = $request->get('searchtxt');

        // สินค้า
        $product_items = ProductItem::select('*');

        if (!empty($keyword)) {
            $product_items = $product_items->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('brand', 'LIKE', "%$keyword%");
            });
        }

        $product_items = $product_items->where('status', 1)->get();

        // ข้อมูลสุขภาพ
        $knowledges = Knowledge::where('status', 1);

        if (!empty($keyword)) {
            $knowledges = $knowledges->where('title', 'LIKE', "%$keyword%");
        }

        $knowledges = $knowledges->get();

        return view('front.home.search', compact('product_items', 'knowledges'));
    }

    public function frontRegister(RegisterRequest $request)
    {
        // type 1 = บุคคลธรรมดา สมัครแล้ว login ได้เลย
        // type 2 = สมาชิกร้านค้า ต้องรอการยืนยันจาก admin ก่อน
        $requestData = $request->all();
        // dd($requestData);

        if ($requestData['password']) {
            $requestData['password'] = bcrypt($request->password);
        }

        // ถ้าสมัครเข้ามาเป้นบุคคลทั้วไป ให้ปรับ status = 1 เพื่อที่จะได้ login ได้
        if ($requestData['type'] == 1) {
            $requestData['status'] = 1;
        }

        // รูปใบประกอบวิชาชีพ
        if ($request->file('sell_license')) {
            $requestData['sell_license'] = time() . '.' . $request->sell_license->extension(); // ชื่อรูป
            $img = Image::make($_FILES['sell_license']['tmp_name']); // read image from temporary file
            // $img->fit(1110, 150); // resize image
            $img->save('uploads/user/sell_license/' . $requestData['sell_license']); // save image
        }

        // รูปใบอนุญาตขายยา
        if ($request->file('pro_license')) {
            $requestData['pro_license'] = time() . '.' . $request->pro_license->extension(); // ชื่อรูป
            $img = Image::make($_FILES['pro_license']['tmp_name']); // read image from temporary file
            // $img->fit(1110, 150); // resize image
            $img->save('uploads/user/pro_license/' . $requestData['pro_license']); // save image
        }

        $requestData['is_admin'] = 0;
        $user = User::create($requestData);

        // หลังสมัครแล้ว
        // ถ้า type = 1 (บุคคลธรรมดา) ให้ทำการ login ทันทีหลังสมัคร,
        // ถ้า type = 2 (ร้านค้า) ให้รอการยืนยันจาก admin
        if ($user->type == 1) {
            auth()->login($user);
            set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบ');
        } else {
            set_notify('success', 'สมัครสมาชิกสำเร็จ รอการตรวจสอบยืนยันจากทางเว็บไซต์');
        }

        return redirect()->to('/');

        // return back();
    }
}
