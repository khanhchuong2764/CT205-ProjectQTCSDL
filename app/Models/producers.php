<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class producers extends Model
{
    protected $table = 'producers';
    protected $guarded = 'id';
    public $incrementing = false;
    protected $primaryKey ='id';
    protected $fillable = ['id','name','place'];
    public $timestamps = false;
}
