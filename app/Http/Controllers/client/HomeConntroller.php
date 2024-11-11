<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\producers;
use App\Models\unit;
use Dotenv\Util\Regex;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;

class HomeConntroller
{
    public function index() {
        $find = [
            'deleted' => false, 
            'status' => 'active'
        ];
        $record = Product::where($find)->orderBy('positions', 'desc')->get();
        return view('client/pages/home/index',[
            'titlePage' => 'Trang Chủ',
            'record' => $record,
            'fillter' => 'home'
        ]);
    }
}
