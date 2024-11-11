<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category';
    protected $guarded = 'id';
    public $incrementing = false;
    protected $primaryKey ='id';
    protected $fillable = ['id','title','descriptions','parent_id','status','deleted','positions'];
    public $timestamps = false;
}
