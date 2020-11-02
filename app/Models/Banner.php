<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    // use SoftDeletes;

    protected $table = 'banners';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'image',
        'url',
        'status',
        'position',
    );

    public function getPositionTxt()
    {
        $data = array(
            1 => 'หน้าแรก',
            2 => 'ข้อมูลสุขภาพ (ด้านขวา)',
            3 => 'ข้อมูลสุขภาพ (ด้านล่าง)',
            4 => 'หน้าแรก (ข้างไฮไลท์)',
        );

        return $data[$this->position];
    }
}
