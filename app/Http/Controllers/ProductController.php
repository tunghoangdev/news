<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function getList(){
        $catlist = Category::select('id','name','parent_id','status','created_at')->orderBy('id','DESC')->get();
        return view('admin.product.list',compact('productlist'));
    }
    public function getAdd(){
        $cat = Category::select('id','name','parent_id','status')->get()->toArray();
        return view('admin.product.create',compact('cat'));
    }
    public function postAdd(ProductRequest $request){
        $product = new Product;
        $product->name = $request->name;
        $product->alias = changTitle($request->name);
        $product->price = $request->price;
        $product->intro = $request->intro;
        $product->content = $request->txtcontent;
        $product->catid = $request->catid;
        $product->images = $request->imager;
        $product->keywords = $request->keyword;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->save();
        return redirect()->route('admin.product.list')->with(['flash_type'=>'success','flash_msg'=>'Thêm sản phẩm thành công!']);
    }
    public function getEdit($id){
        $data = Product::findOrFail($id);
        $parent = Product::select('id','name','parent_id','status')->get()->toArray();
        return view('admin.product.edit',compact('parent','data'));
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            ['name'=>'required'],
            ['name.required'=>'Bạn vui lòng nhập tên sản phẩm'],
            ['catid'=>'required'],
            ['catid.required'=>'Bạn vui lòng nhập tên sản phẩm']
        );
        $cat = Product::find($id);
        $cat->name = $request->cat_name;
        $cat->alias = changTitle($request->cat_name);
        $cat->order = $request->order;
        $cat->parent_id = $request->parentid;
        $cat->keywords = $request->keyword;
        $cat->description = $request->description;
        $cat->status = $request->status;
        $cat->save();
        return redirect()->route('admin.product.list')->with(['flash_type'=>'success','flash_msg'=>'C?p nh?t danh m?c th�nh c�ng!']);
    }
    public function getDelete($id){
        $parent = Product::where('parent_id',$id)->count();
        if ($parent == 0) {
            $cat = Product::find($id);
            $cat->delete($id);
            return redirect()->route('admin.product.list')->with(['flash_type' => 'success', 'flash_msg' => 'X�a danh m?c th�nh c�ng!']);
        } else{
            echo "<script>
                    alert('B?n kh�ng th? x�a danh m?c n�y');
                   window.location = '";
            echo route('admin.product.list');
            echo "'
            </script>";
        }
    }
}
