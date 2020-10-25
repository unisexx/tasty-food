<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBanner extends Model
{
    protected $table = 'knowledge_banners';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'knowledge_id',
        'banner_id',
    );

    public function banner()
    {
        return $this->belongsTo('App\Models\Banner', 'banner_id', 'id');
    }
}
