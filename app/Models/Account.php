<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    protected $guarded = 'id';
    public $incrementing = false;
    protected $primaryKey ='id';
    protected $fillable = ['id','fullname','email','tokenacc','password','phone','avatar','status','deleted'];
    public $timestamps = false; 
}
