<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductClientController
{
    public function index() {
        $find = [
            'deleted' => false, 
            'status' => 'active'
        ];
        $record = Product::where($find)->orderBy('positions', 'desc')->get();
        return view('client/pages/products/index',[
            'titlePage' => 'Danh Sách Sản Phẩm',
            'record' => $record,
            'fillter' => 'product'
        ]);
    }

    public function detail(Request $request,string $id) {   
        $record = Product::find($id);
       
        return view('client.pages.products.detail',[
            'titlePage' => 'Chi Tiết Sản Phẩm',
            'record' => $record,
              'fillter' => 'product'
        ]);
    }
}
