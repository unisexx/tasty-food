<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductCategory;
use App\Models\ProductImage;
use DB;

class AjaxController extends Controller
{
    public function ajaxSwitchStatus()
    {
        $statusArray = array("true" => "1", "false" => "0");
        $status = $statusArray[$_GET['status']];

        DB::table($_GET['table'])
            ->where('id', $_GET['id'])
            ->update(['status' => $status]);
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
}
