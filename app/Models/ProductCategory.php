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

    public function getLftName()
    {
        return 'left';
    }

    public function getRgtName()
    {
        return 'right';
    }

    public function getParentIdName()
    {
        return 'parent';
    }

    // Specify parent id attribute mutator
    // public function setParentAttribute($value)
    // {
    //     $this->setParentIdAttribute($value);
    // }
    
}
