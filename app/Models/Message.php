<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $table = 'messages';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'name',
        'email',
        'message',
    );
}
