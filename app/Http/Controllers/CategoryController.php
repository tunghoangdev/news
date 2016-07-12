<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function getAdd(){
        return view('admin.category.create');
    }
    public function postAdd(CategoryRequest $request){
        $cat = new Category;
        $cat->cat_name = $request->catname;
        $cat->cat_alias = $request->alias;
        $cat->cat_order = $request->order;
        $cat->cat_parentid = $request->parentid;
        $cat->cat_keywords = $request->keywords;
        $cat->cat_description = $request->description;
        $cat->save();

    }

}
