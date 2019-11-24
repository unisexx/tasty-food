<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class ProductCategory extends Model
{
    use NodeTrait;

    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        '_lft',
        '_rgt',
        'parent_id'
    ];
}
