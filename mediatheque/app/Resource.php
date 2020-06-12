<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['titre', 'content', 'author', 'additional_info', 'date'];
    protected $table = 'resource';
    public $timestamps = false;
}
