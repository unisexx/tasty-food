<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Knowledge extends Model
{
    use SoftDeletes;

    protected $table = 'knowledges';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'detail',
        'image',
        'status',
        'knowledge_category_id',
    );

    public function knowledgeCategory()
    {
        return $this->belongsTo('App\Models\KnowledgeCategory', 'knowledge_category_id', 'id');
    }
}
