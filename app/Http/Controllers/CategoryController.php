<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function getList(){
        $catlist = Category::select('id','name','parentid','created_at')->orderBy('id','DESC')->get();
        return view('admin.category.list',compact('catlist'));
    }
    public function getAdd(){
        $parent = Category::select('id','name','parentid')->get()->toArray();
        return view('admin.category.create',compact('parent'));
    }
    public function postAdd(CategoryRequest $request){
        $cat = new Category;
        $cat->name = $request->catname;
        $cat->alias = changTitle($request->catname);
        $cat->order = $request->order;
        $cat->parentid = $request->parentid;
        $cat->keywords = $request->keyword;
        $cat->description = $request->description;
        $cat->save();
        return redirect()->route('admin.category.list')->with(['flash_type'=>'success','flash_msg'=>'Thêm danh mục thành công!']);
    }
    public function getEdit($id){
        $parent = Category::select('id','name','parentid')->get()->toArray();
        return view('admin.category.edit',compact('parent'));
    }
    public function postEdit(CategoryRequest $request){
        return redirect()->route('admin.category.list')->with(['flash_type'=>'success','flash_msg'=>'Cập nhật danh mục thành công!']);
    }
    public function getDelete($id){
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->route('admin.category.list')->with(['flash_type'=>'success','flash_msg'=>'Xóa danh mục thành công!']);
    }

}
