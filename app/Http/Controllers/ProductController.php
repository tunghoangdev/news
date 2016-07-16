<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductController extends Controller
{
    public function getList(){
        $catlist = Category::select('id','name','parent_id','status','created_at')->orderBy('id','DESC')->get();
        return view('admin.Product.list',compact('catlist'));
    }
    public function getAdd(){
        $cat = Category::select('id','name','parent_id','status')->get()->toArray();
        return view('admin.Product.create',compact('cat'));
    }
    public function postAdd(ProductRequest $request){
        $cat = new Product;
        $cat->name = $request->catname;
        $cat->alias = changTitle($request->catname);
        $cat->order = $request->order;
        $cat->parent_id = $request->parentid;
        $cat->keywords = $request->keyword;
        $cat->description = $request->description;
        $cat->status = $request->status;
        $cat->save();
        return redirect()->route('admin.Product.list')->with(['flash_type'=>'success','flash_msg'=>'Thêm danh m?c thành công!']);
    }
    public function getEdit($id){
        $data = Product::findOrFail($id);
        $parent = Product::select('id','name','parent_id','status')->get()->toArray();
        return view('admin.Product.edit',compact('parent','data'));
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            ['cat_name'=>'required'],
            ['cat_name.required'=>'B?n vui lòng nh?p tên danh m?c']
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
        return redirect()->route('admin.Product.list')->with(['flash_type'=>'success','flash_msg'=>'C?p nh?t danh m?c thành công!']);
    }
    public function getDelete($id){
        $parent = Product::where('parent_id',$id)->count();
        if ($parent == 0) {
            $cat = Product::find($id);
            $cat->delete($id);
            return redirect()->route('admin.Product.list')->with(['flash_type' => 'success', 'flash_msg' => 'Xóa danh m?c thành công!']);
        } else{
            echo "<script>
                    alert('B?n không th? xóa danh m?c này');
                   window.location = '";
            echo route('admin.Product.list');
            echo "'
            </script>";
        }
    }
}
