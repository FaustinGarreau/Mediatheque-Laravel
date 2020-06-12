<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaning extends Model
{
    protected $table = 'loaning';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'resource_id',
    ];
}
