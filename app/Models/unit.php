<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    protected $table = 'unit';
    protected $primaryKey = 'id';
    protected $fillable = ['title','id'];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $casts = [
        'id' => 'string', 
        'title' => 'string',
    ];
}

