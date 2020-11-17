<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductItemRequest;
use App\Models\ProductImage;
use App\Models\ProductItem;
use App\Models\ProductItemPrice;
use Intervention\Image\Facades\Image;

class ProductItemController extends Controller
{
    public function index()
    {
        $rs = ProductItem::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();

        return view('admin.product-item.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.product-item.create');
    }

    public function store(ProductItemRequest $request)
    {
        $requestData = $request->all();
        $requestData['price'] = remove_commars($request->price);
        $rs = ProductItem::create($requestData);

        // ไฟล์แนบหลายไฟล์
        $this->saveProductImage($request, $rs);

        // บันทึกราคาสินค้า
        $this->saveProductPrice($request, $rs);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');

        return redirect('admin/product-item');
    }

    public function edit($id)
    {
        $rs = ProductItem::findOrFail($id);

        return view('admin.product-item.edit', compact('rs'));
    }

    public function update(ProductItemRequest $request, $id)
    {
        $requestData = $request->all();
        $requestData['price'] = remove_commars($request->price);
        $rs = ProductItem::findOrFail($id);
        $rs->update($requestData);

        // บันทึกไฟล์แนบหลายไฟล์
        $this->saveProductImage($request, $rs);

        // บันทึกราคาสินค้า
        $this->saveProductPrice($request, $rs);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');

        return redirect('admin/product-item');
    }

    public function destroy($id)
    {
        ProductItem::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');

        return redirect('admin/product-item');
    }

    public function saveProductImage($request, $rs)
    {
        if ($request->hasFile('image')) {
            if ($files = $request->file('image')) {
                foreach ($files as $key => $file) {

                    $name = uniqid() . '.' . $file->extension(); // ชื่อรูป

                    $img = Image::make($file->getRealPath()); // read image from temporary file
                    $img->resize(null, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save('uploads/product-item/' . $name); // save image

                    //thumb
                    $img2 = Image::make($file->getRealPath());
                    $img2->resizeCanvas(350, 350, 'center', false, 'FFFFFF');
                    $img2->save('uploads/product-item/thumb/' . $name);

                    $p = new ProductImage;
                    $p->product_item_id = $rs->id;
                    $p->name = $name;
                    $p->save();
                }
            }
        }
    }

    public function saveProductPrice($request, $rs)
    {
        ProductItemPrice::where('product_item_id', $rs->id)->whereNotIn('id', $request->product_item_price_id)->delete();

        if (isset($request->title)) {
            foreach ($request->title as $i => $item) {
                ProductItemPrice::updateOrCreate(
                    [
                        'id' => $request->product_item_price_id[$i],
                    ],
                    [
                        'title'           => $request->title[$i],
                        'weight'          => $request->weight[$i],
                        'price_full'      => $request->price_full[$i],
                        'price'           => $request->price[$i],
                        'price_vip'       => $request->price_vip[$i],
                        'product_item_id' => $rs->id,
                    ]
                );
            }
        }
    }
}
