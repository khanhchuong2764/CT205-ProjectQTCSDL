<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = 'id';
    public $incrementing = false;
    protected $primaryKey ='id';
    protected $fillable = ['id','title','descriptions','price','stock','status','positions','status','thumbnail','discountPercentage','categoryId','unitId','producersId','deleted'];
    public $timestamps = false;


    public function category() {
        return $this->belongsTo('App\Models\CategoryProduct','categoryid','id');
    }
    public function unit() {
        return $this->belongsTo('App\Models\unit','unitid','id');
    }
    public function producers() {
        return $this->belongsTo('App\Models\producers','producersid','id');
    }
}
