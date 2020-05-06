<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

use Auth;

class VipScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
		// ถ้าไม่ใช่ลูกค้า vip ก็จะมองไม่เห็นสินค้าสำหรับ vip only
		if(@Auth::user()->is_vip != 1){
			$builder->whereNull('is_vip_view_only');
		}
    }
}