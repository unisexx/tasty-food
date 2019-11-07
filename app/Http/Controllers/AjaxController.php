<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{
    public function ajaxSwitchStatus(){
        $statusArray = array("true"=>"1", "false"=>"0");
        $status = $statusArray[$_GET['status']];

        DB::table($_GET['table'])
            ->where('id', $_GET['id'])
            ->update(['status' => $status]);
    }
}
