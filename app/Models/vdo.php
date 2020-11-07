<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;

class vdo extends Model
{
    // use SoftDeletes;

    protected $table = 'vdos';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'url',
        'status',
        'position',
    );

    public function getPositionTxt()
    {
        $data = array(
            1 => 'หน้าแรก (ข้างไฮไลท์)',
            2 => 'หน้าเกี่ยวกับเรา',
        );

        return $data[$this->position];
    }
}
