<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeProductItem extends Model
{
    protected $table = 'knowledge_product_items';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'knowledge_id',
        'product_item_id',
    );

    public function productItem()
    {
        return $this->belongsTo('App\Models\ProductItem', 'product_item_id', 'id');
    }
}
