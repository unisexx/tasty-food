<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeCategory extends Model
{
    protected $table = 'knowledge_categories';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'title',
        'status',
    );
}
