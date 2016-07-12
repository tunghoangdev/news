<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function getList(){
        $catlist = Category::select('cat_id','cat_name','cat_parentid','created_at')->orderBy('cat_id','DESC')->get();
        return view('admin.category.list',compact('catlist'));
    }
    public function getAdd(){
        $parent = Category::select('cat_id','cat_name','cat_parentid')->get()->toArray();
        return view('admin.category.create',compact('parent'));
    }
    public function postAdd(CategoryRequest $request){
        $cat = new Category;
        $cat->cat_name = $request->catname;
        $cat->cat_alias = changTitle($request->catname);
        $cat->cat_order = $request->order;
        $cat->cat_parentid = $request->parentid;
        $cat->cat_keywords = $request->keyword;
        $cat->cat_description = $request->description;
        $cat->save();
        return redirect()->route('admin.category.list')->with(['flash_type'=>'success','flash_msg'=>'Thêm danh mục thành công!']);
    }
    public function getEdit($cat_id){
        $parent = Category::select('cat_id','cat_name','cat_parentid')->get()->toArray();
        return view('admin.category.edit',compact('parent'));
    }
    public function postEdit(CategoryRequest $request){
        return redirect()->route('admin.category.list')->with(['flash_type'=>'success','flash_msg'=>'Cập nhật danh mục thành công!']);
    }
    public function getDelete($cat_id){
        $cat = Category::find($cat_id);
        $cat->delete();
        return redirect()->route('admin.category.list')->with(['flash_type'=>'success','flash_msg'=>'Xóa danh mục thành công!']);
    }

}
