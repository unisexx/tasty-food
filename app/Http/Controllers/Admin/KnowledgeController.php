<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Knowledge;
use App\Models\KnowledgeBanner;
use App\Models\KnowledgeProductItem;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class KnowledgeController extends Controller
{
    public function index()
    {
        $rs = Knowledge::select('*');
        $rs = $rs->orderBy('id', 'desc')->get();

        return view('admin.knowledge.index', compact('rs'));
    }

    public function create()
    {
        return view('admin.knowledge.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required' => 'รูปไฮไลท์ ห้ามเป็นค่าว่าง',
            'image.image'    => 'รูปไฮไลท์ ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'    => 'รูปไฮไลท์ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'      => 'รูปไฮไลท์ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();

        // รูปอัพโหลด
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป

            // thumb
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(340, 208); // resize image
            $img->save('uploads/knowledge/thumb/' . $requestData['image']); // save image

            // full-image
            $img2 = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img2->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img2->save('uploads/knowledge/' . $requestData['image']); // save image
        }

        $rs = Knowledge::create($requestData);

        //บันทึกแบนเนอร์
        $this->saveKnowledgeBanner($request, $rs);

        //บันทึกสินค้าแนะนำ
        $this->saveKnowledgeProduct($request, $rs);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');

        return redirect('admin/knowledge');
    }

    public function edit($id)
    {
        $rs = Knowledge::findOrFail($id);

        return view('admin.knowledge.edit', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
            'image.required' => 'รูปไฮไลท์ ห้ามเป็นค่าว่าง',
            'image.image'    => 'รูปไฮไลท์ ต้องเป็นไฟล์รูปภาพ',
            'image.mimes'    => 'รูปไฮไลท์ ต้องเป็นไฟล์นามสกุล jpeg,png,jpg,gif',
            'image.max'      => 'รูปไฮไลท์ ขนาดไฟล์ห้ามเกิน 10 เมกะไบต์',
        ]);

        $requestData = $request->all();

        // รูปอัพโหลด
        if ($request->file('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension(); // ชื่อรูป

            // thumb
            $img = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img->fit(340, 208); // resize image
            $img->save('uploads/knowledge/thumb/' . $requestData['image']); // save image

            // full-image
            $img2 = Image::make($_FILES['image']['tmp_name']); // read image from temporary file
            $img2->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img2->save('uploads/knowledge/' . $requestData['image']); // save image
        }

        $rs = Knowledge::findOrFail($id);
        $rs->update($requestData);

        //บันทึกแบนเนอร์
        $this->saveKnowledgeBanner($request, $rs);

        //บันทึกสินค้าแนะนำ
        $this->saveKnowledgeProduct($request, $rs);

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');

        return redirect('admin/knowledge');
    }

    public function destroy($id)
    {
        Knowledge::destroy($id);
        set_notify('success', 'ลบข้อมูลสำเร็จ');

        return redirect('admin/knowledge');
    }

    public function saveKnowledgeBanner(Request $request, $rs)
    {
        // ลบรายการ (ถ้ามี)
        if (isset($request->removeBanner['id'])) {
            KnowledgeBanner::whereIn('id', $request->removeBanner['id'])->delete();
        }

        if (is_array($request->banner)):
            foreach ($request->banner['banner_id'] as $i => $item) {
                KnowledgeBanner::updateOrCreate(
                    [
                        'id' => @$request->banner['id'][$i],
                    ],
                    [
                        'knowledge_id' => $rs->id,
                        'banner_id'    => @$item,
                    ]
                );
            }
        endif;
    }

    public function saveKnowledgeProduct(Request $request, $rs)
    {
        // ลบรายการ (ถ้ามี)
        if (isset($request->removeProduct['id'])) {
            KnowledgeProductItem::whereIn('id', $request->removeProduct['id'])->delete();
        }

        if (is_array($request->product)):
            foreach ($request->product['product_item_id'] as $i => $item) {
                KnowledgeProductItem::updateOrCreate(
                    [
                        'id' => @$request->banner['id'][$i],
                    ],
                    [
                        'knowledge_id'    => $rs->id,
                        'product_item_id' => @$item,
                    ]
                );
            }
        endif;
    }
}
