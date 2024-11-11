<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\cloudinary;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\producers;
use App\Models\unit;
use Dotenv\Util\Regex;
use Illuminate\Support\Facades\DB;

class ProductController
{
    public function index(Request $request) {  
        $FillterStatus = [
            [
                'name' => 'Tất Cả',
                'status' => '',
                'class' => ''
            ],
            [
                'name' => 'Hoạt Động',
                'status' => 'active',
                'class' => ''
            ],
            [
                'name' => 'Dừng Hoạt Động',
                'status' => 'inactive',
                'class' => ''
            ]
        ];
        $find = [
            'deleted' => false
        ];

        //FillterStatus
        
        $status = $request->input('status');
        if ($status) {
            foreach ($FillterStatus as $key => $value) {
                if($value['status'] == $status) {
                    $FillterStatus[$key]['class']='active';
                }
            }
            $find['status'] = $status;
        }else {
            $FillterStatus[0]['class']='active';
        }
        $productsQuery = Product::where($find);
        
        // Search
        $keyword = $request->input('keyword');
        if ($keyword) {
            $productsQuery->whereRaw('REGEXP_LIKE(title, ?, \'i\')', [$keyword]);
        }
        $count = $productsQuery->count();
        $ObjectPagination = [
            'currentPage' => 1,
            'limitItemt' => 3
        ];
        $count = $productsQuery->count();
        $ObjectPagination['totalPage'] = ceil($count / ($ObjectPagination['limitItemt']) );
        $ObjectPagination['currentPage'] =  $request->input('page');    
        $ObjectPagination['skip'] = (($ObjectPagination['currentPage'] - 1 ) * ($ObjectPagination['limitItemt']));
        $products = $productsQuery->skip($ObjectPagination['skip'])->take($ObjectPagination['limitItemt'])->orderBy('positions', 'desc')->get()  ;
        return view('admin.pages.product.index',[
            'titlePage' => 'Danh Sách Sản Phẩm',
            'products' => $products,
            'keyword' => $keyword,
            'FillterStatus' => $FillterStatus,
            'objectPagi' => $ObjectPagination
        ]);
    }

    public function create(Request $request) {  
        $find = [
            'deleted' => false
        ];
        $record = CategoryProduct::where($find)->get(); 
        $producerss = producers::all()->sortDesc(); 
        $units = unit::all()->sortDesc(); 
        return view('admin.pages.product.create',[
            'titlePage' => 'Thêm Mới Sản Phẩm',
            'record' => $record,
            'producerss' => $producerss,
            'units' => $units 
        ]);
    }

    public function createPost(Request $request) {
        $newIdResult = DB::select("SELECT product_id_seq.NEXTVAL AS id FROM dual");
        $newId = 'SP' . str_pad($newIdResult[0]->id, 3, '0', STR_PAD_LEFT); 
        $request['id'] = $newId; 
        if ($request->file('file')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
            $request['thumbnail']= $uploadedFileUrl;
        }
        $positions = $request->input('positions');
        $find = [
            'deleted' => false
        ];
        if ($positions) {
            $positions = (int)$positions;
        }else {
            $positions =Product::where($find)->count() + 1;   
        }
        $request['positions'] = $positions;
        Product::create($request->all());
        session()->flash('success', 'Tạo Sản Phẩm Thành Công');
        return redirect("/admin/product");
    }

    public function ChangeStatus(Request $request,string $id,string $status) {   
        Product::find($id)->update(['status' => $status]);
        session()->flash('success', 'Cập nhật Trạng Thái thành công');
        return redirect()->back();
    }

    public function changeMulti(Request $request) { 
        $ids = explode(',',$request->input('ids'));
        $type = $request->input('type');
        switch ($type) {
            case 'active':
                Product::whereIn('id', $ids)->update(['status' => 'active']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " sản phẩm thành công");
                break;
            case 'inactive':
                Product::whereIn('id', $ids)->update(['status' => 'inactive']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " sản phẩm thành công");
                break;
            case 'delete':
                Product::whereIn('id', $ids)->update(
                    [
                        'deleted' => true,
                    ]
                );
                session()->flash('success', "Đã Xóa Thành Công " . count($ids) .  " Sản Phẩm");
                break;
            case 'positions':
                foreach ($ids as $key => $value) {
                    [$id,$positions] = explode('/',$value); 
                    $positions = (int)$positions;
                    Product::find($id)->update(['positions' => $positions]);
                    session()->flash('success', 'Cập nhật Trạng Thái thành công');
                }
                break;
        }
        return redirect()->back();
    }

    public function delete(Request $request,string $id) {
        Product::find($id)->update(
            [
                'deleted' => true,
            ]
        );
        session()->flash('success', 'Đã Xóa Thành Công Sản Phẩm');
        return redirect()->back();
    }

    public function edit(Request $request,string $id) { 
        $producerss = producers::all()->sortDesc(); 
        $units = unit::all()->sortDesc();  
        $category = CategoryProduct::where('deleted', false)->get(); 
        $record = Product::find($id);
      
        return view('admin.pages.product.edit',[
            'titlePage' => 'Chỉnh Sửa Sản Phẩm',
            'record' => $record,
            'producerss' => $producerss,
            'units' => $units,
            'category' => $category
        ]);
    }
    public function editPatch(Request $request ,string $id) {   
        if ($request->file('file')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
            $request['thumbnail']= $uploadedFileUrl;
        }
        $positions = $request->input('positions');
        $find = [
            'deleted' => false
        ];
        if ($positions) {
            $positions = (int)$positions;
        }else {
            $positions =Product::where($find)->count() + 1;   
        }   
        // dd($request->all());
        $request['positions'] = $positions;
        Product::find($id)->update($request->all());
        session()->flash('success', 'Đã Cập Nhật Thành Công Sản Phẩm');
        return redirect()->back();
    }

    public function detail(Request $request,string $id) {   
        $record = Product::find($id);
       
        return view('admin.pages.product.detail',[
            'titlePage' => 'Chi Tiết Sản Phẩm',
            'record' => $record
        ]);
    }
}
