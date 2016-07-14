<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function getList(){
        $catlist = Category::select('id','name','parent_id','status','created_at')->orderBy('id','DESC')->get();
        return view('admin.category.list',compact('catlist'));
    }
    public function getAdd(){
        $parent = Category::select('id','name','parent_id','status')->get()->toArray();
        return view('admin.category.create',compact('parent'));
    }
    public function postAdd(CategoryRequest $request){
        $cat = new Category;
        $cat->name = $request->catname;
        $cat->alias = changTitle($request->catname);
        $cat->order = $request->order;
        $cat->parent_id = $request->parentid;
        $cat->keywords = $request->keyword;
        $cat->description = $request->description;
        $cat->status = $request->status;
        $cat->save();
        return redirect()->route('admin.category.list')->with(['flash_type'=>'success','flash_msg'=>'Thêm danh mục thành công!']);
    }
    public function getEdit($id){
        $data = Category::findOrFail($id);
        $parent = Category::select('id','name','parent_id','status')->get()->toArray();
        return view('admin.category.edit',compact('parent','data'));
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            ['cat_name'=>'required'],
            ['cat_name.required'=>'Bạn vui lòng nhập tên danh mục']
        );
        $cat = Category::find($id);
        $cat->name = $request->cat_name;
        $cat->alias = changTitle($request->cat_name);
        $cat->order = $request->order;
        $cat->parent_id = $request->parentid;
        $cat->keywords = $request->keyword;
        $cat->description = $request->description;
        $cat->status = $request->status;
        $cat->save();
        return redirect()->route('admin.category.list')->with(['flash_type'=>'success','flash_msg'=>'Cập nhật danh mục thành công!']);
    }
    public function getDelete($id){
        $parent = Category::where('parent_id',$id)->count();
        if ($parent == 0) {
            $cat = Category::find($id);
            $cat->delete($id);
            return redirect()->route('admin.category.list')->with(['flash_type' => 'success', 'flash_msg' => 'Xóa danh mục thành công!']);
        } else{
            echo "<script>
                    alert('Bạn không thể xóa danh mục này');
                   window.location = '";
                    echo route('admin.category.list');
            echo "'
            </script>";
        }
    }

}
