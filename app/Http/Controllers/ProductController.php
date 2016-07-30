<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
//use Symfony\Component\HttpFoundation\Request;
use App\Category;
use App\Product;
use App\Product_imgages;
use App\Http\Requests\ProductRequest;
use Input;
//use Request;
//use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
    public function getList(){
        $product = Product::select('id','name','catid','price','images','status','created_at')->orderBy('id','DESC')->get();
        return view('admin.product.list',compact('product'));
    }
    public function getAdd(){
        $cat = Category::select('id','name','parent_id','status')->get()->toArray();
        return view('admin.product.create',compact('cat'));
    }
    public function postAdd(ProductRequest $request){
        $file_name = $request->file('imager')->getClientOriginalName();
        $product = new Product;
        $product->name = $request->name;
        $product->alias = changTitle($request->name);
        $product->price = $request->price;
        $product->intro = $request->txtintro;
        $product->content = $request->txtcontent;
        $product->images = $file_name;
        $request->file('imager')->move('resources/upload/',$file_name);
        $product->keywords = $request->keyword;
        $product->descriptions = $request->description;
        $product->catid = $request->catid;
        $product->userid = 1;
        $product->status = $request->status;
        $product->save();
        $product_id = $product->id;
        if ($request->hasFile('imgDetail')){
            foreach($request->file('imgDetail') as $file){
                $product_img = new Product_imgages();
                if (isset($file)){
                    $file_n = $file->getClientOriginalName();
                    $product_img->image = $file_n;
                    $product_img->product_id = $product_id;
                    $file->move('resources/upload/details/',$file_n);
                    $product_img->save();
                }
            }
        }
        return redirect()->route('admin.product.list')->with(['flash_type'=>'success','flash_msg'=>'Thêm sản phẩm thành công!']);
    }
    public function getEdit($id){
        $data = Product::find($id);
        $parent = Category::select('id','name','parent_id','status')->get();
        $proimg = Product::find($id)->pimage;
        return view('admin.product.edit',compact('parent','data','proimg'));
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
            ['name'=>'required'],
            ['name.required'=>'Bạn vui lòng nhập tên sản phẩm'],
            ['catid'=>'required'],
            ['catid.required'=>'Bạn vui lòng chọn danh mục']
        );
        $product = Product::find($id);
        $img_curr = 'resources/upload/'.$product->images;
        if ($request->imager){
         $file_name = $request->file('imager')->getClientOriginalName();
            if($file_name != '' && $request->file('imager')){
                $product->images = $file_name;
                $request->file('imager')->move('resources/upload/',$file_name);
                if (File::exists($img_curr)){
                    File::delete($img_curr);
                }
            }
        }
        $product->name = $request->name;
        $product->alias = changTitle($request->name);
        $product->price =  $request->price;
        $product->intro = $request->txtintro;
        $product->content = $request->txtcontent;
        $product->keywords = $request->keyword;
        $product->descriptions =  $request->description;
        $product->catid =  $request->catid;
        $product->userid = 1;
        $product->status =  $request->status;
        $product->save();
        $product_id = $product->id;
        if ($request->hasFile('imgDetail')){
            foreach($request->file('imgDetail') as $file){
                $product_img = new Product_imgages();
                if (isset($file)){
                    $file_n = $file->getClientOriginalName();
                    $product_img->image = $file_n;
                    $product_img->product_id = $product_id;
                    $file->move('resources/upload/details/',$file_n);
                    $product_img->save();
                }
            }
        }
        return redirect()->route('admin.product.list')->with(['flash_type'=>'success','flash_msg'=>'Cập nhật sản phẩm thành công!']);
    }
    public function getDelImg(Request $request,$id){
        if($request->ajax()){
            $idhinh = (int)$request->idimg;
            $img = Product_imgages::find($idhinh);
            if ($img !=''){
                $imgage = 'resources/upload/details/'.$img->image;
                if (File::exists($imgage)){
                    File::delete($imgage);
                }
                $img->delete();
            }
            return 'Ok';
        }
    }
    public function getDelete($id){
        $pro_detail = Product::find($id)->pimage;
        foreach($pro_detail as $item){
            File::delete('resources/upload/details/'.$item->image);
        }
        $product = Product::find($id);
        File::delete('resources/upload/'.$product->images);
        $product->delete($id);
        return redirect()->route('admin.product.list')->with(['flash_type'=>'success','flash_msg'=>'Xóa sản phẩm thành công!']);
    }
}
